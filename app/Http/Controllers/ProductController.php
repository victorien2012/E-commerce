<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    public function ajouterproduit(){

        $categories = Category::get();

        return view('dashbord.ajouterproduit')->with('categories', $categories);
    }


    public function sauverproduit(Request $request){

//       dd($request->all());
        $categorie= New category();

$this->validate($request, [  'product_name'=>'required',
                             'product_price'=>'required',
                             'product_category'=>'required',
                             'product_image'=>'required|nullable|max::1999',
        ]);


//         dd($request->input('category_name'))
//        $categorie->save();
//        return redirect('/ajouterproduit')->with('status', 'le produit '. $produit->nom_produit. ' a été ajouté avec succès');

    }


    public function produits(){
        return view('dashbord.produits');
    }
}
