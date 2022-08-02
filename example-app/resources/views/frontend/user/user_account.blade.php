@extends('frontend.master')
@section('content')
<!-- Your Account Starts -->
<div class="container mt-5">
    <h2>Your Account</h2>
    <!-- Account Panel Starts -->
    <div class="row">
      <div class="col-md-4">
        <a href="{{url('/user_orders')}}" class="btn w-100">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <i class="fas fa-2x fa-shopping-bag"></i>
                <span class="h4">Your Orders</span>
              </div>
              <small class="text-muted">Track, return or buy things again.</small>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{url('/user_passwordchange')}}" class="btn w-100">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <i class="fas fa-2x fa-key"></i>
                <span class="h4">Password Change</span>
              </div>
              <small class="text-muted">Change your password.</small>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{url('/user_address')}}" class="btn w-100">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <i class="fas fa-2x fa-map-marked-alt"></i>
                <span class="h4">Your Addresses</span>
              </div>
              <small class="text-muted">Edit addresses for orders.</small>
            </div>
          </div>
        </a>
      </div>
    </div> <!-- Account Panel Starts -->
  </div> <!-- Your Account Ends -->
@endsection
