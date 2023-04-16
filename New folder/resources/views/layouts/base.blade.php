<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{isset($title) ? $title : ''}}</title>

         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="{{isset($description) ? $description :''}}">
        <meta name="keywords" content="{{isset($keywords) ? $keywords :''}}">
        <meta name="robots" content="index,follow">
        <meta name="author" content="{{isset($author) ? $author :''}}" />
        <link rel="canonical" href="{{isset($og_url) ? $og_url :''}}" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="{{isset($og_type) ? $og_type :''}}" />
        <meta property="og:url" content="{{isset($og_url) ? $og_url :''}}" />
        <meta property="og:title" content="{{isset($title) ? $title : ''}}" />
        <meta property="og:description" content="Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services. We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements." />
        <meta property="og:site_name" content="Anira Chemicals" />
        <meta property="og:image" content="http://anirachemicals.com/public/assets/img/logo-name.png" />

        <!-- Favicons -->
        <link href="{{$publicurl}}assets/img/favicon.png" rel="icon">
        <link href="{{$publicurl}}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset($publicurl.'assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset($publicurl.'assets/css/style.css')}}" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>
    <body>

        {{-- header --}}

        <x-heade publicurl={{$publicurl}}></x-heade>
        {{-- @extends('components.heade',['publicurl' => $publicurl]) --}}
        {{-- hero section --}}
        <x-hero_section publicurl={{$publicurl}} />
        {{-- @extends('components.hero_section',['publicurl' => $publicurl]) --}}


        <main id="main">
        @yield('content')
        </main>

        <x-footer />

        <!-- Vendor JS Files -->
    <script src="{{ asset($publicurl.'assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset($publicurl.'assets/js/main.js')}}"></script>

    </body>
</html>
