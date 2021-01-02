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


Route::get('product','MainController@product')->name('productpage');

Route::resource('customers','CustomerController');
Route::get('/getCustomer','CustomerController@getCustomer')->name('getCustomerpage');


Route::resource('ways','WayController');
Route::get('way','WayController@session')->name('session');


Route::resource('price_stocks','PriceStockController');


//backend

Route::resource('categories','CategoryController');
Route::resource('brands','BrandController');
Route::resource('subcategories','SubcategoryController');

