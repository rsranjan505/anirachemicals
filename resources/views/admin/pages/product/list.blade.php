@extends('admin.layouts.base')

@section('content')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin/components/header-nav/product-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <a href="{{ url('admin/product/export')}}" style="float:right;" class="btn btn-success btn-rounded btn-icon-text"> <i class="ti-file btn-icon-prepend"></i></i>Export Products</a>
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">User List</h4>
                            </p>
                            <div class="table-responsive">
                                <table class="table product-table">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Product Brand</th>
                                        <th>Product Form</th>
                                        <th>Created Date</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> --}}

<script type="text/javascript">
    $(function () {

      var table = $('.product-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('product-list') }}",
          columns: [
            {
                data: "DT_RowIndex",
                name: "SL No",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {data: 'Product Name', name: 'Product Name'},
            {data: 'Product Code', name: 'Product Code'},
            {data: 'Product Brand', name: 'Product Brand'},
            {data: 'Product Form', name: 'Product Form'},
            {data: 'Created Date', name: 'Created Date'},
            {data: 'Created By', name: 'Created By'},
            {data: 'Status', name: 'Status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });
  </script>

@endsection
