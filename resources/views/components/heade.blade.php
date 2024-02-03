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
                <div class="col-xl-7 p-xl-0">
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
                {{-- <div class="col-xl-4 d-none d-xl-block">
                    <div class=" align-items-xl-center">
                        <span class="my-icon icon-phone"></span>
                        <div class="info-text" style="background: #fff;padding:5px; border-radius:8px;">
                            <p>Customer Support & sell</p>
                            <h6><a href="tel:+91-9990696316">+91 9990 696 316</a></h6>
                        </div>
                        <div class="col-xl-4 d-none d-xl-block">
                            <div class="top-bar-btn">
                                <a href="#" class="link-anime v2"><p>Customer Support & sell</p>
                                +91 9990 696 316</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-3 ">
                    {{-- <div class=" align-items-xl-center"> --}}
                        {{-- <div class="top-bar-btn" style="margin-top: 5px;"> --}}
                            <a href="#" class="left-header"><p>Customer & Support</p>
                            +91 9990 696 316</a>
                        {{-- </div> --}}
                    {{-- </div> --}}
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
                        {{-- <li><a href="#"><span class="my-icon icon-facebook"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-instagram"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-twitter"></span></a></li> --}}
                        <li ><a style="font-weight: 700" href="{{ route('login')}}">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Bar End -->
</header>


