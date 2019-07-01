<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInShoppingCart;

class ProductInShoppingCartController extends Controller
{

	public function __construct(){
		$this->middleware('shopping_cart');
	}

    public function store(Request $request){
    	$inShoppingCart =  ProductInShoppingCart::create([
    		'shopping_cart_id' => $request->shopping_cart->id,
    		'product_id' => $request->product_id
    	]);

    	if($inShoppingCart){
    		return redirect()->back();
    	}

    	return redirect()->back()->withErrors(['product' => 'No se pudo agregar el producto']);
    }

    public function destroy(Request $request){
    	
    }
}
