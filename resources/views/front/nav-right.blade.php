<div class="col-md-4">
    <div class="shadow card m-3">
    <!-- Search Widget -->

        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <div class="input-group">
                {!! Form::open(['method'=>'get','action'=>'HomeController@search'])!!}
                <div class="form-group" >


                    <input type="text" autofocus name="search"  placeholder="Looking For Posts!" class="form-control" value="{{request()->search}}">
                </div>

                <div>
                <input type="submit" value="GO!" class="btn btn-primary">
                </div>



        </div>
    </div>

    </div>
    <div class="shadow card m-3">
    <!-- Categories Widget -->

        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                   @php   $categories=\App\Category::all();@endphp
                    @foreach($categories as $category)
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                        </li>

                    </ul>
                @endforeach
                </div>

        </div>
    </div>




</div>
</div>
