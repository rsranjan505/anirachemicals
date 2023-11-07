@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Update Products - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin.components.header-nav.product-nav',['activeTab' => 'edit'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('product.update',['product' => $product]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            @if ($product->allimages !=null)
                                @foreach ($product->allimages as $image)
                                {{-- <div style="margin-right: 8px;margin-bottom:8px;"> --}}
                                    <span style="cursor: pointer;padding:10px;" onclick="deleteImge({{$product->id}},'product',{{$image->id}})" class="badge badge-center rounded-pill bg-danger">&times;</span>
                                    <img style="width: 100px; margin:10px;" id="avatarPreview" class=" rounded" src="{{$image->url }}" alt="Card image cap" />
                                {{-- </div> --}}
                                @endforeach

                            @else
                                <img style="width: 100px;" class="d-block rounded" id="avatarPreview" src="{{ asset('assets/img/logo.png')}}" alt="your image" />
                            @endif
                        </div>
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload product image</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload"  name="avatar[]" multiple class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            {{-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
                        </div>
                    </div>

                </div>

                <hr class="my-0">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name">Product Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}" placeholder="Product Name" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="code">Product Code</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $product->code }}" placeholder="Product Code" />
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="brand">Product Brand</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ $product->brand }}" placeholder="Product Brand" />
                            @error('brand')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="code">Product Form</label>
                            <select id="product_form" name="product_form" class="form-select @error('product_form') is-invalid @enderror">
                                <option value="">Select Form</option>
                                <option value="liquid" {{ $product->form == 'liquid' ? 'selected' : ''}}>Liquid</option>
                                <option value="powder" {{ $product->form == 'powder' ? 'selected' : ''}}>Powder</option>
                                <option value="other" {{ $product->form == 'other' ? 'selected' : ''}}>Other</option>
                            </select>
                            @error('product_form')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="type">Product Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ $product->type }}" placeholder="Product Type" />
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="dosage">Dosage</label>
                    <textarea id="dosage" name="dosage" class="form-control @error('dosage') is-invalid @enderror" placeholder="Dosage">{{ $product->dosage }}</textarea>
                    @error('dosage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Product Description</label>
                    <textarea id="description" rows="4" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Product Description">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="advantages">Product Advantages</label>
                    <textarea id="advantages" rows="4" name="advantages" class="form-control @error('advantages') is-invalid @enderror" placeholder="Product Advantages">{{ $product->advantages }}</textarea>
                    @error('advantages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="uses">Uses</label>
                    <textarea id="uses" rows="4" name="uses" class="form-control @error('uses') is-invalid @enderror" placeholder="Uses">{{  $product->uses }}</textarea>
                    @error('uses')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" rows="4" for="other_details">Other Details</label>
                    <textarea id="other_details" name="other_details" class="form-control @error('other_details') is-invalid @enderror" placeholder="Other Details">{{ $product->other_details }}</textarea>
                    @error('other_details')
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
@endsection

{{-- @extends('admin.layouts.base')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            @include('admin/components/header-nav/product-nav',['activeTab' => 'edit'] )
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
                @if (isset($data['product']))
                <form class="form-sample" method="POST" action="{{ route('product-update') }}" enctype="multipart/form-data">
                    @csrf
                    <p class="card-description">
                        Product
                    </p>
                    <input id="id" type="hidden" name="id" value="{{$data['product']->id}}" class="form-control"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Product Name *</label>
                                <input id="name" type="text" value="{{$data['product']->name}}" name="name" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Product Code *</label>
                                <input id="code" type="text" value="{{$data['product']->code}}" name="code" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Product Brand *</label>
                                <input id="brand" type="text" value="{{$data['product']->brand}}" name="brand" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Product Form *</label>

                                <select id="form" type="text" name="form" class="form-control">
                                    <option value >Select Form</option>
                                    <option value="liquid" {{$data['product']->form == 'liquid' ? 'selected' : ''}}>Liquid</option>
                                    <option value="powder" {{$data['product']->form == 'powder' ? 'selected' : ''}}>powder</option>
                                    <option value="other" {{$data['product']->form == 'other' ? 'selected' : ''}}>other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Manufactured By</label>
                                <input id="manufactured_by" value="{{$data['product']->manufactured_by}}" type="text" name="manufactured_by" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Manufactured Date</label>
                                <input id="manufactured_date" value="{{$data['product']->manufactured_date}}" type="date" name="manufactured_date" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Product Dosage *</label>
                                <input id="dosage" type="text" value="{{$data['product']->dosage}}" name="dosage" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Is Active</label>
                                <select  id="is_active" type="text" name="is_active" class="form-control" required>
                                    <option value="1" {{$data['product']->is_active == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{$data['product']->is_active == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Description *</label>
                                <textarea id="description" type="text" name="description" rows="10" class="form-control">{{$data['product']->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Advantages *</label>
                                <textarea id="advantages" type="text" name="advantages" rows="10" class="form-control">{{$data['product']->advantages}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Other Details</label>
                                <textarea id="other_details" type="text" name="other_details" rows="10" class="form-control">{{$data['product']->other_details}}</textarea>
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
                            <img id="avatarPreview" style="border:0.1px solid #000;" width="100px"  height="120px" src="#" alt="your image" />
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
@endsection --}}
