<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        Post::all()->each(function ($post) use ($users) {

            $randomUsers = $users->random(rand(0, 5));

            foreach ($randomUsers as $user) {
                Like::firstOrCreate([
                    'user_id' => $user->id,
                    'post_id' => $post->id
                ]);
            }

            // update counter
            $post->update([
                'like_count' => $post->likes()->count()
            ]);
        });
    }
}
