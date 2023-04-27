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
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form-sample" method="POST" action="{{ route('visit-save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-description">
                                        Create Visit
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
                                        </div>
                                    </div>



                                    <h4>Address</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Key Person Name</label>
                                                <input id="key_person" type="text" name="key_person" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Address</label>
                                                <input id="address" type="text" name="address" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">State</label>
                                                <select id="state" type="text" name="state_id" class="form-control">
                                                    <option  >Select State</option>
                                                    @foreach ($data['state'] as $state)
                                                        <option value="{{$state->id}}">{{ $state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">City</label>
                                                <select id="city" type="text" name="city_id" class="form-control">
                                                    <option value="0" >Select State First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Status</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option label="">Select</option>
                                                    <option value="1">Open - Not Contacted</option>
                                                    <option value="2">Working - Contacted</option>
                                                    <option value="3">Closed - Converted</option>
                                                    <option value="4">Closed - Not Converted</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Source</label>
                                                <select id="source" name="source" class="form-control">
                                                    <option label="">Select</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Phone Inquiry">Phone Inquiry</option>
                                                    <option value="Partner Referal">Partner Referal</option>
                                                    <option value="Other">Other</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>To find Latitude and Longitude you have to Click shop image from your mobile with GPS/Location tag Enable setting then, you will get latitude and longitude of in image description</p>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Latitude</label>
                                                <input id="latitude" type="decimal" name="latitude" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Longitude</label>
                                                <input id="longitude" type="decimal" name="longitude" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea id="description" type="text" row="4" name="description" class="form-control"></textarea>
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

<script src="{{ asset('admin/assets/js/anira.js')}}"></script>

<script>
    avatar.onchange = evt => {
        const [file] = avatar.files
        if (file) {
            avatarPreview.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
