@extends('frontend.master')
@section('content')
<div class="container mt-5 mb-5">
<!-- Search Orders Starts -->
<div class="row">
    <div class="col-md-4">
      <h3>Your Orders</h3>
    </div>
    <div class="col-md-8">
      <form class="form-inline float-md-right">
        <div class="input-group">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-dark">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <input type=text class="form-control" name="orderName" id="orderName" />
          <div class="input-group-append">
            <button type="submit" class="btn btn-dark">Search orders</button>
          </div>
        </div>
      </form>
    </div>
  </div> <!-- Search Orders Starts -->

  <!-- Order Card Starts -->
  @foreach ($order as $o)
  <div class="card mt-5">
    <div class="card-header">
      <div class="row">
        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0">order placed</p>
          <p class="text-uppercase text-muted my-0">{{$o->created_at}}</p>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0">total</p>
          <p class="text-uppercase text-muted my-0">
            <i class="fas fa-rupee-sign"></i> {{$o->grand_total}}
          </p>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0 float-md-right">order # {{$o->order_id}}</p>
        </div>
      </div>
    </div>
    @foreach ($o->orderp as $op)
    <div class="card-body">
      <div class="row">
        <div class="col-md-1">
          <img src="{{url('upload/'.$op->product_image)}}" width="58" height="90" alt="product 01 image">
        </div>

        <div class="col-md-5">
          <a href="#">{{$op->product_name}}</a>
          {{-- <p class="text-muted my-0">Sold by : Narendra Modi</p> --}}
          <p class="text-uppercase my-0">
            <i class="fas fa-rupee-sign"></i> <span class="text-danger">{{$op->product_price}}</span>
          </p>
        </div>
        <div class="col-md-6 d-flex flex-column">
          {{-- <a href="#" class="btn btn-outline-secondary btn-sm w-50 ml-auto my-1">Cancel Order</a> --}}
          <a href="{{url('invoice/'.$op->order_id)}}" class="btn btn-outline-info btn-sm w-50 ml-auto my-1">Generate Invoice</a>
        </div>
      </div>
    </div>
    @endforeach
  </div> <!-- Order Card Starts -->
  @endforeach

  {{-- <!-- Order Card Starts -->
  <div class="card mt-5">
    <div class="card-header">
      <div class="row">
        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0">order placed</p>
          <p class="text-uppercase text-muted my-0">15 September 2020</p>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0">total</p>
          <p class="text-uppercase text-muted my-0">
            <i class="fas fa-rupee-sign"></i> 150
          </p>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0 float-md-right">order # X55SEDHRz9K5TYz6</p>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-1">
          <img src="img/product_images/product01.png" width="58" height="90" alt="product 01 image">
        </div>

        <div class="col-md-5">
          <a href="#">Oppo Mobile A56</a>
          <p class="text-muted my-0">Sold by : Narendra Modi</p>
          <p class="text-uppercase my-0">
            <i class="fas fa-rupee-sign"></i> <span class="text-danger">150</span>
          </p>
        </div>

        <div class="col-md-6 d-flex flex-column">
          <a href="#" class="btn btn-outline-secondary btn-sm w-50 ml-auto my-1">Cancel Order</a>
          <a href="#" class="btn btn-outline-info btn-sm w-50 ml-auto my-1">Generate Invoice</a>
        </div>
      </div>
    </div>
  </div> <!-- Order Card Starts --> --}}

  {{-- @foreach ($order as $o)
  <!-- Order Card Starts -->
  <div class="card mt-5">
    <div class="card-header">
      <div class="row">
        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0">order placed</p>
          <p class="text-uppercase text-muted my-0">{{$o->created_at}}</p>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0">total</p>
          <p class="text-uppercase text-muted my-0">
            <i class="fas fa-rupee-sign"></i> 150
          </p>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
          <p class="text-uppercase text-muted my-0 float-md-right">order # X55SEDHRz9K5TYz6</p>
        </div>
      </div>
    </div>
    @foreach ($o->orderp as $p)
    <div class="card-body">
      <div class="row">
        <div class="col-md-1">
          <img src="{{url('upload/'.$p->product_image)}}" width="58" height="90" alt="product 01 image">
        </div>
        <div class="col-md-5">
          <a href="#">{{$p->product_name}}</a>
          <p class="text-muted my-0">Sold by : Narendra Modi</p>
          <p class="text-uppercase my-0">
            <i class="fas fa-rupee-sign"></i> <span class="text-danger">150</span>
          </p>
        </div>
        @endforeach

        <div class="col-md-6 d-flex flex-column">
          <a href="#" class="btn btn-outline-secondary btn-sm w-50 ml-auto my-1">Cancel Order</a>
          <a href="#" class="btn btn-outline-info btn-sm w-50 ml-auto my-1">Generate Invoice</a>
        </div>
      </div>
    </div>
  </div> <!-- Order Card Starts -->
  @endforeach --}}
</div>
@endsection
