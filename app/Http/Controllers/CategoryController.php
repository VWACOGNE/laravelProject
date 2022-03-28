<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }
    public function show(string $slug)
    {
        $category = Category::findBySlugOrFail($slug)->load('products');
        return view('category' , ['category' => $category]);
    }
}
