<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::first();
        return [
            'customer_id' => 1,
            'created_by' => 1,
            'status' => 'unpaid',
            'total_products' => $product->id,
            'total_price' => $product->price,
            'taxes' => $product->price * 1.13,
            'completed_at' => now(),
        ];
    }
}
