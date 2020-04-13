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


                <!-- Pagination -->
                <div class="clearfix"></div>
                <div style="margin-bottom: 25%;"></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 padding-right-30">
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
        </div>
    </div>
</div>

@endsection
