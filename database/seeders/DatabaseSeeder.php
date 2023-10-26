<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $numUsers = random_int(10, 300);
        User::factory()->count($numUsers)->create();

        Book::factory(100)->create()->each(function($book){
            $numReviews = random_int(1, 50);
            Review::factory()->count($numReviews)->good()->for($book)->create();
        });

        Book::factory(100)->create()->each(function($book){
            $numReviews = random_int(1, 50);
            Review::factory()->count($numReviews)->avarage()->for($book)->create();
        });

        Book::factory(100)->create()->each(function($book){
            $numReviews = random_int(1, 50);
            Review::factory()->count($numReviews)->bad()->for($book)->create();
        });
    }
}
