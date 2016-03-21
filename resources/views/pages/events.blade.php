@extends('layouts.app')

@section('content')
	<!-- wrapper -->
	<section class="container-fluid events-wrapper">
		<!-- filter header -->
		<div class="row filter-header">
			<!-- inner -->
			<div class="container">
				<div class="all filter pull-left"><a href="/events?filter=all"> <i class="fa fa-globe"> All</i></a></div>
				<div class="latest filter pull-left"><a href="/events?filter=latest"> <i class="fa fa-hourglass-start"> Latest</i></a></div>
				<div class="completed filter pull-left"><a href="/events?filter=completed"> <i class="fa fa-check"> Completed</i></a></div>
				<div class="archived filter pull-left"><a href="/events?filter=archived"> <i class="fa fa-check"> Archived</i></a></div>
			</div>
		</div>
		<!-- events -->
		<div class="row events">
			<!-- inner -->
			<div class="container">
				<!-- loop through all events -->
				@foreach($events as $event)
					
					<!-- panel -->
					<div class="panel panel-primary event">
						<div class="panel-heading">
							@if($event->user->avatar)
								<img src="/images/avatars/{{$event->user->avatar}}" height="55" width="55" class="img img-circle" alt="">
							@else
								<img src="/images/mystery-man.jpg" height="55" width="55" class="img img-circle" alt="">
							@endif
							<span style="margin-left:10px;">{{$event->user->name}}</span>
						</div>
						<div class="panel-body body">
						{{$event->name}}<br><br>
						{{$event->game}} <br> <br>
						{{$event->description}}
						<div class="row">
							
						</div>
					</div> 
					</div>
					
				@endforeach
			</div>
		</div>
	</section>
@stop