<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'General', 'slug' => 'general', 'description' => 'General discussions'],
            ['name' => 'Laravel', 'slug' => 'laravel', 'description' => 'Laravel related topics'],
            ['name' => 'PHP', 'slug' => 'php', 'description' => 'PHP programming discussions'],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'description' => 'JS topics and frameworks'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }

        // Generate some dummy categories for testing
        Category::factory(3)->create();
    }
}
