<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'user@mail.com',
                'password' => \Hash::make('123456'), // Encrypt password
                'status' => 1, // Active user
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
