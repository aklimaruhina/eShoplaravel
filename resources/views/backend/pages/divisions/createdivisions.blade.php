@extends('backend.layouts.maintemplate')

@section('adminbodycontent')

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Add New Division</h1>

		<div class="row">
			<div class="col-md-12">
				
				<div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">Add New Division</h6>
	                </div>

	                <div class="card-body">
	                  
	                	<form action="{{ route('admin.divisions.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                		@include ('backend.allinfo.messages')

	                		<div class="form-group">
	                			<label for="title">Division Name</label>
	                			<input type="text" name="name" class="form-control" placeholder="Division Name">
	                		</div>

	                		<div class="form-group">
	                			<label for="description">Priority Number in List</label>
	                			<input type="text" name="priority" class="form-control" placeholder="Priority Number for the Display List">
	                		</div>

	                		<div class="form-group">
	                			<input type="submit" name="addDivision" value="Add Division" class="btn btn-primary btn-block">
	                		</div>
	                	</form>

	                </div>
              </div>

			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

@endsection