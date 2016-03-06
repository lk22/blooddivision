<nav id="app-nav" class="navbar navbar-default affix-header blooddivision-header-navba">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if(Auth::user())
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        BLOOD DIVISION
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        BLOOD DIVISION
                    </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::user())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home <i class="fa fa-home"></i></a></li>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login <i class="fa fa-user"></i></a></li>
                        <li><a href="{{ url('/register') }}">Register <i class="fa fa-user-plus"></i></a></li>
                    @else
                        <!-- <li><a href="{{ url('/events') }}">Events <i class="fa fa-calendar-o"></i></a></li> -->
                        <!-- <li><a href="{{ url('/forum') }}">Forum <i class="fa fa-comments"></i></a></li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ auth()->user()->name }} 
                                @if(!auth()->user()->avatar)
                                
                                <span class="avatar"><img class="img img-circle" src="/images/mystery-man.jpg" height="25" width="25" alt=""></span>
                                @else
                                <span class="avatar"><img class="img img-circle" src="/images/avatars/{{auth()->user()->avatar}}" height="25" width="25" alt=""></span>
                                @endif
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/profile/{{auth()->user()->name}}"><i class="fa fa-male"></i> Profile</a></li>
                                <li><a href="{{ url('/profile/settings{user}') }}"><i class="fa fa-cogs"></i> Profile Settings</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@if(auth()->user())
    <div class="sidebar-btn">
        <i class="fa fa-bars settings-btn"></i>
    </div>
    <div class="settings-sidebar">
        <div class="close-settings-btn">
            <i class="fa fa-times"></i>
        </div>
        <!-- <div class="row sidebar-user-container">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <img class="img img-circle" src="{{auth()->user()->avatar}}" height="65" width="65" alt="">
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 name-container">
                {{auth()->user()->name}}
            </div>
        </div> -->
        <div class="row sidebar-nav">
            <p class="text-center">Menu</p>
            <a href="/home"><i class="fa fa-home"></i> Home</a>
            <a href="/members"><i class="fa fa-users"></i> Crew Members</a>
            <a href="/events"><i class="fa fa-calendar"> Events</i> </a>
            <a href="/forum"><i class="fa fa-comment"></i> Forum</a>
        </div>

        <div class="row sidebar-nav">
            <p class="text-center">Profile</p>
            <a href="/profile/{{auth()->user()->name}}"><i class="fa fa-user"></i> Home</a>
            <a href="/profile/{{auth()->user()->name}}/your-events"><i class="fa fa-calendar"> Events</i> </a>
            <a href="/profile/{{auth()->user()->name}}/your-games"><i class="fa fa-gamepad"></i> Games</a>
            <a href="/profile/{{auth()->user()->name}}/settings"><i class="fa fa-cogs"></i> Settings</a>
        </div>

        <div class="row sidebar-nav">
            <p class="text-center">Settings</p>
            <a href="/profile/{{auth()->user()->name}}/settings/general"><i class="fa fa-cog fa-spin"></i> General</a>
            <a href="/profile/{{auth()->user()->name}}/settings/events"><i class="fa fa-calendar"> Events</i> </a>
            <a href="/profile/{{auth()->user()->name}}/settings/games"><i class="fa fa-gamepad"></i> Games</a>
        </div>
    </div>
@endif