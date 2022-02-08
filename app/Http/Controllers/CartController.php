<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index(Request $request) {


        $cart = Session::get('cart',[]);
        $productIds = array_keys($cart);
        session(['cart' => $cart]);
        $products = Product::query()
            ->whereIn('id',$productIds)
            ->get();
        dump($products);

//        session([
//            'ololo' => 123212,
//            'NIGGA' => 'u hear me',
//        ]);
//        $request->session()->increment('count');
//        $request->session()->push('test','daad');
//        $request->session()->push('test.bitch.nigga','neet');
//        $request->session()->forget();
//       // $request->session()->put('Nigaa','get out my way');
//        dump($request->session()->all());

    }
    public function addToCart(Request $request) {
        $productId = $request->get('product_id');
        session()->increment('cart.'.$request->get('product_id'));
        dump($productId);

    }
}
