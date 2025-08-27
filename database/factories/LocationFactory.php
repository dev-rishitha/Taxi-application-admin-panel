<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    // Specify the model this factory is for (optional if your factory name matches model name)
    protected $model = \App\Models\Location::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'distance_range' => $this->faker->randomElement(['0 - 10', '5 - 15', '10 - 20']),
            'base_fare' => rand(100, 500),
            'active_hours' => '6:00 AM - 11:00 PM',
            'status' => $this->faker->randomElement(['Active', 'Disabled', 'High Demand']),
        ];
    }
}
