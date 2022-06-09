<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'payment_methods'=> 'payment_on_delivery',
            'transaction_id'=> Str::random(5),
            'phone_number' => $this->faker->numerify('###-###-####'),
            'deliveryAddress' => $this->faker->address(),
            'note' => $this->faker->paragraphs(2, true),
            'totalPrice' =>$this->faker->numberBetween($min = 1000000, $max = 5000000),
            'user_id' => 1,
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
