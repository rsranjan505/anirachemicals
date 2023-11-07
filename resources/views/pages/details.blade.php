@extends('layouts.base')

@section('content')

<section class="service-details v1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="service-content">
                    <h2>{{ ucfirst($product->name)}} Details </h2>
                    <p>{{$product->description}}</p>
                    <div class="serv-box-img-text">
                        <div class="box-img">
                            <img src="{{asset($product->image->url)}}" height="300px" alt="box-im">
                        </div>
                        <div class="box-text">
                            <h5>{{ ucfirst($product->name)}}</h5>
                            <ul class="check-mark-list v2">
                                <li>
                                    <div class="my-icon icon-check"></div>
                                    <h6>Product Code: {{$product->code}}</h6>
                                </li>
                                <li>
                                    <div class="my-icon icon-check"></div>
                                    <h6>Product Brand: {{ ucfirst($product->brand)}}</h6>
                                </li>
                                <li>
                                    <div class="my-icon icon-check"></div>
                                    <h6>Product Form: {{ ucfirst($product->form)}}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="our-features">
                        <h4>Our Features</h4>
                        <ul>
                            <li>
                                <div class="my-icon icon-lif-life"></div>
                                <div class="text-content">
                                    <h5>Irrigation</h5>
                                    <p>There are many variations of passages of this thisio Lorem Ipsum available, but the majority haiove suffered alteration.</p>
                                </div>
                            </li>
                            <li>
                                <div class="my-icon icon-lif-dron"></div>
                                <div class="text-content">
                                    <h5>Water management</h5>
                                    <p>There are many variations of passages of this thisio Lorem Ipsum available, but the majority haiove suffered alteration.</p>
                                </div>
                            </li>
                            <li>
                                <div class="my-icon icon-lif-win"></div>
                                <div class="text-content">
                                    <h5>Crop planning</h5>
                                    <p>There are many variations of passages of this thisio Lorem Ipsum available, but the majority haiove suffered alteration.</p>
                                </div>
                            </li>
                            <li>
                                <div class="my-icon icon-lif-setting"></div>
                                <div class="text-content">
                                    <h5>Soil testing</h5>
                                    <p>There are many variations of passages of this thisio Lorem Ipsum available, but the majority haiove suffered alteration.</p>
                                </div>
                            </li>
                        </ul>
                    </div> --}}

                        <br>
                    @if ($product->advantages !=null)
                        <div class="key-service">
                            <h4>Advantages</h4>
                        </div>
                        <div class="para-text">
                            <p>{{$product->advantages}}</p>

                        </div>
                        <hr>
                    @endif

                    @if ($product->uses !=null)
                        <div class="key-service">
                            <h4>Uses</h4>
                        </div>
                        <div class="para-text">
                            <p>{{$product->uses}}</p>

                        </div>
                        <hr>
                    @endif

                    @if ($product->other_details !=null)
                        <div class="key-service">
                            <h4>Other Details</h4>
                        </div>
                        <div class="para-text">
                            <p>{{$product->other_details}}</p>

                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</section>

        {{-- @if( request()->route('name') == 'brickbond')
            @include('pages.products.Uni1Brickbond')
        @elseif ( request()->route('name') == 'bondlw')
            @include('pages.products.Uni1Bondlw')
        @elseif ( request()->route('name') == 'paverbond')
            @include('pages.products.Uni1Paverbond')
        @elseif ( request()->route('name') == 'sbrlatex')
            @include('pages.products.Uni1SBRlatex')
        @endif

      @include('components.requestcontent') --}}

@endsection

