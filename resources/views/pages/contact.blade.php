@extends('layouts.app')

@section('content')
	<div class="container contact-wrapper">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-offset-3 col-lg-6 col-lg-offset-3">
				<form action="contact-us" method="post">
				{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label" for="name">name: </label>
						<input type="text" name="name" placeholder="Enter your name here..." class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label" for="email"> email:</label>
						<input type="email" name="email" placeholder="Enter your name here..." class="form-control">
					</div>

					<div class="form-group">
						<label class="control-label" for="message">message: </label>
						<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
					</div>

					<div class="form-group">
						 <button type="submit" class="btn btn-primary submit">
	                        <i class="fa fa-message"></i> Send Message
	                    </button>
					</div>
				</form>
			</div>
		</div>
			@if($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<h5>{{$error}}</h5>
					@endforeach
				</div>
			@endif

			@if(Session::has('message_success'))
				<div class="alert alert-success">
					{{Session::get('message_success')}}
				</div>
			@endif
	</div>
@stop