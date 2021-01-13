<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'farhanagungmaulana@gmail.com',
            'name' => 'farhan agung maulana',
            'password' => Crypt::encrypt('12345678'),
            'mobile_number' => '081336503277',
            'balance' => 0
        ]);
    }
}
