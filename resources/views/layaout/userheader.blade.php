<!doctype html>
<html lang="es">

<head>
    <title>PROYECTO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/workschool.css">
    <link rel="stylesheet" href="/css/colors/main.css" id="colors">

</head>

<body>

    <div id="wrapper">

        <!-- Header Container
        ================================================== -->
        <header id="header-container" class="fixed fullwidth dashboard">

            <!-- Header -->
            <div id="header">
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
                    <!-- Right Side Content / End -->
                    <div class="right-side">
                        <!-- Header Widget -->
                        <div class="header-widget">

                            <!-- User Menu -->
                            <div class="user-menu">
                                <div class="user-name"><span><img src="/images/dashboard-avatar.jpg" alt=""></span>My
                                    Account</div>
                                <ul>
                                    <li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                                    <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i>
                                            Messages</a></li>
                                    <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i>
                                            Bookings</a></li>
                                    <li><a href="index.html"><i class="sl sl-icon-power"></i> Logout</a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->
                </div>

            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

    </div>


    @yield('contenido')

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>




    <!-- Scripts
================================================== -->
    <script type="text/javascript" src="/scripts/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="/scripts/slick.min.js"></script>
    <script type="text/javascript" src="/scripts/rangeslider.min.js"></script>
    <script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="/scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="/scripts/counterup.min.js"></script>
    <script type="text/javascript" src="/scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="/scripts/custom.js"></script>

</body>

</html>