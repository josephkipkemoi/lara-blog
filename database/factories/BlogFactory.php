<?php

namespace Database\Factories;

use App\Models\User;
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
            'featured' => $this->faker->boolean(),
            'blog_title' => $this->faker->boolean(),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'body' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(320, 320),
            'user_id' => User::factory()->create()->id
        ];

    }
}
