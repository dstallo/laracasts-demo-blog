<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Category::factory(2)->create();

        Post::factory(2)->create([
            "user_id"=>$user->id,
            "category_id"=>$work->id,
        ]);

        Post::factory(5)->create();
        Post::factory(5)->create([
            'category_id' => 2,
            'user_id'     => 2
        ]);
        Post::factory(10)->create([
            'category_id' => 3,
            'user_id'     => 1
        ]);
    }
}
