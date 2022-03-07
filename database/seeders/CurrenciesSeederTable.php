<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(
            [
                [
                    'name'=>'Sénégal',
                    'symbol'=>'F',
                    'exchange_rate'=>582.29,
                    'code'=>'CFA',
                    'status'=>'active',
                ],
                [
                    'name'=>'USA Dollar',
                    'symbol'=>'$',
                    'exchange_rate'=>1.00,
                    'code'=>'USD',
                    'status'=>'inactive',
                ],
                [
                    'name'=>'Europe',
                    'symbol'=>'€',
                    'exchange_rate'=>0.89,
                    'code'=>'Euro',
                    'status'=>'inactive',
                ]
            ]
        );
    }
}
