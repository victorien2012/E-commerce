<?php
namespace App;
use App\Produit;

class Cart{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;


    public function __construct($oldCart){

        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }
    public function add($item, $produits_id)
    {

        $produit = Produit::join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut', 1)
            ->where('produits.id', $produits_id)
            ->select('produits.*', 'images.lien as image_lien')
            ->first();



        $storedItem = [
            'qty' => 0,
            'produits_id' => 0,
            'item' => $item
        ];

        if ($this->items) {
            if (array_key_exists($produits_id, $this->items)) {
                $storedItem = $this->items[$produits_id];
            }
        }

        $storedItem['qty']++;
        $storedItem['produits_id'] = $produits_id;
        $this->totalQty++;
        $this->items[$produits_id] = $storedItem;
    }



    public function updateQty($id, $qty){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['prix'] * $this->items[$id]['qty'];
        $this->items[$id]['qty'] = $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['prix'] * $qty;

    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['prix'] * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }


}
?>
