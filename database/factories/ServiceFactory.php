<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /**
             * nama layanan
             * harga layanan
             * id layanan
             */
            'name'  => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'id'    => $this->faker->uuid(),
        ];
    }
}
