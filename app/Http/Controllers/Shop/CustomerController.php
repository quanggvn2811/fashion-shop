<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Shop\CustomerSignUpRequest;
use App\Models\Customer;
use Session;
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
                /*Cookie::queue('CustomerSignedIn', $username . '--' . $email, time() + (86400 * 30)); // Expire in 30 days
                $cookie_value = array($username, $email);
                Session::put('logged-in', 'logged-in'); // flag to show logout link
                return redirect()->route('home')->cookie('CustomerSignedIn', json_encode($cookie_value), time() + (86400 * 30)); // main data*/

                // Using session
                Session::put('username_logged_in', $username);
                Session::put('email_logged_in', $email);
                return redirect()->route('home');
            }
        }

        /**
         * Receive customer login data
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function postLogin(Request $request) {
            $account = test_input($request->account);
            $secret = md5($request->secret);
            if ($request->remember) {
                $remember = true;
            } else {
                $remember = false;
            }

            // Auth
            $result = Customer::where(function($query) use ($account){
                $query->where('username', '=', $account)->orWhere('email', '=', $account);
            })->where('password', '=', $secret)->first();

            /*$cookie_value = array();
           Session::put('logged-in', 'logged-in'); // flag to show logout link
           return redirect()->route('home')->cookie('CustomerSignedIn', json_encode($cookie_value), time() + (86400 * 30));*/

            // Using session
            if ($result) {
                Session::put('account_logged_in', $account);
                return redirect()->intended('/');
            } else {
                return back()->withInput()->with('error', 'Invalid account or password');
            }

        }

        public function getLogOut(Request $request)
        {
            /*Session::forget('logged-in');
            return redirect()->route('customerLogin')->withoutCookie('CustomerSignedIn');*/

            Session::flush();
            return redirect()->intended('/');
        }

    }
}
