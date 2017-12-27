<?php 

namespace App\Traits;

use App\Friendships;

trait  Friendable {
    public function test(){
        
        return 'hi';
    }

    public function addFriend($user_requested_id)
    {

        


       $Friendship = Friendships::create([
  
           'requester'          => $this->id,    // user who is logged in 
           'user_requested'     => $user_requested_id

           ]);

           if($Friendship)
           {
               return  $Friendship;
           }

           return 'failed';
    }


}
 

 