<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make('12345678'),
            'balance' => 0
        ]);
    }
}
