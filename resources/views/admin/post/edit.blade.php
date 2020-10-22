
@extends('admin.app',['title'=>'Edit Post'])
@section('content')

    <h2>Edit Post</h2>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.post.index')}}">Posts</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>
    <div class="col-md-12">
        <div class="tile">
            @include('include.errors-from')
            <div class="row">
                <div class="col-md-12">
                    <div class="rwo">
                        {!! Form::model($post,['method'=>'PATCH','action'=>['Admin\AdminPostsController@update',$post->id],'files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::label('title','Title:') !!}
                            {!! Form ::text('title',null,['class'=>'form-control']) !!}
                        </div>
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
    </div>



@stop

