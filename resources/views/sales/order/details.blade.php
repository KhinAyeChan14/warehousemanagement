@extends('sales.master')

@section('content')
  <main class="main-panel">

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Selected Products List to Order</h4>
            <a class="btn btn-success float-right confirm">Confirm</a>

            <div class="table-responsive mt-3">
              <table class="table table-bordered datatable">
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Units of Measure</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="selectedlist">
                  
                </tbody>
              </table>
            </div>


          </div>
        </div>
      </div>   
    </div>    
  </main>
@endsection

@section('script')

<script type="text/javascript">
 
  $(document).ready(function(){


      itemList=localStorage.getItem("item");

      if(itemList){
        itemArray=JSON.parse(itemList);
        var html="";
        var number=0;
        var total=0;
        var subtotal=0;

        itemArray.forEach(function(v,i){
          number+=1;
          total=parseInt(v.price*v.qty);
            
          
            html+=`<tr>
            <td><button class="btn btn-outline-danger btnRemove btn-sm" style="border-radius: 50%"> 
            <i class="icofont-close-line"></i> </button> </td>
            <td>${v.name}</td>
            <td><p> ${v.qty}</p></td?
            <td><p>${v.uom}</p></td>
            <td><p> ${v.price} Ks</p></td>
            <td>${total} Ks</td>
            </tr>`

         
         
          subtotal+=total;
       });
        
        html+=`<tr>
        <td colspan="8">
        <h3 class="text-right">Total: ${subtotal} Ks</h3>
        </td>
        </tr>`
        $('tbody').html(html);
        
       } 

       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

       $('.confirm').on('click',function(){

        // alert("Check out");

        var item=localStorage.getItem('item');   
        var itemArray=JSON.parse(cart);
        var total=itemArray.reduce((acc,row)=>acc+(row.price*row.qty),0);
        alert(total);

        var id="check";
        $.post("{{route('orders.store')}}", { 
         item:item,
         total:total
             
        },function (response) {
         if(response=='Order Successful'){
           localStorage.clear();
           location.href = "{{ route('ordersuccesspage') }}";
           alert(response);

         }


        });

});
   


</script>

@endsection


