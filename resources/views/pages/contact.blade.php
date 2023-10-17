@extends('layouts.base')

@section('content')

  {{-- <section id="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Contact Us</h2>
        <p>We are an eco-friendly company give highest priority   to   safety,   health and environment management by adhering to strict procedures at all times.</p>
      </div>

      <div class="row contact-info">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <address>Lane No-1, Nathanpur Raod, Dehradun (Uttarakhand) Pin-248005</address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="bi bi-phone"></i>
            <h3>Phone Number</h3>
            <p><a href="tel:+919990 696 316">+91 9990 696 316</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="bi bi-envelope"></i>
            <h3>Email</h3>
            <p><a href="mailto:info@anirachemicals.com">info@anirachemicals.com</a></p>
          </div>
        </div>

      </div>
    </div>
      <!-- End Contact
    <div class="container mb-4">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    Section -->

    <div class="container">
      <div class="form">
        <form action="{{ route('contact/mail')}}" method="post" role="form" class="php-email-form">
            @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
          </div>

          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>

          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>

    </div>
  </section> --}}

  <section class="map-info v1">
    <div class="container">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14613.167032861855!2d90.433811!3d23.701273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b767a022cd4b%3A0xaf33907e219d127!2sRayerbag%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1675146270950!5m2!1sen!2sbd"></iframe>
        </div>
        <ul class="contact-info">
            <li>
                <div class="my-icon icon-phone-volume-2"></div>
                <div class="text">
                    <h4>Contacts</h4>
                    <p><a href="tel:+919990 696 316">+91 9990 696 316</a></p>
                </div>
            </li>
            <li>
                <div class="my-icon icon-envelope-open"></div>
                <div class="text">
                    <h4>Email</h4>
                    <p><a href="mailto:info@anirachemicals.com">info@anirachemicals.com</a></p>
                </div>
            </li>
            <li>
                <div class="my-icon icon-home"></div>
                <div class="text">
                    <h4>Location</h4>
                    <p>Lane No-1, Nathanpur Raod, Dehradun (Uttarakhand) Pin-248005</p>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Map Info End -->
<!-- Contact Us Start -->
<section class="contact-us v3">
    <div class="container">
        <div class="section-title-center">
            <h2>We Can take your <br> business to growth</h2>
            {{-- <p>For your car we will do everything  advice, repairs and maintenance. We are the some preferred choice by many car owners because our experience and knowledge is selfe vident.For your car.</p> --}}
        </div>
        <form action="{{ route('contact/mail')}}" method="POST" class="message-form v3 php-email-form">
            @csrf
            <div class="group-box">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
            </div>
            <textarea name="message" placeholder="Message"></textarea>
            <button type="submit" class="btn-anime v1 submit-btn">submit now</button>
            {{-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> --}}
            <p class="response"></p>
        </form>
    </div>
</section>


    @endsection
