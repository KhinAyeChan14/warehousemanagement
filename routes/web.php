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

// Sales Page

Route::get('product','MainController@product')->name('productpage');
Route::get('orderdetails','MainController@orderdetails')->name('orderdetailspage');
Route::get('ordersuccess','MainController@ordersuccess')->name('ordersuccesspage');


Route::resource('customers','CustomerController');
Route::get('/getCustomer','CustomerController@getCustomer')->name('getCustomerpage');

Route::resource('ways','WayController');
Route::get('way','WayController@session')->name('session');

Route::resource('price_stocks','PriceStockController');


// Admin Page
Route::resource('categories','CategoryController');
Route::resource('brands','BrandController');
Route::resource('subcategories','SubcategoryController');
Route::resource('products','ProductController');
Route::resource('orders','OrderController');
Route::get('orderlist','MainController@orderlist')->name('orderlistpage');
Route::get('/changestatus','OrderController@changestatus')->name('changestatuspage');


// Delivery Page
Route::get('delivery','MainController@confirmlist')->name('confirmpage');




