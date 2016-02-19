@extends('layouts.app')

@section('content')
	<div class="container contact-wrapper">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<form action="" method="post">
					
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
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
					</div>

					<div class="form-group">
						<label class="control-label" for="submit">Send message => </label>
						 <button type="submit" class="btn btn-primary submit">
	                        <i class="fa fa-message"></i> Send Message
	                    </button>
					</div>
				</form>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<h3>inform us if you're running into even bugs or any kind of errors on this site, or even if u have questions to ask then we answer them <strong>ASAP</strong></h3>
			</div>
		</div>
	</div>
@stop