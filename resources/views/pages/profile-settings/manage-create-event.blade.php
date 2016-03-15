@extends('layouts.settings')


@section('settings-content')

	<div class="row">
		<h4>Create event</h4>
	</div>

	<div class="row">
		<form action="" method="post" class="create-event-form">

		@if($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<h5>{{$error}}</h5>
					@endforeach
				</div>
			@endif
			
			{!! csrf_field() !!}

			<div class="form-group">
				<label for="" class="control-label">Event name:</label>
				<input placeholder="Enter event name here" type="text" name="event_name" class="form-control">
			</div>

			<div class="form-group">
				<label for="" class="control-label">Event game:</label>
				<input type="text" class="form-control" placeholder="Enter game name here" name="event_game">
			</div>

			<div class="form-group">
				<label for="" class="control-label">Event datetime:</label>
				<input type="date" class="form-control event-datetime-input" placeholder="your event date and time goes here..." name="event_datetime">
			</div>

			<div class="form-group">
				<label for="" class="control-label">Event description:</label>
				<textarea class="form-control manage-description" name="event_desc" id="" cols="30" rows="5"></textarea>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value='Create'>
			</div>

		</form>
	</div>

@stop

