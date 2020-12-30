<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function admin($value='')
    {
    	return view('admin.admin');
    }

     public function order($value='')
    {
    	return view('order.order');
    }


     public function delivery($value='')
    {
    	return view('delivery.delivery');
    }
}
