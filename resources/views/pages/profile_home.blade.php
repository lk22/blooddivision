@extends('layouts.profile')

@section('profile_content')
	@foreach($user as $the_user)
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 left-profile-sidebar" id="sidebar-profile-affix">
				<div class="row">
					<h4>About {{$the_user->name}}</h4>
					{{$the_user->profile_desc}}
				</div>
				<div class="row">
					
				</div>
			</div>	
	@endforeach
@stop