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
            <table class="table table-stripped data-table">
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
               
              </tbody>
            </table>    
          </div>
        </div>
      </div>
    </div>
  </div>

     
  @endsection
  @section('script')
  <script>
    $(function () {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxcategory.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'desc', name: 'desc'},
            {data: 'cat_name', name: 'cat_name', orderable: false, searchable: false},
            
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('body').on('click', '.editProduct', function () {
      var cat_id = $(this).data('id');
      
   });
  });

  </script>
  @endsection