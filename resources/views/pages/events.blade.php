@extends('layouts.app')

@section('content')
	<!-- wrapper -->
	<section class="container-fluid events-wrapper">
		<!-- filter header -->
		<div class="row filter-header">
			<!-- inner -->
			<div class="container">
				<!-- <div class="all filter pull-left"><a href="/events?filter=all"> <i class="fa fa-globe"> All</i></a></div> -->
				<!-- <div class="latest filter pull-left"><a href="/events?filter=latest"> <i class="fa fa-hourglass-start"> Latest</i></a></div> -->
				<!-- <div class="completed filter pull-left"><a href="/events?filter=completed"> <i class="fa fa-check"> Completed</i></a></div> -->
				<!-- <div class="archived filter pull-left"><a href="/events?filter=archived"> <i class="fa fa-check"> Archived</i></a></div> -->
			</div>
		</div>
		<!-- events -->
		<div class="row events">
			<!-- inner -->
			<div class="container">
				<!-- loop through all events -->
				@foreach($events as $event)
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						
					
					<!-- panel -->
					<div class="panel panel-default event">
						<div class="panel-heading">
							@if($event->user->avatar)
								<img src="/images/avatars/{{$event->user->avatar}}" height="80" width="80" class="img img-circle" alt="">
							@else
								<img src="/images/mystery-man.jpg" height="80" width="80" class="img img-circle" alt="">
							@endif
							<span class="m-left-10">{{$event->user->name}}</span>
						</div>
						<div class="panel-body body">
						{{$event->name}}<br><br>
						{{$event->game}} <br> <br>
						{{$event->description}}
						<div class="row">
							<a href="/events/{slug}" class="pull-left m-10 btn">See event <i class="fa fa-calendar-o"></i></a>
						</div>
					</div> 
					</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@stop