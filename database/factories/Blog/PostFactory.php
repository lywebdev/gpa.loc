<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase(),
            'content' => $this->faker->realText(1500),
            'preview' => 'uploads/blog/posts/demo/' . $this->faker->numberBetween(1, 8) . '.jpg',
            'status' => $this->faker->numberBetween(0, 1),

            'user_id' => $this->faker->numberBetween(1, 1000),
            'category_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
