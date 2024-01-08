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
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        return ['user_id' => $this->faker->numberBetween(1, 5), 'detail' => ['product_id' => $product->id, 'quantity' => $this->faker->numberBetween(1, 4), 'name' => $product->name, 'price_before_discount' => $product->price_before_discount, 'total' => $product->price_after_discount * $this->faker->numberBetween(1, 4),], 'shipping' => $this->faker->numberBetween(10, 15), 'total_amount' => $this->faker->numberBetween(100, 500),
    ];
    }
}


