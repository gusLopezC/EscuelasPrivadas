@extends('layaout.headeruser')
@section('title', 'Mis favoritos')
@section('contenido')
<!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('Bookmarks.Title') }}</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li>Home</li>
                            <li>Dashboard</li>
                            <li>{{ trans('Bookmarks.Title') }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Listings -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4>{{ trans('Bookmarks.Tusfavoritos') }}</h4>
                    @if (count($misfavoritos) > 0)
                    <ul>
                        @foreach ($misfavoritos as $favorito)
                        <li>
                            <div class="list-box-listing">

                                <div class="list-box-listing-img"><a href="#"><img
                                            src="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$favorito->photo}}"
                                            alt=""></a></div>
                                <div class="list-box-listing-content">
                                    <a href="/school/{{ $favorito->slug}}">
                                        <div class="inner">
                                            <h3>{{$favorito->name}}</h3>
                                            <span>{{$favorito->address}}</span>
                                            <div class="star-rating" data-rating="{{$favorito->calification}}">

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="buttons-to-right">
                                <form action="{{ route('deleteFavoritos', $favorito->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="pagination">
                        {{ $misfavoritos->render() }}
                    </div>
                    @else
                    <ul>
                        <li>
                            <div class="list-box-listing">

                                <div class="list-box-listing-content">
                                    <div class="inner" style="text-align: center;">
                                        <h3>{{ trans('Bookmarks.Nofavoritos') }}</h3>
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
