<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function ajouterslider(){
        return view('dashbord.ajouterslider');
    }


    public function sauverslider(Request $request){
      
    }


    public function sliders(){
        return view('dashbord.sliders');
    }
}
