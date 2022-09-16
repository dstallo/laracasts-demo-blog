<?php

namespace App\Http\Controllers;
use App\Models\Post;

class PostController extends Controller
{
    public function list() {

        $posts = Post::latest();

        if ($filters=request(["q", "c", "a"])) {
            $posts->filter($filters);
        }

        return view('posts.list', [
            "posts"=>$posts->paginate(9)->withQueryString()
        ]);
    }

    public function show (Post $post) {
        return view('posts.show', ["post" => $post]);
    }
}
