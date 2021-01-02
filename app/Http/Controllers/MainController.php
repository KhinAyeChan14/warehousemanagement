<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Way;
use App\Customer;


class MainController extends Controller
{
    public function admin($value='')
    {
    	return view('admin.admin');
    }

     public function sales($value='')     
    {
        $ways = Way::orderBy('id','desc')->get();
        return view('sales.order',compact('ways'));

    }


     public function delivery($value='')
    {
    	return view('delivery.delivery');
    }

    public function product($value='')
    {   
        $products = Product::orderBy('id','desc')->get();
        return view('sales.order.product',compact('products'));
    }
}
