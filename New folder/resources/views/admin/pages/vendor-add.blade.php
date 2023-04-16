@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                @include('admin/components/header-nav/vendor-nav',['activeTab' => 'add'] )
                    <div class="row w-100 mx-0">
                        <div class="col-md-12 grid-margin mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" method="POST" action="{{ route('vendor-save') }}" enctype="multipart/form-data">
                                        @csrf
                                        <p class="card-description">
                                            Vendor Registration
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Name Of Establishment</label>
                                                    <input id="name_of_establishment" type="text" name="name_of_establishment" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Establishment Type</label>
                                                    <select id="establishment_type" name="establishment_type" class="form-control">
                                                        <option label="">Select</option>
                                                        <option value="1">Indivisual</option>
                                                        <option value="2">LLP</option>
                                                        <option value="3">OPC</option>
                                                        <option value="4">Propietorship</option>
                                                        <option value="5">Partnership</option>
                                                        <option value="6">Pvt. Ltd.</option>
                                                        <option value="7">Ltd.</option>
                                                        <option value="8">Other</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Establishment Pan Number</label>
                                                    <input id="pan" type="text" name="pan" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Establishment Gst Number</label>
                                                    <input id="gst" type="text" name="gst" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Partner Details</h4>
                                        <div class="partner">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Name</label>
                                                        <input id="partner_details" type="text" name="partner_details[name][]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Pan</label>
                                                        <input id="partner_details" type="text" name="partner_details[pan][]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label">DOB</label>
                                                        <input id="partner_details" type="date" name="partner_details[dob][]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Anniversary</label>
                                                        <input id="partner_details" type="text" name="partner_details[anniversary][]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-top: 3.8rem">
                                                    <a id="add_morepartner" class="btn btn-primary mr-2">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="morepartner">
                                        </div>
                                        <h4>Address</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Address</label>
                                                    <input id="address" type="text" name="address" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">State</label>
                                                    <select id="state" type="text" name="state" class="form-control">
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
                                                    <select id="city" type="text" name="city" class="form-control">
                                                        <option value="0" >Select State First</option>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Email</label>
                                                    <input id="email" type="email" name="email" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Mobile</label>
                                                    <input id="mobile" type="number" name="mobile" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Contact Details Of Key Person</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Key Person Name</label>
                                                    <input id="key_person" type="text" name="key_person" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Date Of Birth</label>
                                                    <input id="dob" type="date" name="dob" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Marriage Anniversary</label>
                                                    <input id="marriage_aniversory" type="text" name="marriage_aniversory" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Previous Product Details</h4>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="col-form-label">Product Name</label>
                                                    <input id="previous_product_details" type="text" name="previous_product_details[name][]" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="col-form-label">Brand</label>
                                                    <input id="previous_product_details" type="text" name="previous_product_details[brand][]" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="col-md-2" style="margin-top: 3.8rem">
                                                <a id="add_item" class="btn btn-primary mr-2">Add</a>
                                            </div>
                                        </div>
                                        <div class="previous_productitems"></div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Any Suggestion</label>
                                                    <textarea id="suggestions"  name="suggestions" class="form-control"></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="col-form-label">Upload Vendor Photo</label>
                                                    <input type="file" id="avatar"  name="avatar" class="form-control"/>

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="#" alt="your image" />
                                            </div>
                                        </div>
                                        <label class="col-form-label">Upload Support Documnets</label>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input id="support_document" type="file" name="document[]" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a id="add_document" class="btn btn-primary mr-2">Add more</a>
                                            </div>
                                        </div>
                                        <div class="support_document">
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

<script>
    $(document).ready(function() {
        $("#add_morepartner").click(
            function () {

                let template = '<div id="partner" class="row"><div class="col-md-4"><div class="form-group"><label class="col-form-label">Name</label><input id="partner_details" type="text" name="partner_details[name][]" class="form-control"/></div></div><div class="col-md-2"><div class="form-group"><label class="col-form-label">Pan</label><input id="partner_details" type="text" name="partner_details[pan][]" class="form-control"/></div></div><div class="col-md-2"><div class="form-group"><label class="col-form-label">DOB</label><input id="partner_details" type="date" name="partner_details[dob][]" class="form-control"/></div></div><div class="col-md-2"><div class="form-group"><label class="col-form-label">Anniversary</label><input id="partner_details" type="text" name="partner_details[anniversary][]" class="form-control"/></div></div><div class="col-md-2" style="margin-top: 3.8rem"><a id="Deleteparter" class="btn btn-danger mr-2">Remove</a></div></div>';

                $(".morepartner").append(template);
            }
        );
        $("body").on("click", "#Deleteparter", function () {
            $(this).parents("#partner").remove();
        })

        //previous product
        $("#add_item").click(
            function () {

                let template = '<div id="product" class="row"> <div class="col-md-5"><div class="form-group"><label class="col-form-label">Product Name</label><input id="previous_product_details" type="text" name="previous_product_details[name][]" class="form-control"/></div></div><div class="col-md-5"><div class="form-group"><label class="col-form-label">Brand</label><input id="previous_product_details" type="text" name="previous_product_details[brand][]" class="form-control"/></div></div><div class="col-md-2" style="margin-top: 3.8rem"><a id="Deleteproduct" class="btn btn-danger mr-2">Remove</a></div></div>';

                $(".previous_productitems").append(template);
            }
        );

        $("body").on("click", "#Deleteproduct", function () {
            $(this).parents("#product").remove();
        })

         //support document
         $("#add_document").click(
            function () {

                let template = '<div id="document" class="row"> <div class="col-md-5"><div class="form-group"><input id="support_document" type="file" name="document[]" class="form-control"/></div></div><div class="col-md-2"><a id="Deletedocument" class="btn btn-danger mr-2">Remove</a></div></div>';

                $(".support_document").append(template);
            }
        );

        $("body").on("click", "#Deletedocument", function () {
            $(this).parents("#document").remove();
        })
    });

    $('#state').on('change', function () {
        let state_id = this.value;
        $.ajax({
            url: "/city/"+state_id,
            type: "get",

            success: function (res) {
                let html = "";
                html += '<select id="city" type="text" name="city" search class="form-control">';
                res.forEach((val, key) => {
                    html += "<option value=" + val.id + ">" + val.name + "</option>";
                });
                html += '</select>';
                $("#city").html("");
                $("#city").html(html);
            },
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
