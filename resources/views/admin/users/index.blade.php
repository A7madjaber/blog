@extends('admin.app',['title'=>'Users'])
@section('content')


    <h2>Users</h2>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <div class="row">
                    <div class="col-12">
                        <form>
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" autofocus name="search" class="form-control" placeholder="search" value="{{request()->search}}">
                                    </div>
                                </div> <!--end of col4-->

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>search</button>


                                    <a href="{{route('dashboard.user.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>


                                </div><!--end of col4-->

                            </div><!--end of row-->

                        </form><!--end of form  -->

                    </div><!--end of col 12-->
                </div><!--end of row-->

                <div class="col-md-12">
                    @if($users ->count()>0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Photo</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($users as $index=>$user)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$user->name}}</td>
                                                <td> <img  style="height:70px"  class="img-fluid img-rounded" src="{{$user->photo?$user->photo->file:'/images/imag.svg'}}"></td>
                                    <td>{{$user->email}}</td>


                                    <td>
                                        <a  class="btn btn-warning btn-sm" href="{{route('dashboard.user.edit',$user->id)}}"><i class="fa fa-edit"></i>Edit</a>


                                        <form method="post"action="{{route('dashboard.user.destroy',$user->id)}}" style="display: inline">
                                            @csrf
                                            @method('delete')

                                            <button   type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>

                                        </form><!--end form-->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->appends(request()->query())->links()}}
                    @else
                        <h3 style="font-weight: 300;">Sorry no records found</h3>
                </div>
                @endif

            </div><!--end of tile-->

        </div>
        </div>

@stop
