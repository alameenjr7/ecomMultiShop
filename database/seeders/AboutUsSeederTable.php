<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert(
            [
                'heading'=>'Sénégal Global Market est un plateform multivendeur en ligne.',
                'content'=>'Sen-Global-Market vous permet de vendre vos product en toute sécurité1',
                'image'=>'backend/assets/images/logo/logo.png',
                'exp_years'=>0,
                'happy_customer'=>0,
                'team_advisor'=>0,
                'return_customer'=>0,
                'secure_payment_Gat'=>'',
                'cashOn_delivery'=>'',
                'fast_delivery'=>'',
                'free_delivery'=>'',
                'customer_support'=>'',
                'quality_products'=>'',
            ]
        );
    }
}
