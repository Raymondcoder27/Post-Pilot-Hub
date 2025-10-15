<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        // Check if user already exists to avoid duplicates
        if (!User::where('email', 'default@postpilot.com')->exists()) {
            User::create([
                'name' => 'Default User',
                'email' => 'default@postpilot.com',
                'password' => Hash::make('password123'), // default password
            ]);
        }
    }
}
