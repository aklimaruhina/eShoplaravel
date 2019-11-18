@extends('frontend.layouts.maintemplate')


@section('bodycontent')


<div class="container">
  <ul class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="category.html">Electronics</a></li>
  </ul>
  <div class="row">



  	<!-- Product Left Sidebar -->
    @include('frontend.includes.product-sidebar')




    <div id="content" class="col-sm-9">
      <h2 class="category-title">Desktops</h2>
      <div class="row category-banner">
        <div class="col-sm-12 category-image"><img src="image/banners/category-banner.jpg" alt="Desktops" title="Desktops" class="img-thumbnail" /></div>
        <div class="col-sm-12 category-desc">Lorem ipsum dolomagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</div>
      </div>
      <div class="category-page-wrapper">
        <div class="col-md-6 list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
          <a href="#" id="compare-total">Product Compare (0)</a> </div>
        <div class="col-md-1 text-right page-wrapper">
          <label class="control-label" for="input-limit">Show :</label>
          <div class="limit">
            <select id="input-limit" class="form-control">
              <option value="8" selected="selected">8</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
        </div>
        <div class="col-md-2 text-right sort-wrapper">
          <label class="control-label" for="input-sort">Sort By :</label>
          <div class="sort-inner">
            <select id="input-sort" class="form-control">
              <option value="ASC" selected="selected">Default</option>
              <option value="ASC">Name (A - Z)</option>
              <option value="DESC">Name (Z - A)</option>
              <option value="ASC">Price (Low &gt; High)</option>
              <option value="DESC">Price (High &gt; Low)</option>
              <option value="DESC">Rating (Highest)</option>
              <option value="ASC">Rating (Lowest)</option>
              <option value="ASC">Model (A - Z)</option>
              <option value="DESC">Model (Z - A)</option>
            </select>
          </div>
        </div>
      </div>
      <br />



      <div class="grid-list-wrapper">
        <div id="messages"></div>
      	@foreach( $products as $product )


      		<!-- Single Product Item Start -->
	        <div class="product-layout product-list col-xs-12">
	          <div class="product-thumb">

	            <div class="image product-imageblock"> 
	            		<a href="{{ route('show_product', $product->slug ) }}"> 
                    @php $i = 1; @endphp
                    @foreach($product->images as $image)
                    @if($i > 0)
                    <img src="{{ asset('image/product-image/' . $image->image ) }}" alt="" class="img-responsive" /> 
                  
                    @endif
                    @php 
                    $i--;
                    @endphp
                    @endforeach
	            			</a>
                
		            <div class="button-group">
		                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
		                @include('frontend.pages.products.partials.cart_button')
		                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
		            </div>
	            </div>

	            <div class="caption product-detail">
	              <!-- Product Name -->
	              <h4 class="product-name"> 
                  <a href="{{ route('show_product', $product->slug)}}" title=""> {{ $product->title }} </a> </h4>

	              <!-- Product Description -->
	              <p class="product-desc"> {{ $product->description }} </p>

	              <!-- Product Price -->
	              <p class="price product-price">
                  @if(is_null($product->offer_price))
                    <span class="price-old"></span> 
                     ৳ {{ $product->price }}
                  @else
  	              	<span class="price-old">{{ $product->price }}</span> 
  	              	 ৳ {{ $product->offer_price }}
                  @endif
	              </p>


	              <div class="rating"> 
	              	<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
	              	<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
	              	<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
	              	<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
	              </div>

	            </div>

	            <div class="button-group">
	              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                <!-- @include('frontend.pages.products.partials.cart_button') -->
                <!-- <button type="submit" class="addtocart-btn">Add to Cart</button> -->
                <a class="addtocart-btn" id="AddItemToCart" href="javascript:void(0);" tabindex="5"> Add Item To Cart</a>
	              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
	            </div>

	          </div>
	        </div>
	        <!-- Single Product Item End -->


      	@endforeach


      </div>
      <div class="paginate">
        {{ $products->links()}}
      </div>

    </div>
  </div>
</div>



@endsection
@section('script')
<script>
  $(document).ready(function(){


    function btnAddCart(param) {
  var product_id = param;
  var url = "{{ route('cart.add') }}";
  $.ajax({
    type: "POST",
    url: url,
    data: { product_id: product_id },
    success: function (data) {
      console.log(data);

    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
};
  })
</script>
@endsection

