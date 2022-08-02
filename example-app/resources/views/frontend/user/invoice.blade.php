<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('backend/assets/css/adminlte.min.css')}}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    @foreach ($order as $or)
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
                    <img src="{{url('assets/img/logo-2.png')}}" style="max-width: 250px;
                    height: auto;" alt="logo">
          <small class="float-right">Date: {{$or->created_at}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Omega, Inc.</strong><br>
          123 City center <br>
          Gwalior, 474001<br>
          Phone: +91-1234567890<br>
          Email: prajjwal@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$or->name}}</strong><br>
          {{$or->address}}<br>
          Pincode: {{$or->pin_code}}<br>
          Phone: {{$or->phone_num}}<br>
          Email: {{$or->user_email}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Transaction Id:</b><br>
        #{{$or->transaction_id}}<br>
        <br>
        <b>Order ID:</b> {{$or->order_id}}<br>
        <b>Payment Due:</b> {{$or->updated_at}}<br>
        <b>Payment Method:</b> {{$or->payment_method}}<br>
        {{-- <b>Account:</b> 968-34567 --}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>
            {{-- <th>Serial #</th> --}}
            {{-- <th>Description</th> --}}
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($or->orderp as $or_p)
          <tr>
            <td>{{$or_p->product_quantity}}</td>
            <td>{{$or_p->product_name}}</td>
            {{-- <td>455-981-221</td> --}}
            {{-- <td>El snort testosterone trophy driving gloves handsome</td> --}}
            <td>Rs {{$or_p->product_price}}</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-6">

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rs {{$or->grand_total-$or->shipping_charges}}</td>
            </tr>
            {{-- <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr> --}}
            <tr>
              <th>Shipping:</th>
              <td>Rs {{$or->shipping_charges}}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>Rs {{$or->grand_total}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endforeach
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
