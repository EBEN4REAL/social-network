@extends('profile.master')

@section('content')

<style>
	input {
		border-radius: 0;
	}
	a:hover {
		text-decoration: none;
	}
</style>
<div class="container">
	<ol class="breadcrumb">

		<li>
			<a href="{{url('/home')}} ">Home</a>
		</li>
		<li>
			<a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a>
		</li>
		<li>
			<a href="{{ url('/findFriends')}} " >Find Friends </a> </a>
		</li>




	</ol>
	<div class="row">
    
	@include('profile.sidebar')
		<div class="col-md-9 ">
			<div class="panel panel-default"  style="padding-bottom: 200px">
				<div class="panel-heading"> {{ ucwords(Auth::user()->name) }} </div>


					<div class="panel-body">
					   	<div class="col-sm-12 col-md-12">
						   @foreach($allUsers as $uList)

						   <div class="row">
						    <div class="col-sm-2">
							    <a href="{{url('/profile')}}/{{$uList->slug}} "> <img src="{{asset('img')}}/user_pics/{{$uList->pic}}" width="100px" height="100px" style="border-radius: 50%; height: 100px"
									id="profile_pics" /></a>
							</div>

							  <div class="col-sm-4">
							  <h4></h4> <strong> {{ucwords($uList->name)}}</strong> </h4>
								<p> <span class="glyphicon glyphicon-world-globe"></span> {{ $uList->city }} - {{ $uList->country }}</p>
								{{ $uList->about }}

							 </div>
							  <?php
							  
							  $check = DB::table('friendships')->where('user_requested' , '=' , $uList->id)->where('requester' , '=' , Auth::user()->id)->first();

											if($check == ''){
												
							   ?>             
							               <p class="pull-right"><a href="{{ url('/addfriend')}}/{{$uList->id}} " class="btn btn-info "><span class="glyphicon glyphicon-plus"></span>  Add Friend </a></p>
                                <?php
								
								}else{
								?>
								  <p class="pull-right"><a href=" " class="btn btn-defualt ">  Request sent</a></p>
								<?php
								}
								?>

						   </div>
						     <hr>
						  
						   
						  	
							@endforeach

						</div>

					
					</div>

					



					
					
				</div>



			</div>



		</div>
	</div>
	@endsection