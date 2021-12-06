<?php

use App\Models\Currency;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class Helper{

    public static function userDefaultImage()
    {
        return asset('frontend/assets/img/default.png');
    }

    public static function backDefaultImage()
    {
        return asset('backend/assets/images/no-image.png');
    }

    //Price
    public static function minPrice()
    {
        return floor(Product::min('offer_price'));
    }

    public static function maxPrice()
    {
        return floor(Product::max('offer_price'));
    }

    //currency load
    public static function currency_load()
    {
        if(session()->has('system_default_currency_info')==false){
            session()->put('system_default_currency_info',Currency::find(1));
        }
    }

    //currency convert
    public static function currency_converter($amount){
        return format_price(convert_price($amount));
    }
}

//convert price
if(!function_exists('convert_price'))
{
    function convert_price($price){
        Helper::currency_load();
        $system_default_currency_info=session('system_default_currency_info');
        $price=floatval($price)/floatval($system_default_currency_info->exchange_rate);

        if(Session::has('currency_exchange_rate')){
            $exchange=session('currency_exchange_rate');
        }
        else{
            $exchange=$system_default_currency_info->exchange_rate;
        }
        $price = floatval($price) * floatval($exchange);

        return $price;

    }
}

//convert symbol
if(!function_exists('currency_symbol'))
{
    function currency_symbol(){
        Helper::currency_load();
        if(session()->has('currency_symbol')){
            $symbol=session('currency_symbol');
        }
        else{
            $system_default_currency_info=session('system_default_currency_info');
            $symbol=$system_default_currency_info->symbol;
        }
        return $symbol;
    }
}

//format price
if(!function_exists('format_price'))
{
    function format_price($price){
        return number_format($price,2).currency_symbol();
    }
}

//Setting seo
if(!function_exists('get_setting'))
{
    function get_setting($key){
        return Setting::value($key);
    }
}
