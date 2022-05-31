<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->paragraphs(20, true),
            'category_id' => 4,
            'user_id' => 1,
            'thumbnail' => 'product'.rand(1, 60).'.jpg',
            'approved' => true,
        ];
    }
}
