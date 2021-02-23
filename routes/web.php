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
	Route::group(['prefix'=>'admin', 'middleware'=>'checkLoggedIn'], function(){
		// Login
		Route::get('/login', 'AdminController@getLogin');
		Route::post('/login', 'AdminController@postLogin');

	});
	Route::group(['prefix'=>'admin', 'middleware'=>'checkLoggedOut'], function(){
		Route::get('/dashboard', 'AdminController@getDashboard');

		// Log out
		Route::get('/logout', 'AdminController@getLogout');

		// Categories
		Route::get('category/display', 'CategoryController@changeDisplayCate');
		Route::resource('category', CategoryController::class);

		// Brands
		Route::get('brands/display', 'BrandController@changeDisplayBrand');
		Route::resource('brands', BrandController::class);

		// Products
		Route::get('products/display', 'ProductController@changeDisplayProduct');
		Route::resource('products', ProductController::class);
	});
});


// Shop home - client side

// Default route
Route::fallback(function(){
	return view('shop.master');
});	