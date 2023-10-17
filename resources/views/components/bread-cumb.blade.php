<section class="breadcum v1 bg-cover-center" data-background="{{ asset("assets/img/breadcum/v1/bg.jpg")}}">
    <div class="container">
        <div class="breadcum-content">
            <h2>{{ucfirst(Route::current()->getName())}}</h2>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li>{{ucfirst(Route::current()->getName())}}</li>
            </ul>
        </div>
    </div>
    <div class="line-shap" data-background="{{ asset("assets/img/banner/v1/line-shap.svg")}}"></div>
    <div class="right-bottom-shap" data-background="{{ asset("assets/img/banner/v1/right-bottom-shap.png")}}"></div>
</section>
