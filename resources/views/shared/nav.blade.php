
<nav class="navbar navbar-expand-md sticky-top">
        <a class="navbar-brand" href="{{ route('roomtypes.index') }}"  style="text-indent:20px" >Hotel Arkino</a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rooms.index') }}">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('restaurant.index') }}">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('spa.index') }}">SPA&Wellness</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#page-footer">Contact</a>
                </li>
                @can('is-admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('offers.index') }}">Offers</a>
                </li>
                @endcan
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservations.index') }}">My reservations</a>
                    <!-- where('email','=',$email)->first() -->
                </li>
                @endif
                <li>
                    <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"> {{ Auth::user()->name }},
                            Sign out... </a>
                    </li>
                    @else
                    <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">Sign in...</a>
                    </li>
                    @endif
                    </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
