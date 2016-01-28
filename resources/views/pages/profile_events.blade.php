@extends('layouts.profile')

@section('profile_content')
	@if(count($events) >= 1)
		@foreach($events as $event)
			<div class="row events-row events-wrapper">
				<div class="panel panel-default event">
					<div class="panel-heading event-header">{{$event->event_name}}</div>
					<div class="panel-body">
						<div class="event-game">
							<h5>Game: {{$event->event_game}}</h5>
						</div>
						<div class="event-date">
							<h5>Date: {{$event->event_date}}</h5>
						</div>
						<div class="event-time">
							<h5>Time: {{$event->event_start_time}}</h5>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		<a class="create-profile-event btn btn-default" href="/profile/{{Auth::user()->name}}/create-event">Create new event <i class="fa fa-calendar-plus-o"></i></a>
	@else
		<div class="row events-row events-wrapper">
			<div class="no-events-container">
				<h3 class="text-center">Whooops....</h3>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<h5>It looks like u dont have any events created.</h5>
					<h5>Want to create a new event. <a href="/profile/{{Auth::user()->name}}/create-event">Lets get started</a></h5>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<h3><i class="fa fa-exclamation-circle"></i></h3>
				</div>
			</div>
		</div>
	@endif
@stop