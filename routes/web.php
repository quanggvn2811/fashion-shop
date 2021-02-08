<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Admin shop - server side
Route::group(['namespace'=>'Admin'], function(){
	Route::group(['prefix'=>'admin'], function(){
	Route::get('/dashboard', 'AdminController@getDashboard');\

	// Login
	Route::get('/login', 'AdminController@getLogin');
	Route::post('/login', 'AdminController@postLogin');

});
});




// Default route
Route::fallback(function(){
	return view('welcome');
});