<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;




class SliderController extends Controller
{
    //methode pour afficher la page ajouter produit
    public function ajouterslider(){

        return view('dashbord.ajouterslider');
    }


//methode pour afficher la page slider
    public function sliders(){
        return view('dashbord.sliders');
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
        $slider = Slider::create([
            'description1' => $validatedData['description1'],
            'description2' => $validatedData['description2'],
            'slider_image' => $validatedData['slider_image'],
        ]);

        return back()->with('status', 'Le slider a été ajouté avec succès !');
    }






}
