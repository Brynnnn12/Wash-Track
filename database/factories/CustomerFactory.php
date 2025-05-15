<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "phone" => substr($this->faker->phoneNumber(), 0, 15),

            "address" => $this->faker->address(),
            "vehicle_type" => $this->faker->word(),
            "vehicle_plate" => $this->faker->regexify('[A-Z]{1,2}[0-9]{1,4}[A-Z]{1,3}'),
        ];
    }
}
