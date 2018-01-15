

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
   
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
   <link href="<?= asset('vendor/components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

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
                            
                         @endif    
                    </ul>
                    



                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                 
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <img src="{{asset('img')}}/user_pics/{{Auth::user()->pic}}" width="30px"  height="30px" style="border-radius:50%" /> <span class="caret"></span>
                                    </a>
    
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                          <a href="{{ url('/editProfile') }}"> Edit Profile</a>
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
                        <!-- Authentication Links -->
                       
                        @if (Auth::guest())

                             
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        


                         <li class="dropdown">
                                 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-globe fa-2x" aria-hidden="true"></i><span class="badge" style="background:red; position: relative; top:-18px; right: 15px">  {{ 
                            App\Notifications::where('status' , 1)  // unread
                                ->where('user_hero' , Auth::user()->id) 
                                ->count()
                            
                            }}</span>
                            </a>

                            <?php

                                $notes = DB::table('users')  // unread
                                 ->join('notifications' , 'users.id' , 'notifications.user_logged')
                                ->where('user_hero' , Auth::user()->id)
                                ->where('status' ,1) // unread notification
                                ->orderBy('notifications.created_at' , 'DESC')
                                ->get();
                            
                            ?>

                            <ul class="dropdown-menu" role="menu">
                                @foreach($notes as $note)
                                
                               
                                  <a href="{{url('/notifications')}}/{{$note->id}} ">
                                        <li>
                                                <div class="row">
                                                    <div class="col-md-2 ">
                                                          <img src="{{asset('img')}}/user_pics/{{$note->pic}}"  width="30px"  height="30px" style="border-radius:50%; margin: 5px" />
          
                                                    </div>
          
                                                      <div class="col-md-10 ">
                                                             <b style="color:green">{{ ucwords($note->name) }}</b>   <span style="color:black">{{ $note->note }}</span> 
                                                      </div>
                                                </div>
                                               
                                                 
                                              </li>

                                  </a>
                                   
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{url('/friends')}} "><i class="fa fa-users fa-2x" aria-hidden="true"></i>
                            <span class="badge" style="background:red; position: relative; top:-18px; right: 15px">
                                    {{  App\notifications::where('status' , 1) // UNread
                                    ->where('user_hero' , Auth::user()->id)    
                                    ->count() }}
                            </span>
                           
                            </a>   
                        </li>








                          
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/profile.js') }}"></script>
    
    
</body>
</html>
