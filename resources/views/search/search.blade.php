@extends('layaout.header')
@section('contenido')
<div class="container">
    <div class="row">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- Search -->
        <div class="col-md-12">
            <div class="main-search-input gray-style margin-top-0 margin-bottom-10">

                @livewire('search-name-school')

                @livewire('search-city-school')

                <div class="main-search-input-item">
                    <select onchange="location = this.value;" data-placeholder="All Categories" class="chosen-select">
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type]) }}">Todos los niveles</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'guarderia' ]) }}">Guarderias</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'preescolar' ]) }}">Pre-escolares</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'primarias' ]) }}">Primarias</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'secundarias' ]) }}">Secundarias</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'preparatorias' ]) }}">Preparatoria</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'universidades' ]) }}">Universidades</option>
                        <option value="{{ route('search', ['city'=> request()->city, 'order'=> request()->order, 'type'=> request()->type,  'category' => 'otras' ]) }}">Otros</option>

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
                                    <option label="blank">Selecciona Categoria</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Tradicional']) }}" >Tradicional</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Religiosa']) }}" >Religiosa</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Montessori']) }}" >Montessori</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Tecnólogia']) }}" >Tecnólogia</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Bicultural']) }}" >Bicultural</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Mixtas']) }}" >Mixtas</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Laicas']) }}" >Laicas</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category , 'order'=> request()->order, 'type' => 'Otras']) }}" >Otras</option>
                                </select>
                            </div>
                        </div>
                        <div class="sort-by">
                            <div class="sort-by-select">
                                <select onchange="location = this.value;" data-placeholder="Default orden" class="chosen-select-no-single">
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category ,'type'=> request()->type, 'order' => 'default']) }}">Default Orden</a> </option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category ,'type'=> request()->type, 'order' => 'HighestRated']) }}">El mejor valorado</option>
                                    <option value="{{ route('search', ['city'=> request()->city,'category'=> request()->category ,'type'=> request()->type, 'order' => 'NewestListings']) }}">Listados más nuevos</option>
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
                        <div class="listing-item" onclick="window.location='{{ route('school',$escuela->slug)}}'">
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
                        <span onclick="window.location='{{ route('addFavoritos',$escuela->id)}}'"
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
