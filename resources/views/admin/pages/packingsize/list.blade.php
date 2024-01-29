@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User Packing Size - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin.components.header-nav.packingsize-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            {{-- <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Search city</label>
                    <input class="form-control" id="search" type="search" placeholder="Search ..." id="html5-search-input" />
                </div>
            </div> --}}
            <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Filter</label>
                    <select class="form-select" id="product" aria-label="Default select example">
                        <option value="" selected>Select Product</option>
                        @foreach ($products as $item)
                            <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Packing</th>
                <th>Internal Qty</th>
                <th>Internal Size(s)</th>
                <th>Volume</th>
                <th>Price</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @include('admin.pages.packingsize.filter-packing')
            </tbody>
        </table>

        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
    const fetch_data = (page, product) => {
        if(product === undefined){
            product = "";
        }

        $.ajax({
            url:"packing/?page="+page+"&product="+product,
            success:function(data){
                console.log(data);
                $('tbody').html('');
                $('tbody').html(data);
            }
        })
    }

    // $('body').on('keyup', '#search', function(){
    //     var product = $('#product').val();
    //     var page = $('#hidden_page').val();
    //     fetch_data(page, product);
    // });

    $('body').on('change', '#product', function(){
        var product = $('#product').val();
        var page = $('#hidden_page').val();
        fetch_data(page, product);
    });

    $('body').on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var product = $('#product').val();

        fetch_data(page,product);
    });
});

</script>

@endsection
