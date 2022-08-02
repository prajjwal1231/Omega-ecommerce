@extends('frontend.master')
@section('content')
<section class="checkout-area ptb-70">
    <div class="container">
        <div class="user-actions">
            <i class='bx bx-log-in'></i>
            <span>Returning customer? <a href="profile-authentication.html">Click here to login</a></span>
        </div>
        <form action="/place_order" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <form>
                        @csrf
                    <div class="billing-details">
                        <h3 class="title">Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Full Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="city">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>State <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="state">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="pincode">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="order-details">
                        <h3 class="title">Your Order</h3>
                        <div class="order-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody><?php $totalamount = 0; ?>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td class="product-name">
                                            <a href="#">{{$d->product_name}}</a>
                                        </td>
                                        <td class="product-total">
                                            <span class="subtotal-amount">Rs {{$d->product_price}}</span>
                                        </td>
                                    </tr><?php $totalamount = $totalamount+($d->product_price*$d->product_quantity); ?>
                                    @endforeach
                                    <tr>
                                        <td class="order-subtotal">
                                            <span>Cart Subtotal</span>
                                        </td>
                                        <td class="order-subtotal-price">
                                            <span class="order-subtotal-amount">Rs <?php echo $totalamount ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-shipping">
                                            <span>Shipping</span>
                                        </td>
                                        <td class="shipping-price">
                                            <span>Rs 300</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="total-price">
                                            <span>Order Total</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">Rs <?php echo $totalamount+300 ?></span>
                                        </td>
                                    </tr>
                                    <input type="hidden" value="300" name="shipping_charges">
                                    <input type="hidden" value="<?php echo $totalamount+300 ?>" name="total">
                                </tbody>
                            </table>
                        </div>
                        <div class="payment-box">
                            <div class="payment-method">
                                {{-- <p>
                                    <input type="radio" id="paytm" name="payment_method" value="paytm" class="paytm">
                                    <label for="Paytm">Paytm</label>
                                </p> --}}
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="payment_method" value="paytm" class="cod">
                                    <label for="cash-on-delivery">paytm</label>
                                </p>
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="payment_method" value="cod" class="cod">
                                    <label for="cash-on-delivery">Cash on Delivery</label>
                                </p>
                                {{-- <p>
                                    <input type="radio" id="cash-on-delivery" name="payment_method" value="Razorpay" class="razorpay">
                                    <label for="cash-on-delivery">Razorpay</label>
                                </p> --}}
                            </div>
                            <button class="default-btn" onclick="return select_payment_method()"><i class="flaticon-tick"></i>Place Order<span></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
