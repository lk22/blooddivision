@extends('layouts.settings')

@section('settings-content')
	<div class="row">
		<h4>User settings</h4>
	</div>
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data" class="profile">

			@if($errors->any())
				<div class="alert alert-danger update-user-warning">
					<h4><i class="fa fa-warning"></i> Something went wrong</h4>
					<br>
					<p>Following errors during your update occured</p>
					<br>
					<br>
					@foreach($errors->all() as $error)
						<h5>{{$error}}</h5>
					@endforeach
					<div class="row">
						<p class="btn close-warning pull-left"><i class="fa fa-thumbs-o-up"></i> Got it!</p>
					</div>
				</div>
			@endif

			{!! csrf_field() !!}
			@foreach($user as $the_user)
			<div class="form-group avatar">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-label">
					<label for="" class="label-control">Avatar:</label>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 input">
					<span><img class="img img-thumbnail" src="/images/avatars/{{$the_user->avatar}}" width="150" height="150" alt=""></span>
					<input type="file" multiple="multiple" name="avatar" class="form-control avatarInput" value="{{$the_user->avatar}}">
					<div class="container-fluid show-avatar">
						<img src="#" height="150" width="150" class="img img-thumbnail center-block" id="target" alt="your image" style="display:none">
						<p id="cancel" class="btn btn-primary pull-left">Cancel</p>
					</div>
				</div>
			</div>
				
			<div class="form-group cover">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-label">
					<label for="" class="label-control">Cover:</label>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 input">
					<span><img class="img img-thumbnail" src="/images/profile_cover/{{$the_user->cover}}" width="150" height="150" alt=""></span>
					<input type="file" multiple="multiple" name="cover" class="form-control coverInput" value="{{$the_user->cover}}">
					<div class="container-fluid show-cover">
						<img src="#" height="250" width="250" class="img img-thumbnail center-block" id="target" alt="your image" style="display:none">
					</div>
				</div>
			</div>

			<div class="form-group name">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-label">
					<label for="" class="label-control">Username:</label>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 input">
					<input type="text" name="name" class="form-control" value="{{$the_user->name}}">
				</div>
			</div>
			<div class="form-group email">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-label">
					<label for="" class="label-control">Email:</label>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 input">
					<input type="text" name="email" class="form-control" value="{{$the_user->email}}">
				</div>
			</div>
			<div class="form-group description">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-label">
					<label for="" class="label-control">description:</label>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 input">
					<textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter description here...">{{$the_user->profile_desc}}</textarea>
				</div>
			</div>
			<div class="form-group submit">
				<input type="submit" class="btn btn-primary pull-left" value="Edit information">
			</div>
			@endforeach
		</form>
	</div>
@stop