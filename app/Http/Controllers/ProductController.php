<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    public function ajouterproduit()
    {

        $categories = Category::get();

        return view('dashbord.ajouterproduit')->with('categories', $categories);
    }


    public function sauverproduit(Request $request)
    {

//       dd($request->all());
        $categorie = new category();
//
        $request->validate(['product_name' => 'required',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_image' => 'required|nullable|max::1999']);


    }


    public function produits()
    {
        return view('dashbord.produits');
    }
}
