<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Supplier;
use App\Models\Category;

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
            'created_at' => now(),
            'updated_at' => now(),
            'productCode' => Str::random(5),
            'name' => '',
            'price' =>$this->faker->numberBetween($min = 900000, $max = 10000000),
            'sold' => $this->faker->numberBetween($min = 5, $max = 30),
            'quantity' => $this->faker->numberBetween($min = 10, $max = 100),
            'supplier_id'=> 1,
            'category_id'=> 1,
            'product_detail_id'=> 1,
        ];
    }
}
