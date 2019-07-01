<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            if(Auth::check() && !Auth::user()->is_admin){
                $session_name = 'cart_id';
                $cart_id = \Session::get($session_name);
                $shopping_cart = ShoppingCart::findorCreateById($cart_id);
                \Session::put($session_name, $shopping_cart->id);
                $view->with('shoppingCount', $shopping_cart->productsCount());    
            }else{
                $view->with('shoppingCount', '');    
            }
        });
    }
}
