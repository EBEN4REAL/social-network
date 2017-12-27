@extends('profile.master') @section('content')

<style>
	input {
		border-radius: 0;
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
			<a href="{{url('/editProfile')}}">Edit profile</a>
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

						<div class="col-sm-6 col-md-12">
							<div class="thumbnail">

								<h5 align="center"> {{ucwords(Auth::user()->name)}}</h5>
								<img src="{{asset('img')}}/user_pics/{{Auth::user()->pic}}" width="130px" height="130px" style="border-radius: 50%; height: 130px"
								 id="profile_pics" />
								<div class="caption">

									<p align="center">{{ Auth::user()->profile->city }} - {{ Auth::user()->profile->country }}</p>
									<p align="center">
										<a href=" {{ url('/changephoto') }} " class="btn btn-success" style="border-radius:  0"><span class="glyphicon glyphicon-plus"></span> Upload pics</a>
									</p>
								</div>

							</div>

						</div>



					</div>
					<h5>
						<h3 class="text-center">
							<span class="label label-default">Update your profile</span>
						</h3>
						<br>
					</h5>

					<form action="{{url('/updateProfile')}}" method="post">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-sm-6 col-md-6">

								<div class="col-md-7" style="margin-left:none">
									<div class="form-group ">
										<label class="control-label" id="sizing-addon1">City</label>
										<input type="text" class="form-control" placeholder="City" name="city" style=" border-radius: 0;" value="{{Auth::user()->profile->city}} ">

									</div>
                                    <br>

									<div class="form-group ">
										<label class="control-label" id="sizing-addon1" style=" border-radius: 0;">Country</label>
										<input type="text" class="form-control" placeholder="Country" name="country" style="border-radius:  0" value="{{Auth::user()->profile->country}}">

									</div>



								</div>

							</div>

							<div class="col-sm-6 col-md-6">
								<div class="form-group ">
									<label class="control-label" id="sizing-addon1">About</label>
									<textarea class="form-control" rows="3" name="about" placeholder="{{Auth::user()->profile->about}}" style=" border-radius: 0;" value=""></textarea>


								</div>


								<div class="form-group ">

									<button type="submit" class=" btn btn-success" name="" style="border-radius:  0">Update profile</button>

								</div>
							</div>


						</div>

					</form>






				</div>



			</div>



		</div>
	</div>
	@endsection