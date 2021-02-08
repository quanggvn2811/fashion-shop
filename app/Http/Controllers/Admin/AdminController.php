<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function getDashboard(){
    	return view('admin.dashboard');
    }

    public function getLogin(){
    	return view('admin.login');
    }

    public function postLogin(Request $request){
    	$email = $request->email;
    	$password = $request->password;
    	$data = ['email'=>$email, 'password'=>$password];

    	if ($request->remember) {
    		$remember = true;
    	} else {
    		$remember = false;
    	}
    	if (Auth::attempt($data, $remember)) {
    		return redirect()->intended('/admin/dashboard');
    	} else {
    		return back()->withInput()->with('loginError', 'Incorrect email or password');
    	}

    }
}
