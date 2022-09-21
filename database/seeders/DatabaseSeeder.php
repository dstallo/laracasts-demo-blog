<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
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
        $posts=Post::factory(10)->create([
            'category_id' => 3,
            'user_id'     => 1
        ]);
        Comment::factory(5)->create(["post_id" => $posts->last()->id]);
    }
}
