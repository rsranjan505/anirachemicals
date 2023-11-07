
     <!-- ======= Top Bar ======= -->
  {{-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@anirachemicals.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><a href="tel:919990696316"><span>+91 9990 696 316</span></a></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>

      </div>
    </div>
  </section>


  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1> --}}
            {{-- <a href="{{ route('home') }}">Anira<span>Chemicals</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        {{-- <a href="{{ route('home') }}"><img src="{{ asset($publicurl.'assets/img/logo-name.png')}}" alt=""></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto {{Request::is('/') ? 'active' : ''}}" href="{{ route('home') }}">Home</a></li>
            <li><a class="nav-link scrollto {{Request::is('about') ? 'active' : ''}}" href="{{ route('/about') }}">About</a></li>
            <li><a class="nav-link scrollto {{Request::is('product','details/'.request()->route('name')) ? 'active' : ''}}" href="{{ route('/product') }}">Products</a></li>
            <li><a class="nav-link scrollto {{Request::is('dealership') ? 'active' : ''}}" href="{{ route('dealership') }}">Dealership Enquiry</a></li>
            <li><a class="nav-link scrollto {{Request::is('client') ? 'active' : ''}}" href="{{ route('/client') }}">Client</a></li>
            <li><a class="nav-link scrollto {{Request::is('gallery') ? 'active' : ''}}" href="{{ route('/gallery') }}">Gallery</a></li>
		    <li><a class="nav-link scrollto {{Request::is('career') ? 'active' : ''}}" href="{{ route('/career') }}">Careers</a></li>
            <li><a class="nav-link scrollto {{Request::is('contact') ? 'active' : ''}}" href="{{ route('/contact') }}">Contact</a></li>

        </ul>
        <a class="btn btn-primary admin-login" href="{{ route('user-login') }}">Login</a>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header> --}}




<header style="background: green;">
    <!-- Top Bar Start -->
    <div class="top-bar v1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 d-none d-xl-block">
                    <div class="top-bar-logo">
                        <a href="{{ route('home') }}"><img src="{{asset('assets/img/logo-name.png')}}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-xl-8 p-xl-0">z
                    <div class="top-bar-info">
                        <div class="top-info d-none d-lg-flex">
                            {{-- <p>Give Food Energy to World</p> --}}
                            {{-- <ul>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">News & Media</a></li>
                                <li><a href="#">Faqs</a></li>
                            </ul> --}}
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class=" align-items-xl-center">
                        {{-- <span class="my-icon icon-phone"></span> --}}
                        <div class="info-text" style="background: #fff;padding:5px; border-radius:8px;">
                            <p>Customer Support & sell</p>
                            <h6><a href="tel:+91-9990696316">+91 9990 696 316</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Menu Bar Start -->
    <div class="menu-bar v1">
        <div class="container">
            <div class="menu-bar-content">
                <nav class="main-menu">

                    <ul>
                        <li class=" {{Request::is('/') ? 'active' : ''}}">
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{Request::is('about') ? 'active' : ''}}"><a href="{{ route('about') }}">About Us</a></li>
                        <li class="has-dropdown {{Request::is('product') ? 'active' : ''}}">
                            <a href="{{ route('product') }}">Products</a>
                            <ul>
                                @if (isset($products))
                                    @foreach ($products as $product)
                                        <li><a href="{{route('product.details',['name' => $product->slug])}}">{{ ucfirst($product->name)}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li class="{{Request::is('dealership') ? 'active' : ''}}">
                            <a href="{{ route('dealership') }}">Dealership</a>
                            {{-- <ul>
                                <li><a href="projects.html">Dealership</a></li>
                                <li><a href="projects-details.html">Projects Details</a></li>
                            </ul> --}}
                        </li>
                        <li class=" {{Request::is('client') ? 'active' : ''}}">
                            <a href="{{ route('client') }}">Clients</a>
                        </li>
                        <li class=" {{Request::is('gallery') ? 'active' : ''}}">
                            <a href="{{ route('gallery') }}">Media & Gallery</a>
                            {{-- <ul>
                                <li><a href="blog.html">Media & Gallery</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul> --}}
                        </li>
                        <li class="{{Request::is('career') ? 'active' : ''}}">
                            <a href="{{ route('career') }}">Careers</a>
                        </li>
                         <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
                <div class="social-link">
                    <ul>
                        <li><a href="#"><span class="my-icon icon-facebook"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-instagram"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-twitter"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-linkedin-in"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Bar End -->
</header>


