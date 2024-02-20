<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'content' => $this->faker->realText,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(1,1000),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id,
        ];
    }
}
