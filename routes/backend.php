<?php

use Illuminate\Support\Facades\Route;


//Admin login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout',[\App\Http\Controllers\Auth\Admin\LogoutController::class, 'logout'])->name('admin.logout');
});

//Admin Dashboard

Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
    //File manager
    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');

    //About Us
    Route::get('about_us', [\App\Http\Controllers\AboutUsController::class, 'index'])->name('about.index');
    Route::put('about_us-update', [\App\Http\Controllers\AboutUsController::class, 'aboutUpdate'])->name('about.update');

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
    Route::get('order-facture/{id}', [\App\Http\Controllers\OrderController::class, 'showFacture'])->name('order.facture');
    Route::get('order-PDF/{id}', [\App\Http\Controllers\OrderController::class, 'orderPDF'])->name('order.pdf');


    //User section
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user_status', [\App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');

    //Coupon section
    Route::resource('/coupon', \App\Http\Controllers\CouponController::class);
    Route::post('coupon_status', [\App\Http\Controllers\CouponController::class, 'couponStatus'])->name('coupon.status');

    //Shipping section
    Route::resource('/shipping', \App\Http\Controllers\ShippingController::class);
    Route::post('shipping_status', [\App\Http\Controllers\ShippingController::class, 'shippingStatus'])->name('shipping.status');

    //Currency section
    Route::resource('/currency', \App\Http\Controllers\CurrencyController::class);
    Route::post('currency_status', [\App\Http\Controllers\CurrencyController::class, 'currencyStatus'])->name('currency.status');

    //Settings section
    // Route::resource('/settings', \App\Http\Controllers\SettingController::class);
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'settings'])->name('settings');
    Route::put('settings', [\App\Http\Controllers\SettingController::class, 'settingsUpdate'])->name('settings.update');

    //seller section
    Route::resource('/seller', \App\Http\Controllers\SellerController::class);
    Route::post('seller_status', [\App\Http\Controllers\SellerController::class, 'sellerStatus'])->name('seller.status');
    Route::post('seller-verified', [\App\Http\Controllers\SellerController::class, 'sellerVerified'])->name('seller.verified');

	//SMTP section
	Route::get('smtp',[\App\Http\Controllers\SettingController::class, 'smtp'])->name('smtp');
	Route::post('smtp-update',[\App\Http\Controllers\SettingController::class, 'smtpUpdate'])->name('smtp.update');


    //Payment section
    Route::get('payment', [\App\Http\Controllers\SettingController::class, 'payment'])->name('payment');

    //Paypal
    Route::patch('paypal-settings-update', [\App\Http\Controllers\SettingController::class, 'paypalUpdate'])->name('paypal.setting.update');


    //calendar
    Route::get('calendar', [\App\Http\Controllers\Backend\IndexController::class, 'calendar'])->name('calendar');

    //messages
    Route::get('messages', [\App\Http\Controllers\Backend\IndexController::class, 'messages'])->name('messages');
    Route::get('messages/{id}', [\App\Http\Controllers\Backend\IndexController::class, 'messagesID'])->name('messages.ID');

    //ProductReview section
    Route::resource('/review', \App\Http\Controllers\ProductReviewController::class);
    Route::post('review_status', [\App\Http\Controllers\ProductReviewController::class, 'reviewStatus'])->name('review.status');

    //profile
    Route::get('profile', [\App\Http\Controllers\Backend\IndexController::class, 'profile'])->name('profile');
    Route::put('profile-update', [\App\Http\Controllers\Backend\IndexController::class, 'profileUpdate'])->name('profile.update');

});
