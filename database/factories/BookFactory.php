<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'description' => fake()->paragraph(3),
            'created_at' => fake()->dateTimeBetween('-3 years'),
            'updated_at' => function(array $atributes){
                return fake()->dateTimeBetween($atributes['created_at']);
            },
        ];
    }
}
