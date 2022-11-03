<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouPonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OderListController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TypeProductController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';






Route::post('/logoutadmin' ,[AdminController::class ,'postlogout'])->name('postlogout');

Route::post('/admin/login' ,[AdminController::class ,'postlogin'])->name('postloginadmin');
Route::get('/admin/login' ,[AdminController::class ,'getlogin'])->name('getloginadmin');


//client
Route::group(['middleware' => 'client'], function(){
    Route::get('/',[ProductController::class,'index']);
 
Route::get('/gioithieu' ,function () {
    return view('product.gioithieu');
})->name('gioithieu');

Route::get('/lienhe' ,function () {
    return view('product.lienhe');
})->name('lienhe');
route::get('/typefiter/{id?}/{name?}',[ProductController::class ,'type_product'])->name('Products.type_product');
Route::resource('Products',ProductController::class);

//check add gio hang
Route::group(['middleware' => 'checkdangnhap'], function(){
Route::get('/dat-hang',[PageController::class,'getDatHang'])->name('dat_hang');
Route::post('/dat-hang',[PageController::class,'postDatHang'])->name('postdat_hang');

Route::get('/add-to-cart/{id}',[PageController::class,'getAddtocart'])->name('themgiohang');

Route::get('del-cart/{id}',[PageController::class , 'getDellItemCart'])->name('deletecart');
 Route::get('del-cart-one/{id}',[PageController::class , 'getDellItemOneCart'])->name('deleteonecart');
Route::get('add-product-like/{id}',[PageController::class , 'addProductLike'])->name('add-productlike');
Route::get('product-like',[PageController::class , 'ListProductLike'])->name('getlistproductlike');
Route::get("chitietgiohang",[PageController::class , 'chitietgiohang'])->name('getgiohang');
Route::get('raiseonecart/{id}',[PageController::class,'getRaiseonecart'])->name('raiseonecart');
Route::post('getCouPonn',[PageController::class, 'getCouPonProduct'])->name('getCouPonProduct');
Route::get('deleteProductLike/{id}',[PageController::class , 'deleteProductLike'])->name('deleteProductLike');
});

});



//amdin
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    //type_product
    // Route::get('/admin/edit-type/{id}',[AdminController::class,'edittype'])->name('admin.edittype-product');
    // Route::get('/admin/typeproduct',[AdminController::class , 'gettype_product'])->name('admin.typeproducts');
    // Route::post('/admin/deletetype/{id}',[AdminController::class , 'deletetype'])->name('admin.deletetype-product');
    // Route::post('/admin/updatetype/{id}',[AdminController::class , 'updatetype'])->name('admin.updatetype');   
    Route::resource('admin/typeproduct',TypeProductController::class);
    Route::resource('admin/product',ProductController::class);
    Route::get('admin/product-index',[ProductController::class ,'getindex'])->name('admin.products.index');
    //end_type_product
    Route::resource('admin/slide',SlideController::class);
    Route::get('admin/slide-index',[SlideController::class ,'getindex'])->name('admin.slides.index');
    Route::get('/admin/user' ,[AdminController::class , 'getuser'])->name('admin.user');
    Route::post('/admin/chane-user/{id}',[AdminController::class , 'ChangeLogin'])->name('admin.ChangeLogin');

Route::get('/admin/edit-user/{id}',[AdminController::class,'edituser'])->name('admin.edituser');

Route::post('/admin/user/delete/{id}',[AdminController::class , 'deleteuser'])->name('deleteuser');
Route::get('/admin/user/update/{id}',[AdminController::class , 'updateuser'])->name('admin.updateuser');
    Route::resource('admin/oder-list',OderListController::class);
    Route::get('delete-dagcho/{id}',[OderListController::class , 'deleteDangCho'])->name('admin.deleteDangCho');
    Route::get('chuyendangcho/{id}',[OderListController::class , 'ChuyenDangCho'])->name('admin.chuyendangcho');
    Route::resource('admin/coupons',CouPonController::class);
    
});

Route::get('/input-email',[PageController::class,'getinputemail'])->name('getinputemail');

Route::post('/resetpassword' , [PageController::class , 'postInputEmail'])->name('postInputEmail');

Route::get('/get-password/{user}/{token}',[PageController::class , 'getPass'])->name('user.getPass');
Route::post('/get-password/{user}/{token}',[PageController::class , 'postPass'])->name('user.postPass');
