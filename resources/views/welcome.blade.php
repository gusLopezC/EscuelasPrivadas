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
                                <option>Otros</option>
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
                <!-- Box -->
                <a href="{{ route('search', ['category' => 'guarderia']) }}" class="category-small-box">
                    <img src="../images/icons/guarderia.svg" alt="">
                    <h4>Guarderia</h4>
                </a>

                <!-- Box -->
                <a href="{{ route('search', ['category' => 'preescolar']) }}" class="category-small-box">
                    <img src="../images/icons/preescolar.svg" alt="">
                    <h4>Pre-escolar</h4>
                </a>

                <!-- Box -->
                <a href="{{ route('search', ['category' => 'primarias']) }}" class="category-small-box">
                    <img src="../images/icons/primaria.svg" alt="">
                    <h4>Primarias</h4>
                </a>

                <!-- Box -->
                <a href="{{ route('search', ['category' => 'secundarias']) }}" class="category-small-box">
                    <img src="../images/icons/secundaria.svg" alt="">
                    <h4>Secundarias</h4>
                </a>

                <!-- Box -->
                <a href="{{ route('search', ['category' => 'preparatorias']) }}" class="category-small-box">
                    <img src="../images/icons/preparatoria.svg" alt="">
                    <h4>Preparatorias</h4>
                </a>

                <!-- Box -->
                <a href="{{ route('search', ['category' => 'universidades']) }}" class="category-small-box">
                    <img src="../images/icons/universidad.svg" alt="">

                    <h4>Universidades</h4>
                </a>
                <!-- Box -->
                <a href="{{ route('search', ['category' => 'otras']) }}" class="category-small-box">
                    <img src="../images/icons/soccer.png" alt="">

                    <h4>Otros</h4>
                </a>

            </div>
        </div>
    </div>
</div>
<!-- Category Boxes / End -->


<!-- Listings -->
<div class="container margin-top-70">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline centered margin-bottom-45">
                Most Visited Places
                <span>Discover top-rated local businesses</span>
            </h3>
        </div>

        <div class="col-md-12">
            <div class="simple-slick-carousel dots-nav">

                @foreach ($escuelas as $escuela)
                <!-- Listing Item -->
                <div class="carousel-item">
                    <a  class="listing-item-container">
                        <div class="listing-item">
                            <img src="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$escuela->getPhotos[0]->photo}}"
                                alt="" >
                            <div onclick="window.location='{{ route('school',$escuela->slug)}}'" class="listing-item-content">
                                <span class="tag">{{$escuela->categoria}}</span>
                            <h3>{{$escuela->name}}</h3>
                                <span>{{ Illuminate\Support\Str::limit($escuela->address, 25) }} </span>
                            </div>
                            <span onclick="window.location='{{ route('addFavoritos',$escuela->id)}}'"
                                class="like-icon"></span>
                        </div>

                        <div class="star-rating" data-rating="{{$escuela->calification}}">
                            <div class="rating-counter"></div>

                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->

                @endforeach

            </div>

        </div>

    </div>
</div>
<!-- Listings / End -->



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
