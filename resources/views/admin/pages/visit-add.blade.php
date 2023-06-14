@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                @include('admin/components/header-nav/visit-nav',['activeTab' => 'add'] )
                <div class="row w-100 mx-0">
                    <div class="col-md-12 grid-margin mx-auto">
                        <div class="card">
                            <div class="card-body">
                                {{-- @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <form id="visit-form-add" class="visit-form" method="POST" action="{{ route('visit-save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-description">
                                        Create Visit
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Name Of Establishment</label>
                                                <input id="name_of_establishment" type="text" name="name_of_establishment"  value="{{ old('name_of_establishment') }}"  class="form-control @error('name_of_establishment') is-invalid @enderror"/>
                                            </div>
                                            @error('name_of_establishment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Establishment Type</label>
                                                <select id="establishment_type" name="establishment_type" class="form-control  @error('establishment_type') is-invalid @enderror">
                                                    <option value="">Select</option>
                                                    <option value="1">Individual</option>
                                                    <option value="2">LLP</option>
                                                    <option value="3">OPC</option>
                                                    <option value="4">Propietorship</option>
                                                    <option value="5">Partnership</option>
                                                    <option value="6">Pvt. Ltd.</option>
                                                    <option value="7">Ltd.</option>
                                                    <option value="8">Other</option>
                                                </select>
                                            </div>
                                            @error('establishment_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <h4>Address</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Key Person Name</label>
                                                <input id="key_person" type="text" name="key_person"  value="{{ old('key_person') }}"  class="form-control  @error('key_person') is-invalid @enderror"/>
                                            </div>
                                            @error('key_person')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Address</label>
                                                <input id="address" type="text" name="address" value="{{ old('address') }}"  class="form-control @error('address') is-invalid @enderror"/>
                                            </div>
                                        </div>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">State</label>
                                                <select id="state" type="text" name="state_id" class="form-control  @error('state_id') is-invalid @enderror">
                                                    <option  >Select State</option>
                                                    @foreach ($data['state'] as $state)
                                                        <option value="{{$state->id}}">{{ $state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('state_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">City</label>
                                                <select id="city" type="text" name="city_id" class="form-control  @error('city_id') is-invalid @enderror">
                                                    <option value="0" >Select State First</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error('city_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Pincode</label>
                                                <input id="pincode" type="number" name="pincode" class="form-control  @error('pincode') is-invalid @enderror"/>
                                            </div>
                                        </div>
                                        @error('pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email</label>
                                                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control  @error('address') is-invalid @enderror"/>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Mobile</label>
                                                <input id="mobile" type="number" name="mobile" value="{{ old('mobile') }}" class="form-control  @error('address') is-invalid @enderror"/>
                                            </div>
                                        </div>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Status</label>
                                                <select id="status" name="status" class="form-control  @error('address') is-invalid @enderror">
                                                    <option value="">Select</option>
                                                    <option value="1">Open - Not Contacted</option>
                                                    <option value="2">Working - Contacted</option>
                                                    <option value="3">Closed - Converted</option>
                                                    <option value="4">Closed - Not Converted</option>

                                                </select>
                                            </div>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Source</label>
                                                <select id="source" name="source" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Phone Inquiry">Phone Inquiry</option>
                                                    <option value="Partner Referal">Partner Referal</option>
                                                    <option value="Other">Other</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p></p><strong> Note:</strong> To find Latitude and Longitude you have to take shop image from your mobile with GPS/Location tag Enable setting then, you will get latitude and longitude in image description.</p>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Latitude</label>
                                                <input id="latitude" type="decimal" name="latitude" value="{{ old('latitude') }}" class="form-control  @error('address') is-invalid @enderror"/>
                                            </div>
                                            @error('latitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Longitude</label>
                                                <input id="longitude" type="decimal" name="longitude"  value="{{ old('longitude') }}" class="form-control  @error('address') is-invalid @enderror"/>
                                            </div>
                                            @error('longitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea id="description" type="text" row="4" name="description" class="form-control"> {{ old('description') }} </textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="col-form-label">Upload Visiting Card </label>
                                                <input type="file" id="avatar"  name="avatar" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="{{ asset('admin/assets/images/accounticon.png')}}" alt="your image" />
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

{{-- <script src="{{ asset('admin/assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script> --}}
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

<script src="{{ asset('admin/assets/js/anira.js')}}"></script>

<script>
    avatar.onchange = evt => {
        const [file] = avatar.files
        if (file) {
            avatarPreview.src = URL.createObjectURL(file)
        }
    }

        //Visit entry form

    $('#visit-form-add').validate({
      rules: {
        name_of_establishment: {
            required: true,
            name_of_establishment: true,
        },
        establishment_type: {
            required: true,
            establishment_type: true,
        },
        key_person: {
            required: true,
            key_person: true,
        },
        address: {
            required: true,
            address: true,
        },
        // state_id: {
        //     required: true,
        //     state_id: true,
        // },
        // city_id: {
        //     required: true,
        //     city_id: true,
        // },
        pincode: {
            required: true,
            pincode: true,
        },
        email: {
            required: true,
            email: true,
        },
        mobile: {
            required: true,
            mobile: true,
        },
        status: {
            required: true,
            status: true,
        },
        source: {
            required: true,
            source: true,
        },
        latitude: {
            required: true,
            latitude: true,
        },
        longitude: {
            required: true,
            longitude: true,
        },

      },
      messages: {
        name_of_establishment: {
            required: "Please enter a name ",
            name_of_establishment: "Please enter a valid name"
        },
        establishment_type: {
            required: "Please enter a name ",
            establishment_type: "Please select a valid type"
        },
        key_person: {
            required: "Please enter a name ",
            key_person: "Please enter a valid name"
        },
        address: {
            required: "Please enter a address ",
            address: "Please enter a valid address"
        },
        // state_id: {
        //     required: "Please select a state ",
        //     state_id: "Please select a valid state"
        // },
        // city_id: {
        //     required: "Please select a city ",
        //     city_id: "Please select a valid city"
        // },
        pincode: {
            required: "Please enter a pincode ",
            pincode: "Please enter a valid pincode"
        },
        email: {
            required: "Please enter a email ",
            email: "Please enter a valid email"
        },
        mobile: {
            required: "Please enter a mobile ",
            mobile: "Please enter a valid mobile"
        },
        status: {
            required: "Please select a status ",
            status: "Please select a valid status"
        },
        source: {
            required: "Please select a source ",
            source: "Please select a valid source"
        },
        latitude: {
            required: "Please enter a latitude ",
            latitude: "Please enter a valid latitude"
        },
        longitude: {
            required: "Please enter a longitude ",
            longitude: "Please enter a valid longitude"
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });


    //geo location

    getLocation();

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
    }
    </script>

@endsection
