@extends('layouts.profile')

@section('profile_content')
	<div class="row profile-data-wrapper">
		<div class="user-data">
			<a class="event-wrapper" href="#events">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 event-data">
					<div class="inner-data">
						<div class="row headline">
							<h3 class="text-center">Events</h3>
						</div>
						<div class="icon-container row">
							<p class="text-center"><i class="fa fa-calendar-o"></i></p>
							<p>you have created 3 events</p>
						</div>
						<div class="row buttons">
							<a class="events" href="/profile/{{auth()->user()->name}}/your-events">
								<div class="btn-wrapper">
									<p class="text-center">See all events</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</a>
			<a href="#games">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 game-data">
					<div class="inner-data">
						<div class="row headline">
							<h3 class="text-center">Games</h3>
						</div>
						<div class="icon-container row">
							<p class="text-center"><i class="fa fa-calendar-o"></i></p>
							<p>you have created 3 events</p>
						</div>
						<div class="row buttons">
							<a class="games" href="/profile/{{auth()->user()->name}}/your-games">
								<p class="text-center">See games events</p>
							</a>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
@stop