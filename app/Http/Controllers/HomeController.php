<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Return the view to get
     *
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::take(3)->get();
        return view('home', ['products' => $products]);
    }
}
