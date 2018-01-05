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

		<li>
			<a href="{{ url('/friends')}} " >Friends </a>
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

						   @foreach($friends as $friend)

						   <div class="row">
						    <div class="col-sm-2">
							    <img src="{{asset('img')}}/user_pics/{{$friend->pic}}" width="100px" height="100px" style="border-radius: 50%; height: 100px"
								 id="profile_pics" />
							</div>

							  <div class="col-sm-4">
							  <h4></h4> <strong> {{ucwords($friend->name)}}</strong> </h4>
								
								<p>Gender- {{$friend->gender}} </p>
								<p>Email- {{$friend->email}} </p>

							 </div>
							
							 
							  
							   <p class="pull-right"><a href=" {{url('/unfriend')}}/{{$friend->name}}/{{$friend->id}} " class="btn btn-default  "> Unfriend</a>&nbsp;
							     
							 

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