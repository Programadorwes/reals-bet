<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Teste',
                'email' => 'teste@example.com',
                'password' => Hash::make('teste123'),
                'active' => true,
                'email_verified_at' => now(),
                'remember_token' => 'token1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
