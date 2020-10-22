<div class="modal fade center" id="myModal">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Post</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body card-header align-items-center">
                <div class="tile">

                        <div class="col-md-12">
                            <div class="rwo">


                                {!! Form::open(['method'=>'POST','action'=>'UserPostsController@store','files'=>true]) !!}
                                <div class="form-group">
                                    {!! Form::label('title','Title:') !!}
                                    {!! Form ::text('title',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            @php $categories = \App\Category::pluck('name', 'id')->all(); @endphp

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
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


