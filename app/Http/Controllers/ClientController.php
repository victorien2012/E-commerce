<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function accueil(){
        return view('client.accueil');
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
