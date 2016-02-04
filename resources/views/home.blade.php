@extends('layouts.app')

@section('content')
<!-- content wrapper -->
<div class="container-fluid content-wrapper">
    <!-- left sidebar -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 left-sidebar animated bounceInLeft">
        <!-- message of the day partial -->
        {{-- @include('partials.message_of_the_day') --}}
    
        <div class="row latest-event-row">
            <h4>Latest event</h4>
            <span>Raid Second Boss - Destiny Xbox one</span>
            <p>Date: 2016-16-01</p>
            <p>Time: 20:00</p>
        </div>
    <p><a href="{{ url('/events') }}">See all events.</a></p>

    </div><!-- left sidebar end -->
    <!-- content container -->
    <!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 inner-content-wrapper">
        
    </div>--><!-- content container end -->
    <!-- right sidebar -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right-sidebar animated bounceInRight">
        <div class="row latest-registered-users-row">
            <h4>Latest registered users</h4>
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
