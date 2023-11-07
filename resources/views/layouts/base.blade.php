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
        <link href="{{ asset("assets/img/favicon.png")}}" rel="icon">
        <link href="{{ asset("assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet"> --}}

        <!-- Vendor CSS Files -->
        {{-- <link href="{{ asset($publicurl.'assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{ asset($publicurl.'assets/css/style.css')}}" rel="stylesheet">
         --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}">
        <!-- All Icons -->
        <link rel="stylesheet" href="{{ asset("assets/all-icons/myicon.css")}}">
        <!-- Plugin -->
        <link rel="stylesheet" href="{{ asset("assets/css/plugins.min.css")}}">
        <!-- Style -->
        <link rel="stylesheet" href="{{ asset("assets/css/style.min.css")}}">
        <!-- Responsive -->
        <link rel="stylesheet" href="{{ asset("assets/css/responsive.min.css")}}">

        <link rel="stylesheet" href="{{ asset("assets/css/custom.css")}}">

    </head>
    <body>
        <div id="main-wrapper">
            {{-- header --}}
            {{-- <x-heade products={{$products}}></x-heade> --}}
            @include('components.heade')

            <main id="main">
                @if (Request::is('/') )
                    <x-hero_section publicurl={{$publicurl}} />
                @else
                   @include('components.bread-cumb')
                @endif

                @yield('content')
            </main>

            <x-footer />
        </div>
        <!-- Vendor JS Files -->
    {{-- <script src="{{ asset($publicurl.'assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset($publicurl.'assets/js/main.js')}}"></script> --}}

    <!-- jQuery -->
    <script src="{{ asset("assets/js/jquery-3.7.0.min.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("assets/js/bootstrap.min.js")}}"></script>
    <!-- Plugins -->
    <script src="{{ asset("assets/js/plugins.min.js")}}"></script>
    <!-- Index -->
    <script src="{{ asset("assets/js/index.min.js")}}"></script>

    </body>
</html>
