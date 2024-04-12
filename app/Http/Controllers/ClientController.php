<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        return view('client.home');
    }

    public function shop(){
        return view('client.shop');
    }

    public function checkout(){
        return view('client.checkout');
    }

    public function cart(){
        return view('client.cart');
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
