@extends('layouts.profile')

@section('profile_content')
	<!-- timeline wrapper-->
	<ul class="profile-timeline">
		<!-- timeline item -->
	@if(count($events) >= 1)
		@foreach($events as $event)
		<li class="timeline-item">
			<!-- timeline-bagde -->
			<div class="timeline-badge">
				<!-- icon -->
				<i class="fa fa-calendar-check-o"></i>
			</div><!-- timeline-badge end -->
			<!-- timeline-panel -->
			<div class="timeline-panel">
			<!-- heading -->
				<div class="timeline-heading">
					<h4>{{$event->name}} added a new event at {{$event->created_at}}</h4>
				</div>
				<div class="timeline-body">
					<p>{{$event->event_game}}</p>
					<p>{{$event->event_date}}</p>
					<p>From: {{$event->event_start_time}} </p><span>To: {{$event->event_end_time}}</span>
					<p>{{$event->event_description}}</p>
				</div>
			</div><!-- timeline panel end -->
		</li><!-- timeline item end -->
		@endforeach
	@endif
	</ul><!-- timeline wrapper end -->
@stop