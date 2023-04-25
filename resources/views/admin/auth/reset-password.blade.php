@extends('admin.layouts.base')

@section('content')


    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="card-header">{{ __('Reset Password') }}</div>
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- <img src="{{ asset('assets/img/logo.png')}}" style="width: 50px;" alt="logo"> --}}
                @if (isset($message))
                    <h4 class="danger">{{ $message }}</h4>
                @endif
              </div>
              <h6 class="font-weight-light"></h6>
                <form method="POST" action="{{ route('reset-password') }}" class="pt-3">
                    @csrf
                    <input type="hidden" value="{{$token}}" name="passwordToken">
                    <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="confirm-password" required autocomplete="confirm-password" placeholder="Confirm Password">
                        @error('confirm-password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" id="submit">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

@endsection
