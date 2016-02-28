@extends('layouts.profile')

@section('profile_content')
	@foreach($user as $the_user)
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about-profile" id="sidebar-profile-affix">
				<div class="row about-description-row">
					<h4>About {{$the_user->name}}</h4>
					{{$the_user->profile_desc}}
				</div>
				<div class="buttons">
					<p class="edit_description_btn text-right btn btn-primary pull-right">Edit description</p>
				</div>
				<div class="user-description none">
				<h5>Tell us about you.</h5>
					<form action="" method="post" class="edit_description_form">
						{!! csrf_field() !!}
						<div class="form-group description-edit">
							<textarea name="description" class="form-control description" placeholder="Write about you here.." value="{$the_user->profile_desc}" id="" cols="30" rows="3"></textarea>
						</div>
						<div class="form-group submit">
							<input type="submit" class="btn pull-right" value="Change info">
							<p class="close_edit_description_btn text-right btn btn-primary pull-left">Cancel</p>
						</div>
					</form>
				</div>
			</div>	
	@endforeach
@stop