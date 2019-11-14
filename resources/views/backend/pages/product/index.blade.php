@extends('backend.layouts.maintemplate')


  @section('adminbodycontent')
  <div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Manage All Product</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">View /Update / Delete Individual Product</h6>
          </div>
          <div class="card-body">
            <table class="table table-stripped product-table">
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
    var table = $('.product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxproduct.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'price', name: 'price'},
            {data: 'cat_name', name: 'category.name'},
            {data: 'brand_name', name: 'brand.name'},
            {data: 'quantity', name: 'quantity'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
        }
    });

     $(".deleteProduct").click(function() {
       var id = $(this).data("id");
       confirm("Are You sure want to delete !");
       $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxproduct.delete') }}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
  });

  </script>
  @endsection