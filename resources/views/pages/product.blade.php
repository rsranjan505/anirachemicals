@extends('layouts.base')

@section('content')
    @include('pages.products.list')


    <section id="about">
        <div class="container" data-aos="fade-up">

            {{-- <div class="col-lg-6 content">
                <a href="#">Download Our Browser</a>
            </div>
            <div class="col-lg-6 content">
                <a href="#">Download Our Browser</a>
            </div> --}}
            {{-- <div class="col-lg-12 content">
                <a href="#" download="{{ url('downloadfile')}}">Download Our Browser</a>
            </div> --}}

            <div class="col-lg-12 content">
                <a href="{{ asset($publicurl.'assets/img/broser.pdf')}}" target="_blank">Download Our Browser</a>
            </div>
        </div>
    </section>

    @include('components.requestcontent')

@endsection
