<?php

use App\Http\Controllers\ProductController;
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


//client

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
Route::get('/commandes', 'AdminController@commandes');

//categories
Route::get('/ajoutercategorie', 'CategoryController@ajoutercategorie');
Route::post('/sauvercategorie', 'CategoryController@sauvercategorie');
Route::get('/categories', 'CategoryController@categories');
Route::get('/edit_categorie/{id}','CategoryController@edit_categorie');
Route::post('/modifier-categorie', 'CategoryController@modifiercategorie')->name('editcategorie');
Route::post('/delete-categorie', 'CategoryController@deletecategorie')->name('deletecategorie');


//produit
Route::get('/ajouterproduit', 'ProductController@ajouterproduit');
Route::post('/sauverproduit', 'ProductController@sauverproduit');
Route::get('/produits', 'ProductController@produits');
Route::get('/editproduits/{id}','ProductController@editproduits')->name('edit');
Route::post('/modifier-produits', 'ProductController@modifierproduits')->name('editproduits');

//slider
Route::get('ajouterslider', 'SliderController@ajouterslider');
Route::post('/sauverslider', 'SliderController@sauverslider');
Route::get('/sliders', 'SliderController@sliders');

