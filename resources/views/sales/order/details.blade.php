@extends('sales.master')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Products</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Selected Product Lists</h4>
            <a class="btn btn-success float-right confirm">Confirm</a>
            

            <div class="table-responsive mt-3">
              <table class="table table-bordered" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                 
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

   
    function showItem(){
      // alert("OK");
      itemList=localStorage.getItem("item");

      if(itemList){
        itemArray=JSON.parse(itemList);
        var html="";
        var number=0;
        var subtotal=0;
        var total=0;

        itemArray.forEach(function(v,i){
          number+=1;
          subtotal=parseInt(v.price*v.qty);
            
          
            html+=`<tr>
            <td>${number}</td>
            <td>${v.name}</td>
            <td><p> ${v.qty}</p></td>
            <td><p> #</p></td>
            <td><p> ${v.price} Ks</p></td>
            <td>${subtotal} Ks</td>
            </tr>`
            total+=subtotal;
       });
        
        html+=`<tr>
        <td colspan="8">
        <h3 class="text-right">Total: ${total} Ks</h3>
        </td>
        </tr>`
        $('tbody').html(html);
        
       } 
      
}
       showItem();

       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      $(document).on('click','.confirm',function(){

        // alert("Order Confirmed!");

        var item=localStorage.getItem('item');   
        var itemArray=JSON.parse(item);
        // var customer=${itemArray[0].customer};
        var total=itemArray.reduce((acc,row)=>acc+(row.price*row.qty),0);
        // alert(total);

        // var id="check";
          $.post("{{route('orders.store')}}", { 
            item:item,
            total:total
             
        },function (response) {
         if(response=='Order Successful'){
           localStorage.clear();
           location.href = "{{ route('ordersuccesspage') }}";
           // alert(response);

         }


        });

});
   

});

</script>

@endsection


