<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AddBrandRequest;
use App\Http\Requests\Admin\EditBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brandlist'] = Brand::orderBy('brand_id', 'DESC')->paginate(5);
        return view('admin.brands.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBrandRequest $request)
    {
        $name = test_input($request->name);
        $desc = test_input($request->description);
        $display = 1;
        if (!$request->display) {
            $display = 0;
        }

        // Insert data
        $brand = new Brand;
        $brand->name = $name;
        $brand->description = $desc;
        $brand->display = $display;
        $brand->save();
        return redirect()->intended('admin/brands/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $data['brand'] = $brand;
        return view('admin.brands.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(EditBrandRequest $request, Brand $brand)
    {
        $name = test_input($request->name);
        $desc = test_input($request->description);
        $display = 1;
        if (!$request->display) {
            $display = 0;
        }
        $brand->name = $name;
        $brand->description = $desc;
        $brand->display = $display;

        $brand->save();
        return redirect()->intended('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('delBrandSuccess', 'Delete brand successfully');
    }
    public function changeDisplayBrand(Request $request){
        $brand_id = $request->brand_id;
        $display_st = $request->display_st;
        // if ($display) {
        //     $display = 0;
        // } else {
        //     $display = 1;
        // }
        $display_st = !$display_st;
        $brand = Brand::find($brand_id);
        $brand->display = $display_st;
        $brand->save();

        // Dont display category => dont display products of category
        $productlist = Product::where('brand_id', '=', $brand_id)->get();
        $prod_id_arr = array();
        foreach ($productlist as $prod) {
            $prod_id_arr[] = $prod->prod_id;
        }
        Product::whereIn('prod_id', $prod_id_arr)->update(['display'=>$display_st]);
    }
}
