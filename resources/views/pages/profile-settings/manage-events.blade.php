@extends('layouts.settings')

@section('settings-content')
	
	<div class="row">
		<h4 class="pull-left">Your events</h4>
		<a href="/profile/{{auth()->user()->name}}/settings/events/create" class="btn btn-primary pull-right">Create event <i class="fa fa-plus"></i></a>
	</div>

	<div class="row manage-events-wrapper">
		<div class="inner-events-wrapper">
		@if(count($events) >= 1)
			@foreach($events as $event)
				<div class="panel panel-default">
					<div class="panel-heading">
						<p>Event: {{$event->event_name}}</p>
					</div>
					<div class="panel-body">
						<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
							<p>{{$event->event_description}}</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
							<a class="btn pull-right" href="/profile/{{auth()->user()->name}}/settings/events/edit">Edit <i class="fa fa-pencil"></i></a>
						</div>
					</div>
				</div>
			@endforeach
		@else
		
			<div class="alert alert-info"><p>You dont have any events created</p> </div>

		@endif
		</div>
	</div>

@stop