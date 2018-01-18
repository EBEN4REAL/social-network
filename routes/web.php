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

Route::get('/messages' , function(){

  return view('messages');
});


Route::get('/getMessages' , function(){

  $allUsers1 = DB::table('users')->Join('conversations' , 'users.id' , 'conversations.user_1')->where('conversations.user_2'  , Auth::user()->id)->get();

//   return $allUsers1;

  $allUser2 = DB::table('users')->Join('conversations' , 'users.id' , 'conversations.user_2')->where('conversations.user_1'  , Auth::user()->id)->get();

//   return $allUser2;

   $allConv =  array_merge($allUsers1->toArray() , $allUser2->toArray());
    
   return $allConv; 
  
});

Route::get('/getMessages/{id}' , function($id){
      
//     $checkConversation = DB::table('conversations')->where('user_1' , Auth::user()->id)
//     ->Where('user_2' , $id)->get();

//    if(count($checkConversation) != 0){
//        // fetch messgaes
//     //    echo $checkConversation[0]->id;
//     //    echo $checkConversation[3]->id;

//     $userMessages = DB::table('messages')
//     ->where('messages.conversation_id' , $checkConversation[0]->id )->get();

//     return $userMessages;

//    }
//    else{
//      echo "No previous conversations with this user";
//    }

$userMessages = DB::table('messages')->Join('users' , 'users.id' ,  'messages.user_from')
    ->where('messages.conversation_id' , $id)->get();

    return $userMessages;



});

Route::get('/', function () {

    $posts = DB::table('posts')->leftJoin('profiles' , 'profiles.user_id' , 'posts.user_id')->leftJoin('users' , 'users.id' , 'posts.user_id')->get();


    return view('welcome',  compact('posts'));
});

Route::get('/posts', function () {

    $posts_json  = DB::table('posts')->join('profiles' , 'profiles.user_id' , 'posts.user_id')->join('users' , 'users.id' , 'posts.user_id')->orderBy('posts.id' , 'desc')
    ->take(3)->get();

    
    return $posts_json;
});





Route::post('/addPost' , 'PostsController@addPost');


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

Route::get('/eben' , function(){
    
    return view('profile.eben');
});




