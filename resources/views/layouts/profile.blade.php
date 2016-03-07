<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title> {{ auth()->user()->name}} - Profile</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.css">


    <style>
        body.modal-open #modal-wrap {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        body.black{
        	color: #000;
        }
    </style>
</head>
<body id="modal-wrap profile" style="background: #E9EAED">
	<div class="overlay"></div>
	@include('partials.layout_header')
	@foreach($user as $the_user)
	<!-- the profile wrapper -->
	<div class="container-fluid profile-banner-wrapper" style="background-image: url('/images/profile_cover/{{$the_user->cover}}');">
	<div class="overlay"></div>
		<!-- inner banner wrapper -->
		<div class="container inner-profile-wrapper">
			<!-- the banner -->
			<div class="edit-profile-cover">
				<a href="/profile/{{Auth::user()->name}}/edit-cover">Edit cover <i class="fa fa-camera"></i></a>
			</div>
			<div class="row banner">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-media">
					<!-- check if the user has a profile picture -->
					@if(!$the_user->avatar)
						<!-- if the profile dont have a profile picture -->
						<img class="img img-thumbnail img-responsive profile-image" src="/images/mystery-man.jpg" alt="">
						<div class="row edit-profile">
							<a class="text-center edit-img-link" href="/profile{{ auth()->user()->name }}?profileImg=edit">Edit profile picture. <span class="text-right img-icon"><i class="fa fa-camera"></i></span></a>
						</div>
					@else
						<!-- else then show the profile picture -->
						<img class="img img-thumbnail img-responsive profile-image" src="/images/avatars/{{ auth()->user()->avatar }}" alt="">
						<div class="row edit-profile">
							<a class="edit-img-link" href="/profile{{ auth()->user()->name }}?profileImg=edit">Edit profile picture. <span class="text-right img-icon"><i class="fa fa-camera"></i></span></a>
						</div>
					@endif
				</div>
				@if(!count($the_user->cover))
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-information">
					<div class="profile-name">
						<h1 class="text-center black">{{$the_user->name}}</h1>
					</div>
					<div class="profile-email">
						<h4 class="text-center black">{{$the_user->email}}</h4>
					</div>
					<div class="profile-rank">
					@foreach($ranks as $rank)
						<h3 class="text-center black">Rank: {{$rank->rank}}</h3>
					@endforeach
					</div>
				</div>
				@else
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-information">
					<div class="profile-name">
						<h1 class="text-center">{{$the_user->name}}</h1>
					</div>
					<div class="profile-email">
						<h4 class="text-center">{{$the_user->email}}</h4>
					</div>
					<div class="profile-rank">
					@foreach($ranks as $rank)
						<h3 class="text-center">Rank: {{$rank->rank}}</h3>
					@endforeach
					</div>
				</div>
				@endif
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner-footer-wrapper" id="profile-banner-footer-affix">
					<div class="row inner-banner-footer-wrapper">
						<div class="profile-listing">
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 profile-link">
								<a href="/profile/{{auth()->user()->name}}"><i class="fa fa-home"></i> Home</a>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 profile-link">
								<a href="/profile/{{auth()->user()->name}}/your-events"><i class="fa fa-calendar-o"></i> Your events</a>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 profile-link">
								<a href="/profile/{{auth()->user()->name}}/your-games"><i class="fa fa-gamepad"></i> Your games</a>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 profile-link">
								<a href="/profile/{{auth()->user()->name}}/settings"><i class="fa fa-cogs"></i> Settings</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<!-- profile content wrapper -->
	<div class="container-fluid profile-content-wrapper">
		<div class="container inner-profile-content-wrapper">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about-profile">
				<div class="row about-description-row">
					<h4>About {{$the_user->name}}</h4>
					{{$the_user->profile_desc}}
				</div>
				<div class="buttons">
					<p class="edit_description_btn text-right btn btn-primary pull-right">Edit description</p>
				</div>
				<div class="user-description none">
					<form action="" method="post" class="edit_description_form">
					<h5>Tell us about you.</h5>
						{!! csrf_field() !!}
						<div class="form-group description-edit">
							<textarea name="description" class="form-control description" placeholder="Write about you here.." value="{{ $the_user->profile_desc }}" id="" cols="30" rows="3"></textarea>
						</div>
						<div class="form-group submit">
							<input type="submit" class="description btn pull-right" value="Change info">
							<p class="close_edit_description_btn text-right btn btn-primary pull-left">Cancel</p>
						</div>
					</form>
				</div>
			</div>
			@yield('profile_content')
		</div>
	</div>
	@include('partials.layout_footer')
	<!-- JavaScripts -->
<!-- 	<script src="https://fb.me/react-0.14.6.min.js"></script>
	<script src="https://fb.me/react-dom-0.14.6.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ elixir('js/all.js') }}"></script>
</body>
</html>