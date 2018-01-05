@extends('profile.master') 

@section('content')


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

	  @foreach($userData as $uData)
	  {{$uData->user_id}}
	  <div class="col-md-9 ">
			<div class="panel panel-default">
				<div class="panel-heading"> {{ ucwords($uData->name) }} </div>

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

								<h5 align="center"> {{ucwords($uData->name)}}</h5>
								<img src="{{asset('img')}}/user_pics/{{$uData->pic}}" width="130px" height="130px" style="border-radius: 50%; height: 130px"
								 id="profile_pics" />
								<div class="caption">

									@if(Auth::user()->id == $uData->user_id)

										<p align="center">{{ $uData->city }} | {{$uData->country }}</p>
										<p align="center">
											<a href=" {{ url('/editProfile') }} " class="btn btn-success" style="border-radius:  0">Edit Profile</a>
										</p>
									@endif
								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-7">
							<h5>
							<span class="label label-default">About</span>
							</h5>
							<p> {{$uData->about}} </p>
						</div>

					</div>

				</div>
			</div>


		</div> 


		@endforeach

      </div>
	
	</div>
	@endsection