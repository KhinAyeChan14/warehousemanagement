@extends('sales.master')

@section('content')
  <main class="main-panel">

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Customers List</h4>
            <a  href="{{route('customers.create')}}" class="btn btn-success float-right">Add New</a>
            

            <div class="table-responsive mt-3">
              <table class="table table-bordered datatable">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Shop Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp
                  @foreach($customers as $customer)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$customer->shop_name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                      <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-warning btn-sm">Edit</a>

                      <form method="post" action="{{route('customers.destroy',$customer->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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

