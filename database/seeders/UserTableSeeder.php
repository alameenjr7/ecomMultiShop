<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        // DB::table('users')->insert([
        //     [
        //         'full_name'=>'Baba CUSTOMER',
        //         'username'=>'customer',
        //         'email'=>'customer@gmail.com',
        //         'password'=>Hash::make('12345678'),
        //         'status'=>'active',
        //     ],
        // ]);

        //modification admin
        DB::table('admins')->insert([
            [
                'full_name'=>'Baba ADMIN',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('ALAMEENjr@7'),
                'photo'=>'/backend/assets/images/user.JPG',
                'phone'=>'221772050626',
                'address'=>'Liberte 6 Ext.',
                'status'=>'active',
            ],
            [
                'full_name'=>'Sakhir GUEYE',
                'email'=>'sakhir50@gmail.com',
                'password'=>Hash::make('sakhir5050'),
                'photo'=>'/backend/assets/images/sakhir.jpeg',
                'phone'=>'221776857750',
                'address'=>'Ouest Foire',
                'status'=>'active',
            ]
        ]);

        //seller
        DB::table('sellers')->insert([
            'full_name'=>'Sakhir Vendeur',
            'username'=>'sellers',
            'email'=>'sakhir50@gmail.com',
            'address'=>'Ouest Foire, Dakar',
            'phone'=>'221 772050626',
            'password'=>Hash::make('sakhir5151'),
            'photo'=>'/backend/assets/images/sakhir.jpeg',
            'date_of_birth'=>Carbon::now(),
            'genre'=>'Homme',
            'city'=>'Dakar',
            'state'=>'Senegal',
            'country'=>'Senegal',
            'is_verified'=>0,
            'status'=>'active',
        ]);

    }
}
