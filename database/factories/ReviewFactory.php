<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create('en_US');
        $usersIds = User::pluck('id');
        $booksIds = Book::pluck('id');
        return [
            'book_id' => $booksIds->random(),
            'user_id' => $usersIds->random(),
            'review' => $faker->paragraph(3),
            'rating' => $faker->numberBetween(1,5),
            'created_at' => $faker->dateTimeBetween('-3 years'),
            'updated_at' => $faker->dateTimeBetween('-3 years', 'now'),
        ];
    }

    public function good()
    {
        return $this->state(function (array $atributes) {
            return [
                'rating' => fake()->numberBetween(4,5)
            ];
        });
    }

    public function avarage()
    {
        return $this->state(function (array $atributes) {
            return [
                'rating' => fake()->numberBetween(3,3)
            ];
        });
    }

    public function bad()
    {
        return $this->state(function (array $atributes) {
            return [
                'rating' => fake()->numberBetween(1,2)
            ];
        });
    }

}
