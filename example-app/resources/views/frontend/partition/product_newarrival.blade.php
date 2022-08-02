<section class="products-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>New Arrivals</h2>
        </div>
        <div class="row">
            @foreach ($product as $p2)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-box">
                    <div class="image">
                        <a href="{{url('product_detail/'.$p2->id)}}" class="d-block"><img src="{{url('upload/'.$p2->product_image)}}" alt="image"></a>
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
                                <li>
                                    {{-- <div class="wishlist-btn">
                                        <a href="#">
                                            <i class='bx bx-heart'></i>
                                            <span class="tooltip-label">Add to Wishlist</span>
                                        </a>
                                    </div> --}}
                                </li>
                                <li>
                                    <div class="quick-view-btn">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView">
                                            <i class='bx bx-search-alt'></i>
                                            <span class="tooltip-label">Quick View</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content">
                        <h3><a href="{{url('product_detail/'.$p2->id)}}">{{$p2->product_name}}</a></h3>
                        <div class="price">
                            <span class="new-price">Rs{{$p2->product_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
