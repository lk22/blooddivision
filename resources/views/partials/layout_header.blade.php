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
                        <li><a href="{{ url('/members') }}">Crew members <i class="fa fa-users"></i></a></li>
                        <li><a href="{{ url('/login') }}">Login <i class="fa fa-user"></i></a></li>
                        <li><a href="{{ url('/register') }}">Register <i class="fa fa-user-plus"></i></a></li>
                    @else
                        <li><a href="{{ url('/members') }}">Crew members <i class="fa fa-users"></i></a></li>
                        <!-- <li><a href="{{ url('/events') }}">Events <i class="fa fa-calendar-o"></i></a></li> -->
                        <!-- <li><a href="{{ url('/forum') }}">Forum <i class="fa fa-comments"></i></a></li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ auth()->user()->name }} 
                                @if(!auth()->user()->avatar)
                                
                                <span class="avatar"><img class="img img-circle" src="/images/mystery-man.jpg" height="25" width="25" alt=""></span>
                                @else
                                <span class="avatar"><img class="img img-circle" src="{{auth()->user()->avatar}}" height="25" width="25" alt=""></span>
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