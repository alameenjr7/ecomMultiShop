<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->insert(array (
            0 =>
                array (
                    'id'=>1,
                    'title'=>'Boutique Silk Dress',
                    'slug'=>'boutique-silk-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>1,
                    'cat_id'=>1,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-1-back.png',
                    'price'=>50,
                    'offer_price'=>45,
                    'conditions'=>'new',
                    'added_by'=>'admin',
                    'is_featured'=>1,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            1 =>
                array (
                    'id'=>2,
                    'title'=>'Flower Textured Dress',
                    'slug'=>'flower-textured-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>2,
                    'cat_id'=>2,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-2-back.png',
                    'price'=>48,
                    'offer_price'=>34,
                    'conditions'=>'popular',
                    'added_by'=>'admin',
                    'is_featured'=>1,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            2 =>
                array (
                    'id'=>3,
                    'title'=>'Silk Dress',
                    'slug'=>'silk-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>3,
                    'cat_id'=>3,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-3-back.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'winter',
                    'added_by'=>'admin',
                    'is_featured'=>1,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            3 =>
                array (
                    'id'=>4,
                    'title'=>'Box Shape Dress',
                    'slug'=>'box-shape-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>1,
                    'cat_id'=>1,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-4-back.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'new',
                    'added_by'=>'admin',
                    'is_featured'=>1,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            4 =>
                array (
                    'id'=>5,
                    'title'=>'Fashion Dress',
                    'slug'=>'fashion-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>2,
                    'cat_id'=>2,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-5-back.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'new',
                    'added_by'=>'admin',
                    'is_featured'=>0,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            5 =>
                array (
                    'id'=>6,
                    'title'=>'Textured Dress',
                    'slug'=>'textured-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>2,
                    'cat_id'=>3,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-6-back.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'winter',
                    'added_by'=>'admin',
                    'is_featured'=>0,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            6 =>
                array (
                    'id'=>7,
                    'title'=>'Right Dress',
                    'slug'=>'right-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>3,
                    'cat_id'=>2,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-7-back.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'new',
                    'added_by'=>'admin',
                    'is_featured'=>1,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            7 =>
                array (
                    'id'=>8,
                    'title'=>'Width Dress',
                    'slug'=>'width-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>4,
                    'cat_id'=>1,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-8-back.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'new',
                    'added_by'=>'admin',
                    'is_featured'=>1,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),
            8 =>
                array (
                    'id'=>9,
                    'title'=>'Dark Dress',
                    'slug'=>'dark-dress',
                    'summary'=>'<p>Calme et rigoureux ayant un sens de l\'initiative, j\'aimerais travailler dans un environnement qui m\'encourage à réussir.</p>',
                    'description'=>'<p>Enquête portant sur l’éducation et la qualité de vie des habitants de Richard-Toll.</p>',
                    'additional_info'=>'<p>Réalisation d\'une application desktop de gestion bancaire avec JavaFX</p>',
                    'return_cancellation'=>'<p>Travail sur un projet interne (gestion scolaire) avec React native et Django API REST</p>',
                    'stock'=>20,
                    'brand_id'=>1,
                    'cat_id'=>1,
                    'user_id'=>1,
                    'child_cat_id'=>null,
                    'photo'=>'frontend/assets/img/product-img/new-3.png',
                    'price'=>50,
                    'offer_price'=>96,
                    'conditions'=>'new',
                    'added_by'=>'admin',
                    'is_featured'=>0,
                    'status'=>'active',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ),

        ));

    }
}