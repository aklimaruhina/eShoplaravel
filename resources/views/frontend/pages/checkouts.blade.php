@extends('frontend.layouts.maintemplate')

  @section('bodycontent')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <ul class="breadcrumb">
        <li><a href="{{ route( 'index') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('carts.index') }}">Cart Page</a></li>
        <li><a href="{{ route('checkouts.index') }}">Checkout</a></li>
      </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total confirm Items</h5>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Product Title</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach (App\Cart::totalCarts() as $cart)
                <tr>
                  <td>
                    <h4>{{ $cart->product->title}}</h4>
                  </td>
                  <td>
                    <h4>{{ $cart->product_quantity}} Pcs</h4>
                  </td>
                  <td>
                    <h4>{{ $cart->product->price }} /= BDT</h4>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div>
              <div class="card" style="width: 38rem;float:right">
                <div class="card-body">
                  <h5 class="card-title">Total Amount</h5>
                  <p class="card-text">
                    @php
                    $total = 0;
                    @endphp
                    @foreach (App\Cart::totalCarts() as $cart)
                    @php
                      $total += $cart->product->price * $cart->product_quantity;
      
                    @endphp
                    @endforeach
                    Total Price: <strong>{{ $total }} BDT</strong>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <h1 style="text-align:center">Shipping Address</h1>
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ Auth::check() ? Auth::user()->first_name : '' }}" required autofocus>

          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ Auth::check() ? Auth::user()->last_name : '' }}" required autofocus>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autofocus>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ Auth::check() ? Auth::user()->phone : '' }}" required autofocus>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ Auth::check() ? Auth::user()->address : '' }}" required autofocus>
          </div>
          <div class="form-group">
            <label for="payment">Payment Method</label>
            <select name="payment_method" id="" class="form-control">
              <option value="0">Select payment Method</option>
              <option value="1">Cash on delivery</option>
              <option value="2">Bank Transfer</option>
              <option value="3">Bikash payment</option>
              <option value="4">Rocket Payment</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Place your Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>




  @endsection