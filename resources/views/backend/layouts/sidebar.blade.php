
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
            <li {{ Request::is('admin') ? 'class=active' : '' }}>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li {{ Request::is('admin/pages*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.pages') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Pages</p>
                </a>
            </li>

            <li {{Request::is('admin/banner*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.banner') }}">
                    <i class="material-icons">satellite</i>
                    <p>Banner</p>
                </a>
            </li>

            <li {{ Request::is('admin/category*') ? 'class=active' : ''}}>
                <a href="{{ route('backend.category') }}">
                <i class="material-icons">dns</i>
                <p>Category</p>
                </a>
            </li>

            <li {{ Request::is('admin/country*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.country') }}">
                    <i class="material-icons">airplanemode_active</i>
                    <p>Country</p>
                </a>
            </li>

            {{--<li {{ Request::is('admin/destination*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.destination') }}">
                    <i class="material-icons">motorcycle</i>
                    <p>Destination</p>
                </a>
            </li>--}}

            <li {{ Request::is('admin/region*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.region') }}">
                    <i class="material-icons">flight_takeoff</i>
                    <p>Region</p>
                </a>
            </li>

            <li {{ Request::is('admin/activity*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.activity') }}">
                    <i class="material-icons">pool</i>
                    <p>Activity</p>
                </a>
            </li>

            {{--<i class="material-icons">question_answer</i>--}}

            <li {{ Request::is('admin/itinerary*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.itinerary') }}">
                    <i class="material-icons">transfer_within_a_station</i>
                    <p>Itinerary</p>
                </a>
            </li>

            <li {{ Request::is('admin/review*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.review') }}">
                    <i class="material-icons text-gray">receipt</i>
                    <p>Reviews</p>
                </a>
            </li>

            <li {{ Request::is('admin/customize*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.customize') }}">
                    <i class="material-icons text-gray">build</i>
                    <p>Customized Trip</p>
                </a>
            </li>

            <li {{ Request::is('admin/booking*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.booking') }}">
                    <i class="material-icons text-gray">assignment_turned_in</i>
                    <p>Booking</p>
                </a>
            </li>

            <li {{ Request::is('admin/gallery*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.gallery') }}">
                    <i class="material-icons text-gray">perm_media</i>
                    <p>Gallery</p>
                </a>
            </li>

            <li {{ Request::is('admin/photo*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.photo') }}">
                    <i class="material-icons text-gray">wallpaper</i>
                    <p>Photo</p>
                </a>
            </li>

            <li {{ Request::is('admin/affiliate*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.affiliate') }}">
                    <i class="material-icons text-gray">account_balance</i>
                    <p>Affiliate</p>
                </a>
            </li>

            <li {{ Request::is('admin/team*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.team') }}">
                    <i class="material-icons text-gray">recent_actors</i>
                    <p>Team</p>
                </a>
            </li>

            <li {{ Request::is('admin/contact*') ? 'class=active' : '' }}>
                <a href="{{ route('backend.contact') }}">
                    <i class="material-icons text-gray">perm_phone_msg</i>
                    <p>Contact Us</p>
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
                   {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">notifications</i>
                            <span class="notification">4</span>
                            <p class="hidden-lg hidden-md">Notifications</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">New user subscription</a></li>
                            <li><a href="#">New bookings received</a></li>
                            <li><a href="#">New user registered</a></li>
                            <li><a href="#">New email received</a></li>
                        </ul>
                    </li>--}}
                    @if(Auth::check())
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <strong>Welcome {{  Auth::user()->name }}</strong>
                            <i class="fa fa-chevron-down" aria-hidden="true" style="font-size:10px"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('backend.changepassword') }}"><strong>Change Password</strong></a></li>
                            <li><a href="{{ route('backend.change.email.name') }}"><strong>Change Email/Password</strong></a></li>
                            <li><a href="{{ route('backend.user.get.create') }}"><strong>New User</strong></a></li>
                            @if(Auth::user()->id == 1) <li><a href="{{ route('backend.user') }}"><strong>Other Users</strong></a></li> @endif
                        </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}"><strong>Log out</strong></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
