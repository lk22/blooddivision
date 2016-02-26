<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign up email </title>

	<!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
	<h1>Thanks for joining our division!</h1>

	<p>
		We just need you to verify your email address <a href="{{url("/register/confirm/{$user->token}")}}">click here to verify</a> real quick!
	</p>
</body>
</html>