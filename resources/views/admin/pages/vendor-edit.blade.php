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
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (isset($data['vendor']) and $data['vendor'] !=null)
                                        <form class="form-sample" method="POST" action="{{ route('vendor-update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <p class="card-description">
                                            Update Vendor
                                            </p>
                                            <div class="row">
                                                <input id="id" type="hidden" name="id" value="{{ $data['vendor']->id }}" class="form-control"/>
                                                <div class="col-md-6">
                                                    <div class="row">
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div style="border:#000 0.5px solid;margin-left:20%; border-radius:5px;">
                                                            <img id="imgV{{$data['vendor']->id}}" onclick="imageView({{$data['vendor']->id}});" style="" height="200px" src="{{$data['vendor'] !=null ? $data['vendor']->image->url : ''}}" alt="image" data-mdb-img="{{$data['vendor']->image->url}}"
                                                            alt="visiting image"
                                                            />
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>


                                            <div class="partner" style="padding:15px;">
                                                <h4>Partner Details</h4>
                                                @if (isset($data['partner']))
                                                <div class="row">
                                                    @if ($data['partner'] !=null)
                                                        @foreach ( $data['partner']['name'] as  $key0 => $value)
                                                            @foreach ( $data['partner'] as  $key => $partner)
                                                                <div class="col-md-{{$key == 'name' ? '4' : '2'}}">
                                                                    <div class="form-group">
                                                                        <input id="partner_details" value="{{ $key == 'dob' && 'anniversary' ? date('d-m-Y', strtotime($data['partner'][$key][$key0])): $data['partner'][$key][$key0]}}"  type="text" name="partner_details[{{$key}}][]" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endforeach
                                                    @endif

                                                </div>
                                                @endif
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
                                                            <input id="partner_details" type="date" name="partner_details[anniversary][]" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top: 3.8rem">
                                                        <a id="add_morepartner" class="btn btn-primary mr-2">Add partner</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="morepartner">
                                            </div>
                                            <h4 style="margin-top: 3.8rem">Address</h4>
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
                                                                <option value="{{$state->id}}" {{$data['vendor']->state == $state->id ? 'selected' : '' }}>{{ $state->name}}</option>
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
                                                            <option >Select State First</option>
                                                            @foreach ($data['city'] as $city)
                                                                <option value="{{$city->id}}" {{$data['vendor']->city == $city->id ? 'selected' : '' }}>{{ $city->name}}</option>
                                                            @endforeach
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
                                            @if (isset($data['previous_product']))
                                                <div class="row">
                                                    @foreach ( $data['previous_product']['name'] as  $key0 => $value)
                                                        @foreach ( $data['previous_product'] as  $key => $partner)
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <input id="previous_product_details" value="{{ $data['previous_product'][$key][$key0]}}"  type="text" name="previous_product_details[{{$key}}][]" class="form-control"/>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            @endif
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

                                            {{-- <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Upload Vendor Photo</label>
                                                        <input type="file" id="avatar"  name="avatar" class="form-control"/>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>File upload</label>
                                                        <input type="file" name="avatar" name="avatar" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                          <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                          </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="#" alt="your image" />
                                                </div>
                                            </div> --}}
                                            {{-- <label class="col-form-label">Upload Support Documnets</label>
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
                                            </div> --}}
                                        <hr>
                                            <h4>Supported documents</h4>
                                            <table class="table">
                                                <thead>
                                                    <th>SN</th>
                                                    <th>Document</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @if ($data['vendor']->document !=null && $data['vendor']->document)
                                                        @foreach ( $data['vendor']->document as $index => $document)
                                                        <tr>
                                                            <td>{{$index + 1}}</td>
                                                            <td>
                                                                <img id="imgV{{$index}}" onclick="imageView({{$index}})" src="{{$document->url}}" alt="image" data-mdb-img="{{$document->url}}"
                                                                alt="visiting image"
                                                                />
                                                            </td>

                                                            {{-- <td> <a href="#" download="{{$document->url}}"> Download</td> --}}
                                                            <td> <a href="{{ route('download-image',$document->id)}}" target="_blank"> Download</td>

                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>

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
