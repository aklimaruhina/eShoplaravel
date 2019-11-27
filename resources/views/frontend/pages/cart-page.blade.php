@extends('frontend.layouts.maintemplate')

  @section('bodycontent')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <ul class="breadcrumb">
        <li><a href="{{ route( 'index') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('carts.index') }}">Cart Page</a></li>
      </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-9" id="content">
        <h1>Shopping Cart                &nbsp;(10.00kg) </h1>
        <form enctype="multipart/form-data" method="post" action="#">
           <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td class="text-center">Image</td>
                  <td class="text-left">Product Name</td>
                  <td class="text-left">Model</td>
                  <td class="text-left">Quantity</td>
                  <td class="text-right">Unit Price</td>
                  <td class="text-right">Total</td>
                </tr>
              </thead>
              <tbody>
                @foreach(Cart::getContent() as $product)
                <tr>
                  @if( $product->attributes->has('image') )
                        
                    <td class="text-center"><img src="{{ asset('image/product-image/' . $product->attributes->image ) }}" alt="" width="100" class="image-thumbnail"></td>
                        
                  @endif
                <!--   <td class="text-center">
                    <a href="product.html">
                      <img class="img-thumbnail" title="women's New Wine is an alcoholic" alt="women's New Wine is an alcoholic" src="image/product/2product50x59.jpg">
                    </a>
                  </td> -->
                  <td class="text-left"><a href="">{{$product->name }}</a></td>
                  <td class="text-left">product 11</td>
                  <td class="text-left"><div style="max-width: 200px;" class="input-group btn-block">
                      <input type="text" class="form-control quantity" size="1" data-id ="{{ $product->id}}" value="{{ $product->quantity}}" name="quantity">
                      <span class="input-group-btn">
                      <button  class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                      </span></div></td>
                  <td class="text-right">Taka. {{ $product->price}}</td>
                  <td class="text-right">Taka. {{ $product->price}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
           </div>
        </form>
        <h2>What would you like to do next?</h2>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        <div id="accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#collapse-coupon">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapse-coupon">
              <div class="panel-body">
                <label for="input-coupon" class="col-sm-3 control-label">Enter your coupon here</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                  <span class="input-group-btn">
                  <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                  </span></div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-voucher">Use Gift Voucher <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapse-voucher">
              <div class="panel-body">
                <label for="input-voucher" class="col-sm-3 control-label">Enter your gift voucher code here</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">
                  <span class="input-group-btn">
                  <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
                  </span> </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="text-right"><strong>Sub-Total:</strong></td>
                  <td class="text-right">Taka{{ Cart::getSubTotal()}}</td>
                </tr>
                <!-- <tr>
                  <td class="text-right"><strong>Eco Tax (-2.00):</strong></td>
                  <td class="text-right">$2.00</td>
                </tr> -->
              
                <tr>

                  <td class="text-right"><strong>VAT (20%):</strong></td>
                  <td class="text-right">Taka.  @php
                    $cartConditions = Cart::getConditions();

                    foreach($cartConditions as $condition)
                    {
                        
                        echo $condition->getValue(); // the value of the condition
                    }
                   @endphp
                  </td>
                </tr>
                <tr>
                  <td class="text-right"><strong>Total:</strong></td>
                  <td class="text-right">Taka. <span class="total_vl">{{ Cart::getTotal() }}</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="buttons">
          <div class="pull-left"><a class="btn btn-default" href="{{ route('products')}}">Continue Shopping</a></div>
          <div class="pull-right"><a class="btn btn-primary" href="{{ route('checkouts.index')}}">Checkout</a></div>
        </div>
      </div>
    </div>
  </div>




  @endsection
  @section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.quantity').on('change', function(){
      var qty = $(this).val();
      var product_id = $(this).data('id');
      $.ajax({
            type: "POST",
            url: "/carts/cart-updateqty",
            data: {"_token": "{{ csrf_token() }}", "product_id": product_id, "qty": qty},
            dataType: 'json',
            success: function(data){
              $('.total_vl').html(data.total);
              $('.totalItems').html(data.totalItems);
              $('.subtotal').html(data.subtotal);
            }
          });
    })
  })
  </script>  
  @endsection