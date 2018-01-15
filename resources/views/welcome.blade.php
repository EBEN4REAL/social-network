
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
            @media (min-width: 1200px){

            .container {
            width: 1442px;
            }
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
            #postText{
                border:none;
            }
            textarea:focus{
                border:none;
            }
            .left-sidebar{
                height: 100vh;
            }
            .right-sidebar{
                height: 100vh;
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

            


            <div class="container" id="app" style="margin-top: 550px;">
                <div class="row">
                        <div class="col-md-3 left-sidebar" style="background:white">
                                <h3 class="text-center">LEFT  SIDEBAR</h3>
                                <hr>
         
                         </div>

                         <div class="col-md-6">
                                @if(Auth::check())
                                <div class="panel panel-default" >
                                       
                                      
                                        <div class="panel-heading">@{{ msg }}</div>

                                        <div class="row"  id="postID">
                                            <div class="col-xs-2">

                                                
                                                <img src="{{asset('img')}}/user_pics/{{Auth::user()->pic}}" width="70px"  height="70px" style="border-radius:25%; padding:10px" />

                                            </div>
                                            
                                            <div class="col-xs-10">
                                                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent = 'addPost' >
                                                    {{ csrf_field() }}
                                                    <textarea cols="65" rows="2" id="postText" v-model="content" id="postContent"></textarea>
                                                    <button type="submit" class="btn btn-primary pull-right" style="border-radius:0; margin-right: 10px" id="postButton">Post</button>
                                                </form>
                                            </div>
                                        </div>
                                        
                        
                                        <div class="panel-body">
                                           
                                        </div>
                                </div>
                                @endif

                                <div class="panel panel-default" style="padding-bottom: 300px">
                                        <div class="panel-heading ">Posts</div>
                        
                                        <div class="panel-body">
                                           <div v-for = "post in posts" style="border-bottom:1px solid black">
                                                <div class="col-md-12" style="background-color:#fff;padding-top: 10px">
                                                    <div class="col-md-2 pull-left">
                                                            <img :src="'{{url('http://127.0.0.1:8000')}}/img/user_pics/' + post.pic" width="80px" height="80px" 
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
                                                <br>
                                               
                                        </div>
                                        </div>
                                </div>
                            
                        </div>

                        <div class="col-md-3 right-sidebar" style="background:white">
                                <h3 class="text-center">RIGHT  SIDEBAR</h3>
                                <hr>
            
                         </div>

                </div>
                    
                    
                       
        
                       
        
                        
                  
        
                        
                    </div>
                </div>
        




          
    
   


        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>

        <script>
            $(document).ready(function(){
                $("#postButton").hide();
               
                $("#postID").mouseover( function(){
                    $("#postButton").show();
                    $("textarea").attr('rows' , '6');
                   

                })
                $("#postID").mouseout( function(){
                    $("#postButton").hide();
                    $("textarea").attr('rows' , '2');
                  
                })

  
            });
        </script>
    </body>
</html>
