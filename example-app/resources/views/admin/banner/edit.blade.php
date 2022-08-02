<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Edit page</title>
      </head>
<body>
    <div class = "container">
<center><h1>Banner Edit</h1></center>

<form method="post" action="{{url('admin/banner/update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
<div class="mb-3">
<label>Title:</label>
<input class = "form-control" name="title" value="{{$data->title}}">
</div>
<div class="mb-3">
<label>Description:</label>
<input class = "form-control" name="description" value="{{$data->description}}">
</div>
<div class="mb-3">
<label>Image:</label>
<img src="{{url('upload-banner/'.$data->image)}}" style="width:150px; height:100px; border-radius=80%"><br>
</div>
<div class="mb-3">
<input class = "form-control" type = "file" name="image">
</div>


<button type="submit" class = "btn btn-warning">Submit</button>
</form>
    </div>
</body>
</html>
