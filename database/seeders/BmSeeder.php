<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managers = [];
        for ($i = 1; $i <= 20; $i++) {
            $managers[] = [
                'id' => (string) Str::uuid(),
                'name' => 'Manager ' . $i,
                'credit_limit' => 5000 * $i,
                'current_budget' => 1000 * $i,
                'parent_bm_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('business_managers')->insert($managers);
    }
}
