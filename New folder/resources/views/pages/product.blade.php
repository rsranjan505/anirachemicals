@extends('layouts.base')

@section('content')

   <!-- ======= Breadcrumbs Section ======= -->
   <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">

        <ol>
          <li><a href="{{ route('/home') }}">Home</a></li>
          <li>Products</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

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
