<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lee Baartman',
            'password' => Hash::make('password'),
            'email' => 'lee.baartman@outlook.com',
            'date_of_birth' => '1990-02-13',
        ])->assignRole('Admin');
    }
}
