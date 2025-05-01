<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'image' => '', // Will be set after creation
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $post->image = 'https://picsum.photos/200/300?random=' . $post->id;
            $post->save();
        });
    }
}
