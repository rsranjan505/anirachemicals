@extends('layouts.base')

@section('content')
   <!-- ======= Breadcrumbs Section ======= -->
   <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">

        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li>Contact Us</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <!-- ======= Call To Action Section ======= -->



  <!-- ======= Contact Section ======= -->
  <section id="contact">
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
  </section><!-- End Contact Section -->


  @include('components.requestcontent')

    @endsection
