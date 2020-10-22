
@extends('front.blog-layout')

@section('content')


    @if(Session::has('comment_message'))

        <br>
        <div class="alert alert-success">
            <p class="mb-0">{{session('comment_message')}}</p>
        </div>
    @endif


    <div class="shadow card m-3 ">
        @include('include.errors-from')

        <div class="card-body">
    <!-- Title -->
        <div class="card-title">
            <h3>{{$post->title}}</h3>
                    </div>
   <! -- Author -->

   <p class="lead">
       by :
       {{$post->user->name}}
   </p>


            @if (Auth::check())
                @if(Auth::user()->id==$post->user_id)
                    <a class=" float-right btn btn-info btn-sm m-1" href="{{route('post.edit',$post->slug)}}">Edit</a>
                    <form method="post"action="{{route('post.destroy',$post->slug)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="float-right btn btn-danger btn-sm delete m-1 ">Delete</button>
                </form><!--end form-->
            @endif
        @endif
        <!-- Date/Time -->
   <p>{{$post->created_at}}</p>


                <hr>

   <!-- Preview Image -->
   <img class="img-fluid rounded " src="{{$post->photo->file}}"style="height: 340px; width:729px"  alt="">

   <hr>

   <!-- Post Content -->
   <p class="lead">{!! $post->body !!}</p>

   <hr>
</div>
</div>

   @if(Auth::check())

       <div class="shadow card m-3">
           <h6 class="card-header">Leave a Comment:</h6>
           <div class="card-body">
               {!! Form::open(['method'=>'POST','action'=>'Admin\CommentsController@comment']) !!}
               <div class="form-group">
                   {!! Form::label('body','Body:') !!}
                   {!! Form ::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
               </div>
               <div class="form-group">
                   {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
               </div>
               <input type="hidden" name="post_id"value="{{$post->id}}">
               <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
               {!! Form::close()!!}
           </div>
       </div>

   @endif




   <!-- Single Comment -->
    <div class="shadow card m-3">
        @if (count($comments)>0)

            <div class="card-header">
                <h4 class="font-weight-light">Comments</h4>
            </div>

            <div class="card-header">


                @foreach($comments as $comment)

                        <div class="row">
                            <div class="col-sm-2">
                                <img class="rounded-circle img-thumbnail" src="{{$comment->user->photo->file}}"
                                     style="height:80px; width:80px;" alt="">
                            </div>

                            <div class="col-sm-9">
                                <div class="card-body">
                                    <h5 class="font-weight-light">{{$comment->user->name}}</h5>
                                    <p class="card-text">{{$comment->body}}</p>
                                    <small class="float-right">{{$comment->created_at->diffForHumans()}}</small>

                                </div>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>



            <div class="container">
                <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top"
                   role="button" title="Click to return on the top page" data-toggle="tooltip"
                   data-placement="left">
                    <i class="fa fa-arrow-circle-o-up"
                       aria-hidden="true"></i>
                    <span class="font-weight-lighter">Top </span></a></div>
        @endif
    </div>
   @stop


