<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function imdex()
    {
        $posts = DB::table('posts')->get();

        return view('welcome' , compact('posts'));
    }

    public function addPost(Request $request)
    {
      $content = $request->content;

      $createPost = DB::table('posts')
      ->insert(['content' => $content, 'user_id' => Auth::user()->id , 'status' => 0 , 'created_at' =>  date("Y-m-d H:i:s") , 'updated_at' => date("Y-m-d H:i:s")]);

      if($createPost)
      {
        $posts_json  = DB::table('posts')
        ->leftJoin('profiles' , 'profiles.user_id' , 'posts.user_id')
        ->leftJoin('users' , 'users.id' , 'posts.user_id')
        ->orderBy('posts.created_at' , 'desc')
        ->take(2)
        ->get();


        return $posts_json;
      }
      
    }



}