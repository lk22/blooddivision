@extends('layouts.app')

@section('content')
<!-- welcome banner wrapper -->
<div class="container-fluid blooddivision-welcome-wrapper">
    <!-- inner banner wrapper -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner-wrapper">
        <h1 class="text-center">JOIN THE NEW DIVISION OF BLOOD!</h1>
        <h4 class="text-center">And fight epic battles in various worlds!</h4>
        <h4 class="text-center">And on different platforms</h4>
    </div><!-- inner banner wrapper end -->
    <!-- platforms wrapper -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 platform-wrapper">
        <h3 class="text-center">Join our battles on</h3>
        <!-- xbox platform -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2 col-lg-3 col-lg-offset-2 xbox-platform-container">
            <img src="/images/Xbox_360.png" height="128" width="128" alt="">
            <div class="row">
                <h3 class="text-left">Xbox One/360 platforms </h3>
            </div>
        </div><!-- xbox platform end -->
        <!-- windows platform -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2 col-lg-3 col-lg-offset-2 windows-platform-container">
            <img src="/images/10_windows-128.png" alt="">
            <div class="row">
                <h3 class="text-left">Windows platforms</h3>
            </div>
        </div><!-- windows platform end -->
    </div><!-- platforms wrapper end -->
    <!-- see more wrapper -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 see-more-wrapper">
        <p class="text-center">See more</p>
        <div class="caret-down">
            <a href="#provides">
                <i class="fa fa-angle-down"></i>
            </a>
        </div>
    </div><!-- see more wrapper end -->
</div><!-- welcome banner wrapper end -->
<!-- about wrapper -->
<div id="provides" class="container-fluid blooddivision-about-wrapper">
    <div class="row">
        <h1 class="text-center">AVAILABLE MEMBER SERVICES</h1>
    </div>
    <!-- inner about wrapper -->
    <div class="container inner-about-wrapper">
        
        <!-- provider container -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="row icon-row">
                <i class="fa fa-calendar-plus-o"></i>
            </div>
            <div class="row">
                <h3 class="text-center">Schedule battles and other events</h3>
                <p class="text-center">And let your teammates know when u want to fight</p>
            </div>
        </div><!-- provider container end -->
        <!-- provider container -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <!--icon container -->
            <div class="row icon-row">
                <i class="fa fa-cogs"></i>
            </div><!-- icon container end -->
            <div class="row">
                <h3 class="text-center">Setup your own profile</h3>
                <p class="text-center">Configure your own profile as you want it to be</p>
                <p class="text-center">with ranks, game data and other settings</p>
            </div>
        </div><!-- provider container end -->
        <!-- provider container -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <!-- icon container -->
            <div class="row icon-row">
                <i class="fa fa-comment"></i>
            </div><!-- icon container end -->
            <div class="row">
                <h3 class="text-center">Communicate through private chat</h3>
                <p class="text-center">Chat with your teammates through a private chat service</p>
            </div>
        </div>
        <!-- provider container -->
        <?php /*<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <!-- icon container -->
            <div class="row icon-row">
                <i class="fa fa-cogs"></i>
            </div><!-- icon container end -->
            <div class="row">
                <h3 class="text-center">Setup your own profile</h3>
                <p class="text-center">Configure your own profile as you want it to be</p>
                <p class="text-center">with ranks, game data and other settings</p>
            </div>
        </div>--><!-- provider container end -->*/?>
    </div>
</div>
<div class="container-fluid signup-oppurtunity-wrapper">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6 signup-wrapper">
            <div class="row know-more-row">
                <h1 class="text-center">WANNA KNOW MORE ABOUT THE DIVISION?</h1>
                <h4 class="text-center">VISIT US AT</h4>
            </div>
            <div class="row social-media-row">
                <a href="https://www.halowaypoint.com/en-us/spartan-companies/blood%20division" class="btn btn-danger btn-block">HALO WAYPOINT <img src="/images/halo_logo.png" target="_blank" height="35" width="35" alt=""></a>
            </div>
            <div class="row social-media-row">
                <a href="https://www.facebook.com/groups/1545118995710570/" target="_blank" class="btn btn-primary btn-block">Blood Division official facebook page <i class="fa fa-facebook-official"></i></a>
            </div>
            <div class="row social-media-row">
                <a href="" target="_blank" class="btn btn-danger btn-block">Blood Division Google plus page <i class="fa fa-google-plus-square"></i></a>
            </div>
            <div class="row wantTo-signup-row">
                <h3 class="text-center">READY TO JOIN THE COMMUNITY OF OTHER DANISH GAMERS?</h3>
                <h4 class="text-right"><a href="{{ url('/register') }}">JOIN HERE</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection