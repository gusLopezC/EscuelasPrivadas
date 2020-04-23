@extends('layaout.header')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="margen-busqueda" ></div>
        <!-- Search -->
        <div class="col-md-12">
            <div class="main-search-input gray-style margin-top-0 margin-bottom-10">

                @livewire('search-name-school')

                @livewire('search-city-school')

                <div class="main-search-input-item">
                    <select onchange="location = this.value;" data-placeholder="All Categories" class="chosen-select">
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type]) }}">Todos los niveles</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'guarderia' ]) }}">{{ trans('Search.Guarderias') }}</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'preescolar' ]) }}">{{ trans('Search.Pre-escolares') }}</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'primarias' ]) }}">{{ trans('Search.Primarias') }}</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'secundarias' ]) }}">{{ trans('Search.Secundarias') }}</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'preparatorias' ]) }}">{{ trans('Search.Preparatoria') }}</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'universidades' ]) }}">{{ trans('Search.Guarderias') }}</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'otras' ]) }}">{{ trans('Search.Otros') }}</option>

                    </select>
                </div>

            </div>
        </div>
        <!-- Search Section / End -->
        <div class="col-md-12">

            <!-- Sorting - Filtering Section -->
            <div class="row margin-bottom-25 margin-top-30">

                <div class="col-md-6">

                </div>

                <div class="col-md-6">
                    <div class="fullwidth-filters">
                        <!-- Panel Dropdown-->
                        <!-- Sort by -->
                        <div class="sort-by">
                            <div class="sort-by-select">
                                <select onchange="location = this.value;" data-placeholder="Default order" class="chosen-select-no-single">
                                    <option label="blank">{{ trans('Search.SeleccionaCategoria') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Tradicional']) }}" >{{ trans('Search.Tradicional') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Religiosa']) }}" >{{ trans('Search.Religiosa') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Montessori']) }}" >{{ trans('Search.Montessori') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Tecnólogia']) }}" >{{ trans('Search.Tecnólogia') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Bicultural']) }}" >{{ trans('Search.Bicultural') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Mixtas']) }}" >{{ trans('Search.Mixtas') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Laicas']) }}" >{{ trans('Search.Laicas') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Otras']) }}" >{{ trans('Search.Otras') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="sort-by">
                            <div class="sort-by-select">
                                <select onchange="location = this.value;" data-placeholder="Default orden" class="chosen-select-no-single">
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category ,'type'=> request()->type, 'order' => 'default']) }}">{{ trans('Search.DefaultOrden') }}</a> </option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category ,'type'=> request()->type, 'order' => 'HighestRated']) }}">{{ trans('Search.mejorValorado') }}</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category ,'type'=> request()->type, 'order' => 'NewestListings']) }}">{{ trans('Search.Listadosnuevos') }}</option>
                                </select>
                            </div>
                        </div>
                        <!-- Sort by / End -->

                    </div>
                </div>

            </div>
            <!-- Sorting - Filtering Section / End -->


            <div class="row">

                @if (count($escuelas) == 0)
                   <div class="col-sm-12">
                    <img src="../images/icons/notresult.png" class="centerimagen" style="width: 50%;" alt="notresultados">

                   </div>
                @endif

                @foreach ($escuelas as $escuela)
                <!-- Listing Item -->
                <div class="col-lg-4 col-md-6">
                    <a class="listing-item-container compact">
                        <div class="listing-item" onclick="window.location='{{ route('school', [ $escuela->slug])}}'">
                            <img src="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$escuela->photo}}"
                                alt="">
                            <div class="listing-badge now-open">{{$escuela->categoria}}</div>
                            <div class="listing-item-content">
                                <div class="numerical-rating" data-rating="{{$escuela->calification}}"></div>
                                <h3>{{$escuela->name}} @if ($escuela->verificado)
                                    <i class="verified-icon"></i>
                                    @endif</h3>
                                <span>{{ Illuminate\Support\Str::limit($escuela->address, 30) }} </span>
                            </div>
                        </div>
                        <span onclick="window.location='{{ route('addFavoritos', [$escuela->id])}}'"
                            class="like-icon"></span>

                    </a>
                </div>
                <!-- Listing Item / End -->
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="clearfix"></div>

            <div class="pagination">
                {{ $escuelas->appends(request()->input())->links() }}
            </div>
        </div>
         <!-- Pagination -->
         <div class="clearfix"></div>
          <!-- Pagination -->
          <div style="margin-bottom:10%"></div>

    </div>
</div>

@endsection
