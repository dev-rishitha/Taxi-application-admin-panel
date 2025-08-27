<?php

namespace Database\Factories;

use App\Models\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleType>
 */
class VehicleTypeFactory extends Factory
{
    protected $model = VehicleType::class;

    public function definition(): array
    {
        $vehicleNames = ['Car', 'Bike', 'Truck', 'SUV', 'Van', 'Mini Bus', 'Auto', 'E-Rickshaw', 'Pickup', 'Sedan'];
        $name = $this->faker->unique()->randomElement($vehicleNames);

        $maxPassengers = match ($name) {
            'Bike' => 2,
            'Car' => $this->faker->numberBetween(4, 5),
            'Truck' => 2,
            'SUV' => $this->faker->numberBetween(6, 7),
            'Van' => $this->faker->numberBetween(8, 9),
            'Mini Bus' => $this->faker->numberBetween(12, 20),
            'Auto' => $this->faker->numberBetween(4, 8),
            'E-Rickshaw' => $this->faker->numberBetween(4, 5),
            'Pickup' => $this->faker->numberBetween(2, 8),
            'Sedan' => $this->faker->numberBetween(4, 6),
            default => 4,
        };

        return [
            'name' => $name,
            'max_passengers' => $maxPassengers,
            'status' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
