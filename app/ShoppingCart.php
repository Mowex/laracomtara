<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public static function findorCreateById($cart_id){
    	if($cart_id) return ShoppingCart::find($cart_id);
    	else return ShoppingCart::create();
    }

    public function products(){
    	return $this->belongsToMany('App\Tarantula', 'product_in_shopping_carts', 'shopping_cart_id', 'product_id');
    }

    public function productsCount(){
    	return $this->products()->count();
    }

    public function productsSum(){
        return '$'.number_format($this->products()->sum('price'), 0, '', ',');
    }
}
