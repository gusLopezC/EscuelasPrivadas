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

                <div class="main-search-input-item">
                    <input type="text" placeholder="What are you looking for?" value="" />
                </div>

                <div class="main-search-input-item location">
                    <input type="text" placeholder="Location" value="" />
                    <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                </div>

                <div class="main-search-input-item">
                    <select data-placeholder="All Categories" class="chosen-select">
                        <option>All Categories</option>
                        <option>Shops</option>
                        <option>Hotels</option>
                        <option>Restaurants</option>
                        <option>Fitness</option>
                        <option>Events</option>
                    </select>
                </div>

                <button class="button">Search</button>
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
                                <select data-placeholder="Default order" class="chosen-select-no-single">
                                    <option><a href=""></a> Default Order</option>
                                    <option>Highest Rated</option>
                                    <option>Most Reviewed</option>
                                    <option>Newest Listings</option>
                                    <option>Oldest Listings</option>
                                </select>
                            </div>
                        </div>
                        <!-- Sort by / End -->

                    </div>
                </div>

            </div>
            <!-- Sorting - Filtering Section / End -->


            <div class="row">

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

    </div>
</div>

@endsection
