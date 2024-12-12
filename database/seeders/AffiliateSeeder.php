<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AffiliateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('affiliates')->insert([
            [
                'name' => 'User Teste',
                'cpf' => '145687458987',
                'birthdate' => '1995-10-12',
                'email' => 'userteste@example.com',
                'phone' => '12345678977',
                'address' => 'Rua teste, 123',
                'city' => 'São Paulo',
                'state' => 'SP',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}