@extends('layouts.base')

@section('content')

      <!-- ======= About Section ======= -->
    {{-- <section id="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 about-img">
                <img src=" {{$publicurl}}assets/img/about-img.jpg" alt="">
            </div>

            <div class="col-lg-6 content">
                <h2>SECURING YOUR WORLD THROUGH INNOVATIVE PRODUCTS</h2>

                <p><strong>ANIRA Chemicals (ACPL)</strong> is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements. Equipped with highly qualified technical team, working for continuous innovation and delivering unmatched services, we have achieved meritorious growth in a very short time.</br>

                We are an eco-friendly company give highest priority   to   safety,   health and environment management by adhering to strict procedures at all times.</p>

                <p> At ACPL, we believe in adding value to our customers, business partners & employees and creating landmarks for them & ourselves in terms of growth and achievements.</br>

                The ACPL Group is a diversified business group focused principally on govt construction contracts and premium residential construction. Its business covers a combination of building development, manufacturing, processing and trading activities.</p>
                <h5><strong>The ACPL Group subsidiaries include:</strong></h5>
                <p>Education wherein the group is promoting LMC (Leela Mandal College), an educational institute that is committed to imparting quality education with a balanced practical exposure to the students to inbuilt employability skills, even in undergraduates. Excellent infrastructure and facilities have been created for teaching/learning, co-curricular and extracurricular activities. Management is fully committed to ensuring good standards and excellence in educating and equipping our students for their overall development and growth so that they become a successful professional of society. </p>
                <h5><strong>Finance and venture Capital:</strong></h5>
                <p>Under the watchful eye of Mr Arvind Rana, the Finance and Venture capital arm of ACPL promotes start-ups and Unicorn setups for participating in the  ‘Make in India” concept and be a part of our growing economy.</br>
                ACPL provides them with the required stagewise finance and a platform wherein they can meet with prospective buyers and end user customers for their concepts.</p>


            </div>
        </div>

    </div>
    </section> --}}

    {{-- @include('components.requestcontent') --}}

    <section class="about-us v1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="about-us-content">
                        <div class="section-title">
                            <h4>About Us</h4>
                            <h2>SECURING YOUR WORLD THROUGH INNOVATIVE PRODUCTS</h2>
                            <p><strong>ANIRA Chemicals (ACPL)</strong> is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements. Equipped with highly qualified technical team, working for continuous innovation and delivering unmatched services, we have achieved meritorious growth in a very short time.</br>

                                We are an eco-friendly company give highest priority   to   safety,   health and environment management by adhering to strict procedures at all times.</p>

                                <p> At ACPL, we believe in adding value to our customers, business partners & employees and creating landmarks for them & ourselves in terms of growth and achievements.</br>

                                The ACPL Group is a diversified business group focused principally on govt construction contracts and premium residential construction. Its business covers a combination of building development, manufacturing, processing and trading activities.</p>
                                <h5><strong>The ACPL Group subsidiaries include:</strong></h5>
                                <p>Education wherein the group is promoting LMC (Leela Mandal College), an educational institute that is committed to imparting quality education with a balanced practical exposure to the students to inbuilt employability skills, even in undergraduates. Excellent infrastructure and facilities have been created for teaching/learning, co-curricular and extracurricular activities. Management is fully committed to ensuring good standards and excellence in educating and equipping our students for their overall development and growth so that they become a successful professional of society. </p>
                                <h5><strong>Finance and venture Capital:</strong></h5>
                                <p>Under the watchful eye of Mr Arvind Rana, the Finance and Venture capital arm of ACPL promotes start-ups and Unicorn setups for participating in the  ‘Make in India” concept and be a part of our growing economy.</br>
                                ACPL provides them with the required stagewise finance and a platform wherein they can meet with prospective buyers and end user customers for their concepts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="work-process bg-cover-top v1" data-background="assets/img/work-process/v1/bg.png">
        <div class="container">
            <div class="section-title-center">
                <h6>Our Products Range</h6>
                {{-- <h2>Steps In The Agriculture Process</h2>
                <p>For your car we will do everything  advice, repairs and maintenance. We are the some preferred choice by many car owners because our experience and knowledge is selfe vident.For your car we will do som everything.</p> --}}
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-3">
                    <div class="work-card">
                        <div class="work-card-img">
                            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product_bond.jpg" alt=""></div>
                            <h4 class="title"><a href=""><span class="product">RCON</span> BRICKBOND</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="work-card">
                        <div class="work-card-img">
                            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product1.jpg" alt=""></div>
                            <h4 class="title"><a href=""><span class="product">RCON</span> BOND LW</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="work-card">
                        <div class="work-card-img">
                            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product4.jpg" alt=""></div>
                            <h4 class="title"><a href=""><span class="product">RCON</span> PAVERBOND</a></h4>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="work-card">
                        <div class="work-card-img">
                            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product3.jpg" alt=""></div>
                            <h4 class="title"><a href=""><span class="product">RCON</span> SBR LATEX</a></h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
