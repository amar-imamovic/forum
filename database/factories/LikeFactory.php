<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class LikeFactory extends Factory
{
    protected $model = \App\Models\Like::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $post = Post::inRandomOrder()->first() ?? Post::factory()->create();

        // Avoid duplicate likes
        if (\App\Models\Like::where('user_id', $user->id)->where('post_id', $post->id)->exists()) {
            return $this->definition(); // try again
        }

        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
        ];
    }
}
