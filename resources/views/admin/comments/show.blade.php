
@extends('admin.app',['title'=>'Show Comment'])
@section('content')

    <h2>Comment</h2>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.comments.index')}}">Comments</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>
    <div class="col-md-12">


        <div class="tile">

                <div class="col-md-12">
                    <div class="rwo">


                        <div class="timeline-post">

                                <div class="content">
                                    <h5><a href="#">{{$comment->user->name}}</a></h5>
                                    <p class="text-muted">{{$comment->created_at->diffForHumans()}}</p>
                                </div>


                            <div class="post-content">

                                <div class="font-weight-bold ">The Comment:</div>

                                <div class="card card-header">
                                    <span class="text-right">{{$comment->body}}</span>
                                </div>

                                <div class="font-weight-bold ">The Post:</div>
                                <div class="card card-header">
                                    <span class="text-right">{{$comment->post->body}}</span>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>


            @if($comment->is_active==1)
                <input type="hidden" value="0" name="is_active">
                <a  class="mt-3 btn btn-warning btn-sm" href="{{route('dashboard.comments.update',[$comment->id,2])}}">
                    <i class="fa fa-times" ></i>Un-approve</a>
            @else

                <a  class="mt-3 btn btn-success btn-sm" href="{{route('dashboard.comments.update',[$comment->id,1])}}">
                    <i class="fa fa-check-square-o">
                    </i>Approve</a>
            @endif

            </div>


        </div>
    </div>



@stop

