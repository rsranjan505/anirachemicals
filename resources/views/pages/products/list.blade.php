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
