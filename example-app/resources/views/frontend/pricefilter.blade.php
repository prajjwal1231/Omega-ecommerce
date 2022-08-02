@extends('frontend.master')
@section('content')
<section class="products-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="woocommerce-widget-area">
                    <div class="woocommerce-widget price-list-widget">
                        <form action="{{route('product.shop')}}" method="POST">
                            @csrf
                           <div class="mall-property">
                              <div class="mall-property__label">
                                <h3 class="woocommerce-widget-title">Filter</h3>
                                 <a class="mall-property__clear-filter js-mall-clear-filter" href="javascript:;" data-filter="price" style="">
                                 </a>
                              </div>
                              <div class="mall-slider-handles" data-start="{{ $filter_min_price ?? $min_price }}" data-end="{{ $filter_max_price ?? $max_price }}" data-min="{{ $min_price}}" data-max="{{ $max_price }}" data-target="price" style="width: 100%">
                              </div>
                              <div class="row filter-container-1">
                                 <div class="col-md-4">
                                    <input data-min="price" id="skip-value-lower" name="min_price" value="{{ $filter_min_price ?? $min_price }}" readonly>
                                 </div>
                                 <div class="col-md-4">
                                    <input data-max="price" id="skip-value-upper" name="max_price" value="{{ $filter_max_price ?? $max_price }}" readonly>
                                 </div>
                                 <div class="col-md-4">
                                    <button type="submit" class="btn btn-sm">Filter</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                    </div>
                    {{-- <div class="woocommerce-widget color-list-widget">
                        <h3 class="woocommerce-widget-title">Color</h3>
                        <ul class="color-list-row">
                            <li class="active"><a href="#" title="Black" class="color-black"></a></li>
                            <li><a href="#" title="Red" class="color-red"></a></li>
                            <li><a href="#" title="Yellow" class="color-yellow"></a></li>
                            <li><a href="#" title="White" class="color-white"></a></li>
                            <li><a href="#" title="Blue" class="color-blue"></a></li>
                            <li><a href="#" title="Green" class="color-green"></a></li>
                            <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                            <li><a href="#" title="Pink" class="color-pink"></a></li>
                            <li><a href="#" title="Violet" class="color-violet"></a></li>
                            <li><a href="#" title="Blue Violet" class="color-blueviolet"></a></li>
                            <li><a href="#" title="Lime" class="color-lime"></a></li>
                            <li><a href="#" title="Plum" class="color-plum"></a></li>
                            <li><a href="#" title="Teal" class="color-teal"></a></li>
                        </ul>
                    </div> --}}
                    {{-- <div class="woocommerce-widget brands-list-widget">
                        <h3 class="woocommerce-widget-title">Brands</h3>
                        <ul class="brands-list-row">
                            <li><a href="#">Gucci</a></li>
                            <li><a href="#">Virgil Abloh</a></li>
                            <li><a href="#">Balenciaga</a></li>
                            <li class="active"><a href="#">Moncler</a></li>
                            <li><a href="#">Fendi</a></li>
                            <li><a href="#">Versace</a></li>
                        </ul>
                    </div> --}}
                    {{-- <div class="woocommerce-widget woocommerce-ads-widget">
                        <img src="assets/img/ads.jpg" alt="image">
                        <div class="content">
                            <span>New Arrivals</span>
                            <h3>Modern Electronic Thermometer</h3>
                            <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                        </div>
                        <a href="#" class="link-btn"></a>
                    </div> --}}
                    {{-- <div class="woocommerce-widget best-seller-widget">
                        <h3 class="woocommerce-widget-title">Best Seller</h3>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg1" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall"><a href="#">Thermometer Gun</a></h4>
                                <span>$99.00</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg2" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall"><a href="#">Protective Gloves</a></h4>
                                <span>$65.00</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star-half'></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg3" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall"><a href="#">Cosmetic Container</a></h4>
                                <span>$139.00</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bx-star'></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="drodo-grid-sorting row align-items-center">
                    <div class="col-lg-6 col-md-6 result-count">
                        <p>We found <span class="count">99</span> products available for you</p>
                        <span class="sub-title d-lg-none"><a href="#" data-bs-toggle="modal" data-bs-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span>
                    </div>
                    <div class="col-lg-6 col-md-6 ordering">
                        <div class="select-box">
                            <label>Sort By:</label>
                            <select>
                                <option>Default</option>
                                <option>Popularity</option>
                                <option>Latest</option>
                                <option>Price: low to high</option>
                                <option>Price: high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $cat)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-products-box">
                            <div class="image">
                                <a href="{{url('product_detail/'.$cat->id)}}" class="d-block"><img src="{{url('upload/'.$cat->product_image)}}" alt="image"></a>
                                <div class="buttons-list">
                                    <ul>
                                        <li>
                                            <div class="cart-btn">
                                                <a href="#">
                                                    <i class='bx bxs-cart-add'></i>
                                                    <span class="tooltip-label">Add to Cart</span>
                                                </a>
                                            </div>
                                        </li>
                                        {{-- <li>
                                            <div class="wishlist-btn">
                                                <a href="#">
                                                    <i class='bx bx-heart'></i>
                                                    <span class="tooltip-label">Add to Wishlist</span>
                                                </a>
                                            </div>
                                        </li> --}}
                                        {{-- <li>
                                            <div class="quick-view-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView">
                                                    <i class='bx bx-search-alt'></i>
                                                    <span class="tooltip-label">Quick View</span>
                                                </a>
                                            </div>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h3><a href="#">{{$cat->product_name}}</a></h3>
                                <div class="price">
                                    <span class="new-price">Rs {{$cat->product_price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area text-center">
                            <a href="#" class="prev page-numbers"><i class='bx bx-chevrons-left'></i></a>
                            <span class="page-numbers current" aria-current="page">1</span>
                            <a href="#" class="page-numbers">2</a>
                            <a href="#" class="page-numbers">3</a>
                            <a href="#" class="page-numbers">4</a>
                            <a href="#" class="next page-numbers"><i class='bx bx-chevrons-right'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="facility-area bg-f7f8fa pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-free-shipping"></i>
                    </div>
                    <h3>Free Shipping</h3>
                    <p>Free shipping world wide</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Contact us 24 hours a day</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-secure-payment"></i>
                    </div>
                    <h3>Secure Payments</h3>
                    <p>100% payment protection</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-return-box"></i>
                    </div>
                    <h3>Easy Return</h3>
                    <p>Simple returns policy</p>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <a href="#" class="logo d-inline-block"><img src="assets/img/logo.png" alt="image"></a>
                    <ul class="footer-contact-info">
                        <li><span>Hotline:</span> <a href="#">16768</a></li>
                        <li><span>Phone:</span> <a href="tel:+1234567898">(+123) 456-7898</a></li>
                        <li><span>Email:</span> <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#09616c656566496d7b666d66276a6664"><span class="__cf_email__" data-cfemail="ef878a838380af8b9d808b80c18c8082">[email&#160;protected]</span></a></li>
                        <li><span>Address:</span> <a href="#" target="_blank">6890 Blvd, The Bronx, NY 1058, USA</a></li>
                    </ul>
                    <ul class="social">
                        <li><a href="#" target="_blank"><i class='bx bxl-facebook-square'></i></a></li>
                        <li><a href="#" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-linkedin-square'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-pinterest'></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Information</h3>
                    <ul class="link-list">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-of-service.html">Terms & Conditions</a></li>
                        <li><a href="customer-service.html">Delivery Information</a></li>
                        <li><a href="customer-service.html">Orders and Returns</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Customer Care</h3>
                    <ul class="link-list">
                        <li><a href="faq.html">Help & FAQs</a></li>
                        <li><a href="profile-authentication.html">My Account</a></li>
                        <li><a href="cart.html">Order History</a></li>
                        <li><a href="cart.html">Wishlist</a></li>
                        <li><a href="contact.html">Newsletter</a></li>
                        <li><a href="purchase-guide.html">Purchasing Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Newsletter</h3>
                    <p>Sign up for our mailing list to get the latest updates & offers.</p>
                    <form class="newsletter-form" data-bs-toggle="validator">
                        <input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                        <button type="submit" class="default-btn">Subscribe Now</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>Copyright @2021 Drodo. Designed By <a href="#" target="_blank">EnvyTheme</a></p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="payment-types">
                        <ul class="d-flex align-items-center justify-content-end">
                            <li>We accept payment via:</li>
                            <li><a href="#" target="_blank"><img src="assets/img/payment-types/visa.png" alt="image"></a></li>
                            <li><a href="#" target="_blank"><img src="assets/img/payment-types/mastercard.png" alt="image"></a></li>
                            <li><a href="#" target="_blank"><img src="assets/img/payment-types/paypal.png" alt="image"></a></li>
                            <li><a href="#" target="_blank"><img src="assets/img/payment-types/descpver.png" alt="image"></a></li>
                            <li><a href="#" target="_blank"><img src="assets/img/payment-types/american-express.png" alt="image"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


{{-- <div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="products-image">
                        <img src="{{url('upload/'.$cat->product_image)}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="products-content">
                        <h3><a href="#">{{$cat->product_name}}</a></h3>
                        <div class="price">
                            <span class="new-price">Rs {{$cat->product_price}}</span>
                        </div>
                        <div class="products-review">
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                            <a href="#" class="rating-count">3 reviews</a>
                        </div>
                        <ul class="products-info">
                            {{-- <li><span>Vendor:</span> <a href="#">Lereve</a></li> --}}
                            <li><span>Availability:</span> <a href="#">In stock ({{$cat->quantity}} items)</a></li>
                            <li><span>Products Type:</span> <a href="#">Mask</a></li>
                        </ul>
                        {{-- <div class="products-color-switch">
                            <h4>Color:</h4>
                            <ul>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Black" class="color-black"></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="White" class="color-white"></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Green" class="color-green"></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Yellow Green" class="color-yellowgreen"></a></li>
                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Teal" class="color-teal"></a></li>
                            </ul>
                        </div>
                        <div class="products-size-wrapper">
                            <h4>Size:</h4>
                            <ul>
                                <li><a href="#">XS</a></li>
                                <li class="active"><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div> --}}
                        <div class="products-add-to-cart">
                            <div class="input-counter">
                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                <input type="text" min="1" value="1">
                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                            </div>
                            <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> Add to Cart</button>
                        </div>
                        <a href="{{url('product_detail/'.$cat->id)}}" class="view-full-info">or View Full Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}


{{-- <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="modal-body">
                <h3>My Cart (3)</h3>
                <div class="products-cart-content">
                    <div class="products-cart d-flex align-items-center">
                        <div class="products-image">
                            <a href="#"><img src="assets/img/products/products-img1.jpg" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">Coronavirus Face Mask</a></h3>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$39.00</span>
                            </div>
                        </div>
                        <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                    </div>
                    <div class="products-cart d-flex align-items-center">
                        <div class="products-image">
                            <a href="#"><img src="assets/img/products/products-img2.jpg" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">Protective Gloves</a></h3>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$99.00</span>
                            </div>
                        </div>
                        <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                    </div>
                    <div class="products-cart d-flex align-items-center">
                        <div class="products-image">
                            <a href="#"><img src="assets/img/products/products-img3.jpg" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">Infrared Thermometer Gun</a></h3>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$90.00</span>
                            </div>
                        </div>
                        <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                    </div>
                </div>
                <div class="products-cart-subtotal">
                    <span>Subtotal</span>
                    <span class="subtotal">$228.00</span>
                </div>
                <div class="products-cart-btn">
                    <a href="#" class="default-btn">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="modal-body">
                <h3>My Wishlist (3)</h3>
                <div class="products-cart-content">
                    <div class="products-cart d-flex align-items-center">
                        <div class="products-image">
                            <a href="#"><img src="assets/img/products/products-img1.jpg" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">Coronavirus Face Mask</a></h3>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$39.00</span>
                            </div>
                        </div>
                        <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                    </div>
                    <div class="products-cart d-flex align-items-center">
                        <div class="products-image">
                            <a href="#"><img src="assets/img/products/products-img2.jpg" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">Protective Gloves</a></h3>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$99.00</span>
                            </div>
                        </div>
                        <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                    </div>
                    <div class="products-cart d-flex align-items-center">
                        <div class="products-image">
                            <a href="#"><img src="assets/img/products/products-img3.jpg" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">Infrared Thermometer Gun</a></h3>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$90.00</span>
                            </div>
                        </div>
                        <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                    </div>
                </div>
                <div class="products-cart-subtotal">
                    <span>Subtotal</span>
                    <span class="subtotal">$228.00</span>
                </div>
                <div class="products-cart-btn">
                    <a href="#" class="default-btn">View Shopping Cart</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="modal left fade productsFilterModal" id="productsFilterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i> Close</span>
            </button>
            <div class="modal-body">
                <div class="woocommerce-widget-area">
                    <div class="woocommerce-widget price-list-widget">
                        <h3 class="woocommerce-widget-title">Filter By Price</h3>
                        <div class="collection-filter-by-price">
                            <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10">
                        </div>
                    </div>
                    {{-- <div class="woocommerce-widget color-list-widget">
                        <h3 class="woocommerce-widget-title">Color</h3>
                        <ul class="color-list-row">
                            <li class="active"><a href="#" title="Black" class="color-black"></a></li>
                            <li><a href="#" title="Red" class="color-red"></a></li>
                            <li><a href="#" title="Yellow" class="color-yellow"></a></li>
                            <li><a href="#" title="White" class="color-white"></a></li>
                            <li><a href="#" title="Blue" class="color-blue"></a></li>
                            <li><a href="#" title="Green" class="color-green"></a></li>
                            <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                            <li><a href="#" title="Pink" class="color-pink"></a></li>
                            <li><a href="#" title="Violet" class="color-violet"></a></li>
                            <li><a href="#" title="Blue Violet" class="color-blueviolet"></a></li>
                            <li><a href="#" title="Lime" class="color-lime"></a></li>
                            <li><a href="#" title="Plum" class="color-plum"></a></li>
                            <li><a href="#" title="Teal" class="color-teal"></a></li>
                        </ul>
                    </div> --}}
                    <div class="woocommerce-widget brands-list-widget">
                        <h3 class="woocommerce-widget-title">Brands</h3>
                        <ul class="brands-list-row">
                            <li><a href="#">Gucci</a></li>
                            <li><a href="#">Virgil Abloh</a></li>
                            <li><a href="#">Balenciaga</a></li>
                            <li class="active"><a href="#">Moncler</a></li>
                            <li><a href="#">Fendi</a></li>
                            <li><a href="#">Versace</a></li>
                        </ul>
                    </div>
                    <div class="woocommerce-widget woocommerce-ads-widget">
                        <img src="assets/img/ads.jpg" alt="image">
                        <div class="content">
                            <span>New Arrivals</span>
                            <h3>Modern Electronic Thermometer</h3>
                            <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                        </div>
                        <a href="#" class="link-btn"></a>
                    </div>
                    <div class="woocommerce-widget best-seller-widget">
                        <h3 class="woocommerce-widget-title">Best Seller</h3>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg1" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall"><a href="#">Thermometer Gun</a></h4>
                                <span>$99.00</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg2" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall"><a href="#">Protective Gloves</a></h4>
                                <span>$65.00</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star-half'></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg3" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall"><a href="#">Cosmetic Container</a></h4>
                                <span>$139.00</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bx-star'></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
