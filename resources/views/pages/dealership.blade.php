@extends('layouts.base')

@section('content')

        {{-- <section id="contact">
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
        </section> --}}

        <section class="contact-us v1">
            <div class="container">
                <div class="section-title">
                    <h6>Contact Us</h6>
                    <h2>Get In Touch</h2>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <form action="https://techsometimes.com/products/html/farmus-html/assets/mail.php" method="POST" class="message-form v1">
                            <div class="group-box">
                                <input type="text" name="name" placeholder="Your Name" required>
                                <input type="email" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="group-box">
                                <input type="number" name="phone" placeholder="Phone Number" required>
                                <select>
                                    <option selected="">Your Message</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <textarea name="message" placeholder="Message"></textarea>
                            <button type="submit" class="btn-anime v1 submit-btn">submit now</button>
                            <p class="response"></p>
                        </form>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-info">
                            <h4>Contact Info</h4>
                            <ul class="contact-list">
                                <li>
                                    <div class="my-icon icon-phone"></div>
                                    <div class="text">
                                        <h5>Phone</h5>
                                        <p><a href="tel:+919990 696 316">+91 9990 696 316</a></p>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="my-icon icon-clock"></div>
                                    <div class="text">
                                        <h5>Opening Hour</h5>
                                        <p>9.00-5.00,Friday Off</p>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="my-icon icon-envelope"></div>
                                    <div class="text">
                                        <h5>Email</h5>
                                        <p><a href="mailto:info@anirachemicals.com">info@anirachemicals.com</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="my-icon icon-location-dot"></div>
                                    <div class="text">
                                        <h5>Location</h5>
                                        <p>Lane No-1, Nathanpur Raod, Dehradun (Uttarakhand) Pin-248005</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14613.167032861855!2d90.433811!3d23.701273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b767a022cd4b%3A0xaf33907e219d127!2sRayerbag%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1675146270950!5m2!1sen!2sbd"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
