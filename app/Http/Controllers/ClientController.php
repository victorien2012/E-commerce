<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Image;
use Illuminate\Http\Request;
use App\Slider;
use App\Category;
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

    public function shop(){

        $categories  = Category::get();

        $produits = Produit::join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut',1)
            ->get();


        $produitsBycategorie=[];

        foreach ($produits as $produit){
            $categorie = $produit->categorie;

            if(!isset($produitsBycategorie[$categorie->id])){
                $produitsBycategorie[$categorie->id]=[];
            }
            $produitsBycategorie[$categorie->id][$categorie->nom_categorie][] = $produit;

        }
        $categorie_id = null;
        return view('client.shop')->with('categories', $categories)->with('produitsBycategorie',  $produitsBycategorie)->with('categorie_id',  $categorie_id);
    }

    public function shopCategorie($id){

        $categories  = Category::get();
        $categorie_id = $id;
        $produits = Produit::join('images', 'produits.id', '=', 'images.produit_id')
            ->where('produits.statut',1)
            ->where('produits.categorie_id', $id)
            ->get();

        $produitsBycategorie=[];

        foreach ($produits as $produit){
            $categorie = $produit->categorie;

            if(!isset($produitsBycategorie[$categorie->id])){
                $produitsBycategorie[$categorie->id]=[];
            }
            $produitsBycategorie[$categorie->id][$categorie->nom_categorie][] = $produit;
        }


        return view('client.shop')->with('categories', $categories)->with('produitsBycategorie',  $produitsBycategorie)->with('categorie_id',  $categorie_id);
    }

    public function select_par_categorie($id){
        $categories  = Category::get();

        $produits = Produit::where('categorie_id', $id)->where('statut', 1)->get();

     return view('client.shop')->with('produits', $produits)->with('categories', $categories);
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
