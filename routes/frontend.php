<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//FrontEnd section

//Authentication
Route::get('user/auth', [\App\Http\Controllers\Frontend\IndexController::class, 'userAuth'])->name('user.auth');
Route::get('user/logout', [\App\Http\Controllers\Frontend\IndexController::class, 'userLogout'])->name('user.logout');
Route::post('user/login', [\App\Http\Controllers\Frontend\IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register', [\App\Http\Controllers\Frontend\IndexController::class, 'registerSubmit'])->name('register.submit');

Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

//About US
Route::get('/about-us', [\App\Http\Controllers\Frontend\IndexController::class, 'aboutUs'])->name('about.us');

//Contact US
Route::get('/contact-us', [\App\Http\Controllers\Frontend\IndexController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-submit', [\App\Http\Controllers\Frontend\IndexController::class, 'contactSubmit'])->name('contact.submit');

//Mailing list submit
Route::post('/mailing-list-submit', [\App\Http\Controllers\Frontend\IndexController::class, 'mailingListSubmit'])->name('mailing.list.submit');

//Product category
Route::get('product-category/{slug}/', [\App\Http\Controllers\Frontend\IndexController::class, 'productCategory'])->name('product.category');

//Product detail
Route::get('product-detail/{slug}/', [\App\Http\Controllers\Frontend\IndexController::class, 'productDetail'])->name('product.detail');
Route::get('product-detail/{id}/', [\App\Http\Controllers\Frontend\IndexController::class, 'productDetail1'])->name('product.detail1');

//Product Review
Route::post('product-review/{slug}', [\App\Http\Controllers\ProductReviewController::class, 'productReview'])->name('product.review');

//Blog
Route::get('/blog', [\App\Http\Controllers\Frontend\IndexController::class, 'blogDetail'])->name('blog.detail');

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


//Compare section
Route::get('compare', [\App\Http\Controllers\Frontend\CompareController::class, 'compare'])->name('compare');
Route::post('compare/store', [\App\Http\Controllers\Frontend\CompareController::class, 'compareStore'])->name('compare.store');
Route::post('compare/move-to-cart', [\App\Http\Controllers\Frontend\CompareController::class, 'moveToCart'])->name('compare.move.cart');
Route::post('compare/move-to-wishlist', [\App\Http\Controllers\Frontend\CompareController::class, 'moveToWishlist'])->name('compare.move.wishlist');
Route::post('compare/delete', [\App\Http\Controllers\Frontend\CompareController::class, 'compareDelete'])->name('compare.delete');


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


//Paypal
Route::get('paypal/payment/cancel',[\App\Http\Controllers\PaypalController::class,'getCancel']);
Route::get('paypal/payment/done',[\App\Http\Controllers\PaypalController::class,'getDone']);

//razor
// Route::get('razorpay', [\App\Http\Controllers\RazorpayController::class, 'razorpay'])->name('razorpay');
Route::get('razor/payment',[\App\Http\Controllers\RazorpayController::class,'razorPayment'])->name('razor.payment');


//Shop Section
Route::get('shop', [\App\Http\Controllers\Frontend\IndexController::class, 'shop'])->name('shop');
Route::post('shop-filter', [\App\Http\Controllers\Frontend\IndexController::class, 'shopFilter'])->name('shop.filter');

//Search product & auto-search product
Route::get('auto-search', [\App\Http\Controllers\Frontend\IndexController::class, 'autoSearch'])->name('auto.search');
Route::get('search', [\App\Http\Controllers\Frontend\IndexController::class, 'search'])->name('search');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//EndFrontEnd section


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

