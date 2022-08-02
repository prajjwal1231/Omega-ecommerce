@extends('layout.backend.master')

@section('content')

{{-- div start --}}
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Banner Data</strong>
            <button class="btn btn-info" style="float:right" data-toggle="modal" data-target="#a">Add Category</button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->title}}</td>
                        <td>{{$a->description}}</td>
                        <td><img src="{{url('upload-banner/'.$a->image)}}" style="width:150px; height:100px; border-radius=50%"></td>
                        <td>{{$a->status}}</td>

                        <td>
                            <a href="{{url('admin/banner/view/'.$a->id)}}" class="btn btn-primary">View</a>
                            <a href="{{url('admin/banner/edit/'.$a->id)}}" class="btn btn-warning">edit</a>
                            <a href="{{url('admin/banner/delete/'.$a->id)}}" class="btn btn-warning">delete</a>
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
                <form method="post" action="{{url('admin/banner/store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
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
