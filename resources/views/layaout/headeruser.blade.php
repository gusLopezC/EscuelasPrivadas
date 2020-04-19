<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Scholla - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description"
        content="Consulta información sobre las características de las escuelas de México. Datos de contacto, información sobre desempeño, infraestructura, programas de apoyo y conoce las opiniones de otros padres de familia.">
    <meta name="keywords" content="escuela, evaluación, key3">
    <link rel="canonical" href="https://schoola.com" />
    <meta property="og:title" content="SCHOOLA | Mejora tu escuela" />
    <meta property="og:description"
        content="Consulta información sobre las características de las escuelas de México. Datos de contacto, información sobre desempeño, infraestructura, programas de apoyo y conoce las opiniones de otros padres de familia." />
    <meta property="og:type" content="WebPage" />
    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors/main.css" id="colors">


    @stack('styles')
</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->
        <header id="header-container" class="fixed fullwidth dashboard">

            <!-- Header -->
            <div id="header" class="not-sticky">
                <div class="container">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{route('/')}}"><img src="/images/logo.png" alt=""></a>
                    </div>

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>


                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li class="{{ Request::is('/') ? 'current' : '' }}"><a href="{{route('/')}}">Home</a>
                                </li>
                                <li class="{{ Request::is('/') ? 'current' : '' }}"><a
                                        href="{{route('nosotros')}}">Nosotros</a>
                                </li>
                                <li class="{{ Request::is('/') ? 'current' : '' }}"><a
                                        href="{{route('workschool')}}">Trabajemos juntos</a>
                                </li>
                                <li class="{{ Request::is('/') ? 'current' : '' }}"><a
                                        href="{{route('contact')}}">Contacto</a>
                                </li>
                            </ul>

                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->
                        <!-- Left Side Content / End -->

                    </div>

                    <div class="right-side">
                        @guest
                        <div class="header-widget">
                            <a href="{{route('login')}}" class="sign-in"><i class="sl sl-icon-login"></i> Sign In</a>
                        </div>
                        @else
                        <div class="header-widget">


                            <!-- User Menu -->
                            <div class="user-menu">

                                <div class="user-name"><span><img
                                            src="https://escuelasprivadas.s3.amazonaws.com/images/profile/{{ Auth::user()->img }}"
                                            alt=""></span>
                                </div>

                                <ul>
                                    <li><a href="{{route('profile')}}"><i class="sl sl-icon-settings"></i>
                                            Profile</a></li>
                                    <li><a href="{{route('dashboard')}}"><i class="sl sl-icon-envelope-open"></i>
                                            Dashboard</a></li>
                                    <li><a href="{{route('/')}}"><i class="fa fa-calendar-check-o"></i>
                                            Bookings</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <i class="sl sl-icon-power"></i> Logout
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </div>

                        </div>
                        @endguest
                    </div>
                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <!-- Dashboard -->
        <div id="dashboard">

            <!-- Navigation
	================================================== -->

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Account">
                        <li class="{{ Request::url() == route('profile') ? 'active' : '' }}"><a
                                href="{{route('profile')}}"><i class="sl sl-icon-user"></i> My Profile</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>

                    <ul data-submenu-title="Main">
                        <li class="{{ Request::url() == route('dashboard') ? 'active' : '' }}"><a
                                href="{{route('dashboard')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                        <li class="{{ Request::url() == route('booking') ? 'active' : '' }}"><a
                                href="{{route('booking')}}"><i class="fa fa-calendar-check-o"></i> Reservas</a></li>
                    </ul>

                    <ul data-submenu-title="Listings">

                        <li class="{{ Request::url() == route('reviews') ? 'active' : '' }}"><a
                                href="{{route('reviews')}}"><i class="sl sl-icon-star"></i> Reviews</a></li>
                        <li class="{{ Request::url() == route('bookmarks') ? 'active' : '' }}"><a
                                href="{{route('bookmarks')}}"><i class="sl sl-icon-heart"></i> Favoritos</a></li>
                        <li class="{{ Request::url() == route('createSchool') ? 'active' : '' }}"><a
                                href="{{route('createSchool')}}"><i class="sl sl-icon-plus"></i> Add School</a></li>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->

            @yield('contenido')


        </div>
        <!-- Dashboard / End -->


    </div>
    <!-- Wrapper / End -->


    <!-- Scripts
================================================== -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="/scripts/slick.min.js"></script>
    <script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="/scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="/scripts/custom.js"></script>

    @livewireScripts
    @stack('scripts')
    @include('sweetalert::alert')

</body>

</html>
