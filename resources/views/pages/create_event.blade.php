@extends('layouts.profile')

@section('profile_content')
	<div class="row create-event-wrapper">
		<div class="row">
			<h4 class="text-center">Create your new event</h4>
		</div>
		<div class="row create-event-wrapper">
			<form action="" method="post" class="form-horizontal create">
				{{ csrf_field() }}

				<div class="form-group">
					<label class="col-xs-1 col-sm-6 col-md-4 col-lg-4 control-label">Event name:</label>
					<div class="col-xs-11 col-sm-6 col-md-6 col-lg-6">
                    	<input type="text" class="form-control event-name-input" name="event_name">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-1 col-sm-6 col-md-4 col-lg-4 control-label">Event name:</label>
					<div class="col-xs-11 col-sm-6 col-md-6 col-lg-6">
                    	<select class="form-control event-game-input" name="event_game" id="games">
	                    	@foreach($games as $game)
	                    		<option value="{{$game->game}}">
	                    			{{$game->game}}
	                    		</option>
	                    	@endforeach
                    	</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-xs-1 col-sm-6 col-md-6 col-lg-5">event datetime</label>
					<input type="datetime-local" class="form-control event-datetime-input" placeholder="your event date and time goes here..." name="event_datetime">
				</div>

				<div class="form-group">
					<label class="col-xs-1 col-sm-6 col-md-4 col-lg-4 control-label">Event description:</label>
					<div class="col-xs-11 col-sm-6 col-md-6 col-lg-6">
                    	<textarea class="form-control event-desc-input" name="event_desc" id="" cols="30" rows="5"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12 col-sm-12 col-md- col-md-offset-4 col-lg-3 col-offset-4">
						<button type="submit" class="btn btn-primary submit">
	                        <i class="fa fa-calendar"></i> Create event
	                    </button>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2">
                    	<span class="hidden-xs hidden-sm create_event_helper" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i> Need Help</span>
                    </div>
				</div>
			</form>
			@if($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<h5>{{$error}}</h5>
					@endforeach
				</div>
			@endif
		</div>
		@include('partials.help_events_modal')
	</div>

	<script>
$(function(){
var auth = "auth()->user()->name";
	$('.submit').click(function(){
		$.ajax({
			url: '/profile/' + auth + '/create-event',
			type: 'GET',
			dataType: 'json'
			data: $('.create').serialize(),
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});
	
		
	</script>
@stop