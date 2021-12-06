<?php

use Illuminate\Support\Facades\Route;

//Admin login
Route::group(['prefix'=>'seller'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Seller\AuthController::class, 'showLoginForm'])->name('seller.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Seller\AuthController::class, 'login'])->name('seller.login');
});


//Seller Dashboard

Route::group(['prefix'=>'seller', 'middleware'=>['seller']], function(){
    Route::get('/',[\App\Http\Controllers\Seller\SellerController::class,'dashboard'])->name('seller');

    //Product section
    Route::resource('/seller-product', \App\Http\Controllers\Seller\ProductController::class);
    Route::post('seller_product_status', [\App\Http\Controllers\Seller\ProductController::class, 'sellerProductStatus'])->name('seller.product.status');
});


Route::group(['prefix'=>'filemanager', 'middleware'=>['web','auth:seller']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
