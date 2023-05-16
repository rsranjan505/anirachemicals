@extends('admin.layouts.base')

@section('content')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin/components/header-nav/visit-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <a href="{{ url('admin/visit/export')}}" style="float:right;" class="btn btn-success btn-rounded btn-icon-text"> <i class="ti-file btn-icon-prepend"></i></i>Export</a>
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">Visiting List</h4>

                            <div class="table-responsive">
                                <table class="table " id="visit-table">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Image</th>
                                        <th>Business Name</th>
                                        <th>Establishment Type</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Key Person</th>
                                        <th>Status</th>
                                        <th>Source</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
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

<script>

$(function () {

    var table = $("#visit-table").DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('visit') }}",
    language:
    {
        "processing": "<i class='fa-solid fa-spinner fa-4x'></i>",
    },
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            className: "text-center",
            orderable: false,
            searchable: false,
        },
        {   data: 'Image',
            name: 'Image',
        },
        {data: 'Business Name', name: 'Business Name'},
        {data: 'Establishment Type', name: 'Establishment Type'},
        {data: 'Address', name: 'Address'},
        {data: 'City', name: 'City'},
        {data: 'State', name: 'State'},
        {data: 'Pincode', name: 'Pincode'},
        {data: 'Email', name: 'Email'},
        {data: 'Mobile', name: 'Mobile'},
        {data: 'Key Person', name: 'Key Person'},
        {data: 'Status', name: 'Status'},
        {data: 'Source', name: 'Source'},
        {data: 'Created By', name: 'Created By'},
        {data: 'Created Date', name: 'Created Date'},
        {
            data: "action",
            name: "action",
            className: "text-center",
            orderable: false,
            searchable: false,
        },
    ],

});
});


</script>

@endsection
