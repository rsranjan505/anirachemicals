@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add Vendors - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin.components.header-nav.vendor-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4" >
                        <img style="width: 100px;" class="d-block rounded" id="avatarPreview" src="http://anirachemicals.com/admin/assets/images/vendor.png" alt="your image" />

                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload vendor image</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload"  capture="camera" name="avatar" multiple class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            {{-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if($errors->has('avatar'))
                        <strong class="alert-danger">{{ $errors->first('avatar') }}</strong>
                    @endif
                    <hr>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name_of_establishment">Name Of Establishment</label>
                            <input type="text" class="form-control @error('name_of_establishment') is-invalid @enderror" id="name_of_establishment" name="name_of_establishment" value="{{ old('name_of_establishment') }}" placeholder="Name Of Establishment" />
                            @error('name_of_establishment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="establishment_type">Establishment Type</label>
                            <select id="establishment_type" name="establishment_type" class="form-select @error('establishment_type') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="1" {{ old('establishment_type') == 1 ? 'selected' : ''}}>Individual</option>
                                <option value="2" {{ old('establishment_type') == 2 ? 'selected' : ''}}>LLP</option>
                                <option value="3" {{ old('establishment_type') == 3 ? 'selected' : ''}}>OPC</option>
                                <option value="4" {{ old('establishment_type') == 4 ? 'selected' : ''}}>Propietorship</option>
                                <option value="5" {{ old('establishment_type') == 5 ? 'selected' : ''}}>Partnership</option>
                                <option value="6" {{ old('establishment_type') == 6 ? 'selected' : ''}}>Pvt. Ltd.</option>
                                <option value="7" {{ old('establishment_type') == 7 ? 'selected' : ''}}>Ltd.</option>
                                <option value="8" {{ old('establishment_type') == 8 ? 'selected' : ''}}>Other</option>
                            </select>
                            @error('establishment_type')
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
                            <label class="form-label" for="pan">Establishment Pan Number</label>
                            <input type="text" class="form-control @error('pan') is-invalid @enderror" id="pan" name="pan" style="text-transform:uppercase" value="{{ old('pan') }}" placeholder="Establishment Pan Number" />
                            @error('pan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="gst">Establishment Gst Number</label>
                            <input type="text" class="form-control @error('gst') is-invalid @enderror" id="gst" name="gst" style="text-transform:uppercase" value="{{ old('gst') }}" placeholder="Establishment Gst Number" />
                            @error('gst')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="partner">
                    <h5>Partner Details</h5>
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="partner_name">Partner Name</label>
                                <input type="text" class="form-control @error('partner_name') is-invalid @enderror" id="partner_name" name="partner_name" value="{{ old('partner_name') }}" placeholder="Partner Name" />
                                @error('partner_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="partner_pan">Pan</label>
                                <input type="text" class="form-control @error('partner_pan') is-invalid @enderror" id="partner_pan" name="partner_pan" style="text-transform:uppercase" value="{{ old('partner_pan') }}" placeholder="Pan Number" />
                                @error('partner_pan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="gst">DOB</label>
                                <input type="date" class="form-control @error('partner_dob') is-invalid @enderror" id="partner_dob" name="partner_dob" style="text-transform:uppercase" value="{{ old('partner_dob') }}" placeholder="Date Of Birth" />
                                @error('partner_dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="partner_anniversary">Anniversary</label>
                                <input type="date" class="form-control @error('partner_anniversary') is-invalid @enderror" id="partner_anniversary" name="partner_anniversary" style="text-transform:uppercase" value="{{ old('partner_anniversary') }}" placeholder="Anniversary Date" />
                                @error('partner_anniversary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 1.8rem">
                            <button type="button" id="add_morepartner" class="btn btn-primary">Add partner</button>
                        </div>
                    </div>
                    <div class="morepartner"></div>
                </div>
                <h5>Address Details</h5>
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">State</label>
                            <select id="state_id" name="state_id" class="form-select @error('state_id') is-invalid @enderror">
                                <option value="">Select</option>
                                @foreach ($states as $state)
                                    @if (old('state_id') == $state->id)
                                        <option value="{{$state->id}}" selected>{{ $state->name}}</option>
                                    @endif
                                    <option value="{{$state->id}}">{{ $state->name}}</option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">City</label>
                            <select id="city_id" name="city_id" class="form-select @error('city_id') is-invalid @enderror">
                                <option value="" >Select State First</option>
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Pincode</label>
                            <input type="text" value="{{old('pincode')}}" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="Pincode" />
                            @error('pincode')
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
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="mobile">Mobile</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile" />
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="key_person">Key Person Name</label>
                    <input type="text" class="form-control @error('key_person') is-invalid @enderror" id="key_person" name="key_person" value="{{ old('key_person') }}" placeholder="Key Person Name" />
                    @error('key_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="dob">DOB</label>
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" style="text-transform:uppercase" value="{{ old('dob') }}" placeholder="Anniversary Date" />
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="marriage_aniversory">Anniversary</label>
                            <input type="date" class="form-control @error('marriage_aniversory') is-invalid @enderror" id="marriage_aniversory" name="marriage_aniversory" style="text-transform:uppercase" value="{{ old('marriage_aniversory') }}" placeholder="Anniversary Date" />
                            @error('marriage_aniversory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="products">
                    <h5>Previous Products Details</h5>
                    <div class="row">
                        <div class="col-xl-5 col-md-5">
                            <div class="mb-3">
                                <label class="form-label" for="previous_product_details_name">Product Name</label>
                                <input type="text" class="form-control @error('previous_product_details_name') is-invalid @enderror" id="previous_product_details_name" name="previous_product_details_name" value="{{ old('previous_product_details_name') }}" placeholder="Product Name" />
                                @error('previous_product_details_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-5">
                            <div class="mb-3">
                                <label class="form-label" for="previous_product_details_brand">Brand Name</label>
                                <input type="text" class="form-control @error('previous_product_details_brand') is-invalid @enderror" id="previous_product_details_brand" name="previous_product_details_brand" value="{{ old('previous_product_details_brand') }}" placeholder="Brand Name" />
                                @error('previous_product_details_brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2" style="margin-top: 1.8rem">
                            <button type="button" id="add_item" class="btn btn-primary">Add products</button>
                        </div>
                    </div>
                    <div class="previous_productitems"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="volume">Any Suggestion</label>
                    <input type="text" class="form-control @error('suggestions') is-invalid @enderror" id="suggestions" name="suggestions" value="{{ old('suggestions') }}" placeholder="Any Suggestion" />
                    @error('suggestions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.TIMEOUT:
            alert("Timeout occurred, please check your network connection and try again.");
            break;
            case error.POSITION_UNAVAILABLE:
            alert("Position is not available, please check your network connection and try again.");
            break;
            case error.PERMISSION_DENIED:
            alert("Permission to access location was denied, please check your browser settings and try again.");
            break;
            default:
           alert("An unknown error occurred, please try again.");
        }
    }

    getLocation();
</script> --}}
@endsection
