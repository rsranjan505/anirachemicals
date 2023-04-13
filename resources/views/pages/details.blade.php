@extends('layouts.base')

@section('content')

	    <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

              <div class="d-flex justify-content-between align-items-center">

                <ol>
                    <li><a href="{{ route('/home') }}">Home</a></li>
                    <li>Product Details</li>
                </ol>
              </div>

            </div>
          </section><!-- End Breadcrumbs Section -->


        @if( request()->route('name') == 'brickbond')
            @include('pages.products.Uni1Brickbond')
        @elseif ( request()->route('name') == 'bondlw')
            @include('pages.products.Uni1Bondlw')
        @elseif ( request()->route('name') == 'paverbond')
            @include('pages.products.Uni1Paverbond')
        @elseif ( request()->route('name') == 'sbrlatex')
            @include('pages.products.Uni1SBRlatex')
        @endif

      @include('components.requestcontent')

@endsection

