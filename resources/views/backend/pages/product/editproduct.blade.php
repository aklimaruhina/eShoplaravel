@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update existing Product</h1>
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
                  
                  <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                	@csrf
                		<div class="form-group"><label for="title">Title</label>
                      <input type="text" name='title' class="form-control" value="{{ $product->title}}"></div>
                		<div class="form-group"><label for="description">Description</label>
                			<textarea name="description" cols="6" rows="10" class="form-control">{{ $product->description}}</textarea>

</div>                		<div class="form-group"><label for="quantity">Quantity</label>
<input type="text" class="form-control" name="quantity" value="{{ $product->quantity}}"></div>
                		<div class="form-group"><label for="price">Price</label>
                      <input type="text" class="form-control" name="price" value="{{$product->price}}"></div>
                		<div class="form-group"><label for="offer_price">Offer Price</label>
                      <input type="text" class="form-control" name="offer_price" value="{{$product->offer_price }}"></div>
                		<div class="form-group"><label for=""></label>
                			<select name="status" id="status" class="form-control">
                				<option value="0" {{$product->status === 0 ? 'selected' : ''}}>Inactive</option>
                				<option value="1" {{$product->status === 1 ? 'selected' : ''}}>Active</option>
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
                			<button type="submit" class="btn btn-primary">Update Product</button>
                		</div>
                	</form>
                </div>
            </div>     		
     	</div>
     </div>
  @endsection