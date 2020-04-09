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

    @stack('styles')
    @livewireStyles
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

                    <div class="right-side">
                        @guest
                        <div class="header-widget">
                            <a href="{{route('login')}}" class="sign-in"><i class="sl sl-icon-login"></i> Sign In</a>
                        </div>
                        @else
                        <div class="header-widget">

                            <!-- User Menu -->
                            <div class="user-menu">
                                <div class="user-name"><span><img src="/images/dashboard-avatar.jpg" alt=""></span>
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


                </div>

            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

    </div>

    @yield('contenido')


    <!-- Footer
================================================== -->
    <div id="footer" class="sticky-footer">
        <!-- Main -->
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <img class="footer-logo" src="/images/logo.png" alt="">
                    <br><br>
                    <p>SCHOLA es la principal plataforma que capacita a los padres para desbloquear oportunidades
                        educativas para sus hijos. Brindamos información escolar y recursos para padres para ayudar a
                        millones de familias a elegir la escuela correcta, apoyar el aprendizaje en el hogar y guiar a
                        sus hijos hacia un gran futuro.

                    </p>
                </div>

                <div class="col-md-4 col-sm-6 ">
                    <h4>Helpful Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{route('/')}}">Inicio</a></li>
                        <li><a href="{{route('nosotros')}}">Nostros</a></li>
                        <li><a href="{{route('workschool')}}">Trabajemos juntos</a></li>
                        <li><a href="{{route('/')}}">Mi cuenta</a></li>
                        <li><a href="{{route('termsAndConditions')}}">Términos y condiciones</a></li>
                    </ul>

                    <ul class="footer-links">
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="{{route('contact')}}">Contacto</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-3  col-sm-12">
                    <h4>Contact Us</h4>
                    <div class="text-widget">
                        <span>Blvd. Bernardo Quintana 7001, 76090 Santiago de Querétaro, Qro.</span> <br>
                        Phone: <span>(123) 123-456 </span><br>
                        E-Mail:<span> <a href="#">iam@schola.com</a> </span><br>
                    </div>

                    <ul class="social-icons margin-top-20">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    </ul>

                </div>

            </div>

            <!-- Copyright -->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyrights">© 2020 . All Rights Reserved.</div>
                </div>
            </div>

        </div>

    </div>
    <!-- Footer / End -->


    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>




    <!-- Scripts
==================================================
    <script type="text/javascript" src="/scripts/rangeslider.min.js"></script>

-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="/scripts/slick.min.js"></script>
    <script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="/scripts/custom.js"></script>

    @livewireScripts
    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>
