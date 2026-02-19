<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('banks')->insert([
            [
                'name' => 'Newcastle Building Society',
                'url' => 'https://newcastle.co.uk',
                'address' => '',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Skipton Building Society',
                'url' => 'https://www.skipton.co.uk',
                'address' => '',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Yorkshire Building Society',
                'url' => 'https://www.ybs.co.uk',
                'address' => '',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            
            [
                'name' => "Santander",
                'url' => "https://www.santander.co.uk",
                'address' => '',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => "Leeds Building Society",
                'url' => "https://www.leedsbuildingsociety.co.uk",
                'address' => '',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
