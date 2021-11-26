<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\IndexController;

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


//FrontEnd section

//Authentication
Route::get('user/auth', [\App\Http\Controllers\Frontend\IndexController::class, 'userAuth'])->name('user.auth');
Route::get('user/logout', [\App\Http\Controllers\Frontend\IndexController::class, 'userLogout'])->name('user.logout');
Route::post('user/login', [\App\Http\Controllers\Frontend\IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register', [\App\Http\Controllers\Frontend\IndexController::class, 'registerSubmit'])->name('register.submit');

Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

//Product category
Route::get('product-category/{slug}/', [\App\Http\Controllers\Frontend\IndexController::class, 'productCategory'])->name('product.category');

//Product detail
Route::get('product-detail/{slug}/', [\App\Http\Controllers\Frontend\IndexController::class, 'productDetail'])->name('product.detail');

//Blog
Route::get('/blog', [\App\Http\Controllers\Frontend\IndexController::class, 'blogDetail'])->name('blog.detail');

//Blog
Route::get('/contact', [\App\Http\Controllers\Frontend\IndexController::class, 'contacts'])->name('contact.detail');


//Cart section
Route::get('cart', [\App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');
Route::post('cart/store', [\App\Http\Controllers\Frontend\CartController::class, 'cartStore'])->name('cart.store');
Route::post('cart/delete', [\App\Http\Controllers\Frontend\CartController::class, 'cartDelete'])->name('cart.delete');
Route::post('cart/update', [\App\Http\Controllers\Frontend\CartController::class, 'cartUpdate'])->name('cart.update');


//Coupon section
Route::post('coupon/add', [\App\Http\Controllers\Frontend\CartController::class, 'couponAdd'])->name('coupon.add');


//Wishlist section
Route::get('wishlist', [\App\Http\Controllers\Frontend\WishlistController::class, 'wishlist'])->name('wishlist');
Route::post('wishlist/store', [\App\Http\Controllers\Frontend\WishlistController::class, 'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart', [\App\Http\Controllers\Frontend\WishlistController::class, 'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete', [\App\Http\Controllers\Frontend\WishlistController::class, 'wishlistDelete'])->name('wishlist.delete');

//Checkout section
Route::get('checkout1', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout1'])->name('checkout1')->middleware('user');
Route::get('checkout2', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout2'])->name('checkout2')->middleware('user');
Route::get('checkout3', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout3'])->name('checkout3')->middleware('user');
Route::get('checkout4', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout4'])->name('checkout4')->middleware('user');
Route::post('checkout-first', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout1Store'])->name('checkout1.store');
Route::post('checkout-second', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout2Store'])->name('checkout2.store');
Route::post('checkout-third', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout3Store'])->name('checkout3.store');
Route::get('checkout-store', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkoutStore'])->name('checkout.store');
Route::get('checkout-complete/{order}', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkoutComplete'])->name('checkout.complete');


//Shop Section
Route::get('shop', [\App\Http\Controllers\Frontend\IndexController::class, 'shop'])->name('shop');
Route::post('shop-filter', [\App\Http\Controllers\Frontend\IndexController::class, 'shopFilter'])->name('shop.filter');

//Search product & auto-search product
Route::get('auto-search', [\App\Http\Controllers\Frontend\IndexController::class, 'autoSearch'])->name('auto.search');
Route::get('search', [\App\Http\Controllers\Frontend\IndexController::class, 'search'])->name('search');


//EndFrontEnd section


Auth::routes(['register'=>false]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

//Admin Dashboard

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function(){
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

Route::group(['prefix'=>'seller', 'middleware'=>['auth','seller']], function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('seller');
});


//User Dashboard
Route::group(['prefix'=>'user'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Frontend\IndexController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/order', [\App\Http\Controllers\Frontend\IndexController::class, 'userOrder'])->name('user.order');
    Route::get('/account-detail', [\App\Http\Controllers\Frontend\IndexController::class, 'userAccount'])->name('user.account');
    Route::get('/address', [\App\Http\Controllers\Frontend\IndexController::class, 'userAddress'])->name('user.address');



    Route::post('/billing/address/{id}', [\App\Http\Controllers\Frontend\IndexController::class, 'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}', [\App\Http\Controllers\Frontend\IndexController::class, 'shippingAddress'])->name('shipping.address');


    Route::post('/update/account/{id}', [\App\Http\Controllers\Frontend\IndexController::class, 'updateAccount'])->name('update.account');


});
