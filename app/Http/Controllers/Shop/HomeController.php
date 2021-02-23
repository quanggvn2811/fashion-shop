<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function getHome(){
    	$data['featured_prod'] = Product::where('feature', '=', 1)->where('display', '=', 1)->orderBy('prod_id', 'DESC')->take(6)->get();
    	return view('shop.home', $data);
    }
}
