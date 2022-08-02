<section class="categories-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>Categories</h2>
        </div>
        <div class="row">
            @foreach ($category as $c )
            <div class="col-lg-2 col-sm-4 col-md-4">
                <div class="single-categories-box">
                    <img src="{{url('upload/'.$c->image)}}" alt="image">
                    <h3>{{$c->name}}</h3>
                    <a href="{{url('category/'.$c->id)}}" class="link-btn"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
