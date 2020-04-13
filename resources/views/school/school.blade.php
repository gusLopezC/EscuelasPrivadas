@extends('layaout.header')
@section('contenido')
<br>
<br>
<br>
<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
    @foreach ($escuela->getPhotos as $photos)
    <a href="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$photos->photo}}"
        data-background-image="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$photos->photo}}"
        class="item mfp-gallery" title="Title 1"></a>
    @endforeach
</div>

<div class="container">

    <div class="row sticky-wrapper">
        <div class="col-lg-8 col-md-8 padding-right-30">

            <!-- Titlebar -->
            <div id="titlebar" class="listing-titlebar">
                <div class="listing-titlebar-title">
                    <h2>{{$escuela->name}}</h2>
                    <br>
                    @if ($EscuelasNivel[0]->guarderia)<span class="listing-tag">Guarderia</span>@endif
                    @if ($EscuelasNivel[0]->preescolar)<span class="listing-tag">Preescolar</span>@endif
                    @if ($EscuelasNivel[0]->primarias)<span class="listing-tag">Primaria</span>@endif
                    @if ($EscuelasNivel[0]->secundarias)<span class="listing-tag">Secundaria</span>@endif
                    @if ($EscuelasNivel[0]->preparatorias)<span class="listing-tag">preparatoria</span>@endif
                    @if ($EscuelasNivel[0]->universidades)<span class="listing-tag">Universidad</span>@endif
                    @if ($EscuelasNivel[0]->otras)<span class="listing-tag">Otros</span>@endif


                    <br>
                    <span>
                        <a href="#listing-location" class="listing-address">
                            <i class="fa fa-map-marker"></i>
                            {{$escuela->address}}
                        </a>
                    </span>
                    <div class="star-rating" data-rating="{{$escuela->calification}}">
                    </div>
                    @if (isset($escuela->getComentarios[0]->totalComentarios))
                    <div class="rating-counter"><a
                            href="#listing-reviews">({{$escuela->getComentarios[0]->totalComentarios}} reviews)</a>
                    </div>

                    @else
                    <div class="rating-counter"><a href="#listing-reviews">(0 reviews)</a></div>
                    @endif
                </div>
            </div>

            <!-- Listing Nav -->
            <div id="listing-nav" class="listing-nav-container">
                <ul class="listing-nav">
                    <li><a href="#listing-overview" class="active">Visión general</a></li>
                    <li><a href="#listing-pricing-list">Precios</a></li>
                    <li><a href="#listing-location">Locacion</a></li>
                    <li><a href="#listing-reviews">Opiniones</a></li>
                    <li><a href="#add-review">Agregar Opinion</a></li>
                </ul>
            </div>

            <!-- Overview -->
            <div id="listing-overview" class="listing-section">

                <!-- Description -->

                <p> {!! $escuela->description !!}

                </p>

                <!-- Amenities -->
                <h3 class="listing-desc-headline">Services</h3>
                <ul class="listing-features checkboxes margin-top-0">
                    @foreach ($escuela->services as $services)
                    @switch($services)
                    @case(1)
                    <li>Horario extendido</li>
                    @break
                    @case(2)
                    <li>Extra clases(futbol, basquet, Voleibol, etc)</li>
                    @break
                    @case(3)
                    <li>Centro de idiomas</li>
                    @break
                    @case(4)
                    <li>Estacionamiento gratuito</li>
                    @break
                    @case(5)
                    <li>Internet didactico/ simetrico</li>
                    @break
                    @case(6)
                    <li>Proyector por aula</li>
                    @break
                    @case(7)
                    <li>Servicios de cafeteria/ Alimentos</li>
                    @break
                    @case(8)
                    <li>Aula Maker/ Media Lab</li>
                    @break
                    @case(9)
                    <li>Robotica / Programación</li>
                    @break
                    @case(10)
                    <li>Otros</li>
                    @break
                    @default
                    @endswitch
                    @endforeach
                </ul>
            </div>

             <!-- Food Menu -->
             <div id="listing-pricing-list" class="listing-section">
                <h3 class="listing-desc-headline margin-top-70 margin-bottom-30">Pricing</h3>

                <div class="show-more">
                    <div class="pricing-list-container">
                        <!-- Food List -->
                        <h4>Colegiatura</h4>
                        <ul>
                            <li>
                                <h5>Classic Burger</h5>
                                <p>Beef, salad, mayonnaise, spicey relish, cheese</p>
                                <span>$6</span>
                            </li>
                            <li>
                                <h5>Cheddar Burger</h5>
                                <p>Cheddar cheese, lettuce, tomato, onion, dill pickles</p>
                                <span>$6</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i
                        class="fa fa-angle-down"></i></a>
            </div>
            <!-- Food Menu / End -->

        </div>


        <!-- Sidebar
		================================================== -->
        <div class="col-lg-4 col-md-4 margin-top-75 sticky">


            @if ($escuela->verificado)
            <!-- Verified Badge -->
            <div class="verified-badge with-tip"
                data-tip-content="Listing has been verified and belongs the business owner or manager.">
                <i class="sl sl-icon-check"></i> Verified Listing
            </div>
            @endif


            	<!-- Book Now -->
			<div class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-calendar-check-o "></i> Reservar cita</h3>
				<!-- progress button animation handled via custom.js -->
				<a href="{{ route('createBooking',$escuela->slug)}}" class="button book-now fullwidth margin-top-5">Reservar</a>
			</div>
			<!-- Book Now / End -->

            <!-- Contact -->
            <div class="boxed-widget margin-top-35">
                <div class="hosted-by-title">
                    <h4><span>Publicado por </span>{{$escuela->getUser[0]->name}}</h4>
                    <img class="hosted-by-avatar"
                        src="https://escuelasprivadas.s3.amazonaws.com/images/profile/{{$escuela->getUser[0]->img}}"
                        alt="">
                </div>
                <ul class="listing-details-sidebar">
                    <li><i class="sl sl-icon-phone"></i><a href="{{$escuela->website}}">{{$escuela->phone}}</a></li>
                    <li><i class="sl sl-icon-globe"></i> <a href="{{$escuela->website}}">{{$escuela->website}}</a></li>
                    <li><i class="fa fa-envelope-o"></i> <a href="{{$escuela->phone}}">{{$escuela->phone}}</a></li>
                </ul>

                <ul class="listing-details-sidebar social-profiles">
                    @if( $escuela->redsocial[0] != 'null')
                    <li><a href="{{$escuela->redsocial[0]}}" target="_blank" class="facebook-profile"><i
                                class="fa fa-facebook-square"></i> Facebook</a></li>
                    @endif
                    @if( $escuela->redsocial[1] != 'null')
                    <li><a href="{{$escuela->redsocial[1]}}" target="_blank" class="twitter-profile"><i
                                class="fa fa-twitter"></i> Twitter</a>
                    </li>
                    @endif
                    @if( $escuela->redsocial[2] != 'null')
                    <li><a href="{{$escuela->redsocial[2]}}" target="_blank" class="gplus-profile"><i
                                class="fa fa-instagram"></i> Twitter</a>
                    </li>
                    @endif
                    <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                </ul>

                <!-- Reply to review popup -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                    <div class="small-dialog-header">
                        <h3>Send Message</h3>
                    </div>
                    <div class="message-reply margin-top-0">
                        <textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
                        <button class="button">Send Message</button>
                    </div>
                </div>

                <a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i
                        class="sl sl-icon-envelope-open"></i> Send Message</a>
            </div>
            <!-- Contact / End-->


            <!-- Share / Like -->
            <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                <button class="like-button" onclick="window.location='{{ route('addFavoritos',$escuela->id)}}'"><span
                        class="like-icon"></span> Bookmark this listing</button>

                <!-- Share Buttons -->
                <ul class="share-buttons margin-top-40 margin-bottom-0">
                    <li><a class="fb-share"
                            href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl()}}&title={{$escuela->name}}"
                            target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
                    <li><a class="twitter-share"
                            href="https://twitter.com/intent/tweet?url={{ request()->fullUrl()}}&text={{$escuela->name}}&via=Schola&hashtags=Schola"
                            target="_blank"><i class=" fa fa-twitter"></i> Tweet</a></li>
                    <li><a class="gplus-share"
                            href="https://plus.google.com/share?url={{ request()->fullUrl()}}&text={{$escuela->description}}&hl={language_code}"
                            target="_blank" s><i class="fa fa-google-plus"></i> Share</a></li>
                    <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                </ul>
                <div class="clearfix"></div>
            </div>

        </div>
        <!-- Sidebar / End -->

        <div class="col-lg-8 col-md-8 padding-right-30">




            <!-- Location -->
            <div id="listing-location" class="listing-section">
                <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

                <div id="singleListingMap-container">
                    <div id="singleListingMap" data-latitude="40.70437865245596" data-longitude="-73.98674011230469"
                        data-map-icon="im im-icon-Hamburger"></div>

                </div>
            </div>


            <!-- Add Review Box -->
            <div id="add-review" class="add-review-box">

                <!-- Add Review -->
                <h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>
                <!-- Review Comment -->
                <form method="POST" action="{{ route('comentario.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <span class="leave-rating-title">Your rating for this listing</span>

                    <!-- Rating / Upload Button -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <div class="leave-rating margin-bottom-30">

                                <input type="radio" name="rating" id="rating-5" value="5">
                                <label for="rating-5" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-4" value="4">
                                <label for="rating-4" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-3" value="3">
                                <label for="rating-3" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-2" value="2">
                                <label for="rating-2" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-1" value="1">
                                <label for="rating-1" class="fa fa-star"></label>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-6">
                            <!-- Uplaod Photos -->
                            <div class="add-review-photos margin-bottom-30">
                                <div class="photoUpload">
                                    <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
                                    <input type='file' name="image[]" id="image[]" accept=".png, .jpg, .jpeg"
                                        multiple="" class="upload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="escuela_id" id="escuela_id" value="{{$escuela->id}}"
                        style="display:none" />
                    <fieldset>
                        <div>
                            <label>Review:</label>
                            <textarea name="review" id="review" cols="40" rows="3" required></textarea>
                        </div>

                    </fieldset>
                    <button type="submit" class="button">Submit Review</button>
                </form>

            </div>
            <!-- Add Review Box / End -->
            <!-- Reviews -->
            <div id="listing-reviews" class="listing-section">

                @if (isset($escuela->getComentarios[0]))
                <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews
                    <span>({{$escuela->getComentarios[0]->totalComentarios}})</span></h3>
                <section class="comments listing-reviews">
                    <ul>
                        @foreach ($comentarios as $comentario)
                        <li>
                            <div class="avatar"><img
                                    src="https://escuelasprivadas.s3.amazonaws.com/images/profile/{{$comentario->getUser[0]->img}}"
                                    alt="" /></div>
                            <div class="comment-content">
                                <div class="arrow-comment"></div>
                                <div class="comment-by">{{$comentario->getUser[0]->name}}<span
                                        class="date">{{ $comentario->created_at->format('d M Y')}}</span>
                                    <div class="star-rating" data-rating="{{$comentario->calification}}"></div>
                                </div>
                                <p>{{$comentario->comentario}}</p>
                                @if(count($comentario->getPhotosComentario) > 0)
                                <div class="review-images mfp-gallery-container">
                                    @foreach ($comentario->getPhotosComentario as $PhotoComentario)
                                    <a href="https://escuelasprivadas.s3.amazonaws.com/images/comentarios/{{$PhotoComentario->photo}}"
                                        class="mfp-gallery">
                                        <img src="https://escuelasprivadas.s3.amazonaws.com/images/comentarios/{{$PhotoComentario->photo}}"
                                            alt=""></a>
                                    @endforeach
                                </div>
                                @endif

                                <a href="{{route('comentario.comentarioUtil',$comentario)}}" class="rate-review"><i
                                        class="sl sl-icon-like"></i> Comentario
                                    útil
                                    @if($comentario->calificationutil > 0)
                                    <span>{{$comentario->calificationutil}}</span>
                                    @endif </a>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <a  href="{{route('obtenerComentarios',$escuela->slug)}}"  class="show-more-button" data-more-title="Show More"><i class="fa fa-angle-down"></i></a>
                </section>
                @else
                <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Aun no hay Reviews</h3>
                @endif
                <!-- Pagination -->
                <div class="clearfix"></div>
                <div style="margin-bottom: 25%;"></div>
            </div>
        </div>

    </div>
</div>
@endsection
