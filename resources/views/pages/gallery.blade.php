@extends('layouts.base')

@section('content')

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">

            <ol>
                <li><a href="{{ route('/home') }}">Home</a></li>
                <li>Gallery</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section id="about">
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
    </section><!-- End About Section -->




    @include('components.requestcontent')

@endsection
