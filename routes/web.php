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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/home', 'ClientController@home');
Route::get('/admin', 'AdminController@admin');
Route::get('/shop', 'ClientController@shop');
Route::get('/checkout', 'ClientController@checkout');
Route::get('/cart', 'ClientController@cart');
Route::get('/login', 'AdminController@login');
Route::get('/contact', 'ClientController@contact');
Route::get('/validation', 'AdminController@validation');
Route::get('/data-table', 'AdminController@datatable');
Route::get('/ajoutercategorie', 'CategoryController@ajoutercategory');
Route::get('/inscrire', 'ClientController@inscription');
Route::get('/connecter', 'ClientController@connecter');





