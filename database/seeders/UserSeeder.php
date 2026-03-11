<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create one admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role_id' => Role::where('name', 'Admin')->first()->id,
        ]);

        // Create one moderator
        User::factory()->create([
            'name' => 'Moderator User',
            'email' => 'moderator@example.com',
            'role_id' => Role::where('name', 'Moderator')->first()->id,
        ]);

        // Create 10 regular users
        User::factory(10)->create();
    }
}
