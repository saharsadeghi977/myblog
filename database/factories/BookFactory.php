<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Book::class;
    public function definition()
    {
        return [
            //
            'user_id'=>User::factory(),
            'title'=>$this->faker->sentence(),
            'price'=>$this->faker->numberBetween(10,100),
            'number_of_page'=>$this->faker->numberBetween(50,500),
            'publication_year'=>$this->faker->numberBetween(1900,2020)
        ];
    }
}
