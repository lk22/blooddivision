@extends('layouts.app')

@section('content')
<!-- content wrapper -->
<div class="container-fluid content-wrapper">
    <div class="hidden-xs hidden-sm col-md-1 col-lg-1 sidebar-partial">
        @include('partials.home-menu-partial')
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 col-lg-6 col-lg-offset-1 inner-content-wrapper">
        <div class="row welcome-user-container">
            <span class="userimage">
                @if(Auth::user()->avatar)
                    <img class="img img-circle" src="{{Auth::user()->avatar}}" alt="">
                @else
                    <img class="img img-circle" src="/images/mystery-man.jpg" alt="">
                @endif
            </span>
            <span class="welcomeMessage"><p>Welcome: {{Auth::user()->name}}</p></span>
        </div>
        <!-- right sidebar -->
        <div class="row right-content">
            <div class="row latest-events-row">
                <h3>Latest Events</h3>
                @foreach($events as $event)
                    <div class="row event-row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <span><h5>{{ $event->event_name }}</h5></span>
                            <span>{{ $event->event_game }}</span> 
                            <p>{{ $event->event_description}}</p>
                        </div>

                        @if(!$event->user->avatar)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                                <span><img class="center-block img img-circle" src="/images/mystery-man.jpg" height="55" width="55" alt=""></span>
                                <p class="text-center">{{$event->user->name}}</p>
                            </div>
                         @else
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                                <span><img class="center-block img img-circle" src="{{ $event->user->avatar }}" height="55" width="55" alt=""></span>
                                <p class="text-center">{{$event->user->name}}</p>
                            </div>
                        @endif
                        <br>
                        <br>
                    </div>
                @endforeach
                <a href="{{ url('/members') }}">See all users</a>
            </div>
        </div><!-- right sidebar end -->
    </div>
</div><!-- content wrapper -->
@endsection