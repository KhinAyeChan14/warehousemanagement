@extends('master')
@extends('admin.admin')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Catgories</h1>  
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
         
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            	<h4>Categories List</h4>
            	<a href="{{route('categories.create')}}" class="btn btn-success float-right mb-3">Add New</a>
              <div class="table-responsive">

              		<table class="table table-bordered" >
			     			<thead class="thead-dark">
			     			<tr>
			     				<th>#</th>
			     				<th>Name</th>
			     				<th>Photo</th>
                  				{{-- <th>Item Count</th> --}}
			     				<th>Action</th>
			     			</tr>
						    </thead>
			     			<tbody>
               				 @php $i=1; @endphp
			     			@foreach($categories as $category)
			     			<tr>
			     				<td>{{ $i++ }}</td>
			     				<td>{{ $category->name }}</td>
			     				<td><img src="{{asset($category->logo)  }}" width="100" ></td>
                  				{{-- <td>{{ count($category->items) }}</td> --}}
			     				<td>
			     					<a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning">Edit</a>
				                    <form method="post" action="{{ route('categories.destroy',$category->id) }}" onsubmit="return confirm('Are you sure')" class="d-inline-block">
				                      @csrf
				                      @method('DELETE')
				                      <input type="submit" name="btnsubmit" class="btn btn-danger" value="Delete">
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