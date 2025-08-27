<?php

namespace Database\Factories;

use App\Models\Fare;
use Illuminate\Database\Eloquent\Factories\Factory;

class FareFactory extends Factory
{
    protected $model = Fare::class;

    public function definition(): array
    {
        return [
            'vehicle_type' => $this->faker->randomElement(['Standard Cab', 'Premium SUV', 'Mini Cab', 'Luxury Sedan']),
            'base_fare' => $this->faker->randomFloat(2, 30, 150),
            'per_km' => $this->faker->randomFloat(2, 8, 25),
            'per_minute' => $this->faker->randomFloat(2, 1, 5),
            'waiting_charges' => $this->faker->randomFloat(2, 0.5, 3),
            'status' => $this->faker->randomElement(['Active', 'Pending']),
        ];
    }
}

