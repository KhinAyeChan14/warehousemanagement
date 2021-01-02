@extends('master')

@section('sidebarmenu')

<ul class="nav">
	<li class="nav-item nav-profile">
		<a href="#" class="nav-link">
			<div class="nav-profile-image">
				<img src="assets/images/faces/face1.jpg" alt="profile">
				<span class="login-status online"></span>
				<!--change to offline or busy as needed-->
			</div>
			<div class="nav-profile-text d-flex flex-column">
				<span class="font-weight-bold mb-2">David Grey. H</span>
				<span class="text-secondary text-small">Warehouse Admin</span>
			</div>
			<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('adminpage') }}">
			<span class="menu-title">Dashboard</span>
			<i class="mdi mdi-home menu-icon"></i>
		</a>
	</li>
	
	<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
      <span class="menu-title">Products Details</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-medical-bag menu-icon"></i>
    </a>
    <div class="collapse" id="general-pages">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('price_stocks.index') }}">
            <span class="menu-title">Products</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('price_stocks.index') }}">
            <span class="menu-title">Categories</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('price_stocks.index') }}">
            <span class="menu-title">Subcategories</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('price_stocks.index') }}">
            <span class="menu-title">Brands</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('price_stocks.index') }}">
            <span class="menu-title">Price</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('price_stocks.index') }}">
            <span class="menu-title">Stock</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
      </ul>
    </div>
  </li>
	<li class="nav-item">
		<a class="nav-link" href="pages/charts/chartjs.html">
			<span class="menu-title">Orders</span>
			<i class="mdi mdi-chart-bar menu-icon"></i>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="pages/tables/basic-table.html">
			<span class="menu-title">Customers</span>
			<i class="mdi mdi-table-large menu-icon"></i>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="pages/tables/basic-table.html">
			<span class="menu-title">Ways</span>
			<i class="mdi mdi-table-large menu-icon"></i>
		</a>
	</li>

	</ul>

@endsection

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> Basic Tables </h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Tables</a></li>
					<li class="breadcrumb-item active" aria-current="page">Basic tables</li>
				</ol>
			</nav>
		</div>

		<div class="row">

			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Striped Table</h4>
						<p class="card-description"> Add class <code>.table-striped</code>
						</p>
						<table class="table table-striped">
							<thead>
								<tr>
									<th> User </th>
									<th> First name </th>
									<th> Progress </th>
									<th> Amount </th>
									<th> Deadline </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
									</td>
									<td> Herman Beck </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $ 77.99 </td>
									<td> May 15, 2015 </td>
								</tr>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
									</td>
									<td> Messsy Adam </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $245.30 </td>
									<td> July 1, 2015 </td>
								</tr>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
									</td>
									<td> John Richards </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $138.00 </td>
									<td> Apr 12, 2015 </td>
								</tr>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
									</td>
									<td> Peter Meggik </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $ 77.99 </td>
									<td> May 15, 2015 </td>
								</tr>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
									</td>
									<td> Edward </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $ 160.25 </td>
									<td> May 03, 2015 </td>
								</tr>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
									</td>
									<td> John Doe </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $ 123.21 </td>
									<td> April 05, 2015 </td>
								</tr>
								<tr>
									<td class="py-1">
										<img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
									</td>
									<td> Henry Tom </td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</td>
									<td> $ 150.00 </td>
									<td> June 16, 2015 </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->


@endsection