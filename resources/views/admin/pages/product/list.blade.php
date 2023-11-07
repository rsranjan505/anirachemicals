@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User Products - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin/components/header-nav/product-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Search Products</label>
                    <input class="form-control" id="search" type="search" placeholder="Search ..." id="html5-search-input" />
                </div>
            </div>
            {{-- <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Filter</label>
                    <select class="form-select" id="product" aria-label="Default select example">
                        <option value="" selected>Select Product</option>
                        @foreach ($products as $item)
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
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Brand</th>
                <th>Form</th>
                <th>Dosages</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @include('admin.pages.product.filter-product')
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
            url:"product/?page="+page+"&search="+search,
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

    // $('body').on('change', '#product', function(){
    //     var product = $('#product').val();
    //     var page = $('#hidden_page').val();
    //     fetch_data(page, product);
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

<script type="text/javascript">
    $(function () {

      var table = $('.product-table').DataTable({
        processing: true,
        serverSide: false,
        paging: true,
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

@endsection --}}
