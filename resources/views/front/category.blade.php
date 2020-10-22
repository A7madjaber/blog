@extends('front.blog-layout')
@section('content')


    @if(count($posts)==0)
        <br>
        <h3 style="font-weight:300;">Sorry no records found</h3>


    @else

        <h1 class="my-4 font-weight-light" style="color: #0B90C4">{{$category_name}}</h1>



    <!-- Blog Post -->
    @foreach($posts as $post)
        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->photo->file}} " alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{!! str_limit($post->body,160) !!}<br>
                    <a href="{{route('blog.post',$post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                {{$post->created_at->diffforhumans()}}
            </div>
        </div>



    @endforeach

    {{$posts->render()}}


@endif
@stop

