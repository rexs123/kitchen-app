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
            'name' => fake()->name(),
            'image' => null,
            'description' => fake()->text(24),
            'ingredients' => json_encode(fake()->realText(12)),
            'allergens' => json_encode(fake()->realText(12)),
            'price' => fake()->randomDigitNotNull(),
            'weight' => fake()->randomDigitNotNull(),
            'cost_of_materials' => fake()->randomDigitNotNull(),
            'cost_of_ingredients' => fake()->randomDigitNotNull(),
        ];
    }
}
