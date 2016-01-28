<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title> {{ Auth::user()->name}} - Profile</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">


    <style>
        body.modal-open #modal-wrap {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="modal-wrap">
	@include('partials.layout_header')
	<!-- the profile wrapper -->
	<div class="container-fluid profile-banner-wrapper">
		<!-- inner banner wrapper -->
		<div class="container inner-profile-wrapper">
			<!-- the banner -->
			@foreach($user as $the_user)
			<div class="row banner">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-media">
					<!-- check if the user has a profile picture -->
					@if(!Auth::user()->avatar)
						<!-- if the profile dont have a profile picture -->
						<img class="img img-thumbnail img-responsive profile-image" src="/images/mystery-man.jpg" alt="">
						<div class="row edit-profile">
							<a class="text-center edit-img-link" href="/profile{{ Auth::user()->name }}?profileImg=edit">Edit profile picture. <span class="text-right img-icon"><i class="fa fa-camera"></i></span></a>
						</div>
					@else
						<!-- else then show the profile picture -->
						<img class="img img-thumbnail img-responsive profile-image" src="{{ Auth::user()->avatar }}" alt="">
						<div class="row edit-profile">
							<a class="edit-img-link" href="/profile{{ Auth::user()->name }}?profileImg=edit">Edit profile picture. <span class="text-right img-icon"><i class="fa fa-camera"></i></span></a>
						</div>
					@endif
				</div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-information">
					<div class="profile-name">
						<h1 class="text-center">{{Auth::user()->name}}</h1>
					</div>
					<div class="profile-email">
						<h4 class="text-center">{{Auth::user()->email}}</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner-footer-wrapper">
					<div class="row inner-banner-footer-wrapper">
						<div class="profile-listing">
							<span class="profile-link">
								<a href="/profile/{{Auth::user()->name}}"><i class="fa fa-home"></i> Home</a>
							</span>
							<span class="profile-link">
								<a href="/profile/{{Auth::user()->name}}/your-events"><i class="fa fa-calendar-o"></i> Your events</a>
							</span>
							<span class="profile-link">
								<a href="/profile/{{Auth::user()->name}}/your-games"><i class="fa fa-gamepad"></i> Your games</a>
							</span>
							<span class="profile-link">
								<a href="/profile/{{Auth::user()->name}}/your-stats"><i class="fa fa-tasks"></i> Your stats</a>
							</span>
							<span class="profile-link">
								<a href="/profile/{{Auth::user()->name}}/about"><i class="fa fa-user"></i> About</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- profile content wrapper -->
	<div class="container-fluid profile-content-wrapper">
		<div class="container inner-profile-content-wrapper">
			@yield('profile_content')
		</div>
	</div>
	@include('partials.layout_footer')
	<!-- JavaScripts -->
	<script src="https://fb.me/react-0.14.6.min.js"></script>
	<script src="https://fb.me/react-dom-0.14.6.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--<script src="{{ elixir('js/all.js') }}"></script>-->
</body>
</html>