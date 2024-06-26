<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'author',
            'password' => 'author',
            'name' => 'Test User',
            'role' => 'author',
        ]);

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'password' => 'admin',
            'name' => 'Test admin',
            'role' => 'admin',
        ]);

        Post::factory(10)->create();
    }
}
