@extends('profile.master')

@section('content')
<div class="container">
	<ol class="breadcrumb">

		<li>
			<a href="{{url('/home')}} ">Home</a>
		</li>
		


	</ol>
    <div class="row">
        @include('profile.sidebar')

         <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
       
     </div>
       
    </div>
</div>
@endsection
