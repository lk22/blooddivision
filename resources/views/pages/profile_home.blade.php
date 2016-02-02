@extends('layouts.profile')

@section('profile_content')
	<div class="row profile-data-wrapper">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="profile-databox">
				<div class="inner-databox">
					<div class="left-databox col-xs-2 col-sm-2 col-md-3 col-lg-3">
						<i class="fa fa-calendar-o"></i>
					</div>
					<div class="right-databox col-xs-10 col-sm-10 col-md-9 col-lg-9">
						<div class="databox-count">
							0 events added
						</div>
						<div class="databox-text">
							<a href="/profile/{{auth()->user()->name}}/your-events">See all events</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="profile-databox">
				<div class="inner-databox">
					<div class="left-databox col-xs-2 col-sm-2 col-md-3 col-lg-3">
						<i class="fa fa-gamepad"></i>
					</div>
					<div class="right-databox col-xs-10 col-sm-10 col-md-9 col-lg-9">
						<div class="databox-count">
							2 games added
						</div>
						<div class="databox-text">
							<a href="/profile/{{auth()->user()->name}}/your-games">See all games</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="profile-databox">
				<div class="inner-databox">
					<div class="left-databox col-xs-2 col-sm-2 col-md-3 col-lg-3">
						<i class="fa fa-edit"></i>
					</div>
					<div class="right-databox col-xs-10 col-sm-10 col-md-9 col-lg-9">
						<div class="databox-count">
							No biography added
						</div>
						<div class="databox-text">
							<a href="/profile/{{auth()->user()->name}}/biography">See all events</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- timeline wrapper-->
	{{-- <ul class="profile-timeline">
		<!-- timeline item -->
	@if(count($events) <= 1)
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
	</ul><!-- timeline wrapper end --> --}}
@stop