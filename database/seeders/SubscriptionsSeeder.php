<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscriptions;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscriptions::create([
            'name' => 'Basic',
            'monthly_fee' => 10.00,
            'annual_fee' => 10.00 * 12 * 0.9, // 10% discount
            'monthly_annual_fee' => (10.00 * 12 * 0.9) / 12,
            'description' => 'Basic subscription with limited features',
            'features' => json_encode([
                'max_users' => '2',
                'update_rate' => '60',
            ]),
        ]);

        Subscriptions::create([
            'name' => 'Standard',
            'monthly_fee' => 20.00,
            'annual_fee' => 20.00 * 12 * 0.9,
            'monthly_annual_fee' => (20.00 * 12 * 0.9) / 12,
            'description' => 'Standard subscription with additional features',
            'features' => json_encode([
                'max_users' => '4',
                'update_rate' => '20',
            ]),
        ]);

        Subscriptions::create([
            'name' => 'Premium',
            'monthly_fee' => 30.00,
            'annual_fee' => 30.00 * 12 * 0.9,
            'monthly_annual_fee' => (30.00 * 12 * 0.9) / 12,
            'description' => 'Premium subscription with all features',
            'features' => json_encode([
                'max_users' => '8',
                'update_rate' => '2',
            ]),
        ]);
    }
}
