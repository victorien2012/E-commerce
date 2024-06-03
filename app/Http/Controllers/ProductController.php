<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use App\Category;
use App\Image;
use Illuminate\Support\Facades\Storage;

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
        $image = Image::create(['lien' => $imagePath, 'produit_id'=> $lastProduit->id]);

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
    public function editproduits($id)
    {

        $produit = produit::find($id);
        $image = image::find($id);
        $categories = category::where('id', '!=',$produit->categorie_id)->get();
//        $categories = category::all();
//        dd($categories);
        return view('dashbord.editproduits')->with('produit', $produit)->with('categories', $categories);
    }

//    methode pour Post pour enregistrer la donnée modifiée

    public function modifierproduits(Request $request) {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'id' => 'required|exists:produits,id',
            'product_category' => 'required|exists:categories,id',
            'product_image' => 'sometimes|image|max:2048', // Vérifie si une image est fournie
            // Ajoutez d'autres validations si nécessaire
        ]);

        // Trouver les modèles correspondants
        $produits = Produit::find($request->input('id'));
        $categorie = Category::find($request->input('product_category'));
        $image = Image::where('produit_id', $request->input('id'))->first();

        // Mettre à jour les attributs du produit
        $produits->categorie_id = $request->input('product_category');
        $produits->nom = $request->input('product_name');
        $produits->prix = $request->input('product_price');


        // Mettre à jour l'image si une nouvelle image est fournie
        if ($request->hasFile('product_image')) {
            $newImage = $request->file('product_image');
            $path = $newImage->store('images', 'public');
            $image->lien = $path;
        }

        // Sauvegarder les modifications
        $produits->save();
        $categorie->save();
        $image->save();

        return back()->with('status', 'Le produit ' . $produits->nom . ' a été modifié avec succès !');
    }

//methode de suppression du produit et son image
    public function deleteproduits(Request $request) {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'id' => 'required|exists:produits,id',
        ]);

        // Trouver le modèle correspondant
        $produits = Produit::find($request->input('id'));

        if ($produits) {
            // Supprimer les images associées
            $images = Image::where('produit_id', $produits->id)->get();
            foreach ($images as $image) {
                // Supprimer le fichier de l'image du stockage (optionnel)
                Storage::disk('public')->delete($image->lien);
                // Supprimer l'enregistrement de l'image
                $image->delete();
            }

            // Supprimer le produit
            $produits->delete();

            return back()->with('status', 'Le produit ' . $produits->nom . ' a été supprimé avec succès !');
        } else {
            return back()->with('error', 'Le produit n\'a pas été trouvé.');
        }
    }


}
