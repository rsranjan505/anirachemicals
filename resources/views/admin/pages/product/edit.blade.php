@extends('admin.layouts.base')

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
@endsection
