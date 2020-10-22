@extends('front.blog-layout')
<script src="{{asset('dashboard/js/jquery-3.3.1.min.js')}}"></script>
@section('content')
    <h1 class="my-4 text-center font-weight-light">BLOG<span style="color: #0B90C4">EST</span>
    </h1>

    @if(Session::has('comment_message'))

        <br>
        <div class="alert alert-success">
            <p class="mb-0">{{session('comment_message')}}</p>
        </div>
    @endif

    @include('include.errors-from')

    <div class="shadow card m-3 ">
        <div class="card-body">
            @if(Auth::check())
                <div class="container d-block card-body">
                    <button type="button" class="btn btn-primary flex" data-toggle="modal" data-target="#myModal">Create New Post</button>
                </div>
            @endif
            <!-- Blog Post -->
            @foreach($posts as $post)
            <div class="card mb-4">
                <img class="card-img-top " src="{{$post->photo->file}} " style="height: 330px;" alt="Card image cap">
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
            {{$posts->appends(request()->query())->links()}}

        </div>
        </div>

    @include('user.create-post')


@stop


