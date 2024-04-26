<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});


//cient

Route::get('/accueil', 'ClientController@accueil')->name('home');
Route::get('/produit', 'ClientController@produit');
Route::get('/paiement', 'ClientController@paiement');
Route::get('/panier', 'ClientController@panier');
Route::get('/contact', 'ClientController@contact');
Route::get('/inscrire', 'ClientController@inscription');
Route::get('/connecter', 'ClientController@connecter');

//admin
Route::get('/admin', 'AdminController@admin');
Route::get('/login', 'AdminController@login');
Route::get('/validation', 'AdminController@validation');
Route::get('/data-table', 'AdminController@datatable');


//ajouter produit
Route::get('/ajoutercategorie', 'CategoryController@ajoutercategorie');
Route::post('/sauvercategorie', 'CategoryController@sauvercategorie');
Route::get('/ajouterproduit', 'ProductController@ajouterproduit');
Route::post('/sauverproduit', 'ProductController@sauverproduit');
Route::get('ajouterslider', 'SliderController@ajouterslider');
Route::post('/sauverslider', 'SliderController@sauverslider');
