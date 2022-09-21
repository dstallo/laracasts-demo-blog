<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post) {
        
        $attributes = request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id'   => auth()->user()->id,
            'body'      => $attributes['body']
        ]);

        return back()->with('success', 'Thank you for contributing');
    }

    public function post() {
        $this->belongsTo(Post::class);
    }
}
