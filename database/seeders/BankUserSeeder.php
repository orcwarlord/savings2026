<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        // Lookup users
        $martinId = DB::table('users')->where('email', 'martin@martin.com')->value('id');
        $alisonId = DB::table('users')->where('email', 'alison@alison.com')->value('id');
        $benId = DB::table('users')->where('email', 'ben@ben.com')->value('id');
        $michaelId = DB::table('users')->where('email', 'michael@michael.com')->value('id');

        // Lookup banks (use actual seeded institution names)
        $newcastleId = DB::table('banks')->where('name', 'Newcastle Building Society')->value('id');
        $skiptonId = DB::table('banks')->where('name', 'Skipton Building Society')->value('id');
        $yorkshireId = DB::table('banks')->where('name', 'Yorkshire Building Society')->value('id');
        $santanderId = DB::table('banks')->where('name', 'Santander')->value('id');
        $leedsId = DB::table('banks')->where('name', 'Leeds Building Society')->value('id');

        $inserts = [];

        // Map users to actual seeded banks with sample credentials
        if ($martinId && $newcastleId) {
            $inserts[] = [
                'user_id' => $martinId,
                'bank_id' => $newcastleId,
                'institution_username' => 'martin.newcastle',
                'institution_password' => 'martin-newcastle-pass',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if ($martinId && $santanderId) {
            $inserts[] = [
                'user_id' => $martinId,
                'bank_id' => $santanderId,
                'institution_username' => 'martin.santander',
                'institution_password' => 'martin-santander-pass',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if ($alisonId && $skiptonId) {
            $inserts[] = [
                'user_id' => $alisonId,
                'bank_id' => $skiptonId,
                'institution_username' => 'alison.skipton',
                'institution_password' => 'alison-skipton-pass',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if ($benId && $yorkshireId) {
            $inserts[] = [
                'user_id' => $benId,
                'bank_id' => $yorkshireId,
                'institution_username' => 'ben.yorkshire',
                'institution_password' => 'ben-yorkshire-pass',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if ($michaelId && $leedsId) {
            $inserts[] = [
                'user_id' => $michaelId,
                'bank_id' => $leedsId,
                'institution_username' => 'michael.leeds',
                'institution_password' => 'michael-leeds-pass',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if (!empty($inserts)) {
            DB::table('bank_user')->insert($inserts);
        }
    }
}
