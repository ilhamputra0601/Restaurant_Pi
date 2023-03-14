<?php

namespace Database\Factories;
use App\Models\Food;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(mt_rand(1,2)),
            'price' =>mt_rand(10,30),
            'image'=> $this->faker->imageUrl(640, 480, 'animals', true),
            'description' => $this->faker->words(2,3, true),
        ];
    }
}
