<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//   Dispplay all posts
Route::get('/', function () {

    $posts = DB::table('posts')->leftJoin('profiles' , 'profiles.user_id' , 'posts.user_id')->leftJoin('users' , 'users.id' , 'posts.user_id')->get();


    return view('welcome',  compact('posts'));
});

Route::get('/posts', function () {

    $posts_json  = DB::table('posts')->leftJoin('profiles' , 'profiles.user_id' , 'posts.user_id')->leftJoin('users' , 'users.id' , 'posts.user_id')->take(2)->get();


    return $posts_json;
});



Route::post('/addPost' , 'PostsController@addPost' );


Route::get('/test', function () {
   
    $notes = DB::table('notifications')  // unread
             ->where('user_logged' , Auth::user()->id) 
             ->get();

          dd($notes);
});




Route::get('/count', function () {
   
    $count = App\Notifications::where('status' , 1)  // unread
             ->where('user_logged' , Auth::user()->id) 
             ->count();

         echo $count;
});



Auth::routes();

Route::group(['middleware' => 'auth'] , function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    
    Route::get('/profile/{slug}' ,  'ProfileController@index');

    Route::get('/changephoto' , function(){

        return view('profile.pic');
    });

    Route::post('/UploadPhoto' , 'ProfileController@UploadPhoto');

    Route::get('/editProfile' , function(){

        return view('profile.editProfile')->with('data' , Auth::user()->profile);

    });

    Route::post('/updateProfile' ,'ProfileController@editProfile');

    Route::get('/findFriends' , 'ProfileController@findFriends');

    Route::get('/addfriend/{user_requested_id}' , 'ProfileController@sendRequest');

    Route::get('/requests' , 'ProfileController@requests');
    
   Route::get('/acceptFriendship/{name}/{id}' , 'ProfileController@acceptFriendship');

   Route::get('/declineFriendship/{name}/{id}' , 'ProfileController@declineFriendship');
   
   Route::get('/friends' , 'ProfileController@getFriends');

   Route::get('/unfriend/{name}/{id}' , 'ProfileController@unfriend');
   
   Route::get('/notifications/{note_id}' , 'ProfileCOntroller@notifications');
    
   
});





