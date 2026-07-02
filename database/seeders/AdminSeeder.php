<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@beranimenata.local'],
            [
                'name' => 'Admin BERANI MENATA',
                'password' => Hash::make('ganti-password-ini'),
            ],
        );
    }
}
