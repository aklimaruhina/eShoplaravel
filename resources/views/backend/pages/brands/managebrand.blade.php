@extends('backend.layouts.maintemplate')

@section('adminbodycontent')

  <div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Manage All Brand</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View /Update / Delete Individual Brand</h6>
          </div>
          <div class="card-body">
            <!-- @include('backend.allinfo.messages') -->
            <table class="table table-stripped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Brand Name</th>
                  <th scope="col">Brand Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($brands as $brand)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{ $brand->name}}</td>
                  <td>{{ $brand->desc}}</td>
                  <td>
                    @if($brand->image)
                    <img src="{{asset('image/brand-image/'.$brand->image) }}" alt="" width="120px">
                    @else
                    <p>No thumbnail</p>
                    @endif
                  </td>
                  <td><div class="button-group">
                    <a href="{{ route('editbrand',$brand->id)}}" class="btn btn-primary">Edit</a>
                    <!-- Brand Delete Button -->
                        <a href="#deleteBrand{{ $brand->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteBrand{{ $brand->id }}">Delete</a>

                        <!-- Brand Delete Modal Content Start -->
                    <div class="modal fade" id="deleteBrand{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete The Brand?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                            <form action="{{ route('admin.brand.delete', $brand->id) }}" method="POST">

                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-block">Confirm Delete</button>
                            </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                        <!-- Brand Delete Modal Content END -->
                    
                  </div>
                </td>
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