<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_branch')->insert([
            [
                'store_name' => 'Dmart',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'store_name' => 'Vijay Mart',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'store_name' => 'Patronics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'store_name' => 'Varsha sales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'store_name' => 'Vijay sales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
