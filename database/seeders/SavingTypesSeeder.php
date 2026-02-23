<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SavingType;

class SavingTypesSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Regular Savings', 'description' => 'Standard variable-rate savings account.'],
            ['name' => 'Fixed Term', 'description' => 'Fixed-term account with set interest for a period.'],
            ['name' => 'ISA', 'description' => 'Individual Savings Account (tax-free).'],
            
        ];

        foreach ($types as $t) {
            SavingType::firstOrCreate(['name' => $t['name']], $t);
        }
    }
}
