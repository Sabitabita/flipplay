<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Sabita Rahmadani',
            'email' => 'sabita@example.com',
            'password' => Hash::make('password123'),
        ]);
        $this->call(UserSeeder::class);
    }
}
