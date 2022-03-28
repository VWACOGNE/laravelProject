<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $products = $this->getProductsinCart($request);
        $total = $this->getTotal($products);
        return view('cart', ['products' => $products, 'total' => $total]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $qty = $request->quantity;
        if ($qty > 0) {
            $request->session()->put("cart.$id", $qty);
        } else {
            $this->destroy($request);
        }
        return redirect()->route('cart');
    }

    public function getProductsinCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $products = [];
        foreach ($cart as $id => $qty) {
            $products[$id]['product'] = Product::find($id);
            $products[$id]['qty'] = $qty;
            $products[$id]['total'] = $products[$id]['product']->all_taxes_included_price * $qty;
        }
        return $products;
    }

    public function getTotal($products) {
        $total = 0;
        foreach ($products as $product){
            $total += $product['total'];
        }
        return $total;
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $request->session()->forget("cart.$id");
        return redirect()->route('cart');
    }
}
