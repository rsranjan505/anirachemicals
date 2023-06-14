@extends('admin.layouts.base')

@section('content')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin/components/header-nav/admin-user-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">User List</h4>
                            </p>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>User Type</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>Created Date</th>
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> --}}

<script type="text/javascript">
    $(function () {

      var table = $('.user-table').DataTable({
        processing: true,
        serverSide: false,
        paging: true,
          destroy: true,
          ajax: "{{ route('user-list') }}",
          columns: [
            {
                data: "DT_RowIndex",
                name: "SL No",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {   data: 'Image',
                name: 'Image',
            },
            {data: 'First Name', name: 'First Name'},
            {data: 'Last Name', name: 'Last Name'},
            {data: 'Email', name: 'Email'},
            {data: 'Mobile', name: 'Mobile'},
            {data: 'User Type', name: 'User Type'},
            {data: 'Address', name: 'Address'},
            {data: 'City', name: 'City'},
            {data: 'State', name: 'State'},
            {data: 'Pincode', name: 'Pincode'},
            {data: 'Created Date', name: 'Created Date'},
            {data: 'Status', name: 'Status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });
  </script>

@endsection
