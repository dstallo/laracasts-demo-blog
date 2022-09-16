<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', [PostController::class, 'list'])->name("home");
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

/*
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts.list', [
        "posts" => $category->posts,
        "currentCategory" => $category
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts.list', [
        "posts" => $author->posts
    ]);
});
*/