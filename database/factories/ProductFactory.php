<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'net_price' => $this->faker->randomFloat(2,10,60),
            'description' => $this->faker->text(),
            'main_image' => $this->faker->text(),
            'weight' => 100,
            'VAT' => 20,
            'stock' => $this->faker->numberBetween(0,100),
        ];
    }
}
