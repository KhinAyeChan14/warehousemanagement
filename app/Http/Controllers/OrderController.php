<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // echo 'Order Successful';
        // dd($request->item);
        $item = json_decode($request->item);

        $order = new Order;
        $order->order_date = date('Y-m-d');
        $order->voucher_no = uniqid();
        $order->total = $request->total;
        $order->user_id = Auth::id();
        $order->customer_id = $item[0]->customer;
        $order->save();

        // foreach ($item as $row) {
        //     $order->items()->attach($row->id,['quantity'=>$row->qty]);
        //     $order->items()->attach($row->id,['units_of_measure'=>"pc"]);
        // }
        // echo 'Order Successful';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function changestatus(Order $order)
    {   
        
       $id=$order->id;
       $order= Order::find($id);
       $order->status = "2";
       $order->save();

        // $order=Order::where('id', $order->id)->update('status' => '2');

        // $order->save();
    }
}
