<?php

namespace App\Providers;

use App\Cart;
use App\Models\ProductLike;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        Paginator::useBootstrapFour();
        View::composer(['product.home','product.chitietgiohang','product.listProduct','product.product-detail','product.getPass','product.type-product','product.dathang','product.gioithieu','product.lienhe','product.signup','product.login','product.input-email'], function ($view) {
            $type_products = TypeProduct::all();
            $view->with('type_products', $type_products);
        });
        View::composer(['layout.header'], function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $email = $user->email;
                $ListProductLike = ProductLike::where('email',$email)->get();
                $view->with('list_productlike', $ListProductLike);
            }
           
        });


        View::composer(['layout.header','product.dathang','product.chitietgiohang'], function ($view) {
           if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
                 
           }
        });
    }
}
