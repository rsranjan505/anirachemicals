@extends('layouts.base')

@section('content')
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



    <section class="projects-gallery v1 box-shuffle">
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
    </section>

@endsection
