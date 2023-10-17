@extends('layouts.base')

@section('content')

	    <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
              <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Dealership</li>
                </ol>
              </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container" data-aos="fade-up">
              <div class="row col-sm-12 col-md-12 col-lg-12">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="container">
                          <div class="form">
                            <form action="{{ route('enquiry') }}" method="POST" role="form" class="php-email-form">
                                @csrf
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                                </div>
                              </div>

                              <div class="row mt-3">
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                  <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Your Mobile" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                              </div>

                              <div class="row mt-3">
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                  <input type="text" name="state" class="form-control" id="state" placeholder="State Name" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                  <input type="text" class="form-control" name="district" id="district" placeholder="District" required>
                                </div>
                              </div>

                              <div class="form-group mt-3">
                                <input type="text" class="form-control" name="message" id="message" placeholder="Message" required>
                              </div>


                              <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                              </div>
                              <div class="text-center my-3" ><button type="submit">Send request</button></div>
                            </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <img src=" {{$publicurl}}assets/img/req-img.jpg" alt="">
                  </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

        @include('components.requestcontent')

@endsection
