@extends('sales.master')
@section('content')

<div class="main-panel">

  <div class="row">
    <div class="col-md-12">

      <div class="tile">
        <div class="tile-body">
          <h4 class="d-inline-block">Products List</h4>
        </div>
      </div>
            

      <div class="table-responsive mt-3">
        <table class="table table-bordered datatable">

          <thead class="thead-dark">
            <tr>
              <th class="align-middle text-center" rowspan="2">No</th>
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
            @php
              $j=0;
              @endphp
              @foreach($products as $product)
                        
              <tr>
                @php
                $j+=1;
                @endphp
                  <tr class="table-info">
                    <td> {{ $j }}</td>
                    <td>{{ $product->name }} </td>
                          
                    <td class="align-middle text-right"> {{ $product->price_stock->pc_price }} </td>
                    <td class="align-middle text-right"> {{ $product->price_stock->dozen_price }} </td>
                    <td class="align-middle text-right"> {{ $product->price_stock->set_price }} </td>
                    <td class="align-middle text-right"> {{ $product->price_stock->pcs_count }} </td>
                    <td class="align-middle text-right"> {{ $product->price_stock->dozens_count }} </td>
                    <td class="align-middle text-right">  {{ $product->price_stock->sets_count }}</td>
                    <td class="align-middle text-center">    
                    <a href="#" class="btn btn-warning btn-sm">Details</a>
                    <a href="#" class="btn btn-warning btn-sm">Order</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            </div> 
          </div>
        </div>
    </div>


@endsection