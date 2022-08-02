<section class="products-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>Best Selling</h2>
        </div>
        <div class="products-slides owl-carousel owl-theme">
            @foreach ($product as $p)
            <div class="single-products-box">
                <div class="image">
                    <a href="{{url('product_detail/'.$p->id)}}" class="d-block"><img src="{{url('upload/'.$p->product_image)}}" alt="image"></a>
                    <div class="new">New</div>
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
                    <h3><a href="{{url('product_detail/'.$p->id)}}">{{$p->product_name}}</a></h3>
                    <div class="price">
                        <span class="new-price">Rs {{$p->product_price}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
