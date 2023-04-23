@extends('admin.layouts.base')

@section('content')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin/components/header-nav/order-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <a href="{{ url('admin/order/export')}}" style="float:right;" class="btn btn-success btn-rounded btn-icon-text"> <i class="ti-file btn-icon-prepend"></i></i>Export Orders</a>
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">User List</h4>
                            </p>
                            <div class="table-responsive">
                                <table class="table order-table">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Customer Name</th>
                                        <th>Order Date</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Pincode</th>
                                        <th>Is Delivered</th>
                                        <th>Delivered Date</th>
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

<div id="orderItemsmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Packing Size</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody id="product_items">

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> --}}
<script src="{{ asset('admin/assets/js/anira.js')}}"></script>
<script type="text/javascript">
    $(function () {

      var table = $('.order-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('order-list') }}",
          columns: [
            {
                data: "DT_RowIndex",
                name: "SL No",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
              {data: 'Customer Name', name: 'Customer Name'},
              {data: 'Order Date', name: 'Order Date'},
              {data: 'Email', name: 'Email'},
              {data: 'Mobile', name: 'Mobile'},
              {data: 'Address', name: 'Address'},
              {data: 'City', name: 'City'},
              {data: 'Pincode', name: 'Pincode'},
              {data: 'Is Delivered', name: 'Is Delivered'},
              {data: 'Delivered Date', name: 'Delivered Date'},
              {data: 'Created By', name: 'Created By'},
              {data: 'Status', name: 'Status'},
              {data: 'action', name: 'action', orderable: true, searchable: true},
          ]
      });

    });


    function deliveredModel(id) {
        var url = "/admin/order-delivered";
        var model = "";
        var csrf ='{{ csrf_token()}}';

        model += `<div id="deliveredmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Order Id #`+id+`</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="`+url+`" method="post">
                        <input id="id" type="hidden"  value="`+id+`" name="id"  class="form-control"/>
                        <input id="token" type="hidden" value="`+csrf+`" name="_token"  class="form-control"/>

                        <div class="form-group">
                            <label class="col-form-label">Delivered Date</label>
                            <input id="delivered_date" type="date" name="delivered_date"  class="form-control" required/>
                        </div>
                        <button type="submit" class="btn btn-success" >Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>`;
    $(model).modal('show');

        // $( ".modal-body" ).load(url, function(data) {
        //     console.log(data);
        //     $( "#deliveredmodel" ).modal('show');
        // });
    }
  </script>

@endsection
