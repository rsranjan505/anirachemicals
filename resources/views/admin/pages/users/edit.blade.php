@extends('admin.layouts.base')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            @include('admin/components/header-nav/admin-user-nav',['activeTab' => 'edit'] )
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
                @if (isset($data['user']))
                <form method="POST" action="{{ route('user-update') }}">
                    @csrf
                    <input id="id" type="hidden" name="id" value="{{ $data['user']->id }}" class="form-control"/>
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $data['user']->first_name }}" required autocomplete="first_name" autofocus>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $data['user']->last_name }}" required autocomplete="last_name" autofocus>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['user']->email }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>
                        <div class="col-md-6">
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $data['user']->mobile }}" required autocomplete="mobile" autofocus>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $data['user']->address }}" required autocomplete="address" autofocus>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="state_id" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>
                        <div class="col-md-6">
                            <select  id="state_id" type="text" name="state_id" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach ($data['state'] as $state)
                                    <option value="{{$state->id}}" {{ $data['user']->state_id == $state->id ? 'selected' : '' }}>{{ $state->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="city_id" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                        <div class="col-md-6">
                            <select id="city_id" type="text" name="city_id" class="form-control">

                            <option >Select State First</option>
                                @foreach ($data['city'] as $city)
                                    <option value="{{$city->id}}" {{$data['user']->city_id == $city->id ? 'selected' : '' }}>{{ $city->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="pincode" class="col-md-4 col-form-label text-md-end">{{ __('Pincode') }}</label>
                        <div class="col-md-6">
                            <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ $data['user']->pincode }}" required autocomplete="pincode" autofocus>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('Is Admin') }}</label>
                        <div class="col-md-6">
                            <select  id="is_admin" type="text" name="is_admin" class="form-control" required>
                                <option value="0" {{$data['user']->is_admin ==0 ? 'selected' : ''}}>No</option>
                                <option value="1" {{$data['user']->is_admin ==1 ? 'selected' : ''}}>Yes</option>
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="user_type" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>
                        <div class="col-md-6">
                            <select  id="user_type" type="text" name="user_type" class="form-control" required>
                                <option >Select User Type</option>
                                <option value="admin" {{$data['user']->user_type == 'admin' ? 'selected' : ''}}>Admin</option>
                                <option value="employee" {{$data['user']->user_type =='employee' ? 'selected' : ''}}>Employee</option>
                                <option value="vendor" {{$data['user']->user_type == 'vendor' ? 'selected' : ''}}>Vendor</option>
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="is_active" class="col-md-4 col-form-label text-md-end">{{ __('Is Active') }}</label>
                        <div class="col-md-6">
                            <select  id="is_active" type="text" name="is_active" class="form-control" required>
                                <option value="0" {{$data['user']->is_admin ==0 ? 'selected' : ''}}>No</option>
                                <option value="1" {{$data['user']->is_admin ==1 ? 'selected' : ''}}>Yes</option>
                            </select>

                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
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
