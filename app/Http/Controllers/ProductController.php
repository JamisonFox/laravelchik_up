<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id) {
        $product = Product::findOrFail($id);
        //dump($product);
        $products = Product::all();
        return view('product.product', [
            'product' => $product,
            'products' => $products
        ]);
    }
}
