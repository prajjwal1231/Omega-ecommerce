<section class="home-slides owl-carousel owl-theme">
    @foreach ($banner as $b)
    {{-- Full size banner --}}
    <div class="single-banner-item">
        <div class="d-table">
            <div class="d-table-cell">
                <a href="">
                <img src="{{url('upload-banner/'.$b->image)}}" class="main-image" alt="image">
                </a>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($product_advertise as $p_ad)
    <div class="single-banner-item">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center" >
                         <div class="col-lg-5 col-md-12">
                            <div class="banner-content">
                                <span class="sub-title">New Arrivals</span>
                                <h1>{{$p_ad->product_name}}</h1>
                                <p>{{$p_ad->product_description}}</p>
                                <div class="btn-box">
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('product_detail/'.$p_ad->id)}}" class="default-btn"><i class="flaticon-trolley"></i> View product</a>
                                        <span class="price">Rs {{$p_ad->product_price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="banner-image text-center">
                                <img src="{{url('upload/'.$p_ad->product_image)}}" class="main-image" alt="image">
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
