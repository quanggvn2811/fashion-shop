<?php

namespace App\Http\Controllers\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Cookie;
use Cart;

class CartController extends Controller
{
    public function getCart()
    {
        $data['cart'] = Cart::content();
        $data['totalCart'] = Cart::total();
        return view('shop.customer.cart', $data);
    }

    // Add to cart
    public function addToCart(Request $request) {
        $product_id = test_input($request->product_id);
        $qty = test_input($request->quantity);
        $product = Product::find($product_id);

        $img_path = 'server-side/images/img_not_found.png';
        $img_db = json_decode($product->images);
        if (isset($img_db[0])) {
            $img_path = 'storage/avatars/' . $img_db[0];
        }

        if (isset($product_id) && isset($qty) && $qty > 0) {
            Cart::add($product_id, $product->name, $qty, $product->price, 100, ['product_img' => $img_path]);
        }
    }

    // Update cart
    public function updateCart(Request $request) {
        $rowID = $request->row_id;
        $qty = $request->qty;
        if (isset($rowID) && isset($qty) && $qty >= 0) {
            Cart::update($rowID, $qty);

        }
    }
     public function deleteCart($id) {
         if ($id === 'all') {
             Cart::destroy();
             return redirect('/');

         } else {
             Cart::remove($id);
             if (Cart::count() > 0) {
                 return back();
             } else {
                 return redirect('/');
             }
         }
     }
}
