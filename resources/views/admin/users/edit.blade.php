@extends('admin.app',['title'=>'Edit User'])
@section('content')

    <h2>Edit User</h2>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.user.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>
    <div class="col-md-12">
        <div class="tile">
             @include('include.errors-from')
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-fluid img-thumbnail" id="image_preview_container" src="{{$user->photo?$user->photo->file:'/images/img.svg'}}" >
                </div>


                <div class="col-sm-8">
                    {!! Form::model($user,['method'=>'PATCH','action'=>['Admin\AdminUsersController@update',$user->id],'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('title','Name:') !!}
                        {!! Form ::text('name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','Email:') !!}
                        {!! Form ::email('email',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('role_id','Role:') !!}
                        {!! Form ::select('role_id',[''=>'Chose One']+$roles,2,['class'=>'form-control']) !!}
                    </div>




                    <div class="form-group">
                        {!! Form::label('photo_id','Photo:') !!}
                        {!! Form ::file('photo_id',['id'=>'image','class'=>'form-control']),null !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','password:') !!}
                        {!! Form ::password('password',['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::submit('Edit User',['class'=>'btn btn-primary col-sm-2']) !!}
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>


@stop
