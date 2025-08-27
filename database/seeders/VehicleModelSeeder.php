<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleModel;
use App\Models\Manufacturer;
use Illuminate\Support\Str;

class VehicleModelSeeder extends Seeder
{
    public function run()
    {
        $manufacturers = Manufacturer::pluck('id')->toArray();

        if (empty($manufacturers)) {
            // If no manufacturers exist, create a few first
            $manufacturers = [];
            for ($i = 1; $i <= 5; $i++) {
                $manufacturers[] = \App\Models\Manufacturer::create([
                    'name' => 'Manufacturer ' . $i
                ])->id;
            }
        }

        $types = ['Sedan', 'SUV', 'Hatchback', 'Coupe', 'Van', 'Pickup', 'Convertible'];

        for ($i = 1; $i <= 30; $i++) {
            VehicleModel::create([
                'name' => 'Model ' . Str::upper(Str::random(4)),
                'manufacturer_id' => $manufacturers[array_rand($manufacturers)],
                'type' => $types[array_rand($types)],
            ]);
        }
    }
}

