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
        <div class="row">
          <div class="col-sm-6">
            <div class="thumbnails">
              
              <!-- Product Gallery Start -->
              <div>
               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    
                    @php $i=1  @endphp
                    @foreach( $product->images as $image )
                    <div class="item {{ $i==1 ? 'active' : '' }}">
                      <img src="{{ asset('image/product-image/' . $image->image) }}" alt="{{ $product->title }}">
                    </div>
                    @php $i++  @endphp
                    @endforeach

                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>


              </div>
              <!-- Product Gallery End -->

              
            </div>
          </div>


          <div class="col-sm-6">
            <h1 class="productpage-title">{{ $product->title }}</h1>

            <div class="rating product"> 
              <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-1x"></i>
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span> 
              <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-1x"></i>
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span> 
              <span class="fa fa-stack">
                <i class="fa fa-star fa-stack-1x"></i>
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span> 
              <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span> 
              <span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span> 
              <span class="review-count"> 
                <a href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / 
                <a href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
              </span>
              <hr>
              <!-- AddThis Button BEGIN -->
              <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_like"></a> 
                <a class="addthis_button_tweet"></a> 
                <a class="addthis_button_pinterest_pinit"></a> 
                <a class="addthis_counter addthis_pill_style"></a>
              </div>
              <!-- AddThis Button END -->
            </div>

            <ul class="list-unstyled productinfo-details-top">
              <li>
                <h2 class="productpage-price">৳ {{ $product->price }}</h2>
              </li>
            </ul>
            <hr>
            <ul class="list-unstyled product_info">
              <li>
                <label>Brand:</label>
                <span> <a href="#">Apple</a></span></li>
              <li>
                <label>Product Code:</label>
                <span> product 20</span></li>
              <li>
                <label>Availability:</label>

                {{ $product->quantity < 1 ? 'This Product is Out Of Stock' : $product->quantity . ' Pcs in Stock' }}

                
            </ul>
            <hr>
            <p class="product-desc">
              {{ $product->description }}
            </p>

            <div id="product">
              <div class="form-group">
                <label class="control-label qty-label" for="input-quantity">Qty</label>
                <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control productpage-qty">
                <input type="hidden" name="product_id" value="48">
                <div class="btn-group">
                  <button type="button" data-toggle="tooltip" class="btn btn-default wishlist" title="" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart">Add to Cart</button>
                  <button type="button" data-toggle="tooltip" class="btn btn-default compare" title="" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="productinfo-tab">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab" aria-expanded="true">Description</a></li>
            <li class=""><a href="#tab-review" data-toggle="tab" aria-expanded="false">Reviews (1)</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-description">
              <div class="cpt_product_description ">
                <div>
                  {{ $product->description }}
                </div>
              </div>
              <!-- cpt_container_end --></div>

            <div class="tab-pane" id="tab-review">
              <form class="form-horizontal">
                <div id="review"></div>
                <h2>Write a review</h2>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-name">Your Name</label>
                    <input type="text" name="name" value="" id="input-name" class="form-control">
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-review">Your Review</label>
                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label">Rating</label>
                    &nbsp;&nbsp;&nbsp; Bad&nbsp;
                    <input type="radio" name="rating" value="1">
                    &nbsp;
                    <input type="radio" name="rating" value="2">
                    &nbsp;
                    <input type="radio" name="rating" value="3">
                    &nbsp;
                    <input type="radio" name="rating" value="4">
                    &nbsp;
                    <input type="radio" name="rating" value="5">
                    &nbsp;Good</div>
                </div>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>      

      </div>

      
    </div>
  </div>
  </div>
</div>



@endsection

