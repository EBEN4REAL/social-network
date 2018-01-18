@extends('profile.master')



 @section('content')




 <div class="row" id="app">
        <div class="col-md-3 left-sidebar" style="background:white;  border-right: 3px solid #ddd">
                <h3 class="text-center"> Users </h3>
                <hr>
              
                        <ul v-for="privateMessage in privateMessages" style="margin-left: -34px;
                        margin-top: -9px;">
                           
                       
                            <li @click= "message(privateMessage.id)" style="list-style: none; margin-top:10px;  background: rgba(221, 221, 221, 0.977); padding:5px">
                                <img class="push-left col-md-4" :src="'{{url('http://127.0.0.1:8000/img/user_pics/')}}' + privateMessage.pic " width="30" height="50px" style="border-radius: 50%; height: 60px">
                                     <span class="">  @{{privateMessage.name  }}
                                    <p>Message Note</p></span>
                            
                            </li>
                        </ul>

               
                
        
                
        
         </div>
        
         <div class="col-md-6 r" style="background:white; height: auto; border-right: 3px solid #ddd">
                <h3 class="text-center">Messages</h3>
               
                <hr>
                <div class="" v-for="singleMsg in singleMsgs">
                    <div v-if = "singleMsg.user_from == {{ Auth::user()->id }}">
                        <div class="col-md-12" style="margin-top: 40px;">
                                <img :src="'{{url('http://127.0.0.1:8000/img/user_pics/')}}' + singleMsg.pic " width="30px" height="" style="border-radius: 100%;  margin-left: 20px; " class="pull-right" >
                                <div  class="" style="float:right; color: black; background-color: #F0F0F0; padding:5px 15px 5px 15px; margin-left: 25px; border-radius:10px">
                                       
                            @{{  singleMsg.msg}}
                
                                
                                  </div>

                        </div>
                           
                           

                    </div>

                    <div v-else>
                        
                            <div class="col-md-12 pull-right" style="margin-top: 40px">
                                    <img :src="'{{url('http://127.0.0.1:8000/img/user_pics/')}}' + singleMsg.pic "  width="30px" height="" style="border-radius: 100%; margin-right: 20px  " class="pull-left" >
                                    <div  class="" style="float:left; color: white; background-color: #0084ff; padding:5px 15px 5px 15px;  border-radius:10px">
                                           
                            
                                               @{{  singleMsg.msg}}
                    
                                    
                                      </div>
                                
                            </div>


                     
                  
                   </div>

                   
                            
                </div>
                <div class="margin-top: 10px" class="MsgArea">
                    
                </div>
                <textarea class="col-md-12 form-control">  </textarea>
                
            </div>
            
        
        
         <div class="col-md-3 left-sidebar" style="background:white;  border-right: 3px solid #ddd; height: 600px">
                <h3 class="text-center">User Information</h3>
                <hr>
        
         </div>
        
 </div>



 

 
 @endsection