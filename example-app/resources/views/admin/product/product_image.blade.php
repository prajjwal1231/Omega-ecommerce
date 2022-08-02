@extends('layout.backend.master')

@section('content')

<div class = "container">
    <center><h1 style="background-color: yellow"><i>Add Image</i></h1></center>
<form method="post" action="{{url('admin/product/image_update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$a->id}}">
    <div class="mb-3">
    <h4>Name: {{$a->product_name}}</h4>
    </div>
    <div class="mb-3">
        <input class = "form-control" type = "file" name = "image">
        </div>
{{-- <div class="mb-3">
<label>Image:</label>
<img src="{{url('upload/'.$data->product_image)}}" style="width:150px; height:100px; border-radius=80%"><br>
</div>
 --}}


<button type="submit" class = "btn btn-warning">Submit</button>
</form>
</div>
{{-- div start --}}
<div class="container">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Product Data</strong>
            <button class="btn btn-info" style="float:right" data-toggle="modal" data-target="#a">Add Image</button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($image_data as $a2)
                    <tr>
                        <td>{{$a2->id}}</td>
                        <td>{{$a->product_name}}</td>
                        <td><img src="{{url('upload/'.$a2->product_image)}}" style="width:150px; height:100px; border-radius=50%"></td>
                        <td>
                            <a href="{{url('admin/product/add_image/edit/'.$a2->id)}}" class="btn btn-warning">edit</a>
                            <a href="{{url('admin/product/add_image/delete/'.$a2->id)}}" class="btn btn-danger">delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>
{{-- div end --}}
@endsection
