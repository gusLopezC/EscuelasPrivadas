@extends('layaout.header')
@section('contenido')
<div id="home" class="header-hero bg_cover" style="background-image: url(../images/banner/header-bg.jpg)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="header-content text-center">
                    <h3 class="header-title">Sobre SCHOLA</h3>
                    <p class="text">Nuestras calificaciones están destinadas a proporcionar una mejor comprensión de la
                        calidad de la escuela y ayudar a los padres a comparar las escuelas dentro del mismo estado.</p>
                    <ul class="header-btn">
                        <li><a class="main-btn btn-two video-popup"
                                href="">WATCH THE VIDEO <i
                                    class="lni-play"></i></a></li>
                    </ul>
                </div> <!-- header content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="header-shape">
        <img src="../images/banner/header-shape.svg" alt="shape">
    </div>
</div> <!-- header content -->

<section id="service" class="services-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title pb-10">
                    <h4 class="title">Obtenga más información sobre las escuelas</h4>
                    <p class="text">Más padres recurren a <b>SCHOLA</b> que cualquier otra fuente para encontrar
                        información sobre las escuelas y cómo apoyar el aprendizaje de sus hijos. <br>Para los líderes
                        escolares, ofrecemos recursos que puede usar para conectarse con los padres y compartir más
                        información sobre lo que hace que su escuela sea especial.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-bolt"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">Conoce mas tu escuela</h4>
                                <p class="text">Como líder de la escuela, conoces mejor tu escuela. Queremos ayudarlo a
                                    contar la historia de su escuela y garantizar que nuestra información sea lo más
                                    sólida y precisa posible. </p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-bar-chart"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">Llegar a futuros padres</h4>
                                <p class="text">Ofrecemos una plataforma de publicidad de autoservicio que proporciona
                                    una forma simple y automatizada de construir una campaña y llegar a las posibles
                                    familias. </p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-brush"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">Estamos aquí para ayudar</h4>
                                <p class="text">Es tan fácil como 1-2-3: ingrese el nombre de su escuela en el cuadro de
                                    búsqueda, regístrese para obtener una cuenta con su dirección de correo electrónico
                                    profesional de la escuela y luego personalice su perfil.</p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-bulb"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">Reforzar la conexión entre la escuela y el hogar</h4>
                                <p class="text">Nuestro contenido puede ayudar a los maestros y líderes escolares
                                    Reforzar las actividades en el aula y apoyar el gran aprendizaje en el hogar.</p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- row -->
    </div> <!-- conteiner -->
    <div class="services-image d-lg-flex align-items-center">
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="image">
            <img src="../images/public/services.png" alt="Services">
        </div>
    </div> <!-- services image -->
</section>

<!--====== CALL TO ACTION PART START ======-->

<section id="call-to-action" class="call-to-action">
    <div class="call-action-image">
        <img src="../images/public/call-to-action.png" alt="call-to-action">
    </div>

    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-lg-6"> </div>
            <div class="col-lg-6">
                <div class="call-action-content text-center">
                    <h2 class="call-title">Trabaja con nosotros para empoderar a los padres</h2>
                    <p class="text">Anuncie en GreatSchools y haga llegar su mensaje a nuestra gran audiencia de padres
                        comprometidos. GreatSchools puede orientar su campaña por estado o nivel de grado; Ofrecemos
                        todos los bloques de anuncios tradicionales, así como patrocinios de boletines.</p>
                    <div class="call-newsletter">
                        <i class="lni-envelope"></i>
                        <input type="text" readonly>
                        <button type="submit">Registrate</button>
                    </div>
                </div> <!-- slider-content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="/css/workschool.css">

@endpush

