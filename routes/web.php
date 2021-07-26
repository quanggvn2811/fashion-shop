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

Route::group(['namespace'=>'Shop'], function(){
	Route::get('/', 'HomeController@getHome')->name('home');

	 // Shop
	Route::group(['prefix'=>'shop'], function() {
		// Get all products
		Route::get('products', 'ProductController@getAllProducts');

	 	// Filter product by category
		Route::get('categories/{cate_id}/{slug}', 'ProductController@getProductByCategory');

	  	// Filter product by brand
		Route::get('brands/{brand_id}/{slug}', 'ProductController@getProductByBrand');

		// Show product details
		Route::get('product-details/{id}/{slug}', 'ProductController@getProductDetails');

		// Search products
		Route::get('/search', 'ProductController@getSearchProduct');

		// Customer
        Route::group(['prefix'=>'customer'], function() {
            // Login
            Route::get('login', 'CustomerController@getLogin')->name('customerLogin');
            Route::post('sign-up', 'CustomerController@postSignUp');
            Route::post('log-in', 'CustomerController@postLogin');

            // Logout
            Route::get('logout', 'CustomerController@getLogOut');

            // Checkout
            Route::get('checkout', 'CartController@getCheckout');
            Route::get('carts', 'CartController@getCart');
            Route::get('carts/add', 'CartController@addToCart');
            Route::get('carts/update', 'CartController@updateCart');
            Route::get('carts/delete/{id}', 'CartController@deleteCart');
            Route::post('payments', 'CartController@payments');
        });

	});

	 // Blog
	Route::group(['prefix'=>'blog'], function() {
		Route::get('blog-list', 'HomeController@getBlogList');
		Route::get('blog-single', 'HomeController@getBlogSingle');
	});



	 // Contact us
	Route::get('/contact', 'HomeController@getContactUs');

});
// Default route
Route::fallback(function(){
	return redirect()->route('home');
});
