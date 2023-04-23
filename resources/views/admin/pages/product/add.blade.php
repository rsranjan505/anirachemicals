@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                @include('admin/components/header-nav/product-nav',['activeTab' => 'add'] )
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
                                <form class="form-sample" method="POST" action="{{ route('product-save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-description">
                                        Product
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Product Name *</label>
                                                <input id="name" type="text" name="name" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Product Code *</label>
                                                <input id="code" type="text" capitalize name="code" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Product Brand *</label>
                                                <input id="brand" type="text" value="RCON" name="brand" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Product Form *</label>
                                                <select id="form" type="text" name="form" class="form-control">
                                                    <option value >Select Form</option>
                                                    <option value="liquid">Liquid</option>
                                                    <option value="powder">powder</option>
                                                    <option value="other">other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Items Details</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Packing Type</th>
                                                            <th>Packing Size</th>
                                                            <th>Qty</th>
                                                            <th>Unit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">

                                                    </tbody>
                                                </table>
                                                <div>
                                                    <table class="table ">
                                                        <tr>
                                                            <td>
                                                                <select id="input_packing_type" type="text" class="form-control">
                                                                    <option >Select packing type</option>
                                                                    <option value="box">Box</option>
                                                                    <option value="bucket">Bucket</option>
                                                                    <option value="drum">Drum</option>
                                                                    <option value="other">Other</option>
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
                                                                <input id="input_quantity" type="number" class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <select id="input_unit" type="text" class="form-control">
                                                                    <option value >Select Unit</option>
                                                                    @foreach ($data['unit'] as $unit)
                                                                        <option value="{{$unit->sku}}">{{ $unit->name}}</option>
                                                                    @endforeach
                                                                </select>
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
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="col-form-label">Upload Product Images</label>
                                                <input type="file" id="avatar" multiple  name="avatar[]" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="{{ asset('assets/img/about-img.jpg')}}" alt="your image" />
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

<script>
        $(document).ready(function() {

// Denotes total number of rows
var rowIdx = 0;
var billAmount = 0;

// jQuery button click event to add a row
$('#addBtn').on('click', function () {
    var packing_type = $('#input_packing_type').val();
    var packing_size = $('#input_packing_size').val();
    var quantity = $('#input_quantity').val();
    var unit = $('#input_unit').val();



    $('#product_error').attr('style','display:none;');
    if(packing_type =='' && quantity =='' && unit =='' && packing_size ==''){

        $('#input_packing_type').attr('style','border:#B03A2E 1px solid;');
        $('#input_quantity').attr('style','border:#B03A2E 1px solid;');
        $('#input_unit').attr('style','border:#B03A2E 1px solid;');
        $('#input_packing_size').attr('style','border:#B03A2E 1px solid;');
        $('#product_error').attr('style','display:solid;');
        $('#product_error').append(`<ul><li>Value required</li></ul>`);
        return false;
    }else{
        $("#input_packing_type").removeAttr("style");
        $("#input_quantity").removeAttr("style");
        $("#input_unit").removeAttr("style");
        $("#input_packing_size").removeAttr("style");
        // $('#product_error').removeAttr("style");
    }


// Adding a row inside the tbody.
$('#tbody').append(`<tr id="R${++rowIdx}" class="table-success">
    <td>
        <input id="packing_type" type="text" name="product_items[${rowIdx}][packing_type]" value="${packing_type}" class="form-control"/>
    </td>
    <td>
        <input id="packing_size" type="decimal" value="${packing_size}" name="product_items[${rowIdx}][packing_size]" class="form-control"/>
    </td>
    <td>
        <input id="quantity" type="number" name="product_items[${rowIdx}][quantity]" value="${quantity}" class="form-control"/>
    </td>
    <td>
        <input id="unit" type="text" value="${unit}" name="product_items[${rowIdx}][unit]" class="form-control"/>
    </td>

    <td class="text-center">
        <button class="btn btn-danger remove"
          type="button">X</button>
        </td>
    </tr>`);

    $('#input_packing_type').val('');
    $('#input_quantity').val('');
    $('#input_unit').val('');
    $('#input_packing_size').val('');
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


});
    avatar.onchange = evt => {
        const [file] = avatar.files
        if (file) {
            avatarPreview.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
