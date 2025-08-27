<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fare;

class FareSeeder extends Seeder
{
    public function run(): void
    {
        // Option 1: Using factory to create random records
        Fare::factory()->count(10)->create();

        // Option 2: Manually insert fixed records
        Fare::create([
            'vehicle_type' => 'Standard Cab',
            'base_fare' => 50,
            'per_km' => 12,
            'per_minute' => 2,
            'waiting_charges' => 1,
            'status' => 'Active',
        ]);

        Fare::create([
            'vehicle_type' => 'Premium SUV',
            'base_fare' => 80,
            'per_km' => 18,
            'per_minute' => 3,
            'waiting_charges' => 1.5,
            'status' => 'Pending',
        ]);
    }
}
