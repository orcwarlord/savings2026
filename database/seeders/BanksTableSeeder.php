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
                'name' => 'First National Bank',
                'url' => 'https://www.fnb.example',
                'address' => '123 Main St',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Community Credit Union',
                'url' => 'https://www.ccu.example',
                'address' => '456 Elm St',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'International Bank',
                'url' => 'https://www.ibank.example',
                'address' => '1 Bank Ave',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
