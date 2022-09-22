<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function create() {
        return view('categories.create');
    }

    public function store() {
        
        $form = request()->validate([
            'name'         => ['required', 'max:255'],
            'slug'          => ['required', 'max:255', 'alpha_dash', Rule::unique('posts', 'slug')]
        ]);

        Category::create($form);

        return redirect('/admin/categories/create')->with('success','New category created successfully');
    }
}
