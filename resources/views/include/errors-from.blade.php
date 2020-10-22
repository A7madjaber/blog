@if(count($errors)>0)


    <div class="p-3 mb-2 alter alert-danger">

        @foreach($errors->all() as $error)
            <p class="mb-0">{{$error}}</p>
        @endforeach

    </div>


@endif


@if (session('success'))
     <div class="alert alert-success">
                <p class="mb-0">Data Updated successfully</p>
     </div>


@endif
