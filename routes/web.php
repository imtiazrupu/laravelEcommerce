<?php

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
require 'admin.php';

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Shop\HomeController@index');
Route::get('contact', 'Shop\ContactController@contact');

Route::get('/customer-login', 'CustomerAuthController@loginPage');
Route::get('/customer-login-check', 'CustomerAuthController@loginPageCheck');
Route::post('customer-login', 'CustomerAuthController@login');
Route::post('customer-login-check', 'CustomerAuthController@loginCheck');
Route::get('customer-logout', 'CustomerAuthController@logout');
Route::post('customer-register', 'CustomerAuthController@register');
Route::post('customer-register-check', 'CustomerAuthController@registerCheck');

Route::group(['middleware' => 'auth'], function () {
Route::get('customer-profile', 'CustomerProfileContoller@profile');
Route::get('edit-customer-profile', 'CustomerProfileContoller@editProfile');
Route::post('update-customer-profile', 'CustomerProfileContoller@updateProfile');
});


Route::get('ajax-subcat', 'AjaxController@subCat');
Route::get('ajax-prodcat', 'AjaxController@productCat');
Route::post('add-to-cart', 'AjaxController@addToCart');
Route::post('ajax-add-to-cart', 'AjaxController@ajaxAddToCart');
Route::get('remove-from-cart/{id}', 'AjaxController@removeFromCart');
Route::get('get-cart-response', 'AjaxController@cartResponse');
Route::get('get-inventory-total/{id}', 'AjaxController@getInventoryTotal');


//Product Category
Route::get('template-product-category/{id}', 'Shop\ProductController@product');
Route::get('all-product', 'Shop\ProductController@allProduct');

//Products
Route::get('product-details/{id}', 'Shop\ProductDetailController@detail');
Route::get('all-products/{id?}', 'Shop\ProductDetailController@details');


//Posts
Route::get('post-details/{id}', 'Shop\PostDetailController@detail');
Route::get('all-post', 'Shop\PostDetailController@allPost');

Route::get('mordern-product-category', 'Shop\NewCollectionController@product');
Route::get('classic-product-category', 'Shop\NewCollectionController@classicProduct');




Route::post('pop-up', 'Shop\ProductDetailController@popUp');
Route::get('shopping-bag', 'Shop\ProductController@shoppingBag');

Route::group(['middleware' => 'customer'], function () {
    Route::post('product-review', 'ProductReviewController@saveReviews');
    Route::post('blog-comment', 'Shop\PostDetailController@saveComment');

    Route::post('buy-now', 'Shop\ProductController@buyNow');

    // checkout
    Route::get('shop/checkout', 'Shop\CheckOutController@deliveryPage');
    Route::get('shop/shipping', 'Shop\CheckOutController@shippingPage');
    Route::get('shop/payment', 'Shop\CheckOutController@paymentPage');
    Route::get('shop/review', 'Shop\CheckOutController@reviewPage');
    Route::post('shipping', 'Shop\CheckOutController@shippings');
    Route::post('payments', 'Shop\CheckOutController@payment');
    Route::post('review', 'Shop\CheckOutController@review');

    Route::post('payment', 'Shop\CheckOutController@createOrder');
});

