<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('blog.home')}}">BLOGEST</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('blog.home')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>



                @if(Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/register')}}">Register</a></li>
                @else

                    @if (Auth::user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" href="{{route('dashboard.index')}}">Dashboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('profile.index')}}">Profile</a></li>


                    @endif

                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @endif


            </ul>
        </div>
    </div>
</nav>
<script src="{{asset('js/libs.js')}}"></script>

