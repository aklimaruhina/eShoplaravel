@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
  <div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Manage All Product</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View /Update / Delete Individual Product</h6>
          </div>
          <div class="card-body">
            <table class="table table-stripped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Title</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Category</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Product Quantity</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($products as $product)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{ $product->title}}</td>
                  <td>{{ $product->price}}</td>
                  <td>{{ $product->category->name}}</td>
                  <td>{{ $product->brand->name}}</td>
                  <td>{{ $product->quantity}}</td>
                  <td><div class="button-group">
                    <a href="{{ route('editproduct',$product->id)}}" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteproduct{{ $product->id}}">Delete</a>
                    <div class="modal fade" id="deleteproduct{{ $product->id}}" tabindex="-1" role="dialog" aria-lebelledby="deletproductlebel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">
                              Are you Sure to delete the product?
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>

                          </div>
                          <div class="modal-body">
                            <form action="{{route('deleteproduct', $product->id)}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-primary" >Save Changes</button>
                              <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                                
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div></td>
                </tr>
                @php
                $i++;
                @endphp
                @endforeach

              </tbody>
            </table>    
          </div>
        </div>
      </div>
    </div>
  </div>
     
  @endsection