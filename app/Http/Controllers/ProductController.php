<?php

namespace App\Http\Controllers;

use App\Product;
use App\Price_stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
       //      'shop_name' => 'required|min:5',
    
       //  ]);

        // store data
        $product = new Product;
        $product->code_no = $request->codeno;
        $product->name = $request->name;
        $product->photo = $request->photo;
        $product->description = $request->description;
        $product->subcategory_id = $request->subcategoryid;
        $product->brand_id = $request->brandid;
        $product->save();


        $price_stock = new Price_stock;
        $price_stock->pc_price = $request->pcprice;
        $price_stock->dozen_price = $request->dozenprice;
        $price_stock->set_price = $request->setprice;
        $price_stock->pcs_count = $request->pccount;
        $price_stock->sets_count = $request->setcount;
        $price_stock->dozens_count = $request->dozencount;
        $price_stock->save();


        // redirect
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
         return view('admin.order.product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $product->code_no = $request->codeno;
        $product->name = $request->name;
        $product->photo = $request->photo;
        $product->description = $request->description;
        $product->subcategory_id = $request->subcategoryid;
        $product->brand_id = $request->brandid;
        $product->save();


        
        $price_stock->pc_price = $request->pcprice;
        $price_stock->dozen_price = $request->dozenprice;
        $price_stock->set_price = $request->setprice;
        $price_stock->pcs_count = $request->pccount;
        $price_stock->sets_count = $request->setcount;
        $price_stock->dozens_count = $request->dozencount;
        $price_stock->save();
        // redirect
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
