@extends('layouts.app')

@section('content')
<!-- members content wrapper -->
<div class="container-fluid members-content-wrapper">
	<!-- inner wrapper -->
	<div class="container inner-wrapper">
		<!-- member row -->
		<div class="row members-row">
			@foreach($all_members as $member)
				<a href="/profile/{slug}"><div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 member-wrapper animated flipInX">
					<div class="row member-picture-wrapper">
						@if(!$member->avatar)
							<img class="img img-circle img-responsive center-block" src="/images/mystery-man.jpg" alt="">
						@else
							<img class="img img-circle img-responsive center-block" src="{{ $member->avatar }}" alt="">
						@endif
					</div>
					<div class="row member-information-row">
						<h4 class="text-center">{{ $member->name }}</h4>
						<div class="col-xs-12 col-sm-12 col-md-1 col-md-offset-1 col-lg-1 col-lg-offset-1">
							<p class="text-center">{{$member->email}}</p>
						</div>
					</div>
				</div></a>
			@endforeach
		</div>
	</div>
</div>
@stop