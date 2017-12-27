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
			<a href="{{ url('/findFriends')}} " >Find Friends </a>
		</li>




	</ol>
	<div class="row">
    
	@include('profile.sidebar')
		<div class="col-md-9 "  style="padding-bottom: 200px">
			<div class="panel panel-default" style="padding-bottom: 200px">
				<div class="panel-heading"> {{ ucwords(Auth::user()->name) }} </div>


					<div class="panel-body">
					   	<div class="col-sm-12 col-md-12">

						   @if(session()->has('msg'))

						       <p class="alert alert-success">{{ session()->get('msg') }}</p>



						   @endif

						   @foreach($friend_requests as $uList)

						   <div class="row">
						    <div class="col-sm-2">
							    <img src="{{asset('img')}}/user_pics/{{$uList->pic}}" width="100px" height="100px" style="border-radius: 50%; height: 100px"
								 id="profile_pics" />
							</div>

							  <div class="col-sm-4">
							  <h4></h4> <strong> {{ucwords($uList->name)}}</strong> </h4>
								
								<p>Gender- {{$uList->gender}} </p>
								<p>Email- {{$uList->email}} </p>

							 </div>
							
							 
							  
							   <p class="pull-right"><a href=" {{url('/acceptFriendship')}}/{{$uList->name}}/{{$uList->id}} " class="btn btn-info  "> Accept</a>&nbsp;
							      <a href=" {{url('/declineFriendship')}}/{{$uList->name}}/{{$uList->id}} " class="btn btn-default  ">Decline</a></p>
							   <p class="pull-right"></p>

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