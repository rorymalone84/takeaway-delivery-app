<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Restaurant;

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
    public function definition(): array
    {        
        return [
            'title' => $this->faker->foodName(),
            'description' => $this->faker->text(20),
            'ingredients'=> $this->faker->text(10),
            'price'=> $this->faker->numberBetween($min = 5, $max = 25),
            'image'=> $this->faker->imageUrl($width = 200, $height = 200),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }
}
