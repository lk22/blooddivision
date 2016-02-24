
	<div class="container">
		<div class="row link-container">
			<a href="{{url('/events')}}">Events <i class="fa fa-calendar-o"></i></a>
		</div>
		<div class="row link-container">
			<a href="{{url('/all-users')}}">Users <i class="fa fa-users"></i></a>
		</div>
		<!-- <div class="row link-container">
			<a href="url('/forum')">Events <i class="fa fa-comments"></i></a>
		</div> -->
		<div class="row link-container">
			<a href="/profile/{{Auth::user()->name}}">Profile <i class="fa fa-user"></i></a>
		</div>
	</div>
