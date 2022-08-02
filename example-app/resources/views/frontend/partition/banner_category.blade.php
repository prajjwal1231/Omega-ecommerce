<section class="banner-categories-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            {{-- consoles --}}
            @foreach ($banner_category as $banner_cat)
            <div class="col-lg-6 col-md-6">
                <div class="single-banner-categories-box">
                    <div style="width: 100%;
                    position: relative;">
                    <img  class="background-image" src="assets/img/banner-categories/image22.jpg">
                   <div style="position: absolute;
                   top: 2px;
                   right: 10px;
                   text-align: right;
                   float: right">
                    <img src="{{url('upload/'.$banner_cat->product_image)}}" alt="image" style="width: 230px;">
                   </div>
                    </div>
                    <div class="content">
                        <span class="sub-title">Consoles</span>
                        <h3><a href="{{url('product_detail/'.$banner_cat->id)}}">{{$banner_cat->product_name}}</a></h3>
                        <div class="btn-box">
                            <div class="d-flex align-items-center">
                                <a href="{{url('product_detail/'.$banner_cat->id)}}" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                                <span class="price">Rs {{$banner_cat->product_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- games --}}
            @foreach ($banner_category2 as $banner_cat)
            <div class="col-lg-6 col-md-6">
                <div class="single-banner-categories-box">
                    <div style="width: 100%;
                    position: relative;">
                    <img  class="background-image" src="assets/img/banner-categories/image22.jpg">
                   <div style="position: absolute;
                   top: 10px;
                   right: 34px;
                   text-align: right;
                   float: right">
                    <img src="{{url('upload/'.$banner_cat->product_image)}}" alt="image" style="width: 165px;">
                   </div>
                    </div>
                    <div class="content">
                        <span class="sub-title">Games</span>
                        <h3 style="inline-size: 250px;
                        overflow: hidden;"><a href="{{url('product_detail/'.$banner_cat->id)}}">{{$banner_cat->product_name}}</a></h3>
                        <div class="btn-box">
                            <div class="d-flex align-items-center">
                                <a href="{{url('product_detail/'.$banner_cat->id)}}" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                                <span class="price">Rs {{$banner_cat->product_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            {{-- <div class="col-lg-6 col-md-6">
                <div class="single-banner-categories-box">
                    <img src="assets/img/banner-categories/banner-categories-img2.jpg" alt="image">
                    <div class="content">
                        <span class="sub-title">Personal</span>
                        <h3><a href="#">Favorite Collection</a></h3>
                        <div class="btn-box">
                            <div class="d-flex align-items-center">
                                <a href="products-left-sidebar.html" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                                <span class="price">$69.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
