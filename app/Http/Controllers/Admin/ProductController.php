<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\Admin\AddProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['catelist'] = Category::orderBy('prodline_id', 'DESC')->get();
        $data['brandlist'] = Brand::orderBy('brand_id', 'DESC')->get();
        return view('admin.products.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $product = new Product;
        $product->name = test_input($request->name);
        $product->slug = str_slug(test_input($request->name));
        $product->price = test_input($request->price);
        $product->quantity = test_input($request->quantity);
        $product->content = test_input($request->content);
        $product->description = test_input($request->desc);
        $product->prodline_id = $request->category;
        $product->brand_id = $request->brand;
        $display = 1;
        if (!$request->display){
            $display = 0;
        }
        $product->display = $display;
       // insert multiple images
        $img_db = array();
        if ($request->hasFile('img')) {
         $images = $request->file('img');
         foreach($images as $image){
            $img_name = $image->getClientOriginalName();
            $image->storeAs('public/avatars', $img_name);
            $img_db[] = $img_name;
        }
    }
    $product->images = json_encode($img_db);
    $product->save();
    return redirect()->intended('admin/products');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}