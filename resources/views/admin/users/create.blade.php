@extends('admin.app',['title'=>'Add User'])
@section('content')
    <h2>Users</h2>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active">Add User</li>
    </ul>

        <div class="col-md-12">
            <div class="tile ">
                @include('include.errors-from')

                <div class="row">
                    <div class="col-sm-3">
                        <img class="img-fluid img-thumbnail" id="image_preview_container" src="{{asset('images/img.svg')}}" >
                    </div>

                    <div class="col-sm-8">
                {!! Form::open(['method'=>'POST','action'=>'Admin\AdminUsersController@store','files'=>true]) !!}
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
                    {!! Form ::select('role_id',[''=>'Chose One']+$roles,null,['class'=>'form-control']) !!}
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
                    {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close()!!}
                    </div>
                </div>
            </div>

@stop
