<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    public function getHome(){
    	$data['featured_prod'] = Product::where('feature', '=', 1)->where('display', '=', 1)->orderBy('prod_id', 'DESC')->take(6)->get();
    	return view('shop.home', $data);
    }
    public function getlogin(){
    	return view('shop.customer.login');
    }
    public function getCheckout(){
        return view('shop.customer.checkout');
    }
    public function getCart(){
        return view('shop.customer.cart');
    }
    public function getBlogList(){
        return view('shop.blogs.blog');
    }
    public function getBlogSingle(){
        return view('shop.blogs.blog-single');
    }
    public function getContactUs(){
        return view('shop.contact-us');
    }

}
