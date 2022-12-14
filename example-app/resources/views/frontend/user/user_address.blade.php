@extends('frontend.master')
@section('content')
<div class="container mt-5 mb-5">
    <h3>Your Addresses</h3>
    <!-- Address Card -->
    <div class="row">
      <div class="col-md-4 my-md-0 my-2">
        <a href="{{url('/add_user_address')}}" class="btn bg-transparent m-0 p-0">
          <div class="card" style="width: 320px; height: 266px;border: 2px dashed #C7C7C7; ">
            <div class="card-body mt-5">
              <i class="fas fa-plus fa-3x" style="color: #C7C7C7;"></i>
              <h5 class="card-title">Add address</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 my-md-0 my-2">
        <div class="card" >
          <div class="card-header bg-transparent">
            <p class="text-muted p-0 m-0">Default: <i class="fab fa-amazon"></i></p>
          </div>
          <div class="card-body m-0 pt-1">
            <p class="font-weight-bold my-0 py-0">Prajjwal Sharma</p>
            <p class="my-0 py-0">House No. 123</p>
            <p class="my-0 py-0">ABC</p>
            <p class="my-0 py-0">Kanpur, Uttar Pradesh 123456</p>
            <p class="my-0 py-0">India</p>
            <p class="my-0 py-0">Phone Number: 1234567890</p>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="btn btn-outline-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-4 my-md-0 my-2">
        <div class="card" >
          <div class="card-header bg-transparent">
            <p class="text-muted p-0 m-0">Default: <i class="fab fa-amazon"></i></p>
          </div>
          <div class="card-body m-0 pt-1">
            <p class="font-weight-bold my-0 py-0">Sandeep Ganguly</p>
            <p class="my-0 py-0">House No. 123</p>
            <p class="my-0 py-0">ABC</p>
            <p class="my-0 py-0">Kanpur, Uttar Pradesh 123456</p>
            <p class="my-0 py-0">India</p>
            <p class="my-0 py-0">Phone Number: 1234567890</p>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="btn btn-outline-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
