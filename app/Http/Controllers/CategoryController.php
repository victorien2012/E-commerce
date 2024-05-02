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

    // $this->validate($request, ['nom_categorie'=>'required']);

        $categorie= New category();

        $categorie->nom_categorie=$request->input('category_name');
         dd($request->input('category_name'));
        $categorie->save();
        return redirect('/ajoutercategorie')->with('status', 'la categorie '. $categorie->nom_categorie. ' a été ajouté');
    }

// methode pour afficher les categories
    public function categories(){


        $categories= category::get();


        return view ('dashbord.categories')->with('categories', $categories);
    }

}
