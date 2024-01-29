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
