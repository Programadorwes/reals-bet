<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommissionSeeder extends Seeder
{
    public function run(): void
    {
        $affiliateIds = DB::table('affiliates')->pluck('id');
        DB::table('commissions')->insert([
            [
                'affiliate_id' => $affiliateIds->random(),
                'value' => 10,
                'date' => Carbon::now()->subDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
