<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Image;
use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function accueil(){
        $sliders  = Slider::where('statut', 1)->get();
        $produits  = Produit::where('statut', 1)->get();
//
        $produits = DB::table('produits')
            ->join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut',1)->get();
//dd($produits);

        return view('client.accueil')->with('sliders',$sliders)->with('produits', $produits);
    }

    public function produit(){
        return view('client.produit');
    }

    public function paiement(){
        return view('client.paiement');
    }

    public function panier(){
        return view('client.panier');
    }


    public function contact(){
        return view('client.contact');
    }


    public function inscription(){
        return view('client.inscrire');
    }


    public function connecter(){
        return view('client.connecter');
    }
}
