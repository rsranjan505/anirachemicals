@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                @include('admin/components/header-nav/visit-nav',['activeTab' => 'edit'] )
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
                                                <input id="name_of_establishment" type="text" value="{{ $data['visit']->name_of_establishment }}"  name="name_of_establishment" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Establishment Type</label>
                                                <select id="establishment_type" name="establishment_type" class="form-control">

                                                    <option label="">Select</option>
                                                    <option value="1" {{ $data['visit']->establishment_type == 1 ? 'selected' : '' }}>Individual</option>
                                                    <option value="2" {{ $data['visit']->establishment_type == 2 ? 'selected' : '' }}>LLP</option>
                                                    <option value="3" {{ $data['visit']->establishment_type == 3 ? 'selected' : '' }}>OPC</option>
                                                    <option value="4" {{ $data['visit']->establishment_type == 4 ? 'selected' : '' }}>Propietorship</option>
                                                    <option value="5" {{ $data['visit']->establishment_type == 5 ? 'selected' : '' }}>Partnership</option>
                                                    <option value="6" {{ $data['visit']->establishment_type == 6 ? 'selected' : '' }}>Pvt. Ltd.</option>
                                                    <option value="7" {{ $data['visit']->establishment_type == 7 ? 'selected' : '' }}>Ltd.</option>
                                                    <option value="8" {{ $data['visit']->establishment_type == 8 ? 'selected' : '' }}>Other</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>



                                    <h4>Address</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Key Person Name</label>
                                                <input id="key_person" type="text" value="{{ $data['visit']->key_person }}"  name="key_person" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Address</label>
                                                <input id="address" type="text" value="{{ $data['visit']->address }}" name="address" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">State</label>
                                                <select id="state" type="text" name="state_id" class="form-control"  required>
                                                    <option value="" >Select State</option>
                                                    @foreach ($data['state'] as $state)
                                                        <option value="{{$state->id}}"  {{ $data['visit']->state_id == $state->id ? 'selected' :'' }}>{{ $state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">City</label>
                                                <select id="city" type="text" name="city_id" class="form-control" required>
                                                    <option value="{{$data['visit']->city_id }}" >{{$data['visit']->city->name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Pincode</label>
                                                <input id="pincode" type="number" value="{{ $data['visit']->pincode }}" name="pincode" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email</label>
                                                <input id="email" type="email" name="email" value="{{ $data['visit']->email }}" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Mobile</label>
                                                <input id="mobile" type="number" name="mobile" value="{{ $data['visit']->mobile }}" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Status</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option label="">Select</option>
                                                    <option value="1" {{ $data['visit']->status == '1' ? 'selected' :'' }}>Open - Not Contacted</option>
                                                    <option value="2" {{ $data['visit']->status == '2' ? 'selected' :'' }}>Working - Contacted</option>
                                                    <option value="3" {{ $data['visit']->status == '3' ? 'selected' :'' }}>Closed - Converted</option>
                                                    <option value="4" {{ $data['visit']->status == '4' ? 'selected' :'' }}>Closed - Not Converted</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Source</label>
                                                <select id="source" name="source" class="form-control">
                                                    <option label="">Select</option>
                                                    <option value="Website" {{ $data['visit']->source == 'Website' ? 'selected' :'' }}>Website</option>
                                                    <option value="Phone Inquiry" {{ $data['visit']->source == 'Phone Inquiry' ? 'selected' :'' }}>Phone Inquiry</option>
                                                    <option value="Partner Referal" {{ $data['visit']->source == 'Partner Referal' ? 'selected' :'' }}>Partner Referal</option>
                                                    <option value="Other" {{ $data['visit']->source == 'Other' ? 'selected' :'' }}>Other</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p></p><strong> Note:</strong> To find Latitude and Longitude you have to take shop image from your mobile with GPS/Location tag Enable setting then, you will get latitude and longitude in image description.</p>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Latitude</label>
                                                <input id="latitude" type="decimal" value="{{ $data['visit']->latitude }}" name="latitude" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Longitude</label>
                                                <input id="longitude" type="decimal" value="{{ $data['visit']->longitude }}" name="longitude" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea id="description" type="text" row="4" name="description" class="form-control">{{ $data['visit']->description }}</textarea>
                                            </div>
                                        </div>

                                    </div>


                                    {{-- <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="col-form-label">Upload Visiting Card </label>
                                                <input type="file" id="avatar"  name="avatar" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="{{ asset('admin/assets/images/accounticon.png')}}" alt="your image" />
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="col-form-label">Upload Visiting Card </label>
                                                <input type="file" id="avatar"  name="avatar" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            @if ($data['visit']->image !=null)
                                                <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="{{ $data['visit']->image->url}}" alt="your image" />
                                            @else
                                                <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="{{ asset('admin/assets/images/accounticon.png')}}" alt="your image" />
                                            @endif

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
