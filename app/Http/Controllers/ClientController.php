<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use App\Produit;
use App\Image;
use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Cart;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
    public function accueil(){
        $sliders  = Slider::where('statut', 1)->get();
        $produits  = Produit::where('statut', 1)->get();
//
        $produits = DB::table('produits')
            ->join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut',1)->get();
//dd($produits);

        return view('client.accueil')->with('sliders',$sliders)->with('produits', $produits);

    }
//affichage de tout les produits et leur categorie
    public function shop(){
// Récupération de toutes les catégories de la base de données
        $categories  = Category::get();
        // Récupération de tous les produits actifs et leurs images associées
        $produits = Produit::rightJoin('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut',1)
            ->get();

        // Initialisation du tableau pour organiser les produits par catégorie
        $produitsBycategorie=[];
        // Boucle à travers chaque produit récupéré
        foreach ($produits as $produit){
            $categorie = $produit->categorie;

            // Si la catégorie n'est pas encore dans le tableau, on l'initialise
            if(!isset($produitsBycategorie[$categorie->id])){
                $produitsBycategorie[$categorie->id]=[];
            }
            // Ajout du produit dans le tableau sous la catégorie correspondante
            $produitsBycategorie[$categorie->id][$categorie->nom_categorie][] = $produit;
        }

        // Définition d'une catégorie par défaut (null) car cette fonction n'est pas spécifique à une catégorie particulière
        $categorie_id = null;
        // Retourne la vue 'client.shop' en passant les catégories, les produits organisés par catégorie, et l'ID de la catégorie
        return view('client.shop')->with('categories', $categories)->with('produitsBycategorie',  $produitsBycategorie)->with('categorie_id',  $categorie_id);
    }



    /**
     * @param $id
     * @comment affichage des produits en fonction de leur  categorie
     */
    public function shopCategorie($id) {
        // Récupération de toutes les catégories de la base de données
        $categories = Category::get();

        // Stockage de l'ID de la catégorie spécifiée
        $categorie_id = $id;

        // Récupération des produits actifs appartenant à la catégorie spécifiée, avec leurs images associées
        $produits = Produit::join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut', 1) // On ne sélectionne que les produits avec un statut actif
            ->where('produits.categorie_id', $id) // On ne sélectionne que les produits appartenant à la catégorie spécifiée
            ->get();

        // Initialisation du tableau pour organiser les produits par catégorie
        $produitsBycategorie = [];

        // Boucle à travers chaque produit récupéré
        foreach ($produits as $produit) {
            // Récupération de la catégorie du produit
            $categorie = $produit->categorie;

            // Si la catégorie n'est pas encore dans le tableau, on l'initialise
            if (!isset($produitsBycategorie[$categorie->id])) {
                $produitsBycategorie[$categorie->id] = [];
            }

            // Ajout du produit dans le tableau sous la catégorie correspondante
            $produitsBycategorie[$categorie->id][$categorie->nom_categorie][] = $produit;
        }

        // Retourne la vue 'client.shop' en passant les catégories, les produits organisés par catégorie, et l'ID de la catégorie spécifiée
        return view('client.shop')
            ->with('categories', $categories)
            ->with('produitsBycategorie', $produitsBycategorie)
            ->with('categorie_id', $categorie_id);
    }


//methode pour ajouter un produit au panier
    public function ajouter_au_panier($id){
//        $produits = Produit::find($id);

        $produits = Produit::join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut', 1) // On ne sélectionne que les produits avec un statut actif
//            ->where('produits.id', $id)
            ->find($id);

//        dd($produits);
        $oldCart = Session::has('cart')? Session::get('cart'):null;

        $cart = new Cart($oldCart);
        $cart->add($produits, $id);
        Session::put('cart', $cart);

        return redirect('/shop');
    }


    public function paiement(){
        return view('client.paiement');
    }




    public function panier() {
        if (!Session::has('cart')) {
            return view('client.panier', ['produits' => []]);
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

//        Session::forget('cart');

        $cart = new Cart($oldCart);

//        dd($cart->items);
        return view('client.panier', ['produits' => $cart->items]);
    }



    public function contact(){
        return view('client.contact');
    }


    public function inscription(){
        return view('client.inscrire');
    }


    public function connecter(){
        return view('client.connecter');
    }


}
