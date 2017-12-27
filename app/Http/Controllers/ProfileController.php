<?php

namespace App\Http\Controllers;

use App\Profile;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index($slug)
    {

        return view('profile.index')->with('data' , Auth::user()->profile);
    }

    public function UploadPhoto(Request $request )
    {

        $file = $request->file('pic');

        $file_name = $file->getClientOriginalName();

        $path = 'img/user_pics';

        $file->move($path , $file_name);

        $user_id = Auth::user()->id;
        
        DB::table('users')->where('id', $user_id)->update(['pic' => $file_name]);

        return back();
   
    }

    public function editProfile(Request $request)
    {
      
    // dd($request->all());
      $user_id = Auth::user()->id;

      DB::table('profiles')->where('user_id' , $user_id)->update($request->except('_token'));

      return view('profile.editProfile');
    }


    public function  findFriends(){
        
            $uid = Auth::user()->id;
           
            $allUsers = DB::table('users')->join('profiles' , 'users.id' , '=' , 'profiles.user_id')->where('users.id' , '!=' , $uid)->get();
        
           return view('profile.findFriends' ,compact('allUsers' , $allUsers));
        
        }

        public function sendRequest($user_requested_id)
        {
            
               Auth::user()->addFriend($user_requested_id);

               return back();
        }
        
        public function requests()
        {
            $uid = Auth::user()->id;

           $friend_requests =  DB::table('friendships')->Join('users' , 'users.id' , '=' , 'friendships.requester')
                                                        ->where('friendships.user_requested' , '=' ,  $uid)
                                                        ->where('status' , 0)
                                                        ->get();

            return view('profile.requests' , compact('friend_requests'));
        }

        public function acceptFriendship($name , $id)
        {
            $uid = Auth::user()->id;
            

            

           $checkRequest = DB::table('friendships')->where('requester' , $id)->where('user_requested' , $uid)->first();

           if($checkRequest)
           {
            $updateFriendship =  DB::table('friendships')->where('requester' , $id)->where('user_requested' , $uid)->update(['status' => 1]);
             
            if($updateFriendship)
            {
                return back()->with('msg' , 'You are now friends with' .  ' ' . $name);

            }
  
           }else{
            return back()->with('msg' , 'You are now friends');
           

           }

        }

        public function declineFriendship($name , $id)
        {
           $user_requested_id = Auth::user()->id;

           $requester_name = $name;

           $requester_id = $id;

           $delete_friendship = DB::table('friendships')->where('status' , 0)->where('user_requested' ,  $user_requested_id)->where('requester' ,  $requester_id )->delete();

           if( $delete_friendship)
           {
               return back()->with('msg', 'You declined the request from ' . $requester_name);
           }
        }

        public function getFriends()
        {
            $user_requested = Auth::user()->id;

            $friends_1 = DB::table('friendships')->Join('users' , 'users.id' , '=' , 'friendships.user_requested')->where('user_requested' , $user_requested)->where('status' , 1)->get();

            if ( $all_friends)
            {
                dd( $all_friends->name);
            }

           
            return view('profile.friends')->with('friends' ,  $all_friends);

           
        }

}
 

