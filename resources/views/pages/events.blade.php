@extends('layouts.app')

@section('content')
@include('partials.user-banner')
	<!-- wrapper -->
	<section class="container-fluid events-wrapper">
		<!-- filter header -->
		<div class="row filter-header">
			<!-- inner -->
			<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<h3>EVENTS</h3>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-5 col-lg-4 col-lg-offset-5">
				 
			</div>
				<div class="all filter pull-right btn m-top-15"><a href="/events/all"> <i class="fa fa-globe"> All</i></a></div>
				<div class="latest filter pull-right btn m-top-15"><a href="/events/latest"> <i class="fa fa-hourglass-start"> Latest</i></a></div>
				<div class="completed filter pull-right btn m-top-15"><a href="/events/completed"> <i class="fa fa-check"> Completed</i></a></div>
				<div class="archived filter pull-right btn m-top-15"><a href="/events/archived"> <i class="fa fa-check"> Archived</i></a></div>
			</div>
		</div>
		<!-- events -->
		<div class="row events">
			<!-- inner -->
			<div class="container">
				<!-- loop through all events -->
				@foreach($events as $event)
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<!-- panel -->
						<div class="panel panel-default event">
							<div class="panel-heading">
								@if($event->user->avatar)
									<img src="/images/avatars/{{$event->user->avatar}}" height="80" width="80" class="img img-circle b-2 b-solid b-blue" alt="">
								@else
									<img src="/images/mystery-man.jpg" height="80" width="80" class="img img-circle b-2 b-solid b-blue" alt="">
								@endif
								<span class="m-left-10">{{$event->user->name}}</span>
							</div>
							<div class="panel-body body">
							{{$event->name}}<br><br>
							{{$event->game}} <br> <br>
							{{$event->description}}
							<div class="row m-10">
								<a href="/events/{slug}" class="btn btn-block">See event <i class="fa fa-calendar-o"></i></a>
							</div>
						</div> 
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@stop