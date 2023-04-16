@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                @include('admin/components/header-nav/vendor-nav',['activeTab' => 'edit'] )
                    <div class="row w-100 mx-0">
                        <div class="col-md-12 grid-margin mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    @if (isset($data['vendor']) and $data['vendor'] !=null)
                                        <form class="form-sample" method="POST" action="{{ route('vendor-update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <p class="card-description">
                                            Update Vendor
                                            </p>
                                            <div class="row">
                                                <input id="id" type="hidden" name="id" value="{{ $data['vendor']->id }}" class="form-control"/>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Name Of Establishment</label>
                                                        <input id="name_of_establishment" type="text" value="{{ $data['vendor']->name_of_establishment }}" name="name_of_establishment" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Establishment Type</label>
                                                        <select id="establishment_type" name="establishment_type" class="form-control">

                                                            <option label="">Select</option>
                                                            <option value="1" {{ $data['vendor']->establishment_type == 1 ? 'selected' : '' }}>Individual</option>
                                                            <option value="2" {{ $data['vendor']->establishment_type == 2 ? 'selected' : '' }}>LLP</option>
                                                            <option value="3" {{ $data['vendor']->establishment_type == 3 ? 'selected' : '' }}>OPC</option>
                                                            <option value="4" {{ $data['vendor']->establishment_type == 4 ? 'selected' : '' }}>Propietorship</option>
                                                            <option value="5" {{ $data['vendor']->establishment_type == 5 ? 'selected' : '' }}>Partnership</option>
                                                            <option value="6" {{ $data['vendor']->establishment_type == 6 ? 'selected' : '' }}>Pvt. Ltd.</option>
                                                            <option value="7" {{ $data['vendor']->establishment_type == 7 ? 'selected' : '' }}>Ltd.</option>
                                                            <option value="8" {{ $data['vendor']->establishment_type == 8 ? 'selected' : '' }}>Other</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Establishment Pan Number</label>
                                                        <input id="pan" type="text" value="{{ $data['vendor']->pan }}" name="pan" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Establishment Gst Number</label>
                                                        <input id="gst" type="text" value="{{ $data['vendor']->gst }}" name="gst" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Partner Details</h4>
                                            <div class="partner">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name</label>
                                                            <input id="partner_details"  type="text" name="partner_details[name][]" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Pan</label>
                                                            <input id="partner_details" type="text" name="partner_details[pan][]" class="form-control" />
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
                                                        <a id="add_morepartner" class="btn btn-primary mr-2">Add partner</a>
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
                                                        <input id="address" type="text" value="{{ $data['vendor']->address }}" name="address" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">State</label>
                                                        <select id="state" type="text" name="state" class="form-control">
                                                            <option value="" >Select State</option>
                                                            @foreach ($data['state'] as $state)
                                                                <option value="{{$state->id}} {{$data['vendor']->state == $state->id ? 'selected' : '' }}">{{ $state->name}}</option>
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
                                                        <input id="pincode" type="number" value="{{ $data['vendor']->pincode }}" name="pincode" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Email</label>
                                                        <input id="email" type="email" value="{{ $data['vendor']->email }}" name="email" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Mobile</label>
                                                        <input id="mobile" type="number" value="{{ $data['vendor']->mobile }}" name="mobile" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Contact Details Of Key Person</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Key Person Name</label>
                                                        <input id="key_person" type="text" name="key_person" value="{{ $data['vendor']->key_person }}" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Date Of Birth</label>
                                                        <input id="dob" type="date" name="dob" value="{{ $data['vendor']->dob }}" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Marriage Anniversary</label>
                                                        <input id="marriage_aniversory" type="text" value="{{ $data['vendor']->marriage_aniversory }}" name="marriage_aniversory" class="form-control"/>
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
                                                    <a id="add_item" class="btn btn-primary mr-2">Add product</a>
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
                                                    {{-- <div class="form-group">
                                                        <label>File upload</label>
                                                        <input type="file" name="avatar" name="avatar" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                          <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                          </span>
                                                        </div>
                                                    </div> --}}
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin/assets/js/anira.js')}}"></script>
<script src="{{ asset('admin/assets/js/file-upload.js')}}"></script>
<script>
    avatar.onchange = evt => {
        const [file] = avatar.files
        if (file) {
            avatarPreview.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
