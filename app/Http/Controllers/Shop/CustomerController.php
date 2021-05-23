<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Shop\CustomerSignUpRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Cookie;

/**
 * Customer controller handle
 */
if (!class_exists('CustomerController')) {
    class CustomerController extends Controller
    {
        /**
         * Get login or sign-up view
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function getlogin()
        {
            return view('shop.customer.login');
        }

        /**
         * Receive customer sign up data
         *
         * @param Request $request
         */
        public function postSignUp(CustomerSignUpRequest $request)
        {
            if (isset($_POST['sign-up'])) {
                $username = test_input($request->username);
                $email = test_input($request->email);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return back()->withInput()->with('error', 'Invalid email format');
                }

                $password = $request->password;
                $re_password = $request->re_password;

                if ($password !== $re_password) {
                    return back()->withInput()->with('error', 'Password and repeat password do not match');
                }

                // Encrypt password
                $password = md5($password);

                // Insert data into customers table using Customer model
                $customer = new Customer();
                $customer->username = $username;
                $customer->password = $password;
                $customer->email = $email;
                $customer->save();

                // Set cookie signed in
                // Cookie::queue('CustomerSignedIn', $username . '--' . $email, time() + (86400 * 30)); // Expire in 30 days
                $cookie_value = array($username, $email);
                return redirect()->route('home')->cookie('CustomerSignedIn', json_encode($cookie_value), time() + (86400 * 30));
            }
        }

        public function getLogOut(Request $request)
        {
            return redirect()->route('customerLogin')->withoutCookie('CustomerSignedIn');
        }

    }
}
