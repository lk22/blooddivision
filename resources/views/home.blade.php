@extends('layouts.app')

@section('content')
<!-- content wrapper -->
<div class="container-fluid content-wrapper">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-4 col-lg-6 col-lg-offset-4 welcome-user-container">
            <span class="userimage"><img class="img img-circle" src="{{Auth::user()->avatar}}" alt=""></span>
            <span class="welcomeMessage"><p>Welcome: {{Auth::user()->name}}</p></span>
<!--             <div class="row hidden-xs hidden-sm">
                <span class="label label-default">See latest events</span>
            </div> -->
        </div>
    </div>
    @include('partials.home-menu-partial')
    <!-- right sidebar -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 col-lg-6 col-lg-offset-1 right-sidebar">
        <div class="row latest-registered-users-row">
            <h3>Latest registered users</h3>
            @foreach($latest_users as $user)
                <div class="row user-row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <span><h5>{{ $user->name }}</h5></span>
                        <span>{{ $user->email }}</span>
                    </div>
                    @if(!Auth::user()->avatar)
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                            <span><img class="img img-circle" src="/images/mystery-man.jpg" height="55" width="55" alt=""></span>
                        </div>
                     @else
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                            <span><img src="{{ Auth::user()->avatar }}" height="55" width="55" alt=""></span>
                        </div>
                    @endif
                    <br>
                    <br>
                </div>
            @endforeach
            <a href="{{ url('/members') }}">See all users</a>
        </div>
    </div><!-- right sidebar end -->
</div><!-- content wrapper -->
@endsection
