<?php

namespace App\Http\Controllers;


use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function show(Product $product)
    {
        $products = Product::take(3)->get();
        return view('product', ['product' => $product], ['products' => $products]);
    }
}
