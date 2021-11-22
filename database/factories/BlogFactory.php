<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Blog model default state

        return [
            //
            'title' => $this->faker->title(),
            'author' => $this->faker->name(),
            'body' => $this->faker->text()
        ];

    }
}
