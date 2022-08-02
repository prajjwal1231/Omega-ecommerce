@extends('layout.backend.master')

@section('content')

{{-- div start --}}
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Product Data</strong>
            <button class="btn btn-info" style="float:right" data-toggle="modal" data-target="#a">Add Category</button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->product_name}}</td>
                        <td>{{$a->product_description}}</td>
                        <td><img src="{{url('upload/'.$a->product_image)}}" style="width:150px; height:100px; border-radius=50%"></td>
                        <td>{{$a->product_price}}</td>
                        <td>{{$a->status}}</td>

                        <td>
                            <a href="{{url('admin/product/view/'.$a->id)}}" class="btn btn-primary">View</a>
                            <a href="{{url('admin/product/edit/'.$a->id)}}" class="btn btn-warning">edit</a>
                            <a href="{{url('admin/product/delete/'.$a->id)}}" class="btn btn-danger">delete</a>
                            <a href="{{url('admin/product/add_image/'.$a->id)}}" class="btn btn-warning">Add Image</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
{{-- div end --}}

{{-- Model --}}
<div class="modal fade" id="a" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('admin/product/store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" class="form-control" name="product_description">
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="product_image">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="text" class="form-control" name="product_price">
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                    <select class="form-control" name="category_id" id="">
                        <option value="">Select From Option</option>
                      @foreach ($cat as $c)
                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                    </select>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
