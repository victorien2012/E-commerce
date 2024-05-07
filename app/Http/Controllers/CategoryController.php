<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Category;


class CategoryController extends Controller
{
    public function ajoutercategorie(){
        return view('dashbord.ajoutercategorie');
    }

    public function sauvercategorie(Request $request){

//         $this->validate($request,['categorie_name'=>'required|unique:categorie']);

        $categorie= New category();

        $categorie->nom_categorie=$request->input('category_name');
//         dd($request->input('category_name'));
        $categorie->save();
        return redirect('/ajoutercategorie')->with('status', 'la categorie '. $categorie->nom_categorie. ' a été ajouté avec succès');
    }

// methode pour afficher les categories
    public function categories(){


        $categories= category::get();


        return view ('dashbord.categories')->with('categories', $categories);
    }

    public function edit_categorie($id){

        $categorie = category::find($id);

        return view('dashbord.editcategorie')->with('categorie', $categorie);
    }

    //methode pour Post pour enregistrer la donnée modifiée
    public function modifiercategorie(Request $request){
        // $this->validate($request, ['nom_categorie'=>'required']);

        $categorie= category::find($request->input('id'));

        $categorie->nom_categorie=$request->input('category_name');

        $categorie->update();
        return back()->with('status', 'la categorie '. $categorie->nom_categorie. ' a été modifié avec succès');

    }

    public function deletecategorie(Request $request){

        $categorie= category::find($request->input('id'));
        $categorie->delete();
        return back()->with('status', 'la categorie '. $categorie->nom_categorie. ' a été supprimé avec succès');

    }



}
