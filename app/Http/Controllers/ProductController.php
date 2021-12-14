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
    public function catalog() {
        //$products = Product::all();
        $offset = 9;
        //$offset = ($page - 1) * 10;
        $products = Product::query()->where('status',1)->paginate(9);
        return view('product.store', [
            'products' => $products
        ]);
    }
}
