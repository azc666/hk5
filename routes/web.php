<?php

use \App\User;
use \App\Order;
use App\Title;

Route::get('/', 'UserController@show')->name('home');

Route::get('testbranch', function (User $user, Order $orders) {
    $users = User::all();
    $orders = Auth::user()->orders;
    $hashedPassword = bcrypt('123123');
dd($hashedPassword);
    return view('user.newTestFile2', compact('user', 'orders', 'hashedPassword'));
});

Route::get('profile', 'UserController@showProfile')->name('showProfile');
Route::post('profile', 'UserController@editProfile')->name('editProfile');

Route::get('contactus', 'UserController@showContactus')->name('showContactus');
Route::post('contactus', 'UserController@sendContactus')->name('sendContactus');

Route::get('staff', 'CategoryController@showStaffCategories')->name('staff');
Route::get('associate', 'CategoryController@showAssociateCategories')->name('associate');
Route::get('partner', 'CategoryController@showPartnerCategories')->name('partner');

Route::get('categories/{category}', 'CategoryController@show')->name('categories');

Route::get('products/', 'ProductController@index');
Route::get('products/{product}', 'ProductController@show');
Route::patch('products/{product}', 'ProductController@show');
Route::get('showData', 'ProductController@showData')->name('showData');
Route::post('showData', 'ProductController@showData')->name('showData');

// Route::get('products/{rowId}', 'EditController@show')->name('');
Route::get('showEditData', 'ProductController@showEdit')->name('showEdit');
Route::post('showEditData', 'ProductController@showEdit')->name('showEdit');

Route::resource('cart', 'CartController');
Route::PATCH('cart', 'CartController@update')->name('cart');

Route::get('storecart', 'ShoppingcartController@storecart')->name('storecart');
Route::get('restorecart', 'ShoppingcartController@restorecart')->name('restorecart');
Route::delete('emptyCart', 'CartController@emptyCart');

Route::get('qtyupdate', 'ShoppingcartController@qtyupdate')->name('qtyupdate');

Route::patch('editcart', 'EditController@update')->name('editcart');
Route::post('cartorder', 'CartOrderController@show')->name('cartorder');
Route::post('cartConfirm', 'CartConfirmOrderController@showConfirmOrder')->name('cartConfirm');

Route::get('myorders', 'MyOrdersController@index')->name('myorders');
// Route::get('user.myordersdata', 'BookingController@myordersData')->name('myorders.data');
// Route::get('showConfirmedOrder', 'MyOrdersController@show')->name('showConfirmedOrder');
Route::post('showConfirmedOrder', 'MyOrdersController@show')->name('showConfirmedOrder');

Route::get ('titles', 'MyTitlesController@index')->name('titles');

Route::get('carousel', function () {
    return view('carousel');
});

Route::get('phpinfo', function () {
    if (Auth::check()) {
       return view('phpinfo'); 
    } else {
        return view('home');
    } 
});

// Registration Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@create')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('changepassword', 'Auth\ResetPasswordController@showPassword')->name('showPassword');
Route::post('changepassword', 'Auth\ResetPasswordController@changePassword')->name('changePassword');;

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Auth::routes();

Route::get('/home', 'HomeController@index');
