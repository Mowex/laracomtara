<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInShoppingCart extends Model
{
    public $fillable = [ 'shopping_cart_id', 'product_id' ];
}
