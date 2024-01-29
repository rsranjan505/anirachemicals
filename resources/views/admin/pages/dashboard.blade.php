@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('admin/assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Hi, {{ ucfirst(auth()->user()->first_name)}}! 🎉</h5>
            {{-- <p class="mb-4">You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in your profile.</p> --}}

            {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('admin/assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('admin/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="{{route('visit.index')}}">View More</a>
                  {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Visits</span>
            <h3 class="card-title mb-2">{{$data['visitcount']}}</h3>
            {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +72.80%</small> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('admin/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{route('vendor.index')}}">View More</a>
                  {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <span>Vendors</span>
            <h3 class="card-title text-nowrap mb-1">{{$data['vendorcount']}}</h3>
            {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('admin/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="{{route('order.index')}}">View More</a>
                      {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Recent Orders</span>
                <h3 class="card-title mb-2">{{$data['recentorder']}}</h3>
                {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +72.80%</small> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('admin/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="{{route('order.index')}}">View More</a>
                      {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                    </div>
                  </div>
                </div>
                <span>Delivered Order</span>
                <h3 class="card-title text-nowrap mb-1">{{$data['deliveredorder']}}</h3>
                {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.42%</small> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
