@extends('sales.master')

@section('content')

<div class="main-panel">

  @php
      use App\Customer;
      use App\Way;
      session_start();
      $wayid=$_SESSION['way'];
      $customers=Customer::where('way_id','=', $wayid)->get();
      $way=Way::find($wayid);
  @endphp

  @if (isset($_SESSION['way'])) 

     <div class="row">

      <div class="col-md-6" >
        <p>Current Way:{{ $way->township }}</p>
      </div>
      <div class="col-md-6" >
         <a class="btn btn-success btn-sm changeWay">Change Way</a>
      </div>
      </div>

    <div class="row" id="customer">
    <div class="col-md-12">

      <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Customers List</h4>
          </div>
      </div>
      

    <div class="table-responsive mt-3">
      <table class="table table-bordered datatable"  id="customertable" >
          <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Shop Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody">
          @php
          $j=0;
          @endphp

          @foreach($customers as $customer)
            <tr class="table-info">
              <td> {{ ++$j}}</td>
              <td> {{ $customer->shop_name }} </td>
              <td>{{ $customer->phone }}</td>
              <td>{{ $customer->address }}</td>   
              <td>
                 <a href="{{ route('productpage') }}" class="btn btn-success btn-sm">Choose</a>

              </td>
            </tr>
          @endforeach
       
        </tbody>
      </table>
    </div>

  </div>
</div>
     
  @else
  <div class="row" id="way">

    <div class="col-md-12" >

      <div class="tile">
        <div class="tile-body">
          <h4 class="d-inline-block">Ways List</h4>
        </div>
      </div>
      
      <div class="table-responsive mt-3">
        <table class="table table-bordered datatable" id="waytable">

          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Township</th>
              <th>Road</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($ways as $way)
            <tr>
              <td>{{$i++  }}</td>
              <td>{{ $way->township }}</td>
              <td>{{ $way->road }}</td>
              <td>
                <a class="btn btn-warning btn-sm chooseWay" data-id="{{$way->id}}">Choose</a>
              </td>   
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>


  <div class="row" id="customer" style="display: none;">
    <div class="col-md-12">

      <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Customers List</h4>
          </div>
      </div>
      

    <div class="table-responsive mt-3">
      <table class="table table-bordered datatable"  id="customertable" >
          <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Shop Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="appendcustomer">
          <tr></tr>
       
        </tbody>
      </table>
    </div>

  </div>

</div>
@endif
</div>




@endsection

@section('script')
<script type="text/javascript">


  $(document).ready(function(){

   // $('#customer').hide();

   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
    $(document).on('click','.chooseWay',function(){
      var id=$(this).data('id');

      setSession('way',id,'{{route('session')}}');
    $.ajax({
                url:'{{route('getCustomerpage')}}',
                method:"GET",
                data:{id:id},
                success:function(data){
                  // console.log(data);
                  var html='';
                  if(data){
                    var array=JSON.parse(data);
                    var no=1;
                    array.forEach(function(v,i){

                    html+=`<tr>
                         <td>${no++}</td>
                         <td>${v.shop_name}</td>
                         <td>${v.phone}</td>
                         <td>${v.address}</td>
                         <td><a href="{{ route('productpage') }}" class="btn btn-warning btn-sm chooseCustomer" data-id="{{$way->id}}">Choose</a></td>
                       </tr>`
                    });

                    $('#appendcustomer').append(html);
                    $('#customer').show(500);
                    $('#way').hide(500);
                  }

                  }
            });

    });

    $(document).on('click','.changeWay',function(){
    
      // alert('OK');
      endSession('way','','{{route('session')}}');

});

  function setSession(key,value,url){
        $.ajax({
            url:url,
            method:"GET",
            data:{key:key,value:value},
            success:function(data){
            }
        });
    }

    function endSession(key,value,url){
        $.ajax({
            url:url,
            method:"GET",
            data:{key:key,value:value},
            success:function(data){
              if(data){
                location.href='{{route('salespage')}}';

              }
            }
        });
    }

});

</script>

@endsection
