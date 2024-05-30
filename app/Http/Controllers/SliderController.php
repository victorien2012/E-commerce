<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class SliderController extends Controller
{
    //methode pour afficher la page ajouter produit
    public function ajouterslider(){

        return view('dashbord.ajouterslider');
    }


    //methode de validation du formulaire et enregistrement des donnnées
    public function sauverslider(Request $request){
        $validatedData = $request->validate([
            'description1' => 'required|string|max:255',
            'description2' => 'required|string|max:255',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Enregistrement de l'image
        $imagePath = $request->file('slider_image')->store('sliders');

        // Création de l'entrée des données dans la table sliders
        $sliders = Slider::create([
            'description1' => $validatedData['description1'],
            'description2' => $validatedData['description2'],
            'slider_image' => $validatedData['slider_image'],
            'statut' => 1,

        ]);

        return back()->with('status', 'Le slider a été ajouté avec succès !');
    }



//    methode pour affciher les données de la dable slider
    public function  sliders()
    {
        $sliders = Slider::all();


        return view('dashbord.sliders')->with('sliders', $sliders);
    }

    //editer sliders
    public function editsliders($id)
    {
        $sliders = Slider::find($id);
        return view('dashbord.editsliders', compact('sliders'));

    }

    public function modifiersliders(Request $request)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'description1' => 'required|string|max:255',
            'description2' => 'required|string|max:255',
            'slider_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Trouver les modèles correspondants
        $sliders = slider::find($request->input('id'));


        // Mettre à jour les attributs du produit
        $sliders->description1 = $request->input('description1');
        $sliders->description2 = $request->input('description2');


        // Mettre à jour l'image si une nouvelle image est fournie
        if ($request->hasFile('slider_image')) {
            $newImage = $request->file('slider_image');
            $path = $newImage->store('images', 'public');
            $sliders->slider_image = $path;
        }

        // Sauvegarder les modifications
        $sliders->save();


        return back()->with('status', 'Le  slider ont été modifié avec succès !');
    }



//methode de suppression du slider
    public function deletesliders(Request $request) {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'id' => 'required|exists:sliders,id',
        ]);

        // Trouver le modèle correspondant
        $sliders = slider::find($request->input('id'));

        if ($sliders) {
            // Supprimer les images associées
//            $images = Image::where('produit_id', $produits->id)->get();
            foreach ($sliders as $image) {
                // Supprimer le fichier de l'image du stockage (optionnel)
                Storage::disk('public')->delete($image);
                // Supprimer l'enregistrement de l'image
                $sliders->delete();
            }

            // Supprimer le slider
            $sliders->delete();

            return back()->with('status', 'Le slider a été supprimé avec succès !');
        } else {
            return back()->with('error', 'Le slider n\'a pas été trouvé.');
        }
    }


}
