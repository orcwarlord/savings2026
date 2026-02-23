<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User seeder (no factories)
        $this->call(UsersTableSeeder::class);

        // Seed banks
        $this->call(BanksTableSeeder::class);
        
        // Link users to banks with sample institution passwords
        $this->call(BankUserSeeder::class);
        
        // Seed saving types
        $this->call(\Database\Seeders\SavingTypesSeeder::class);

        // Seed savings
        $this->call(\Database\Seeders\SavingsSeeder::class);
    }
}
