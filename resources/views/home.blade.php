@extends('layouts.base')

@section('page_active', 'active')
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

    {{-- <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Why we need waterproofing?</h2>

        </div>

        <div class="row gy-4">

        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">

            <ul>
                <li class="description">Bad waterproofing creates serious risks to the integrity of the building. Construction projects may suffer structural damage due to poor or insufficient waterproofing of the roof and concrete. </li>
                <li class="description">Cracks in the foundation or joints exposing to water can lead to more serious structural problems. These include leaks, spalling and deterioration. </li>
                <li class="description">Mold growth is also a common waterproofing problem that is difficult to correct. If the building is built of wood or has wooden furniture, moisture from the penetration of water will lead to rotting or delamination of wood. </li>
                <li class="description">Mold spores are also a health hazard. Exposure to this can lead to allergies, asthma, irritation and fungal infections. After studying several cases, WHO issued a report on this issue, which states that water leakage in buildings poses a health hazard, and about 50 terrible diseases are caused by damp stains on the wall.
                </li>

            </ul>

        </div>
        </div>
      </div>
    </section> --}}



    {{-- @include('pages.products.list') --}}

    {{-- @include('components.requestcontent') --}}

    <section class="about-us v1">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-lg-6">
                    <div class="about-us-img">
                        <div class="count-shap">
                            <h2><span class="counter" data-count-min="10" data-count-max="20" data-count-duration="1000" data-count-delay="200">20</span>+</h2>
                            <h6>Clients</h6>
                        </div>
                        <div class="about-profile">
                            <img src="assets/img/about-img.jpg" alt="about-img">

                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="about-us-content">
                        <div class="section-title">
                            <h6>About Us</h6>
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

    <section class="about-us v1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="about-us-content">
                        <div class="section-title">
                            {{-- <h6>About Us</h6> --}}
                            <h2>Why we need waterproofing?</h2>
                            <ul>
                                <li class="description">Bad waterproofing creates serious risks to the integrity of the building. Construction projects may suffer structural damage due to poor or insufficient waterproofing of the roof and concrete. </li>
                                <li class="description">Cracks in the foundation or joints exposing to water can lead to more serious structural problems. These include leaks, spalling and deterioration. </li>
                                <li class="description">Mold growth is also a common waterproofing problem that is difficult to correct. If the building is built of wood or has wooden furniture, moisture from the penetration of water will lead to rotting or delamination of wood. </li>
                                <li class="description">Mold spores are also a health hazard. Exposure to this can lead to allergies, asthma, irritation and fungal infections. After studying several cases, WHO issued a report on this issue, which states that water leakage in buildings poses a health hazard, and about 50 terrible diseases are caused by damp stains on the wall.
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('pages.products.list')
    {{-- <section class="services v1">
        <div class="container">
            <div class="section-title-center">
                <h6>we provide</h6>
                <h2>best waterprofing chemicals</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="provide-card">
                        <div class="provide-content">
                            <p>Field is Futures</p>
                            <h5><a href="service-details.html">RCON BRICKBOND</a></h5>
                        </div>
                        <div class="provide-img">
                            <a href="service-details.html">
                                <img src="{{ asset("assets/img/products/product_bond.jpg")}}" alt="card-img">
                            </a>
                        </div>
                        <div class="provide-icon"><span class="my-icon icon-lap-lif"></span></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="provide-card">
                        <div class="provide-content">
                            <p>Grow naturally</p>
                            <h5><a href="service-details.html">RCON BOND LW</a></h5>
                        </div>
                        <div class="provide-img">
                            <a href="service-details.html">
                                <img src="{{ asset("assets/img/products/product_lw.jpg")}}" alt="card-img">
                            </a>
                        </div>
                        <div class="provide-icon"><span class="my-icon icon-lif-life"></span></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="provide-card">
                        <div class="provide-content">
                            <p>Field is Futures</p>
                            <h5><a href="service-details.html">RCON SBR LATEX</a></h5>
                        </div>
                        <div class="provide-img">
                            <a href="service-details.html">
                                <img src="{{ asset("assets/img/products/product3.jpg")}}" alt="card-img">
                            </a>
                        </div>
                        <div class="provide-icon"><span class="my-icon icon-lif-auto"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shap bg-shap-1" data-background="assets/img/services/v1/shap-1.svg"></div>
        <div class="bg-shap bg-shap-2" data-background="assets/img/services/v1/shap-2.svg"></div>
        <div class="bg-shap bg-shap-3" data-background="assets/img/services/v1/shap-3.svg"></div>
        <div class="bg-shap bg-shap-4" data-background="assets/img/services/v1/shap-4.svg"></div>
        <div class="bg-shap bg-shap-5" data-background="assets/img/services/v1/shap-5.svg"></div>
    </section> --}}


    {{-- <section class="projects-gallery v1 box-shuffle">
        <div class="container">
            <h4>Industrial Markets</h4>
            <div class="gallery-btns v1 btns-center">
                <ul>
                    <li><button data-target="gallery-item" class="active">Show All</button></li>
                    <li><button data-target="farming">Waterproofing System</button></li>
                    <li><button data-target="horticulture">Flooring & Coatings</button></li>
                    <li><button data-target="agriculture-world">Repair and Restoration</button></li>
                    <li><button data-target="countrylife">Grouts and Anchors</button></li>
                    <li><button data-target="countrylife">Buildings and Joint Sealants</button></li>
                    <li><button data-target="countrylife">Concrete Admixture</button></li>
                </ul>
            </div>
            <div class="row gallery-items align-items-center justify-content-center">
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","farming","horticulture"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-1.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","countrylife"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-2.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","farming","agriculture-world"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-3.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","farming"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-4.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","horticulture"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-5.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","farming","agriculture-world"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-6.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","countrylife"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-7.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","horticulture"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-8.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-groups='["gallery-item","countrylife","agriculture-world"]'>
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <a href="projects-details.html">
                                <img src="assets/img/projects-gallery/v1/box-gallery-9.jpg" alt="gallery-card">
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="info-text">
                                <h6><a href="projects-details.html">Planting Project</a></h6>
                                <p>Business Growth</p>
                            </div>
                            <a href="projects-details.html" class="info-link"><span class="my-icon icon-plus"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="service-details v1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="service-content">
                        <h2>WHAT MAKES US DIFFERENT</h2>
                        <div class="our-features">
                            {{-- <h4>Our Features</h4> --}}
                            <ul>
                                <li>
                                    <div class="my-icon icon-lif-life"></div>
                                    <div class="text-content">
                                        <h5>Trust</h5>
                                        <p>We earn credibility by encouraging open communication and taking responsibility for our actions. If we are honest with our customers, they will trust us and be honest with us.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="my-icon icon-lif-dron"></div>
                                    <div class="text-content">
                                        <h5>Integrity & Ethics</h5>
                                        <p>We strive to do the right thing by conducting ourselves with integrity at all times. We deliver on our promises, remain fair and ethical in every situation and treat our colleagues and customers with respect.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="my-icon icon-lif-win"></div>
                                    <div class="text-content">
                                        <h5>Innovation</h5>
                                        <p>We consistently find new ways to solve problems, share knowledge and encourage others to challenge our thinking.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="my-icon icon-lif-setting"></div>
                                    <div class="text-content">
                                        <h5>Passion & Commitment</h5>
                                        <p>We show pride in our brand and our company and inspires others to do the same. We are always willing to go the extra mile for customers and employees.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
