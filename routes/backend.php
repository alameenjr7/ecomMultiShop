<?php

use Illuminate\Support\Facades\Route;


//Admin login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
});


Route::group(['prefix'=>'seller', 'middleware'=>['auth','seller']], function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('seller');
});

//Admin Dashboard

Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

    //Banner section
    Route::resource('/banner', \App\Http\Controllers\BannerController::class);
    Route::post('banner_status', [\App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

    //Category section
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::post('category_status', [\App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('category.status');
    Route::post('category/{id}/child', [\App\Http\Controllers\CategoryController::class, 'getChildByParentID']);
    //Brand section
    Route::resource('/brand', \App\Http\Controllers\BrandController::class);
    Route::post('brand_status', [\App\Http\Controllers\BrandController::class, 'brandStatus'])->name('brand.status');

    //Product section
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::post('product_status', [\App\Http\Controllers\ProductController::class, 'productStatus'])->name('product.status');
    Route::post('product-attribute/{id}', [\App\Http\Controllers\ProductController::class, 'addProductAttribute'])->name('product.attribute');
    Route::delete('product-attribute-delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroyProductAttribute'])->name('product.attribute.destroy');

    //order section
    Route::resource('/order', \App\Http\Controllers\OrderController::class);
    Route::post('order-status', [\App\Http\Controllers\OrderController::class, 'orderStatus'])->name('order.status');

    //User section
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user_status', [\App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');

    //Coupon section
    Route::resource('/coupon', \App\Http\Controllers\CouponController::class);
    Route::post('coupon_status', [\App\Http\Controllers\CouponController::class, 'couponStatus'])->name('coupon.status');

    //Shipping section
    Route::resource('/shipping', \App\Http\Controllers\ShippingController::class);
    Route::post('shipping_status', [\App\Http\Controllers\ShippingController::class, 'shippingStatus'])->name('shipping.status');
});

Route::group(['prefix'=>'filemanager', 'middleware'=>['web','auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
