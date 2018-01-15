@extends('profile.master')



 @section('content')




 <div class="row" id="app">
        <div class="col-md-3 left-sidebar" style="background:white;  border-right: 3px solid #ddd">
                <h3 class="text-center"> Users </h3>
                <hr>
              
                        <ul v-for="privateMessage in privateMessages" style="margin-left: -34px;
                        margin-top: -9px;">
                           
                       
                            <li @click= "message(privateMessage.id)" style="list-style: none; margin-top:10px;  background: rgba(221, 221, 221, 0.977); padding:5px">
                                <img class="push-left col-md-4" :src="'{{url('http://127.0.0.1:8000/img/user_pics/')}}' + privateMessage.pic " width="50px" height="50px" style="border-radius: 50%; height: 60px">
                                     <span class="">  @{{privateMessage.name  }}
                                    <p>Message Note</p></span>
                            
                            </li>
                        </ul>

               
                
        
                
        
         </div>
        
         <div class="col-md-6 left-sidebar" style="background:white; height: 600px; border-right: 3px solid #ddd">
                <h3 class="text-center">Messages</h3>
               
                <hr>
                <div class="" v-for="singleMsg in singleMsgs">
                    @{{  singleMsg.user_from }}  @{{  singleMsg.msg}}
                </div>


        
         </div>
        
        
         <div class="col-md-3 left-sidebar" style="background:white;  border-right: 3px solid #ddd; height: 600px">
                <h3 class="text-center">User Information</h3>
                <hr>
        
         </div>
 </div>


 

 
 @endsection