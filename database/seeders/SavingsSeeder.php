<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saving;
use App\Models\Bank;
use App\Models\SavingType;
use App\Models\User;

class SavingsSeeder extends Seeder
{
    public function run()
    {
        $users = User::take(10)->get();
        $banks = Bank::all();
        $types = SavingType::all();

        if ($users->isEmpty() || $types->isEmpty()) {
            return;
        }

        foreach ($users as $user) {
            $count = rand(1,3);
            for ($i = 0; $i < $count; $i++) {
                $bank = $banks->isNotEmpty() ? $banks->random() : null;
                $type = $types->random();

                $start = now()->subMonths(rand(0,48));
                $ongoing = (bool) rand(0,1);
                $end = $ongoing ? null : $start->copy()->addMonths(rand(1,60));

                Saving::create([
                    'user_id' => $user->id,
                    'bank_id' => $bank?->id,
                    'saving_type_id' => $type->id,
                    'amount' => rand(5000, 200000) / 100,
                    'start_date' => $start->format('Y-m-d'),
                    'end_date' => $end?->format('Y-m-d'),
                    'ongoing' => $ongoing,
                    'interest_rate' => rand(0,500) / 100,
                ]);
            }
        }
    }
}
