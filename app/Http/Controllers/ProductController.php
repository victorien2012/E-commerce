<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    public function ajouterproduit()
    {

        $categories = Category::get();

        return view('dashbord.ajouterproduit')->with('categories', $categories);
    }


    public function sauverproduit(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_category' => 'required|exists:categories,id',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Enregistrement de l'image
        $imagePath = $request->file('product_image')->store('images');


        // Création de l'entrée des données dans la table produit
        $produit = Produit::create([
            'nom' => $validatedData['product_name'],
            'prix' => $validatedData['product_price'],
            'categorie_id' => $validatedData['product_category'],
//            'promotion_id' => $validatedData['product_category'],
//            'image_id' => $image->id,
            'statut' => 1,
        ]);

        $lastProduit = Produit::latest()->first();

        // Création de l'entrée de l'image dans la table image
        $image = Image::create(['nom' => $imagePath, 'produit_id'=> $lastProduit->id]);

        return redirect('/ajouterproduit')->with('status', 'Le produit '.$produit->nom.' a été ajouté avec succès !');
    }

    // methode pour afficher les Produits
    public function produits()
    {

        $produits = Produit::with('image')->get();
//        $produits = Produit::with('categorie')->get();
//        $categorie = Category::with('product')->get();
        $_produits = Produit::all();
//        dd($_produits[1]->categorie->nom_categorie,$produits);
        return view('dashbord.produits')->with('produits', $produits);
    }


    //editer un produit
    public function edit_produits($id){

        $produits = Produit::find($id);

        return view('dashbord.editproduits')->with('produits', $produits);
    }


}
