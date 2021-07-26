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
use Session;
use Mail;
use App\Models\Customer;

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

    public function getCheckout()
    {
        if (Session::has('account_logged_in')) {
            return redirect('shop/customer/carts');
        } else {
            return view('shop/customer/login');
        }
    }

    // payment
    public function payments(Request $request) {
        $username = test_input($request->pm_username);
        $email = test_input($request->pm_email);
        $address = test_input($request->pm_address);
        $note = test_input($request->pm_note);
        $password = md5($request->pm_password);

        // Auth
        $result = Customer::where(function($query) use ($username, $email){
            $query->where('username', '=', $username)->orWhere('email', '=', $email);
        })->where('password', '=', $password)->first();

        // Using session
        if ($result) {

            // Send email to customer
            $data['username'] = $username;
            $data['email'] = $email;
            $data['address'] = $address;
            $data['note'] = $note;
            $data['carts'] = Cart::content();
            $data['total'] = Cart::total();

            if (empty(Cart::content()) || Cart::total() <= 0) {
                return back()->withInput()->with('error', 'No product in your cart');
            }

            //$pdf = PDF::loadView('shop.customers.sendemail', $data);

            Mail::send('shop.customer.send-mail', $data, function($message) use ($email){
                $message->from('service.homeshoppe@gmail.com', 'FASHION SHOP');

                $message->to($email, $email);

                $message->subject('Xác nhận mua hàng từ Fashion shop');

                //   $message->attachData($pdf->output(), "order.pdf");
            });


            // Delete item in cart
            Cart::destroy();
            return back()->withInput()->with('success', 'Payment successfully, check your email');
        } else {
            return back()->withInput()->with('error', 'Invalid account or password');
        }
    }
}
