
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{csrf_token()}}">

    <title>Blog Posts - Home page</title>

    <!-- Bootstrap core CSS -->
 @include('layouts.front-css')
    <script src="{{asset('dashboard/plugins/noty.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/plugins/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/plugins/themes/relax.css')}}">


    <style>

        .back-to-top {
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display:none;
        }


    </style>

</head>

<body>

@include('front.nave-bar')


<!-- Page Content -->


<div class="container">

    <div class="row">


        <!-- Post Content Column -->
        <div class="col-lg-8">

      @yield('content')
            @include('admin.partials._sessions')
    </div>
    <!-- /.row -->



<!-- /.container -->


@include('front.nav-right')
</div>
    <div class="container">
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top"
           role="button" title="Click to return on the top page" data-toggle="tooltip"
           data-placement="left">
            <i class="fa fa-arrow-circle-o-up"
               aria-hidden="true"></i>
            <span class="font-weight-lighter">Top </span></a></div>


</div>
@include('front.footer')

<!-- Footer -->

<!-- Bootstrap core JavaScript -->
<script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>


    $.ajaxSetup({

        headers:{
            'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    Noty.overrideDefaults({
        theme   : 'relax',
    });


    $(document).ready(function () {

        $(document).on('click','.delete',function (e) {

            e.preventDefault();

            var that=$(this);
            var n=new Noty({
                text:"Confirm deleting record",
                killer:true,
                buttons:[
                    Noty.button('yes','btn btn-success mr-2',function () {

                        that.closest('form').submit();

                    }),
                    Noty.button('no','btn btn-danger',function () {

                        n.close();

                    })
                ]

            });

            n.show()

        });

    });



    $('div.alert').delay(1500).slideUp(800);

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


    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });


    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('#back-to-top').tooltip('show');
</script>

</body>

</html>
