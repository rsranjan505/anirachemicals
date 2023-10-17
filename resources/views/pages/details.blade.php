@extends('layouts.base')

@section('content')

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

