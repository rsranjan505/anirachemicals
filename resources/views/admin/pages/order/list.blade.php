@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Orders - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin/components/header-nav/order-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Search Orders</label>
                    <input class="form-control" id="search" type="search" placeholder="Search ..." id="html5-search-input" />
                </div>
            </div>
            {{-- <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Filter</label>
                    <select class="form-select" id="order" aria-label="Default select example">
                        <option value="" selected>Select order</option>
                        @foreach ($orders as $item)
                            <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th>SL No</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Bill Amount</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Is Delivered</th>
                <th>Delivered Date</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @include('admin.pages.order.filter-order')
            </tbody>
        </table>

        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
    const fetch_data = (page, search) => {
        if(search === undefined){
            search = "";
        }

        $.ajax({
            url:"order/?page="+page+"&search="+search,
            success:function(data){
                console.log(data);
                $('tbody').html('');
                $('tbody').html(data);
            }
        })
    }

    $('body').on('keyup', '#search', function(){
        var search = $('#search').val();
        var page = $('#hidden_page').val();
        fetch_data(page, search);
    });

    // $('body').on('change', '#order', function(){
    //     var order = $('#order').val();
    //     var page = $('#hidden_page').val();
    //     fetch_data(page, order);
    // });

    $('body').on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var search = $('#search').val();

        fetch_data(page,search);
    });
});

</script>
@endsection



{{-- @extends('admin.layouts.base')

@section('content')

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
                            <th>order name</th>
                            <th>Packing Size</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody id="order_items">

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}



{{-- <script src="{{ asset('admin/assets/js/anira.js')}}"></script>
<script type="text/javascript">
    $(function () {

      var table = $('.order-table').DataTable({
        processing: true,
        serverSide: false,
        paging: true,
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

@endsection --}}
