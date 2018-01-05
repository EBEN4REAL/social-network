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

						   @foreach($notes as $note)

						   <div class="row">
						    <ul>
                                <li>
                                    <p><a href="{{url('/profile')}}/{{$note->slug}} " style="bold; color:green">{{$note->name }} </a>   {{$note->note}} </p>
                                </li>
                            </ul>

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