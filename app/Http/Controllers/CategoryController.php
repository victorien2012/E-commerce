<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CategoryController extends Controller
{
    public function ajoutercategorie(){
        return view('dashbord.ajoutercategorie');
    }

    public function sauvercategorie(Request $request){
        // return view('dashbord.data-table');
    }


public function categories(){

    return view ('Dashbord.categories');
}

}
