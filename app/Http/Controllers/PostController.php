<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Validation\Rule;

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

    public function create() {
        return view('posts.create');
    }

    public function store() {
        
        $form = request()->validate([
            'title'         => ['required', 'max:255'],
            'slug'          => ['required', 'alpha_dash', Rule::unique('posts', 'slug')],
            'brief'         => ['required'],
            'body'          => ['required'],
            'thumbnail'     => ['required', 'image'],
            'category_id'   => ['required', Rule::exists('categories', 'id')]
        ]);

        $form['user_id'] = auth()->id();
        $form['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $post = Post::create($form);

        return redirect('/posts/'.$post->slug)->with('success','New post created successfully');
    }
}
