@extends('layouts.app')

@section('content')
	<!-- application events wrapper -->
	<div class="container-fluid app-events-wrapper">
		<div class="container events-inner-wrapper">
			<div class="row events-header-wrapper">
				<div class="col-xs-2 col-sm-2 hidden-md hidden-lg mobile-events-header">
					
				</div>
				<div class="hidden-xs hidden-sm col-md-12 col-lg-12 events-header">
					<div class="col-md-4 col-lg-4 search-events">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
							</span>
							<input type="text" class="form-control" placeholder="Search events...">
						</div>
					</div>
				</div>
			</div>
			<div class="row hidden-xs hidden-sm events-content-wrapper">
				<ul class="timeline-wrapper">
					<li class="timeline-item">
						<div class="timeline-avatar-badge">
							<img class="img img-circle" height="50" width="50" src="/images/mystery-man.jpg" alt="">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								this is the heading
							</div>
							<div class="timeline-body">
								this is some info
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop