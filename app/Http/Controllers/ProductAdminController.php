<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('productsAdmin', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productAdminAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string:55',
            'net_price' => 'required|digits_between:1,5',
            'description' => 'required|string:500',
            'main_image' =>  'required|string:55',
            'weight' =>  'required|digits_between:1,5',
            'VAT' =>  'required|digits_between:1,5',
            'stock' =>  'required|digits_between:1,5',
        ]);


        $product = new Product();
        $product->name = $request->name;
        $product->net_price = $request->net_price;
        $product->description = $request->description;
        $product->main_image = $request->main_image;
        $product->weight = $request->weight;
        $product->VAT = $request->VAT;
        $product->stock = $request->stock;

        $product->save();
        return redirect('/dashboard/produits');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('productAdminUpdate', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = "$request->name";
        $product->description = "$request->description";
        $product->net_price = "$request->net_price";
        $product->stock = "$request->stock";
        $product->save();
        return redirect()->route('dashboard.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $categories = $product->categories;
        foreach ($categories as $category) {
            $category->pivot->delete();
        }
        $product->delete();
        return redirect()->route('dashboard');
    }
}
