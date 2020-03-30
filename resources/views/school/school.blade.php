@extends('layaout.header')
@section('contenido')
<br>
<br>
<br>
<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
    <a href="../images/single-listing-01.jpg" data-background-image="../images/single-listing-01.jpg" class="item mfp-gallery"
        title="Title 1"></a>
    <a href="../images/single-listing-02.jpg" data-background-image="../images/single-listing-02.jpg" class="item mfp-gallery"
        title="Title 3"></a>
    <a href="../images/single-listing-03.jpg" data-background-image="../images/single-listing-03.jpg" class="item mfp-gallery"
        title="Title 2"></a>
    <a href="../images/single-listing-04.jpg" data-background-image="../images/single-listing-04.jpg" class="item mfp-gallery"
        title="Title 4"></a>
</div>

<div class="container">

    <div class="row sticky-wrapper">
        <div class="col-lg-8 col-md-8 padding-right-30">

            <!-- Titlebar -->
            <div id="titlebar" class="listing-titlebar">
                <div class="listing-titlebar-title">
                    <h2>{{$escuela->name}}<span class="listing-tag">Primaria Secundaria</span></h2>
                    <span>
                        <a href="#listing-location" class="listing-address">
                            <i class="fa fa-map-marker"></i>
                            {{$escuela->address}}
                        </a>
                    </span>
                    <div class="star-rating" data-rating="5">
                        <div class="rating-counter"><a href="#listing-reviews">(31 reviews)</a></div>
                    </div>
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


            <!-- Location -->
            <div id="listing-location" class="listing-section">
                <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

                <div id="singleListingMap-container">
                    <div id="singleListingMap" data-latitude="40.70437865245596" data-longitude="-73.98674011230469"
                        data-map-icon="im im-icon-Hamburger"></div>
                    <a href="#" id="streetView">Street View</a>
                </div>
            </div>

            <!-- Reviews -->
            <div id="listing-reviews" class="listing-section">
                <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(12)</span></h3>

                <div class="clearfix"></div>

                <!-- Reviews -->
                <section class="comments listing-reviews">

                    <ul>
                        <li>
                            <div class="avatar"><img
                                    src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                    alt="" /></div>
                            <div class="comment-content">
                                <div class="arrow-comment"></div>
                                <div class="comment-by">Kathy Brown<span class="date">June 2017</span>
                                    <div class="star-rating" data-rating="5"></div>
                                </div>
                                <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique
                                    sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>

                                <div class="review-images mfp-gallery-container">
                                    <a href="images/review-image-01.jpg" class="mfp-gallery"><img
                                            src="images/review-image-01.jpg" alt=""></a>
                                </div>
                                <a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review
                                    <span>12</span></a>
                            </div>
                        </li>

                        <li>
                            <div class="avatar"><img
                                    src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                    alt="" /> </div>
                            <div class="comment-content">
                                <div class="arrow-comment"></div>
                                <div class="comment-by">John Doe<span class="date">May 2017</span>
                                    <div class="star-rating" data-rating="4"></div>
                                </div>
                                <p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem
                                    felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus
                                    sollicitudin mauris.</p>
                                <a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review
                                    <span>2</span></a>
                            </div>
                        </li>

                        <li>
                            <div class="avatar"><img
                                    src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                    alt="" /></div>
                            <div class="comment-content">
                                <div class="arrow-comment"></div>
                                <div class="comment-by">Kathy Brown<span class="date">June 2017</span>
                                    <div class="star-rating" data-rating="5"></div>
                                </div>
                                <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique
                                    sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>

                                <div class="review-images mfp-gallery-container">
                                    <a href="images/review-image-02.jpg" class="mfp-gallery"><img
                                            src="images/review-image-02.jpg" alt=""></a>
                                    <a href="images/review-image-03.jpg" class="mfp-gallery"><img
                                            src="images/review-image-03.jpg" alt=""></a>
                                </div>
                                <a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review
                                    <span>4</span></a>
                            </div>
                        </li>

                        <li>
                            <div class="avatar"><img
                                    src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                    alt="" /> </div>
                            <div class="comment-content">
                                <div class="arrow-comment"></div>
                                <div class="comment-by">John Doe<span class="date">May 2017</span>
                                    <div class="star-rating" data-rating="5"></div>
                                </div>
                                <p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem
                                    felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus
                                    sollicitudin mauris.</p>
                                <a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>
                            </div>

                        </li>
                    </ul>
                </section>

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <div class="pagination-container margin-top-30">
                            <nav class="pagination">
                                <ul>
                                    <li><a href="#" class="current-page">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- Pagination / End -->
            </div>


            <!-- Add Review Box -->
            <div id="add-review" class="add-review-box">

                <!-- Add Review -->
                <h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>

                <span class="leave-rating-title">Your rating for this listing</span>

                <!-- Rating / Upload Button -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Leave Rating -->
                        <div class="clearfix"></div>
                        <div class="leave-rating margin-bottom-30">
                            <input type="radio" name="rating" id="rating-1" value="1" />
                            <label for="rating-1" class="fa fa-star"></label>
                            <input type="radio" name="rating" id="rating-2" value="2" />
                            <label for="rating-2" class="fa fa-star"></label>
                            <input type="radio" name="rating" id="rating-3" value="3" />
                            <label for="rating-3" class="fa fa-star"></label>
                            <input type="radio" name="rating" id="rating-4" value="4" />
                            <label for="rating-4" class="fa fa-star"></label>
                            <input type="radio" name="rating" id="rating-5" value="5" />
                            <label for="rating-5" class="fa fa-star"></label>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-6">
                        <!-- Uplaod Photos -->
                        <div class="add-review-photos margin-bottom-30">
                            <div class="photoUpload">
                                <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
                                <input type="file" class="upload" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Comment -->
                <form id="add-comment" class="add-comment">
                    <fieldset>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Name:</label>
                                <input type="text" value="" />
                            </div>

                            <div class="col-md-6">
                                <label>Email:</label>
                                <input type="text" value="" />
                            </div>
                        </div>

                        <div>
                            <label>Review:</label>
                            <textarea cols="40" rows="3"></textarea>
                        </div>

                    </fieldset>

                    <button class="button">Submit Review</button>
                    <div class="clearfix"></div>
                </form>

            </div>
            <!-- Add Review Box / End -->


        </div>


        <!-- Sidebar
		================================================== -->
        <div class="col-lg-4 col-md-4 margin-top-75 sticky">


            <!-- Verified Badge -->
            <div class="verified-badge with-tip"
                data-tip-content="Listing has been verified and belongs the business owner or manager.">
                <i class="sl sl-icon-check"></i> Verified Listing
            </div>


            <!-- Contact -->
            <div class="boxed-widget margin-top-35">
                <div class="hosted-by-title">
                    <h4><span>Hosted by</span> <a href="pages-user-profile.html">Tom Perrin</a></h4>
                    <a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg"
                            alt=""></a>
                </div>
                <ul class="listing-details-sidebar">
                    <li><i class="sl sl-icon-phone"></i> {{$escuela->phone}}</li>
                    <li><i class="sl sl-icon-globe"></i> <a href="#">{{$escuela->website}}</a></li>
                    <li><i class="fa fa-envelope-o"></i> <a href="#">{{$escuela->phone}}</a></li>
                </ul>

                <ul class="listing-details-sidebar social-profiles">

                    @if( $escuela->redsocial[0] != 'null')
                    <li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                    @endif
                    @if( $escuela->redsocial[1] != 'null')
                    <li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
                    @endif
                    @if( $escuela->redsocial[2] != 'null')
                    <li><a href="#" class="gplus-profile"><i class="fa fa-instagram"></i> Twitter</a></li>
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
                <button class="like-button"><span class="like-icon"></span> Bookmark this listing</button>
                <span>159 people bookmarked this place</span>

                <!-- Share Buttons -->
                <ul class="share-buttons margin-top-40 margin-bottom-0">
                    <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                    <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                    <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                    <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                </ul>
                <div class="clearfix"></div>
            </div>

        </div>
        <!-- Sidebar / End -->

    </div>
</div>
@endsection
