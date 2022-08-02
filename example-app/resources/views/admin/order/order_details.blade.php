@extends('layout.backend.master')

@section('content')

{{-- div start --}}
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>User Email</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($order as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->user_id}}</td>
                        <td>{{$a->user_email}}</td>
                        <td>{{$a->product_name}}</td>
                        <td><img src = {{url('upload/'.$a->product_image)}} style="width:120px; height:128px; border-radius=50%"></td>
                        <td>{{$a->product_price}}</td>
                        <td>{{$a->product_quantity}}</td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
{{-- div end --}}


@endsection
