@extends('layaout.headeruser')
@section('title', 'Reviews')
@section('contenido')
<!-- Content
	================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Reviews</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Reviews</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>Tus Reviews</h4>
                @if (count($comentarios) > 0)
                <ul>
                    @foreach ($comentarios as $comentario)
                    <li>
                        <div class="comments listing-reviews">
                            <ul>
                                <li>
                                    <div class="avatar"><img
                                            src="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$comentario->getPhotosEscuela[0]->photo}}"
                                            alt="" style="height: 85px;" /> </div>
                                    <div class="comment-content">
                                        <div class="arrow-comment"></div>
                                        <div class="comment-by">Tu review <div class="comment-by-listing own-comment">
                                                de <a
                                                    onclick="window.location='{{ route('school',$comentario->getEscuela[0]->slug)}}'">{{$comentario->getEscuela[0]->name}}</a>
                                            </div>
                                            <span class="date">{{ $comentario->created_at->format('d M Y')}}</span>
                                            <div class="star-rating" data-rating="{{$comentario->calification}}"></div>
                                        </div>
                                        <p>{{$comentario->comentario}}</p>
                                        <a href="{{route('reviews.edit',$comentario)}}" class="rate-review">
                                            <i class="sl sl-icon-note"></i> Editar</a>
                                        <a href="{{route('reviews.delete',$comentario)}}" class="rate-review">
                                            <i class="sl sl-icon-ban"></i> Eliminar</a>


                                    </div>

                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <div class="pagination">
                    {{ $comentarios->render() }}
                </div>

                @else


                <ul>
                    <li>
                        <div class="list-box-listing">

                            <div class="list-box-listing-content">
                                <div class="inner" style="text-align: center;">
                                    <h3>Aun no tienes comentarios</h3>
                                    <br>
                                    <br>
                                    <br> <a href="{{route('/')}}">
                                        <button class="button margin-top-15" style="width: 80%;">
                                            Explora
                                        </button>
                                    </a>
                                </div>

                            </div>
                            <div style="margin-top:30%">

                            </div>
                        </div>
                    </li>


                </ul>
                @endif
            </div>
        </div>
    </div>

</div>
<!-- Content / End -->

@endsection
