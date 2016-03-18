@extends('layouts.profile')

@section('profile_content')
	@if(count($events) >= 1)
		@foreach($events as $event)
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 events-wrapper">
				{{$event->event_name}}
				{{$event->event_game}}
				{{$event->event_datetime}}
			</div>
		@endforeach
		<a class="create-profile-event btn btn-default" href="/profile/{{Auth::user()->name}}/manage/events/create">Create new event <i class="fa fa-calendar-plus-o"></i></a>
	@else
		<div class="row events-row events-wrapper">
			<div class="no-events-container">
				<h3 class="text-center">Whooops....</h3>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<h5>It looks like u dont have any events created.</h5>
					<h5>Want to create a new event. <a href="/profile/{{Auth::user()->name}}/manage/events/create">Lets get started</a></h5>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<h3><i class="fa fa-exclamation-circle"></i></h3>
				</div>
			</div>
		</div>
	@endif
@stop