@extends('admin.app',['title'=>'Create Post'])
    @section('content')
        <h2>Create Post</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('dashboard.post.index')}}">Posts</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ul>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-md-10">
                        <div class="rwo">
                            @include('include.errors-from')

                            {!! Form::open(['method'=>'POST','action'=>'Admin\AdminPostsController@store','files'=>true]) !!}
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
                            <img class="img-thumbnail img-fluid "id="image_preview_container" alt="preview image"src="{{asset('images/img.svg')}}">
                        </div>


                        <div class="form-group">
                            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @stop
