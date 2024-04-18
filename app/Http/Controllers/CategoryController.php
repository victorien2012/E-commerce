<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ajoutercategorie(){
        return view('dashbord.ajoutercategorie');
    }

    public function sauvercategorie(Request $request){
        // return view('dashbord.data-table');
    }
}
