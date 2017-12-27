@extends('profile.master') @section('content')


<div class="container">
	<ol class="breadcrumb">

		<li>
			<a href="{{url('/home')}} ">Home</a>
		</li>
		<li>
			<a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a>
		</li>


	</ol>
	<div class="row">
      @include('profile.sidebar')

          	<div class="col-md-9 ">
			<div class="panel panel-default">
				<div class="panel-heading"> {{ ucwords(Auth::user()->name) }} </div>

				<div class="panel-body">
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
					@endif {{-- Welcome to your profile --}}
					<br>

					<div class="row">

					<div class="col-sm-6 col-md-4">
							<div class="thumbnail">

								<h5 align="center"> {{ucwords(Auth::user()->name)}}</h5>
								<img src="{{asset('img')}}/user_pics/{{Auth::user()->pic}}" width="130px" height="130px" style="border-radius: 50%; height: 130px"
								 id="profile_pics" />
								<div class="caption">

									<p align="center">{{ Auth::user()->profile->city }} | {{ Auth::user()->profile->country }}</p>
									<p align="center">
										<a href=" {{ url('/editProfile') }} " class="btn btn-success" style="border-radius:  0">Edit Profile</a>
									</p>
								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-7">
							<h5>
							<span class="label label-default">About</span>
							</h5>
							<p> {{$data->about}} </p>
						</div>

					</div>

				</div>
			</div>


		</div> 

      </div>
	
	</div>
	@endsection