@extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{Auth::user()->first_name}}</h3>
                        {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    {{-- <div class="card-body">
                        <a href="{{ route('vendor')}}" class="btn btn-primary">Vendor Registration</a>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Take Order</a>
                    </div> --}}

                    <div class="card-people mt-auto">
                        <img src="{{ asset('assets/img/req-img.jpg')}}" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>

                                    {{-- <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2> --}}
                                </div>
                                <div class="ml-2">
                                    {{-- <h4 class="location font-weight-normal">Bangalore</h4>
                                    <h6 class="font-weight-normal">India</h6> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Total Vendors</p>
                                <p class="fs-30 mb-2">{{$data['vendor']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Deliverd Order</p>
                                <p class="fs-30 mb-2">{{$data['orderDelivered']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Order on Queue</p>
                                <p class="fs-30 mb-2">{{$data['orderPending']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Total Products</p>
                                <p class="fs-30 mb-2">{{$data['product']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
