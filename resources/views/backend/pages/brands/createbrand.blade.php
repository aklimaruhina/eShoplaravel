@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create New Brand</h1>
    </div>
    <div class="row">
     	<div class="col-sm-12">
			<div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">           
                </div>
                <div class="card-body">
                  @include('backend.allinfo.messages')
                  
                  <form action="{{ route('store_brand') }}" method="POST" enctype="multipart/form-data">
                		    @csrf
                		<div class="form-group">
                      <label for="title">Brand Name</label>
                      <input type="text" name = 'name' class="form-control" placeholder="Brand Name">
                    </div>
                		<div class="form-group">
                      <label for="description">Brand Description</label>
                			<textarea name="desc" cols="6" rows="10" class="form-control"></textarea>
                    </div>      		

                    <p>Upload photo here </p>
                    <div class="form-group">
                      <label for="brand_image">Upload Image</label>
                      <input type="file"  name="brand_image">
                    </div>
                    
                		<div class="form-group">
                			<button type="submit" class="btn btn-primary">Create Brand</button>
                		</div>
                	</form>
                </div>
            </div>     		
     	</div>
     </div>
  @endsection