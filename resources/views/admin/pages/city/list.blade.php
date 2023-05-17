@extends('admin.layouts.base')

@section('content')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin.components.header-nav.city-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">City List</h4>
                            </p>
                            <div style="margin-right:0px; margin-left:auto;" >
                                <div class="row mb-6">

                                    <div class="col-md-12">
                                        <select  class="form-control" name="state_id" id="state_id">
                                            <option> select state</option>
                                            @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table city-table">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>State</th>
                                            <th>City Name</th>
                                            {{-- <th>Action</th> --}}
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
$(document).ready(function() {
    $('#state_id').on('change', function () {
        var state_id = $('#state_id').val();
        $('.city-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            destroy: true,
            ajax: {
                url: "{{ route('cities-list') }}",
                data: {
                    // _token: $('input[name="_token"]').val(),
                    state_id: state_id,
                },
                type: 'get',
                headers: { 'content-type': 'application/x-www-form-urlencoded', 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                async: true,
                error: function (jqXHR, textStatus, errorThrown) {
                    $.each(jqXHR.responseJSON.errors, function (key, value) {
                        $('#' + key + 'Error').html('<i class="fa-solid fa-triangle-exclamation"></i>&nbsp' + value);
                    });
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "SL No",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                },
                {   data: 'State',
                    name: 'State',
                },
                {data: 'City Name', name: 'City Name'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    $(function () {


    });
});
  </script>

@endsection
