@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Product</h1>
          </div>
     <div class="row">
     	<div class="col-sm-12">
			<div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload The Product With Proper Information</h6>
                  
                </div>
                <div class="card-body">
                  @include('backend.allinfo.messages')
                  
                  <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                	

                		    @csrf
                		<div class="form-group"><label for="title">Title</label><input type="text" name = 'title' class="form-control" placeholder="Product title"></div>
                		<div class="form-group"><label for="description">Description</label>
                			<textarea name="description" cols="6" rows="10" class="form-control"></textarea>

</div>                		<div class="form-group"><label for="quantity">Quantity</label><input type="text" class="form-control" name="quantity" placeholder="Quantity"></div>
                		<div class="form-group">
                      <label for="category">Category</label>
                      
                      <select class="form-control" name="category_id">
                          <option value="">Please Select a Category for the Product</option>
                          @foreach( App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent )
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            
                            @foreach( App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id )->get() as $child )
                              <option value="{{ $child->id }}">--> {{ $child->name }}</option>
                            @endforeach

                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="brand_id">Brand</label>
                      <select name="brand_id" id="" class="form-control">
                        <option>Select Product Brand</option>
                        @foreach(App\Brand::orderBy('name', 'asc')->get() as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name}}</option>
                        @endforeach
                      </select>  
                    </div>
                    <div class="form-group"><label for="price">Price</label><input type="text" class="form-control" name="price" placeholder="Price"></div>
                		<div class="form-group"><label for="offer_price">Offer Price</label><input type="text" class="form-control" name="offer_price" placeholder="Offer Price"></div>
                		<div class="form-group"><label for=""></label>
                			<select name="status" id="status" class="form-control">
                				<option value="0">Inactive</option>
                				<option value="1">Active</option>
                			</select>
                		</div>
                    <p>Upload photo here </p>
                    <div class="form-group">
                      <label for="product_image">Upload Product</label>
                      <input type="file"  name="product_image[]">
                    </div>
                    <div class="form-group">
                      <label for="product_image">Upload Product</label>
                      <input type="file"  name="product_image[]">
                    </div>
                    <div class="form-group">
                      <label for="product_image">Upload Product</label>
                      <input type="file"  name="product_image[]">
                    </div>
                    <div class="form-group">
                      <label for="product_image">Upload Product</label>
                      <input type="file"  name="product_image[]">
                    </div>
                    <div class="form-group">
                      <label for="product_image">Upload Product</label>
                      <input type="file"  name="product_image[]">
                    </div>
                		<!-- <div class="form-group"><label for=""></label><input type="text" class="form-control" name="" placeholder=""></div> -->
                		<!-- <div class="form-group"><label for=""></label><input type="text" class="form-control" name="" placeholder=""></div> -->
                		<div class="form-gropu">
                			<input type="hidden" name="admin_id" value="1">
                			<button type="submit" class="btn btn-primary">Create Product</button>
                		</div>
                	</form>
                </div>
            </div>     		
     	</div>
     </div>
  @endsection