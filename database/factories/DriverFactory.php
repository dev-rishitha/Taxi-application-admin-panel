<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    protected $model = Driver::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->numerify('9#########'),
            'cab' => $this->faker->word,
            'status' => $this->faker->randomElement(['available', 'on_trip', 'suspended', 'off_duty']),
            'image_url' => 'https://i.pravatar.cc/80?img=' . $this->faker->numberBetween(1, 70),
            'license_url' => url('images/license_sample.jpg'),
            'aadhar_url' => url('images/aadhar_sample.jpg'),
            'vehicle_photo_url' => 'https://loremflickr.com/320/240/car?random=' . $this->faker->unique()->numberBetween(1, 1000),
            'rides_count' => $this->faker->numberBetween(20, 200),
            'earnings' => $this->faker->randomFloat(2, 5000, 50000),
            'cancellations' => $this->faker->numberBetween(0, 10),
            'rating' => $this->faker->randomFloat(1, 3.5, 5.0),
        ];
    }
}
