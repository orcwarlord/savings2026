<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('users')->insert([
            [
                'fname' => 'Martin',
                'lname' => 'Hramiak',
                'email' => 'martin@martin.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'fname' => 'Alison',
                'lname' => 'Hramiak',
                'email' => 'alison@alison.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Ben Hramiak, ben@ben.com password: password
            [
                'fname' => 'Ben',
                'lname' => 'Hramiak',
                'email' => 'ben@ben.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Michael Hramiak,
            [
                'fname' => 'Michael',
                'lname' => 'Hramiak',
                'email' => 'michael@michael.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
