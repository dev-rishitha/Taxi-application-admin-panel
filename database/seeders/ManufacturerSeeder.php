<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class ManufacturerSeeder extends Seeder
{
    public function run(): void
    {
        Manufacturer::create([
            'name' => 'Tesla Motors',
            'country' => 'USA',
            'status' => 'Active',
            'fleet_count' => 1200,
            'fleet_trend' => '+4 since last week',
        ]);

        Manufacturer::create([
            'name' => 'Toyota',
            'country' => 'Japan',
            'status' => 'Active',
            'fleet_count' => 3000,
            'fleet_trend' => '-2 this month',
        ]);

        Manufacturer::create([
            'name' => 'Mahindra Electric',
            'country' => 'India',
            'status' => 'Pending',
            'fleet_count' => 600,
            'fleet_trend' => '+8 this month',
        ]);
    }
}
