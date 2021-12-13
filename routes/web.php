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


require __DIR__ . '/frontend.php';

require __DIR__ . '/backend.php';

require __DIR__ . '/seller.php';

Route::group(['prefix'=>'filemanager', 'middleware'=>['web','auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::post('currency_load',[\App\Http\Controllers\CurrencyController::class, 'currencyLoad'])->name('currency.load');

Auth::routes(['register'=>false]);
