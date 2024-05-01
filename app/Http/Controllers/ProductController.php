<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ajouterproduit(){
        return view('dashbord.ajouterproduit');
    }


    public function sauverproduit(Request $request){
        
    }
    

    public function produits(){
        return view('dashbord.produits');
    }
}
