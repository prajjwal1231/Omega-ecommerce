<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Form</title>
      </head>
<body>
    <div class = "container">
<center><h1><u>Product Details</u></h1></center>

<form method="post" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
<label>Product Name:</label>
<h4>{{$data->product_name}}</h4>
</div>

<div class="mb-3">
    <label>Description:</label>
    <h4>{{$data->product_description}}</h4>
    </div>


<div class="mb-3">
<label>Image:</label>
</div>

<div class="mb-3">
<img src="{{url('upload/'.$data->product_image)}}" style="width:450px; height:400px; border-radius=80%">
</div>

<div class="mb-3">
    <label>Price:</label>
    <h4>{{$data->product_price}}</h4>
    </div>

</form>
    </div>
</body>
</html>
