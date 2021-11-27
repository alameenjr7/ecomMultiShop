<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Costumers
        DB::table('users')->insert([
            //Admin
            // [
            //     'full_name'=>'Baba ADMIN',
            //     'username'=>'admin',
            //     'email'=>'admin@gmail.com',
            //     'password'=>Hash::make('ALAMEENjr@7'),
            //     // 'role'=>'admin',
            //     'status'=>'active',
            // ],

            // //Vendor
            // [
            //     'full_name'=>'Baba SELLER',
            //     'username'=>'seller',
            //     'email'=>'seller@gmail.com',
            //     'password'=>Hash::make('12345678'),
            //     'role'=>'seller',
            //     'status'=>'active',
            // ],

            [
                'full_name'=>'Baba CUSTOMER',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('12345678'),
                // 'role'=>'customer',
                'status'=>'active',
            ],
        ]);

        //modification admin
        DB::table('admins')->insert([
            'full_name'=>'Baba ADMIN',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('ALAMEENjr@7'),
            'status'=>'active',
        ]);

    }
}
