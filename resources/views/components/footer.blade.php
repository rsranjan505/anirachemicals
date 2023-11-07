
<footer>
    <!-- Info Footer Start -->
    <div class="info-footer bg-cover-center v1" data-background="assets/img/footer/v1/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="icon-title">
                            {{-- <div class="my-icon icon-phone-volume"></div> --}}
                            <h5>About Us</h5>
                        </div>
                            <p>ANIRA Chemicals (ACPL) is a young manufacturer of wide range of construction chemicals and allied products. At ACPL, we aim at delivering high quality goods and providing impeccable services .</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6">
                    <div class="footer__widget">
                        <ul class="address-info">
                            <li>
                                <div class="icon-title">
                                    <div class="my-icon icon-phone-volume"></div>
                                    <h5>CONTACT US</h5>
                                </div>
                                <ul class="text-info">
                                    <li>
                                        <p><a href="#">contact@anirachemicals.com</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">+91 9990 696 316</a></p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="icon-title">
                                    <div class="my-icon icon-location-dot"></div>
                                    <h5>ADDRESS</h5>
                                </div>
                                <ul class="text-info">
                                    <li>
                                        <p>Lane No-1, Nathanpur Raod, Dehradun (Uttarakhand) Pin-248005</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2">
                    <div class="footer__widget">
                        {{-- <h5 class="footer__widget-title">Quick Links</h5> --}}
                        <div class="footer__widget-content">
                            <div class="our-link">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact </a></li>
                                    <li><a href="{{ route('career') }}">Career</a></li>
                                    <li><a href="https://mail.hostinger.com/?_task=logout&_token=PAo5K5JyzPNPwskv6i1pCT8L4r1IHw5J" target="_blank">Webmail</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2">
                    <div class="footer__widget">
                        {{-- <h5 class="footer__widget-title">Links</h5> --}}
                        <div class="footer__widget-content">
                            <div class="our-link">
                                <ul>
                                    <li><a href="{{ route('product') }}">Products</a></li>
                                    <li><a href="{{ route('client') }}">Clients</a></li>
                                    <li><a href="{{ route('dealership') }}">Dealership Enquiry</a></li>
                                    <li><a href="{{ route('gallery') }}">Media & Gallery</a></li>
                                    <li><a href="{{ route('user-login') }}">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer">
                <div class="social-link">
                    <ul>
                        <li><a href="#"><span class="my-icon icon-twitter"></span></a></li>
                         <li><a href="#"><span class="my-icon icon-facebook"></span></a></li>
                         <li><a href="#"><span class="my-icon icon-instagram"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-pinterest"></span></a></li>
                     </ul>
                </div>
                <p>© <a href="www.anirachemicals.com">Anira Chemicals Pvt. Ltd.</a> 2023 | All Rights Reserved</p>
            </div>
        </div>
    </div>

    <a class="whatsapp jd-flex align-items-center justify-content-center" href="https://api.whatsapp.com/send?phone=+91999096316&text=Helo%21%20Anira%20Chemicals" target="_blank">
        <img src="{{ asset('assets/img/whats.png')}}" style="height:40px;" > </span>
    </a>
    <!-- Info Footer End -->
</footer>


<script>
    function random(min,max)
    {
        return Math.floor(Math.random()*(max-min+1)+min);
    }

    var initial = random(10000, 2000);
    var count = initial;

    setInterval(function() {
    var variation = random(-5,5);

    count += variation
    console.log('You currently have ' + count + ' visitors')

    }, 2000)
</script>


</div>
