@extends('layouts.app')

@section('content')
<!-- content wrapper -->
@include('partials.user-banner')
<div class="container-fluid content-wrapper m-top-15">
    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 inner-content-wrapper">
        <!-- right sidebar -->
        <div class="row right-content">
            <div class="row latest-events-row m-top-15">
                <h3>{{e('Latest events')}}</h3>
                @foreach($events as $event)
                    <div class="row event-row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <span><h5>{{ $event->name }}</h5></span>
                            <span>{{ $event->game }}</span> 
                            <p>{{ $event->description}}</p>
                        </div>
                        @if(!$event->user->avatar)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 event-user-info">
                                <span><img class="center-block img img-circle" src="/images/mystery-man.jpg" height="100" width="100" alt=""></span>
                                <p class="text-center">{{$event->user->name}}</p>
                            </div>
                         @else
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 event-user-info">
                                <span><img class="center-block img img-circle" src="/images/avatars/{{ $event->user->avatar }}" height="100" width="100" alt=""></span>
                                <p class="text-center">{{$event->user->name}}</p>
                            </div>
                        @endif
                        <br>
                        <br>
                    </div>
                @endforeach
                <a href="{{ url('/events') }}">See all events</a>
            </div>
        </div><!-- right sidebar end -->
    </div>
</div><!-- content wrapper -->
@endsection