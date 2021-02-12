<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Http\Requests\Admin\EditCategoryRequest;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['catelist'] = Category::paginate(2);
        return view('admin.categories.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['catelist'] = Category::all();
        return view('admin.categories.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        $name = test_input($request->name);
        $desc = test_input($request->desc);
        $parent = $request->cateParent;
        $display = 1;
        if (!$request->display) {
            $display = 0;
        }
        $cate = new Category;
        $cate->name = $name;
        $cate->description = $desc;
        $cate->parent = $parent;
        $cate->display = $display;

        $cate->save();
        return redirect()->intended('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['catelist'] = Category::all();
        $data['cate'] = $category;
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        $name = test_input($request->name);
        $desc = test_input($request->desc);
        $parent = $request->cateParent;
        $display = 1;
        if (!$request->display) {
            $display = 0;
        }
        $category->name = $name;
        $category->description = $desc;
        $category->parent = $parent;
        $category->display = $display;

        $category->save();
        return redirect()->intended('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function changeDisplayCate(Request $request){
        $cate_id = $request->cate_id;
        $display_st = $request->display_st;
        $cate = Category::find($cate_id);
        if ($display_st) {
            $cate->display = 0;
            echo "false";
        } else {
            $cate->display = 1;
            echo "true";
        }
        $cate->save();
    }
}
