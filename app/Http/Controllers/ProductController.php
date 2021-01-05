<?php

namespace App\Http\Controllers;

use App\Product;
use App\Price_stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $price_stock->product_id=$product->id;
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
    public function edit(Product $product, Price_stock $price_stock)
    {
        return view('admin.products.edit',compact('product'),compact('price_stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Price_stock $price_stock)
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
        $price_stock->product_id=$product->id;
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
        $product->delete();
        // redirect
        return redirect()->route('products.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function qty_reactive(Request $request){
    DB::transaction(function() use ($request){
        $id=$request->id;
        $newQty=$request->qty;
        $oldQty=$request->oqty;
        $unit=$request->unit;
        if ($unit=='pc') {
            $count='pcs_count';
        }elseif ($unit=='dozen') {
            $count='dozens_count';
        }else{
            $count='sets_count';
        }

        $product=Price_stock::where('product_id','=', $id)->get();
        //     ->sharedLock()
        //     ->lockForUpdate()
        //     ->get();

        // if ($newQty>$oldQty) {
        if ($product[0]->$count<($newQty-$oldQty)) {
            echo "error";
        }else{
            $product[0]->$count=$product[0]->$count-($newQty-$oldQty);
            $product[0]->save();
            echo ($product[0]->$count);
        }        
    });
    }

}
