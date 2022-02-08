<?php

use App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckAuth;
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


//Route::get('/store', function () {
//    return view('store');
//});

//Route::get('product/product', function () {
//    return view('product/product');
//});

Route::get('/product/77777777', function () {
  //  $category = new Category();
   // $category->name = 'TV2';
   // $category->name = 'Laptop';
   // $category->save();

  //  $data = [
  //      'name' => 'Laptop2'
  //  ];
   // $category = Category::create($data);
   // return view('product');
});

Route::get('hello',[SiteController::class, 'index']);

Auth::routes();

Route::get('admin', function () {
    return view('admin.index');
});
//Route::resources([
//    'brand' => \App\Http\Controllers\Admin\BrandController::class,
//    'category' => \App\Http\Controllers\Admin\CategoryController::class,
//    'product' => \App\Http\Controllers\Admin\ProductController::class
//]);
Route::get('test',function() {
//    $response = \Illuminate\Support\Facades\Http::post('https://google-translate1.p.rapidapi.com/language/translate/v2/detect');
//    $data = [
//    'q' => 'Привет мир',
//    'target' => 'en',
//    'source'    => 'ru' ];
$client = new \GuzzleHttp\Client();
    $response = \Illuminate\Support\Facades\Http::get('api.openweathermap.org/data/2.5/weather', [
        'zip' => '211400о св,BY',

        'lang' => 'ru',
        'appid' => 'facd6595736711189a3f254fc2542686'
    ]);
    dd($response->object());
//dd($response->getBody()->getContents());
//$curr = json_decode($response->getBody()->getContents());

//\Illuminate\Support\Facades\Http::withBody([])->post('',[]);
//\App\Jobs\BingoJob::dispatch();
//dump(111111);

//    \Illuminate\Support\Facades\Mail::to('2616220@gmail.com')
//        ->cc('olololol1234@mail.ru')
//       ->send(new \App\Mail\BingoMail(10000));

});

Route::middleware(CheckAuth::class)->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', function () { echo 'test';});
    Route::resources([
        'brand'=> \App\Http\Controllers\Admin\BrandController::class,
        'category'=> \App\Http\Controllers\Admin\CategoryController::class,
        'product'=> \App\Http\Controllers\Admin\ProductController::class
    ]);
});

//Route::middleware(\App\Http\Middleware\CheckAuth::class)->prefix('admin')->name('admin.')->group(function() {
//    Route::resources([
//        'brand' => \App\Http\Controllers\Admin\BrandController::class,
//        'category' => \App\Http\Controllers\Admin\CategoryController::class,
//        'product' => \App\Http\Controllers\Admin\ProductController::class
//    ]);
//});

//});
//
//});
Route::get('cart',[\App\Http\Controllers\CartController::class,'index']);

Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class)->except(['destroy']);
Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('show-form', [App\Http\Controllers\FormController::class, 'showForm'])->name('showForm');;
Route::post('show-form', [App\Http\Controllers\FormController::class, 'postForm'])->name('postForm');

Route::get('product/{id?}',[\App\Http\Controllers\ProductController::class,'index'])->name('show-product');
Route::get('catalog', [\App\Http\Controllers\ProductController::class, 'catalog',])->name('catalog');
//Route::get('catalog', [\App\Http\Controllers\ProductController::class, 'catalog'])->name('');
Route::get('test-file',function () {

});
Route::post('add-to-cart',[\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
