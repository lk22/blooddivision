<?php 
/**
*   @project: blooddivision.com
*   @author:  Leo Knudsen - Laravel/Testing Developer - Athliit Aps
*   @package: laravel Framework
*   @version: 5.2
*   @description: Danish Xbox/Windows guild playing Halo 1-5, Destiny, WoW, GTA V, SWTOR 
*/

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <title>Blood Division - Join epic battles with others from denmark</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="/css/all.css">


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        #app-layout{
            padding-bottom:0px;
        }
    </style>
</head>
<body id="app-layout">
<div class="overlay"></div>
    @include('partials.layout_header')

    @yield('content')
    @include('partials.layout_footer')

    @include('partials.auth_help_modal')
    @include('partials.register_help_modal')
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>

</body>
</html>
