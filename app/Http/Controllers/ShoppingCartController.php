<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function __construct(){
    	$this->middleware('shopping_cart');
    }

    public function show(Request $request){
    	// dd($request->shopping_cart->products);
    	return view('shopping_cart.show', ['shopping_cart' => $request->shopping_cart]);
    }
}
