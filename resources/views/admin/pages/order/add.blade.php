@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add orders - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin.components.header-nav.order-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>

            <div class="card-body">
            <form id="order-form" method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="customer_id">Customer Name</label>
                            <select id="customer_id" name="customer_id" class="form-select @error('ordecustomer_idr_form') is-invalid @enderror">
                                <option value="">Select Customer</option>
                                @foreach ($vendors as $customer)
                                    <option value="{{$customer->id}}" {{ old('customer_id') == $customer->id ? 'selected' : ''}}>{{$customer->name_of_establishment}}</option>
                                @endforeach
                                <option value="others" {{ old('customer_id') == 'others' ? 'selected' : ''}}>Others</option>
                            </select>
                            @error('customer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 cust_name">
                        <div class="mb-3">
                            <label class="form-label" for="customer_name">Other Name</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" placeholder="customer name" />
                            @error('customer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="order email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="code">order Form</label>
                            <select id="order_form" name="order_form" class="form-select @error('order_form') is-invalid @enderror">
                                <option value="">Select Form</option>
                                <option value="liquid" {{ old('order_form') == 'liquid' ? 'selected' : ''}}>Liquid</option>
                                <option value="powder" {{ old('order_form') == 'powder' ? 'selected' : ''}}>Powder</option>
                                <option value="other" {{ old('order_form') == 'other' ? 'selected' : ''}}>Other</option>
                            </select>
                            @error('order_form')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="mobile">Mobile Number</label>
                            <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number" />
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="order-product">
                    <h5>Products Details</h5>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="product_id">Product Name</label>
                                <select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                                    <option value="">Select Products</option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id.','.$product->name}}" {{ old('product_id') == $product->name ? 'selected' : ''}}>{{$product->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="packing_size_id">Packaging Size</label>
                                <select id="packing_size_id" name="packing_size_id" class="form-select @error('packing_size_id') is-invalid @enderror">
                                    <option value="">Select packing size</option>
                                    {{-- @foreach ($products as $product)
                                        <option value="{{$product->id}}" {{ old('product_id') == $product->name ? 'selected' : ''}}>{{$product->name}}</option>
                                    @endforeach --}}
                                </select>
                                @error('packing_size_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-1">
                            <div class="mb-3">
                                <label class="form-label" for="gst">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"  value="{{ old('quantity') }}" placeholder="0" />
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="volume">Volume</label>
                                <input type="number" disabled class="form-control @error('volume') is-invalid @enderror" id="volume" name="volume" value="{{ old('volume') }}" placeholder="" />
                                @error('volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <input type="number" disabled class="form-control @error('volume') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="" />
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2" style="margin-top: 1.8rem">
                            <button type="button" id="add_orderproduct" class="btn btn-primary">Add +</button>
                        </div>

                    </div>
                    <div class="orderproducts"></div>

                </div>
                <hr>
                <div style="display: flex;
                justify-content: end; margin-right:90px;">
                    <div class="md-6">
                        <h4 style="margin-right: 10px; margin-top:5px; font-weight:600">Total Price</h4>
                    </div>
                        <div class="md-6">
                        <input type="decimal" class="form-control" id="bill_amount" name="bill_amount"  />
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">{{ old('address') }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="landmark">Landmark</label>
                    <input type="text" class="form-control @error('landmark') is-invalid @enderror" id="landmark" name="landmark" value="{{ old('landmark') }}" placeholder="landmark" />
                    @error('landmark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="email">State</label>
                            <select id="state_id" name="state_id" class="form-select @error('state_id') is-invalid @enderror">
                                <option value="">Select state</option>
                                @foreach ($states as $state)
                                    <option value="{{$state->id}}" {{ old('state_id') == $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                                @endforeach
                            </select>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="code">City</label>
                            <select id="city_id" name="city_id" class="form-select @error('city_id') is-invalid @enderror">
                                <option value="">Select city</option>
                                {{-- @foreach ($states as $state)
                                    <option value="{{$state->id}}" {{ old('state_id') == $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                                @endforeach --}}
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="pincode">Pincode</label>
                            <input type="number" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" value="{{ old('pincode') }}" placeholder="Pincode" />
                            @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Place Order</button>
                    <div class="spinner-border text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                  </div>
            </form>
            </div>
        </div>
    </div>
</div>

<script>

     $(".spinner-border").css("display", "none");
    var form = document.querySelector('#order-form');
    form.addEventListener('submit', function (event) {

        $(".btn").css("display", "none");
        $(".spinner-border").css("display", "block");
    });
</script>

@endsection
{{--
@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                @include('admin/components/header-nav/order-nav',['activeTab' => 'add'] )
                <div class="row w-100 mx-0">
                    <div class="col-md-12 grid-margin mx-auto">
                        <div class="card">
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form-sample" method="POST" action="{{ route('order-save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-description">
                                        Order
                                    </p>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Vendor Name</label>
                                                <select id="customer_id" name="customer_id" class="form-control">
                                                    <option label="">Select Vendor</option>
                                                    @foreach ($data['vendor'] as $vendor)
                                                        <option value="{{$vendor->id}}">{{ $vendor->name_of_establishment}} ({{$vendor->gst}})</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6 vendor_name">
                                            <div class="form-group">
                                                <label class="col-form-label">Name Of Customer</label>
                                                <input id="customer_name" type="text" name="customer_name" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>Address</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Address</label>
                                                <input id="address" type="text" name="address" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 vendor_state">
                                            <div class="form-group">
                                                <label class="col-form-label">State</label>
                                                <select id="state_id" type="text" name="state_id" class="form-control">
                                                    <option value="" >Select State</option>
                                                    @foreach ($data['state'] as $state)
                                                        <option value="{{$state->id}}">{{ $state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">City</label>
                                                <select id="city_id" type="text" name="city_id" class="form-control">
                                                    <option >Select State First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Pincode</label>
                                                <input id="pincode" type="number" name="pincode" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 vendor_email">
                                            <div class="form-group">
                                                <label class="col-form-label">Email</label>
                                                <input id="email" type="email" name="email" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 vendor_mobile">
                                            <div class="form-group">
                                                <label class="col-form-label">Mobile</label>
                                                <input id="mobile" type="number" name="mobile" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>order Details</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
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
                                                    <tbody id="tbody">

                                                    </tbody>
                                                </table>
                                                <div>
                                                    <table class="table ">
                                                        <tr>
                                                            <td>
                                                                <select id="input_order_id" type="text" name="order_id" class="form-control-sm">
                                                                    <option value="" >Select order Name</option>
                                                                    @foreach ($data['order'] as $order)
                                                                        <option value="{{$order->id}}#{{ $order->name}}">{{ $order->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="input_packing_size" type="text" class="form-control">
                                                                    <option value >Select packing size</option>
                                                                    @foreach ($data['packing_size'] as $size)
                                                                        <option value="{{$size->sku}}">{{ $size->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input id="input_quantity" onchange="calculateValueByTextChange(this)" type="number" name="quantity" class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <select id="input_unit" type="text" name="unit" class="form-control">
                                                                    <option value >Select Unit</option>
                                                                    @foreach ($data['unit'] as $unit)
                                                                        <option value="{{$unit->sku}}">{{ $unit->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input id="input_unit_price" type="decimal" onchange="calculateValueByTextChange(this)" name="unit_price" class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                      <span class="input-group-text">&#8377;</span>
                                                                    </div>
                                                                    <input id="input_total_price" type="decimal" name="total_price" class="form-control" readonly/>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div id="order_error" class="alert alert-danger" style="display:none;">
                                                    </div>
                                                </div>
                                                <button class="btn btn-md btn-primary" style="float:right;" id="addBtn" type="button"> Add order </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Is freight Included</label>
                                                <select id="is_freight" type="text" name="is_freight" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Bill Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">&#8377;</span>
                                                    </div>
                                                    <input id="bill_amount" type="decimal" name="bill_amount" class="form-control" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <button type="submit" class="btn btn-success mr-2">Save</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/assets/js/anira.js')}}"></script>

@push('scripts')
<script>
    $(document).ready(function() {

        // Denotes total number of rows
        var rowIdx = 0;
        var billAmount = 0;

        // jQuery button click event to add a row
        $('#addBtn').on('click', function () {
            var order_id = $('#input_order_id').val();
            var packing_size = $('#input_packing_size').val();
            var quantity = $('#input_quantity').val();
            var unit = $('#input_unit').val();
            var unit_price = $('#input_unit_price').val();
            var total_price = $('#input_total_price').val();

            $('#order_error').attr('style','display:none;');
            if(order_id =='' && quantity =='' && unit =='' && unit_price ==''){
                $('#order_error').attr('style','display:solid;');
                $('#input_order_id').attr('style','border:#B03A2E 1px solid;');
                $('#input_packing_size').attr('style','border:#B03A2E 1px solid;');
                $('#input_quantity').attr('style','border:#B03A2E 1px solid;');
                $('#input_unit').attr('style','border:#B03A2E 1px solid;');
                $('#input_unit_price').attr('style','border:#B03A2E 1px solid;');
                $('#order_error').append(`<ul><li>Value required</li></ul>`);
                return false;
            }else{
                $("#input_order_id").removeAttr("style");
                $("#input_packing_size").removeAttr("style");
                $("#input_quantity").removeAttr("style");
                $("#input_unit").removeAttr("style");
                $("#input_unit_price").removeAttr("style");
                // $('#order_error').removeAttr("style");
            }


        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}" class="table-success">
            <td>
                <input id="order_id" type="text" name="order[${rowIdx}][order_id]" value="${order_id}" class="form-control"/>
            </td>
            <td>
                <input id="packing_size" type="decimal" value="${packing_size}" name="order[${rowIdx}][packing_size]" class="form-control"/>
            </td>
            <td>
                <input id="quantity" type="number" name="order[${rowIdx}][quantity]" value="${quantity}" class="form-control"/>
            </td>
            <td>
                <input id="unit" type="text" value="${unit}" name="order[${rowIdx}][unit]" class="form-control"/>
            </td>
            <td>
                <input id="unit_price" type="decimal" value="${unit_price}" name="order[${rowIdx}][unit_price]" class="form-control"/>
            </td>
            <td>
                <input id="total_price" type="decimal" value="${total_price}" name="order[${rowIdx}][total_price]" class="form-control"/>
            </td>
              <td class="text-center">
                <button class="btn btn-danger remove"
                  type="button">X</button>
                </td>
            </tr>`);


            billAmount = parseInt(billAmount) + parseInt(total_price);
            $('#bill_amount').val(billAmount);

            $('#input_order_id').val('');
            $('#input_packing_size').val('');
            $('#input_quantity').val('');
            $('#input_unit').val('');
            $('#input_unit_price').val('');
            $('#input_total_price').val('');
      });



      // jQuery button click event to remove a row.
      $('#tbody').on('click', '.remove', function () {

        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();

        // Iterating across all the rows
        // obtained to change the index
        child.each(function () {

          // Getting <tr> id.
          var id = $(this).attr('id');

          // Getting the <p> inside the .row-index class.
          var idx = $(this).children('.row-index').children('p');

          // Gets the row number from <tr> id.
          var dig = parseInt(id.substring(1));

          // Modifying row index.
          idx.html(`Row ${dig - 1}`);

          // Modifying row id.
          $(this).attr('id', `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest('tr').remove();

        // Decreasing total number of rows by 1.
        rowIdx--;
      });

      $(document).ready(function(){
        $("#input_total_price").focus(function(){
            // $("span").css("display", "inline").fadeOut(2000);
            var quantity = $('#input_quantity').val();
            var unit_price = $('#input_unit_price').val();
            $('#input_total_price').val(quantity * unit_price);
        });
        });


      });
  </script>
@endpush

@endsection --}}
