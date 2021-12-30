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
    Route::post('seller-product-status', [\App\Http\Controllers\Seller\ProductController::class, 'sellerProductStatus'])->name('seller.product.status');


    //calendar
    Route::get('seller-calendar', [\App\Http\Controllers\Seller\SellerController::class, 'calendar'])->name('seller.calendar');

    //messages
    Route::get('seller-messages', [\App\Http\Controllers\Seller\SellerController::class, 'messages'])->name('seller.messages');

    //profile
    Route::get('seller-profile', [\App\Http\Controllers\Seller\SellerController::class, 'profile'])->name('seller.profile');
    Route::put('seller/profile-update', [\App\Http\Controllers\Seller\SellerController::class, 'profileUpdate'])->name('seller.profile.update');


});

