<!-- Navigation
        ================================================== -->
<div id="dashboard">
    <!-- Responsive Navigation Trigger -->
    <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

    <div class="dashboard-nav">
        <div class="dashboard-nav-inner">

            <ul data-submenu-title="Account">
                <li class="{{ Request::url() == route('profile') ? 'active' : '' }}"><a href="{{route('profile')}}"><i
                            class="sl sl-icon-user"></i> My Profile</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>

            <ul data-submenu-title="Main">
                <li class="{{ Request::url() == route('dashboard') ? 'active' : '' }}"><a
                        href="{{route('dashboard')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                <li class="{{ Request::url() == route('booking') ? 'active' : '' }}"><a href="{{route('booking')}}"><i
                            class="fa fa-calendar-check-o"></i> Reservas</a></li>
            </ul>

            <ul data-submenu-title="Listings">

                <li class="{{ Request::url() == route('reviews') ? 'active' : '' }}"><a href="{{route('reviews')}}"><i
                            class="sl sl-icon-star"></i> Reviews</a></li>
                <li class="{{ Request::url() == route('bookmarks') ? 'active' : '' }}"><a
                        href="{{route('bookmarks')}}"><i class="sl sl-icon-heart"></i> Favoritos</a></li>
                <li class="{{ Request::url() == route('createSchool') ? 'active' : '' }}"><a
                        href="{{route('createSchool')}}"><i class="sl sl-icon-plus"></i> Add School</a></li>
            </ul>



        </div>
    </div>
</div>
<!-- Navigation / End -->
