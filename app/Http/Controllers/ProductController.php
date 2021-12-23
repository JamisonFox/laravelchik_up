<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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
        $brands = Brand::query()->where('id' < 5)->get();
        $categories = Category::query()->where('id' < 5)->get();
        return view('product.store', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

}
