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
    public function definition()
    {
        return [
            'cus_id' => "cus_xxx",
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'address' => [
                'address_1' => fake()->streetAddress(),
                'address_2' => '',
                'city' => fake()->city(),
                'state' => fake()->realTextBetween(5, 24),
                'country' => fake()->country(),
                'postal_code' => fake()->postcode(),
            ],
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'allergies' => json_encode([
                fake()->realTextBetween(5, 24),
            ]),
            'charge_delivery' => fake()->biasedNumberBetween(0, 1),
            'dob' => null,
            'avatar' => null,
        ];
    }
}
