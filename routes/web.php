<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/cart', 'ShoppingCartController@show')->name('shopping_cart.show');

Route::resource('tarantulas', 'TarantulasController');
Route::resource('in_shopping_carts', 'ProductInShoppingCartController', ['only' => ['store', 'destroy']]);

Route::get('/home', 'HomeController@index')->name('home');
