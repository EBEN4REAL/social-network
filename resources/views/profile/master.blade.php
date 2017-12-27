

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Larabook</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   <link href="{{ asset('css/fa-svg-with-js.css') }}" rel="stylesheet">
   <link href="{{ asset('css/fa-solid.min.css') }}" rel="stylesheet">

    {{--  scripts  --}}
    <script src="js/fontawesome.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       Larabook
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                          @if (Auth::check())

                              
                        
                             <li><a href=" {{url('/profile')}}/{{Auth::user()->slug}} ">Profile</a></li>
                             <li><a href=" {{url('/findFriends')}} ">Find Friends</a></li>
                             <li> <a href=" {{url('/requests')}} ">Friend requests (
                                 {{ App\Friendships::where('status' , 0)->where('user_requested' , Auth::user()->id)->count() }}
                             )
                             
                                 </a>
                             </li>
                              <li><a href=" {{url('/friends')}} ">Friends (  {{  App\Friendships::where('user_requested' , Auth::user()->id)->where('status' , 1)->count()  }}  )</a></li>
                             
                         @endif    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                       
                        @if (Auth::guest())

                             
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                         <li> <a href=""> <img src="{{asset('img')}}/user_pics/{{Auth::user()->pic}}" width="30px"  height="30px" style="border-radius:50%" /></a></li>   
                            <li class="dropdown">
                                 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="{{ url('/editProfile') }}"> Edit PRofile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>