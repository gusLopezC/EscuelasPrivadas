@extends('layaout.header')
@section('contenido')
<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="images/main-search-background-01.jpg">
    <div class="main-search-inner">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Guíe a su hijo hacia un gran futuro</h2>
                    <h4>ENCUENTRA UNA GRAN ESCUELA</h4>

                    <div class="main-search-input">

                        @livewire('search-name-school')

                        @livewire('search-city-school')

                        <div class="main-search-input-item">
                            <select data-placeholder="All Categories" class="chosen-select">
                                <option>Todos los niveles</option>
                                <option>Guarderias</option>
                                <option>Pre-escolares</option>
                                <option>Primarias</option>
                                <option>Secundarias</option>
                                <option>Preparatorias</option>
                                <option>Universidades</option>
                            </select>
                        </div>

                        <button class="button" onclick="window.location='{{ route('search')}}'">Search</button>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Content
================================================== -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline centered margin-top-75">
                Busca por nivel educativo
            </h3>
        </div>

    </div>
</div>


<!-- Category Boxes -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="categories-boxes-container margin-top-5 margin-bottom-30">
                <form method="POST" action="{{ route('search')}}">
                    {{csrf_field()}}
                </form>
                <!-- Box -->
                <a class="category-small-box">
                    <img src="../images/icons/guarderia.svg" alt="">
                    <h4>Guarderia</h4>
                </a>

                <!-- Box -->
                <a class="category-small-box">
                    <img src="../images/icons/preescolar.svg" alt="">
                    <h4>Pre-escolar</h4>
                </a>

                <!-- Box -->
                <a class="category-small-box">
                    <img src="../images/icons/primaria.svg" alt="">
                    <h4>Primarias</h4>
                </a>

                <!-- Box -->
                <a class="category-small-box">
                    <img src="../images/icons/secundaria.svg" alt="">
                    <h4>Secundarias</h4>
                </a>

                <!-- Box -->
                <a class="category-small-box">
                    <img src="../images/icons/preparatoria.svg" alt="">
                    <h4>Preparatorias</h4>
                </a>

                <!-- Box -->
                <a class="category-small-box">
                    <img src="../images/icons/universidad.svg" alt="">

                    <h4>Universidades</h4>
                </a>

            </div>
        </div>
    </div>
</div>
<!-- Category Boxes / End -->


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-45">
                    Escuelas mas populares
                    <span>Discoubre las instituciones mas buscado</span>
                </h3>
            </div>
        </div>
    </div>

    <!-- Carousel / Start -->
    <div class="simple-fw-slick-carousel dots-nav">
        @foreach ($escuelas as $escuela)
        <!-- Listing Item -->
        <div class="fw-carousel-item">
            <a href="school/{{ $escuela->slug}}" class="listing-item-container compact">
                <div class="listing-item">
                    <img src="images/listing-item-01.jpg" alt="">
                    @if( $escuela->verificado)
                    @endif
                    <div class="listing-badge now-open">{{ $escuela->calification }}</div>

                    <div class="listing-item-content">
                        <div class="numerical-rating"></div>
                        <h3>{{ $escuela->name }}</h3>

                    </div>
                    <span class="like-icon"></span>
                </div>
            </a>
        </div>
        <!-- Listing Item / End -->
        @endforeach
    </div>
    <!-- Carousel / End -->


</section>
<!-- Fullwidth Section / End -->


<!-- Flip banner -->
<a class="flip-banner parallax margin-top-65" data-background="images/slider-bg-02.jpg" data-color="#f91942"
    data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
    <div class="flip-banner-content">
        <h2 class="flip-visible">Ayudamos a los padres a encontrar la escuela adecuada para su familia</h2>
        <h2 class="flip-hidden">Obten la información escolar que necesitan para guiar<br> a los niños hacia un gran
            futuro</i></h2>
    </div>
</a>
<!-- Flip banner / End -->

@endsection
