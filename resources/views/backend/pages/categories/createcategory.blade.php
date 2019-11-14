@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Category</h1>
          </div>
     <div class="row">
     	<div class="col-sm-12">
			<div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
<!--                   <h6 class="m-0 font-weight-bold text-primary">Upload The Product With Proper Information</h6>
 -->                  
                </div>
                <div class="card-body">
                  @include('backend.allinfo.messages')
                  
                  <form action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
                	

                		    @csrf
                		<div class="form-group"><label for="title">Category Name</label><input type="text" name = 'name' class="form-control" placeholder="Product title"></div>
                		<div class="form-group"><label for="description">Category Description</label>
                			<textarea name="desc" cols="6" rows="10" class="form-control"></textarea>
                    </div>          
                    <div class="form-group">
                      <label for="parent_category">Parent Category</label>
                      <select name="parent_id" class="form-control">
                        <option value="">Select Your own category</option>
                        @foreach($primary_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name}} </option>
                        @endforeach
                      </select>
                    </div>      		

                    <p>Upload photo here </p>
                    <div class="form-group">
                      <label for="product_image">Upload Image</label>
                      <input type="file"  name="category_image">
                    </div>
                    
                		<div class="form-group">
                			<button type="submit" class="btn btn-primary">Create Category</button>
                		</div>
                	</form>
                </div>
            </div>     		
     	</div>
     </div>
  @endsection