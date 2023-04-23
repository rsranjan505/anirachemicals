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
                                    <h4>Product Details</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
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
                                                    <tbody id="tbody">

                                                    </tbody>
                                                </table>
                                                <div>
                                                    <table class="table ">
                                                        <tr>
                                                            <td>
                                                                <select id="input_product_id" type="text" name="product_id" class="form-control-sm">
                                                                    <option value="" >Select Product Name</option>
                                                                    @foreach ($data['product'] as $product)
                                                                        <option value="{{$product->id}}#{{ $product->name}}">{{ $product->name}}</option>
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
                                                    <div id="product_error" class="alert alert-danger" style="display:none;">
                                                    </div>
                                                </div>
                                                <button class="btn btn-md btn-primary" style="float:right;" id="addBtn" type="button"> Add Product </button>
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
            var product_id = $('#input_product_id').val();
            var packing_size = $('#input_packing_size').val();
            var quantity = $('#input_quantity').val();
            var unit = $('#input_unit').val();
            var unit_price = $('#input_unit_price').val();
            var total_price = $('#input_total_price').val();

            $('#product_error').attr('style','display:none;');
            if(product_id =='' && quantity =='' && unit =='' && unit_price ==''){
                $('#product_error').attr('style','display:solid;');
                $('#input_product_id').attr('style','border:#B03A2E 1px solid;');
                $('#input_packing_size').attr('style','border:#B03A2E 1px solid;');
                $('#input_quantity').attr('style','border:#B03A2E 1px solid;');
                $('#input_unit').attr('style','border:#B03A2E 1px solid;');
                $('#input_unit_price').attr('style','border:#B03A2E 1px solid;');
                $('#product_error').append(`<ul><li>Value required</li></ul>`);
                return false;
            }else{
                $("#input_product_id").removeAttr("style");
                $("#input_packing_size").removeAttr("style");
                $("#input_quantity").removeAttr("style");
                $("#input_unit").removeAttr("style");
                $("#input_unit_price").removeAttr("style");
                // $('#product_error').removeAttr("style");
            }


        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}" class="table-success">
            <td>
                <input id="product_id" type="text" name="product[${rowIdx}][product_id]" value="${product_id}" class="form-control"/>
            </td>
            <td>
                <input id="packing_size" type="decimal" value="${packing_size}" name="product[${rowIdx}][packing_size]" class="form-control"/>
            </td>
            <td>
                <input id="quantity" type="number" name="product[${rowIdx}][quantity]" value="${quantity}" class="form-control"/>
            </td>
            <td>
                <input id="unit" type="text" value="${unit}" name="product[${rowIdx}][unit]" class="form-control"/>
            </td>
            <td>
                <input id="unit_price" type="decimal" value="${unit_price}" name="product[${rowIdx}][unit_price]" class="form-control"/>
            </td>
            <td>
                <input id="total_price" type="decimal" value="${total_price}" name="product[${rowIdx}][total_price]" class="form-control"/>
            </td>
              <td class="text-center">
                <button class="btn btn-danger remove"
                  type="button">X</button>
                </td>
            </tr>`);


            billAmount = parseInt(billAmount) + parseInt(total_price);
            $('#bill_amount').val(billAmount);

            $('#input_product_id').val('');
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

@endsection
