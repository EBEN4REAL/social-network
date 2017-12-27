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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return Auth::user()->test();
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
    
   
});



