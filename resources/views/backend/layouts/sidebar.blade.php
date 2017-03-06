
<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="#" class="simple-text">
            Admin Panel
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li {{ Request::is('/') ? 'class=active' : '' }}>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li {{ Request::is('pages*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.pages') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Pages</p>
                </a>
            </li>

            <li {{Request::is('banner') ? 'class=active' : '' }}>
                <a href="{{ route('backend.banner') }}">
                    <i class="material-icons">satellite</i>
                    <p>Banner</p>
                </a>
            </li>

            <li {{ Request::is('category') ? 'class=active' : ''}}>
                <a href="{{ route('backend.category') }}">
                <i class="material-icons">comment</i>
                <p>Category</p>
                </a>
            </li>

            <li {{ Request::is('country') ? 'class=active' : '' }}>
                <a href="{{ route('backend.country') }}">
                    <i class="material-icons">airplanemode_active</i>
                    <p>Country</p>
                </a>
            </li>

            <li {{ Request::is('destination') ? 'class=active' : '' }}>
                <a href="{{ route('backend.destination') }}">
                    <i class="material-icons">motorcycle</i>
                    <p>Destination</p>
                </a>
            </li>

            <li {{ Request::is('region') ? 'class=active' : '' }}>
                <a href="{{ route('backend.region') }}">
                    <i class="material-icons">flight_takeoff</i>
                    <p>Region</p>
                </a>
            </li>

            <li {{ Request::is('activity') ? 'class=active' : '' }}>
                <a href="{{ route('backend.activity') }}">
                    <i class="material-icons">pool</i>
                    <p>Activity</p>
                </a>
            </li>

            {{--<i class="material-icons">question_answer</i>--}}

            <li {{ Request::is('notification') ? 'class=active' : '' }}>
                <a href="{{ route('backend.notification') }}">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">dashboard</i>
                            <p class="hidden-lg hidden-md">Dashboard</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p class="hidden-lg hidden-md">Notifications</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mike John responded to your email</a></li>
                            <li><a href="#">You have 5 new tasks</a></li>
                            <li><a href="#">You're now friend with Andrew</a></li>
                            <li><a href="#">Another Notification</a></li>
                            <li><a href="#">Another One</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">person</i>
                            <p class="hidden-lg hidden-md">Profile</p>
                        </a>
                    </li>
                </ul>

                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group  is-empty">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="material-input"></span>
                    </div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i><div class="ripple-container"></div>
                    </button>
                </form>
            </div>
        </div>
    </nav>
