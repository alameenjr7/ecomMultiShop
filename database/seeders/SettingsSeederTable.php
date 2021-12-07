<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title'=>'Kaay-Deals Ecom',
            'meta_description'=>'Kaay-Deals online Ecom',
            'meta_keywords'=>'Kaay-Deals, Online Ecommerce, Ecommerce website',
            'logo'=>'/frontend/assets/img/core-img/logo.png',
            'favicon'=>'/frontend/assets/img/core-img/logo.png',
            'email'=>'babangom673@gmail.com',
            'phone'=>'221772050626',
            'fax'=>'0067884768900',
            'address'=>'Liberte 6 Ext.',
            'footer'=>'AmeenTech',
            'facebook_url'=>'',
            'twitter_url'=>'',
            'linkedin_url'=>'',
            'instagram_url'=>'',
            'snapchat_url'=>'',
            'pinterest_url'=>'',
            'playStore_url'=>'',
            'appStore_url'=>'',
            'youtube_url'=>'',
			'map_url'=>'',
        ]);

        //home Banner
        DB::table('banners')->insert([
            [
                'title'=>'Special Offer',
                'slug'=>'special-offer',
                'description'=>'Only $78',
                'photo'=>'frontend/assets/img/bg-img/8.jpg',
                'status'=>'active',
                'condition'=>'banner',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Sustainable Clock',
                'slug'=>'sustainable-clock',
                'description'=>'Only $31',
                'photo'=>'frontend/assets/img/bg-img/7.jpg',
                'status'=>'active',
                'condition'=>'banner',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Hot Shoes',
                'slug'=>'hot-shoes',
                'description'=>'Only $18',
                'photo'=>'frontend/assets/img/bg-img/6.jpg',
                'status'=>'active',
                'condition'=>'banner',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'ALL KID\'S ITEMS',
                'slug'=>'all-kids-items',
                'description'=>'Only $78',
                'photo'=>'frontend/assets/img/bg-img/6.jpg',
                'status'=>'active',
                'condition'=>'promo',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);

        //home categories
        DB::table('categories')->insert([
            //Parent Categories
            [
                'title'=>'Craft Collection',
                'slug'=>'craft-collection',
                'photo'=>'frontend/assets/img/product-img/cata-1.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Women Collection',
                'slug'=>'women-collection',
                'photo'=>'frontend/assets/img/product-img/cata-2.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Kids Collection',
                'slug'=>'kids-collection',
                'photo'=>'frontend/assets/img/product-img/cata-3.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);

        //home Brands
        DB::table('brands')->insert([
            [
                'title'=>'Rolex',
                'slug'=>'rolex',
                'photo'=>'frontend/assets/img/partner-img/5.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Aetna',
                'slug'=>'aetna',
                'photo'=>'frontend/assets/img/partner-img/6.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Zara',
                'slug'=>'zara',
                'photo'=>'frontend/assets/img/partner-img/2.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Adidas',
                'slug'=>'adidas',
                'photo'=>'frontend/assets/img/partner-img/3.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Nike',
                'slug'=>'nike',
                'photo'=>'frontend/assets/img/partner-img/4.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'H&M',
                'slug'=>'h-m',
                'photo'=>'frontend/assets/img/partner-img/1.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
