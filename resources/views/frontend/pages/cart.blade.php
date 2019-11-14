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
      <div class="col-md-12">
        <h2>Cart Page</h2>

        <table class="table table-striped">
          
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl No.</th>
              <th scope="col">Product Title</th>
              <th scope="col">Product Image</th>
              <th scope="col">Product Quantity</th>
              <th scope="col">Product Price</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>

          <tbody>
            @php
            $total= 0;
            @endphp
            @foreach (App\Cart::totalCarts() as $cart)
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              <td>{{ $cart->product->title }}</td>
              <td>
                @if( $cart->product->images->count() > 0 )
                  <img src="{{ asset('image/product-image/' . $cart->product->images->first()->image ) }}" width="100">
                @endif
              </td>
              
              <td>
                <form action="{{route('carts.update', $cart->id ) }}" method="POST">
                  @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </form>
              </td>
              <td>
                {{ $cart->product->price }}
              </td>
              <td>
                @php
                $total += $cart->product->price * $cart->product_quantity;
  
                @endphp
                {{ $cart->product->price * $cart->product_quantity }} Taka
              </td>
              <td>
                <form action="{{ route('carts.delete', $cart->id ) }}" method="POST">
                  @csrf
                  <input type="hidden" name="cart_id">
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>

            @endforeach
            <tr>
              <td colspan="5" style="text-align: center"><h3>Total Ammount</h3></td>
              <td><strong> {{ $total}}</strong></td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td colspan="1"><a href="{{ route('products') }}" class="btn btn-dark">Continue to Shopping?</a></td>
              <td colspan="2"><a href="{{ route('checkouts.index') }}" class="btn btn-dark">Proced to checkout</a></td>
            </tr>
            
          </tbody>
        </table>

      </div>
    </div>
  </div>




  @endsection