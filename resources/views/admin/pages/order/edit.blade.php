@extends('admin.layouts.base')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            @include('admin/components/header-nav/order-nav',['activeTab' => 'edit'] )
            <div class="card-body">
                @if (isset($data['order']))
                <form method="POST" action="{{ route('order-update') }}">
                    @csrf
                    <input id="id" type="hidden" name="id" value="{{ $data['order']->id }}" class="form-control"/>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Vendor Name</label>
                                <select id="customer_id" name="customer_id" class="form-control">
                                    <option label="">Select Vendor</option>
                                    @foreach ($data['vendor'] as $vendor)
                                        <option value="{{$vendor->id}}" {{ $data['order']->customer_id == $vendor->id ? 'selected' : ''}}>{{ $vendor->name_of_establishment}} ({{$vendor->gst}})</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 vendor_name">
                            <div class="form-group">
                                <label class="col-form-label">Name Of Customer</label>
                                <input id="customer_name" type="text" value="{{$data['order']->customer_name}}" name="customer_name" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <h4>Address</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Address</label>
                                <input id="address" type="text"  value="{{$data['order']->address}}" name="address" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6 vendor_state">
                            <div class="form-group">
                                <label class="col-form-label">State</label>
                                <select id="state_id" type="text" name="state_id" class="form-control">
                                    <option value="" >Select State</option>
                                    @foreach ($data['state'] as $state)
                                        <option value="{{$state->id}}" {{$data['order']->state_id == $state->id ? 'selected' : '' }}>{{ $state->name}}</option>
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
                                    @foreach ($data['city'] as $city)
                                        <option value="{{$city->id}}" {{$data['order']->city_id == $city->id ? 'selected' : '' }}>{{ $city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Pincode</label>
                                <input id="pincode" type="number"  value="{{$data['order']->pincode}}" name="pincode" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 vendor_email">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input id="email" type="email"  value="{{$data['order']->email}}" name="email" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6 vendor_mobile">
                            <div class="form-group">
                                <label class="col-form-label">Mobile</label>
                                <input id="mobile" type="number"  value="{{$data['order']->mobile}}" name="mobile" class="form-control"/>
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
                                    {{-- <table class="table">
                                        @if (isset($data['order']->orderItems) and count($data['order']->orderItems) > 0)
                                        @foreach ($data['order']->orderItems as $item)
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
                                        @endforeach
                                    @endif
                                    </table> --}}
                                    <table class="table">
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
                                    <option value="0" {{$data['order']->city_id == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{$data['order']->city_id == 1 ? 'selected' : '' }}>Yes</option>
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
                                    <input id="bill_amount" type="decimal" value="{{$data['order']->bill_amount}}" name="bill_amount" class="form-control" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-success mr-2">Save</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/assets/js/anira.js')}}"></script>
<script>
    $('#state_id').on('change', function () {
        let state_id = this.value;
        $.ajax({
            url: "/city/"+state_id,
            type: "get",

            success: function (res) {
                let html = "";
                html += '<select id="city_id" type="text" name="city_id" search class="form-control">';
                res.forEach((val, key) => {
                    html += "<option value=" + val.id + ">" + val.name + "</option>";
                });
                html += '</select>';
                $("#city_id").html("");
                $("#city_id").html(html);
            },
        });
    });
</script>
@endsection
