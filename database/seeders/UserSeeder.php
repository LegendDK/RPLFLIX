<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Account',
            'email' => 'Super@Admin.com',
            'gender' => 'male',
            'role' => 'admin',
            'password' => Hash::make('password123')
        ]);
        
        User::create([
            'name' => 'Eizza',
            'email' => 'muhammadeizza@gmail.com',
            'gender' => 'male',
            'role' => 'member',
            'password' => Hash::make('password123')
        ]);
    }
}
