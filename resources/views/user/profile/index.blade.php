
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Posts - Home page</title>

    <!-- Bootstrap core CSS -->
    @include('layouts.front-css')
    <script src="{{asset('dashboard/plugins/noty.min.js')}}"></script>

    <script src="{{asset('dashboard/js/jquery-3.3.1.min.js')}}"></script>

</head>

<body>

@include('front.nave-bar')


<!-- Page Content -->


<div class="container">
    <div class="row m-4">
        <div class="col-lg-8">
            <div class="col-md-12">
                <div class="tile">
                    @include('include.errors-from')

                    <div class="shadow card m-3 ">
                        <div class="card-body">


                        <div class="card-title font-weight-light">
                       <h5> PROF<span style="color: #0B90C4">ILE</span></h5>
                    </div>
                            <div class="row">

                            <div class="col-sm-12">
                                {!! Form::model(Auth::user(),['method'=>'PATCH','action'=>['UserProfileController@update',Auth::user()->id],'files'=>true]) !!}
                                <div class="form-group">
                                    {!! Form::label('title','Name:') !!}
                                    {!! Form ::text('name',null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email','Email:') !!}
                                    {!! Form ::email('email',null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('title','Bio:') !!}
                                    {!! Form ::textarea('bio',Auth()->user()->bio,['class'=>'form-control','rows'=>3]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('photo_id','Photo:') !!}
                                    {!! Form ::file('photo_id',['id'=>'image','class'=>'form-control']) !!}

                                </div>

                                <div class="form-group">
                                    {!! Form::label('password','password:') !!}
                                    {!! Form ::password('password',['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Edit Profile',['class'=>'btn btn-primary']) !!}
                                </div>

                                {!! Form::close()!!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            </div>



        <div class="shadow card ">
            <div class="card-body" style="width: 18rem;">


            <img class="img-fluid img-thumbnail" id="image_preview_container" src="{{Auth::user()->photo?Auth::user()->photo->file:'/images/place.png'}}" style="height: 40% ;width: 100%">
            <div class="card-body">
                <h5 class="card-title">Bio: </h5>
                <p class="card-text">{{Auth()->user()->bio}}</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Posts: <span class="font-weight-bold" style="color: #0B90C4">{{count(Auth::user()->posts)}}</span>

                </li>
                <li class="list-group-item">Comments: <span class="font-weight-bold" style="color: #0B90C4">{{count(Auth::user()->comments)}}</span>
                </li>

            </ul>

            </div>
        </div>

    </div>
</div>


<!-- Footer -->

<script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>


    $.ajaxSetup({

        headers:{
            'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

      $('#image').change(function(){

        let reader = new FileReader();
        reader.onload = (e) => {
            $('#image_preview_container').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    });

    $('#upload_image_form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

    });


    $('div.alert').delay(1000).slideUp(800);



</script>

</body>
@include('front.footer')

</html>










