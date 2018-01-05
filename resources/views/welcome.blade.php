
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->



        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       
       <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
       <link href="<?= asset('vendor/components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    
        <!-- Styles -->
        <style>
            html, body {
                background-color: #ddd;
                
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            p {
                color: #bbb;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Dashboard</a>
                         <a href="{{url('/profile')}}/{{Auth::user()->slug}} ">Profile</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="container" id="app">
                
                   @{{ msg }}
                   <form method="" enctype="multipart/form-data" v-on:submit.prevent = 'addPost' >
                      {{ csrf_field() }}
                      <textarea v-model="content"></textarea>
                      <button type="submit" class="btn btn-success" style="border-radius: 0">Post</button>
                   </form>

               
               


                <div v-for = "post in posts">
                     <div class="col-md-12" style="background-color:#fff;padding-top: 10px">
                        <div class="col-md-2 pull-left">
                                <img src="{{asset('img')}}/user_pics/" width="80px" height="80px" 
                                id="profile_pics" />
                        </div>

                        <div class="col-md-10">
                                <h3>@{{ post.name }}</h3>
                                <p> <i class="fa fa-globe" aria-hidden="true"></i> @{{ post.city}} - @{{ post.country }}</p>
                                <p><b> Gender: </b>  @{{ post.gender }} </p>
                                <small> @{{ post.created_at }} </small>
                            </div>

                                @{{ post.content }}
                                
            
                    </div>
                </div> 
               
            
        
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
