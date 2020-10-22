@extends('admin.app',['title'=>'Posts'])
@section('content')

    <h2>Posts</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Posts</li>
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
                                <a href="{{route('dashboard.post.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                            </div><!--end of col4-->

                        </div><!--end of row-->

                    </form><!--end of form  -->

                </div><!--end of col 12-->
            </div><!--end of row-->

            <div class="col-md-12">
                @if($posts ->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="">#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($posts as $index=>$post)

                                <td>{{$index+1}}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                   <h4><span class="badge badge-primary">{{$post->category->name}}</span></h4></td>
                                <td>{{$post->user->name}}</td>


                                <td><a  class="btn btn-warning btn-sm" href="{{route('dashboard.post.edit',$post->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                    <form method="post"action="{{route('dashboard.post.destroy',$post->id)}}" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button  type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                    </form><!--end form-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$posts->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 300;">Sorry no records found</h3>
            </div>
            @endif

        </div><!--end of tile-->

    </div>
</div>

@stop
