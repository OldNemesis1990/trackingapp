<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a profile
        $profile = Profile::create([
            'account_holder_id' => 1,
            'subscription_id' => 3,
            'payment_duration_period' => 'monthly',
            'complimentary' => true,
        ]);

        // Update user with the created profile
        $user = User::find(1); // Assuming user with id 1
        $user->profile_id = $profile->id;
        $user->save();

        // Create a user and associate with the created profile
        $user = User::create([
            'profile_id' => $profile->id,
            'name' => 'Pam Bosman',
            'date_of_birth' => '1982-09-22',
            'email' => 'pamela.bosman@outlook.com',
            'password' => Hash::make('password'),
        ]);

        $parentRole = Role::where('name', 'Parent')->first();
        $user->assignRole($parentRole);
    }
}
