@extends('admin.app',['title'=>'comments'])
@section('content')

    <h2>comments</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">comments</li>
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
                                    <input type="text" autofocus name="search" class="form-control" placeholder="Search By Author Name" value="{{request()->search}}">
                                </div>
                            </div> <!--end of col4-->

                            <div class="col-md-4">
                                <div class="form-group">


                                    <select class="form-control"name="status">
                                        <option value="2"{{request()->status == 0 ? 'selected' : ''}}>Un-active</option>
                                        <option value="1"{{request()->status == 1 ? 'selected' : ''}}>Active</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>search</button>
                            </div><!--end of col4-->

                        </div><!--end of row-->

                    </form><!--end of form  -->

                </div><!--end of col 12-->
            </div><!--end of row-->

            <div class="col-md-12">
                @if($comments ->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="">#</th>
                            <th>Author</th>
                            <th>Post</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($comments as $index=>$comment)

                                <td>{{$index+1}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->post->title}}</td>


                                <td>

                                    @if($comment->is_active==1)
                                        <input type="hidden" value="0" name="is_active">
                                        <a  class="btn btn-warning btn-sm" href="{{route('dashboard.comments.update',[$comment->id,2])}}">
                                            <i class="fa fa-times" ></i>Un-approve</a>
                                    @else

                                        <a  class="btn btn-success btn-sm" href="{{route('dashboard.comments.update',[$comment->id,1])}}">
                                            <i class="fa fa-check-square-o">
                                            </i>Approve</a>
                                    @endif

                                     <form method="post"action="{{route('dashboard.comments.destroy',$comment->id)}}" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button  type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                    </form><!--end form-->

                                        <a  class="btn btn-info btn-sm" href="{{route('dashboard.comments.show',$comment->id)}}"><i class="fa fa-edit"></i>Show</a>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{$comments->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 300;">Sorry no records found</h3>
            </div>
            @endif

        </div><!--end of tile-->

    </div>
</div>

@stop
