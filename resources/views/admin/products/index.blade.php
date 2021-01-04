@extends('admin.master')

@section('content')
@php
  use App\Price_stock;
  use App\Customer;
@endphp

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Products</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Proucts</a></li>
    </ul>
  </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Products List</h4>
            <a  href="{{route('products.create')}}" class="btn btn-success float-right">Add New</a>     

             <div class="table-responsive mt-3">
              <table class="table table-bordered" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th class="align-middle text-center" rowspan="2">No</th>
                    <th class="align-middle text-center" rowspan="2">Code</th>
                    <th class="align-middle text-center" rowspan="2">Name</th>
                    <th class="align-middle text-center" colspan="3">Price</th>
                    <th class="align-middle text-center" colspan="3">Stock</th>
                    <th class="align-middle text-center" rowspan="2">Action</th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">pc</th>
                    <th class="align-middle text-center">dozen</th>
                    <th class="align-middle text-center">set</th>
                    <th class="align-middle text-center">pc</th>
                    <th class="align-middle text-center">dozen</th>
                    <th class="align-middle text-center">set</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp
                  @foreach($products as $product)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->code_no}}</td>
                    <td>{{$product->name}}</td>
                    @php
                    $pid=$product->id;
                    $pricestock = Price_stock::where('product_id',$pid)->first();
                    @endphp

                    <td>{{$pricestock->pc_price}}</td>
                    <td>{{$pricestock->dozen_price}}</td>
                    <td>{{$pricestock->set_price}}</td>
                    <td>{{$pricestock->pcs_count}}</td>
                    <td>{{$pricestock->dozens_count}}</td>
                    <td>{{$pricestock->sets_count}}</td>
                    
                    <td>
                      <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-sm">Edit</a>

                      <form method="post" action="{{route('products.destroy',$product->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="btnsubmit" class="btn btn-danger btn-sm" value="Delete">
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>   
    </div>    
  </main>
@endsection

