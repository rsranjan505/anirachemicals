<section class="services v1">
    <div class="container">
        <div class="section-title-center">
            <h6>we provide</h6>
            <h2>best waterprofing chemicals</h2>
        </div>
        <div class="row justify-content-center">
            @if (isset($products))
                @if(Request::is('product'))
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="provide-card">
                                <div class="provide-content">
                                    {{-- <p>Field is Futures</p> --}}
                                    <h5><a href="{{route('product.details',['name' => $product->name])}}">{{ strtoupper($product->name)}}</a></h5>
                                </div>
                                <div class="provide-img">
                                    <a href="{{route('product.details',['name' => $product->name])}}">
                                        @if ($product->image !=null)
                                            <img src="{{ asset($product->image->url)}}" alt="card-img">
                                        @else
                                            <img src="{{ asset("assets/img/products/product_bond.jpg")}}" alt="card-img">
                                        @endif
                                    </a>
                                </div>
                                <div class="provide-icon"><span class="my-icon icon-lap-lif"></span></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($products->slice(0, 3) as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="provide-card">
                                <div class="provide-content">
                                    {{-- <p>Field is Futures</p> --}}
                                    <h5><a href="{{route('product.details',['name' => $product->slug])}}">{{ strtoupper($product->name)}}</a></h5>
                                </div>
                                <div class="provide-img">
                                    <a href="{{route('product.details',['name' => $product->slug])}}">
                                        @if ($product->image !=null)
                                            <img src="{{ asset($product->image->url)}}" alt="card-img">
                                        @else
                                            <img src="{{ asset("assets/img/products/product_bond.jpg")}}" alt="card-img">
                                        @endif
                                    </a>
                                </div>
                                <div class="provide-icon"><span class="my-icon icon-lap-lif"></span></div>
                            </div>
                        </div>
                    @endforeach
                @endif

            @endif
        </div>
    </div>
    <div class="bg-shap bg-shap-1" data-background="assets/img/services/v1/shap-1.svg"></div>
    <div class="bg-shap bg-shap-2" data-background="assets/img/services/v1/shap-2.svg"></div>
    <div class="bg-shap bg-shap-3" data-background="assets/img/services/v1/shap-3.svg"></div>
    <div class="bg-shap bg-shap-4" data-background="assets/img/services/v1/shap-4.svg"></div>
    <div class="bg-shap bg-shap-5" data-background="assets/img/services/v1/shap-5.svg"></div>
</section>

{{-- <!-- ======= Services Section ======= -->
<section id="services">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Our Products</h2>

      </div>

      <div class="row gy-4">

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="box">
            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product_bond.jpg" alt=""></div>
            <h4 class="title"><a href=""><span class="product">RCON</span> BRICKBOND</a></h4>
            <p class="description">It is fast set accelerator is a ready-to-use, powdered admixture which has to dissolve in plain water. It accelerates initial setting time one to three times faster than normal fly ash bricks or blocks. </p>
            <a href="{{ url('/details/brickbond') }}"><h4 class="viewmore">View More</h4></a>
        </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product1.jpg" alt=""></div>
            <h4 class="title"><a href=""><span class="product">RCON</span> BOND LW</a></h4>
            <p class="description">It is a single component chloride free Integral Waterproofing Liquid admixture
                for concrete and mortar to minimize the shrinkage cracks, permeability and increase the
                waterproofing proper_es of concrete and mortar.
                .</p>
                <a href="{{ url('/details/bondlw') }}"><h4 class="viewmore">View More</h4></a>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product4.jpg" alt=""></div>
            <h4 class="title"><a href=""><span class="product">RCON</span> PAVERBOND</a></h4>
            <p class="description">Strength Of The Concrete Paver Blocks Will Increase 30-35 Percent, Polishing Not Required For Glazing, Mould’s Will Remain Clean Without Washing.</p>
            <a href="{{ url('/details/paverbond') }}"><h4 class="viewmore">View More</h4></a>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <div class="icon"> <img src=" {{$publicurl}}assets/img/products/product3.jpg" alt=""></div>
            <h4 class="title"><a href=""><span class="product">RCON</span> SBR LATEX</a></h4>
            <p class="description">It is a single component product based on modified SBR latex, designed for using  as a ready to use bonding agent and cement modifier.</p>
            <a href="{{ url('/details/sbrlatex') }}"><h4 class="viewmore">View More</h4></a>
          </div>
        </div>

      </div>

    </div>
</section> --}}
