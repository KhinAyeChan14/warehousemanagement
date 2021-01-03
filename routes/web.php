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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin','MainController@admin')->name('adminpage');

Route::get('sales','MainController@sales')->name('salespage');

Route::get('delivery','MainController@delivery')->name('deliverypage');

<<<<<<< HEAD
// Sales Page
=======

>>>>>>> 26d7539ecba8e52936647e15c596263a4dca04ce
Route::get('product','MainController@product')->name('productpage');
Route::get('orderdetails','MainController@orderdetails')->name('orderdetailspage');

Route::resource('customers','CustomerController');
Route::get('/getCustomer','CustomerController@getCustomer')->name('getCustomerpage');

Route::resource('ways','WayController');
Route::get('way','WayController@session')->name('session');

Route::resource('price_stocks','PriceStockController');

<<<<<<< HEAD
=======

//backend
>>>>>>> 26d7539ecba8e52936647e15c596263a4dca04ce

// Admin Page
Route::resource('categories','CategoryController');
Route::resource('brands','BrandController');
Route::resource('subcategories','SubcategoryController');

<<<<<<< HEAD
Route::resource('ways','WayController');
Route::resource('products','ProductController');


=======
>>>>>>> 26d7539ecba8e52936647e15c596263a4dca04ce
