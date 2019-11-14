@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
  <div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Manage All Category</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View /Update / Delete Individual Category</h6>
          </div>
          <div class="card-body">
            <table class="table table-stripped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Category Description</th>
                  <th scope="col">Parent Category</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($categories as $category)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{ $category->name}}</td>
                  <td>{{ $category->desc}}</td>
                  <td>
                    @if($category->parent_id == NULL)
                      Primary Category
                    @else
                      {{ $category->parent->name }}
                    @endif
                  </td>
                  <td>
                    @if($category->image == NULL)
                      No thumbnail
                    @else
                      <img src="{{asset('image/category-image/'.$category->image) }}" alt="" width="120px">
                    @endif
                      </td>
                  <td><div class="button-group">
                    <a href="{{ route('editcategory',$category->id)}}" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecategory">Delete</a>
                    <div class="modal fade" id="deletecategory" tabindex="-1" role="dialog" aria-lebelledby="deletelebel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">
                              Are you Sure to delete the Category?
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>

                          </div>
                          <div class="modal-body">
                            <form action="{{route('deletecategory', $category->id)}}" method="POST">
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