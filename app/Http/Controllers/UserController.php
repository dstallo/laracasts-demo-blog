<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'name'      =>  ['required', 'min:3', 'max:255'],
            'username'  =>  ['required', 'min:3', 'max:255', 'regex:/^[A-z0-9\._\-]+$/i', Rule::unique('users','username')],
            'email'     =>  ['required', 'email', 'max:255', 'unique:users,email'],
            'password'  =>  ['required', 'min:8', 'max:255']
        ]);

        auth()->login(User::create($attributes));

        return redirect("/")->with('success', 'Your account has been created successfully');
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('info', 'Goodbye, see you next time!');
    }

    public function login() {
        return view('user.login');
    }

    public function authenticate() {
        
        $attributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
        
        if (! auth()->attempt($attributes)) {
            //return back()->withInput()->withErrors(['email'=>'Your provided credentials are invalid']);
            throw ValidationException::withMessages(['email'=>'Your provided credentials are invalid']);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back, ' . Str::words(auth()->user()->name, 1, ''));
    }
}
