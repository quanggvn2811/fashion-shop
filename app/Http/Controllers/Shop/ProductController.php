<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{

	 // Show all products
    public function getAllProducts(){
    	$data['allProducts'] = Product::where('feature', '=', 1)->where('display', '=', 1)->orderBy('prod_id', 'DESC')->paginate(9);
    	return view('shop.products.product-list', $data);
    }
    public function getProductDetails(){
        return view('shop.products.product-details');
    }

    // Fillter products by category
	public function getProductByCategory($id, $slug){
        // $data['products'] = DB::table('tbl_fs_products')->where('tbl_fs_products.prodline_id', '=', $id)->where('tbl_fs_products.display', '=', 1)
        // ->join('tbl_fs_productlines', 'tbl_fs_productlines.prodline_id', '=', 'tbl_fs_products.prodline_id')
        // ->select('tbl_fs_products.*', 'tbl_fs_productlines.name as category')
        // ->orderBy('tbl_fs_products.prod_id', 'DESC')->paginate(8);

		$data['products'] = Product::where('prodline_id', '=', $id)->where('display', '=', 1)->orderBy('prod_id', 'DESC')->paginate(9);
		$data['category'] = Category::find($id)->name;

		return view('shop.categories.product-by-category', $data);
	}

	// Fillter products by brand
	public function getProductByBrand($id, $slug){
		$data['products'] = Product::where('brand_id', '=', $id)->where('display', '=', 1)->orderBy('prod_id', 'DESC')->paginate(9);
		$data['brand'] = Brand::find($id)->name;

		return view('shop.brands.product-by-brand', $data);
	}
}
