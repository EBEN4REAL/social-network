 @extends('profile.master') @section('content')
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

         <li>
			<a href="{{url('/changephoto')}}">Change profile pic</a>
		</li>


	</ol>
	<div class="row">
      @include('profile.sidebar')

        
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"> {{ Auth::user()->name }} Edit your profile here </div>

				<div class="panel-body">
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
					@endif

					<form action="{{url('/UploadPhoto')}}" method="post" enctype="multipart/form-data">
						<img src="{{asset('img')}}/user_pics/{{Auth::user()->pic}}" width="150px" height="150px" style="border-radius:50%" /> {{ csrf_field() }}
						<div class="form-group">
							<label class="control-label" for="Profile pic">Profile pic</label>
							<input type="file" name="pic" class="">
							<br>
							<button type="submit" class="btn btn-default">Upload picture</button>

						</div>

					</form>

				</div>


			</div>


		</div>
	</div>
</div>
</div>
</div>
@endsection