@extends('admin.layouts.base')

@section('content')


    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="card-header">{{ __('Forget Password') }}</div>
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- <img src="{{ asset('assets/img/logo.png')}}" style="width: 50px;" alt="logo"> --}}
                @if (isset($message))
                    <h4 class="danger">{{ $message }}</h4>
                @endif
              </div>
              <h6 class="font-weight-light"></h6>
                <form method="POST" action="{{ route('request-password') }}" class="pt-3">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="User Name">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" id="submit">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

@endsection
