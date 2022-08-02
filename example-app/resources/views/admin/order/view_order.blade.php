@extends('layout.backend.master')

@section('content')

{{-- div start --}}
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
            <button class="btn btn-info" style="float:right" data-toggle="modal" data-target="#a">Add Category</button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Ordered Product</th>
                        <th>Order Amount</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>


                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @php
                        //extra for model no need
                        $r = DB::table('carts')->where('session_id',$session)->get();
                    @endphp --}}
                    @foreach ($order as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->created_at}}</td>
                        <td>{{$a->name}}</td>
                        <td>{{$a->user_email}}</td>
                        <td>
                            @foreach($a->orderp as $p)
                            {{$p->product_name}}
                            ({{$p->product_quantity}})
                            @endforeach
                        </td>
                        <td>{{$a->grand_total}}</td>
                        <td>{{$a->status}}</td>
                        <td>{{$a->payment_method}}</td>


                        <td>

                            <a href="{{url('admin/orders/view_order_details/'.$a->id)}}" class="btn btn-success mb-1">View Order</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
{{-- div end --}}


@endsection
