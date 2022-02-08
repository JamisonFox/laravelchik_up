<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->paginate();
        return view('admin.product.index', [
            'products' => $products, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('img');
//        Storage::disk('public')->put('product/images/'.$request->name.'.'.$img->getClientOriginalExtension(), $img->getContent());
        Storage::disk('public')->putFileAs('images/', $img, $request->name.'.'.$img->getClientOriginalExtension());
        $NewUrl = Storage::url('images/'.$request->name.'.'.$img->getClientOriginalExtension());

        $data = $request->all();
        $data['img'] = $NewUrl;
        Product::query()->create($data);
        return redirect(route('admin.product.index'));

        //$file = $request->file('img');
        //$name = $request->input('name');
        //$file->storeAs('newfolder', "{$name}.jpg", 'public');
        //$img = "{$name}.jpg";
        //Product::create($request->all());
        //dump($request->all(), realpath($file), $name);
        //$product = Product::create($request->all());
//        $path = 'upload/images';
//        $extension = strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));
//        $filename = substr(md5(microtime() . rand(0, 9999)), 0, 20);
//        $target = $path . '/' . $filename . '.' . $extension;
//
//        $data = $request->all();
//        $data['img'] = $target;
//        $product = Product::query()->create($data);
        //dd($product);
        return redirect(route('admin.product.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->fill($request->all());
        $product->save();
        dump($product);
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('admin.product.index'));
    }
}
