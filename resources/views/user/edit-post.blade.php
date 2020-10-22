@extends('front.blog-layout')
@section('content')

    @if(Session::has('comment_message'))

        <br>
        <div class="alert alert-success">
            <p class="mb-0">{{session('comment_message')}}</p>
        </div>
    @endif

    @include('include.errors-from')

    <div class="shadow card m-3 ">


        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Post</h4>

            </div>

        @php $categories = \App\Category::pluck('name', 'id')->all(); @endphp

        <!-- Modal body -->
            <div class="modal-body card-header align-items-center">


                {!! Form::model($post,['method'=>'PATCH','action'=>['UserPostsController@update',$post->id],'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('title','Title:') !!}
                    {!! Form ::text('title',null,['class'=>'form-control']) !!}
                </div>

            <div class="form-group">
                {!! Form::label('category_id','Category:') !!}
                {!! Form ::select('category_id',[''=>'Chose Category']+$categories,null,['class'=>'form-control']) !!}    </div>




            <div class="form-group">
                {!! Form::label('body','Body:') !!}
                {!! Form ::textarea('body',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form ::file('photo_id',['id'=>'image','class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                <img class="img-thumbnail img-fluid" id="image_preview_container" src="{{$post->photo->file}}">
            </div>


            <div class="form-group">
                {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close()!!}


        </div>
        </div>
                    </div>




@stop
