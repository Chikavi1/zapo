<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin'.'@localhost.com',
            'cellphone' => '3327276923',
            'password' => Hash::make('12345678'),
            'type' => 0
        ]);
        DB::table('users')->insert([
            'name' => 'Despachador',
            'email' => 'despachador'.'@localhost.com',
            'cellphone'=>'3331956745',
            'password' => Hash::make('12345678'),
            'type' => 3
        ]);

        DB::table('users')->insert([
            'name' => 'Proveedor',
            'email' => 'proveedor'.'@localhost.com',
            'cellphone'=>'3327276921',
            'password' => Hash::make('12345678'),
            'type' => 2
        ]);
    }
}
