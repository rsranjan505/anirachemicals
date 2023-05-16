
     <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
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
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1>
            {{-- <a href="{{ route('/home') }}">Anira<span>Chemicals</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('/home') }}"><img src="{{ asset($publicurl.'assets/img/logo-name.png')}}" alt=""></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto {{Request::is('/') ? 'active' : ''}}" href="{{ route('/home') }}">Home</a></li>
            <li><a class="nav-link scrollto {{Request::is('about') ? 'active' : ''}}" href="{{ route('/about') }}">About</a></li>
            <li><a class="nav-link scrollto {{Request::is('product','details/'.request()->route('name')) ? 'active' : ''}}" href="{{ route('/product') }}">Products</a></li>
            <li><a class="nav-link scrollto {{Request::is('dealership') ? 'active' : ''}}" href="{{ route('/dealership') }}">Dealership Enquiry</a></li>
            <li><a class="nav-link scrollto {{Request::is('client') ? 'active' : ''}}" href="{{ route('/client') }}">Client</a></li>
            <li><a class="nav-link scrollto {{Request::is('gallery') ? 'active' : ''}}" href="{{ route('/gallery') }}">Gallery</a></li>
		    <li><a class="nav-link scrollto {{Request::is('career') ? 'active' : ''}}" href="{{ route('/career') }}">Careers</a></li>
            <li><a class="nav-link scrollto {{Request::is('contact') ? 'active' : ''}}" href="{{ route('/contact') }}">Contact</a></li>

        </ul>
        <a class="btn btn-primary admin-login" href="{{ route('user-login') }}">Login</a>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

