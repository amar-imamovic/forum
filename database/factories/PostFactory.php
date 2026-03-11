<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $category = Category::inRandomOrder()->first() ?? Category::factory()->create();

        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true),
            'comment_count' => 0,
            'like_count' => 0,
            'pinned' => false,
        ];
    }
}
