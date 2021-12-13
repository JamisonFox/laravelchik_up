<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ф-ции для вывода : dump(),dd() - выводит и убирает все остальное,ddd() - ultimate)

Route::get('/', function () {
    return view('main');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/product', function () {
    $category = new Category();
   // $category->name = 'TV2';
   // $category->name = 'Laptop';
    $category->save();

//    $data = [
//        'name' => 'Laptop2'
//    ];
//    $category = Category::create($data);
//    return view('product');
});

Route::get('hello',[SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
