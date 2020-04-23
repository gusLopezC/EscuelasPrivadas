@extends('layaout.header')
@section('contenido')
<div id="home" class="header-hero bg_cover" style="background-image: url(../images/banner/header-bg.jpg)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="header-content text-center">
                    <h3 class="header-title">{{ trans('Workschool.Title') }}</h3>
                    <p class="text">{{ trans('Workschool.subTitle') }}</p>
                    <ul class="header-btn">
                        <li><a class="main-btn btn-two video-popup" href=""> <i class="lni-play"></i></a></li>
                    </ul>
                </div> <!-- header content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="header-shape">
        <img src="../images/banner/header-shape.svg" alt="shape">
    </div>
</div> <!-- header content -->

<section id="service" class="services-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title pb-10">
                    <h4 class="title">{{ trans('Workschool.Section1Title') }} </h4>
                    <p class="text">{{ trans('Workschool.Section1Text1') }} <br>
                        {{ trans('Workschool.Section1Text2') }}</p>
                        <br>

                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-bolt"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title"> {{ trans('Workschool.Article1') }}</h4>
                                <p class="text"> {{ trans('Workschool.Article1Text') }} </p>
                            </div>
                        </div> <!-- services content -->

                    </div>
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-bar-chart"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">{{ trans('Workschool.Article2') }}</h4>
                                <p class="text">{{ trans('Workschool.Article2Text') }}. </p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-brush"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">{{ trans('Workschool.Article3') }}</h4>
                                <p class="text">{{ trans('Workschool.Article3Text') }}. </p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="col-md-6">
                        <div class="services-content mt-40 d-sm-flex">
                            <div class="services-icon">
                                <i class="lni-bulb"></i>
                            </div>
                            <div class="services-content media-body">
                                <h4 class="services-title">{{ trans('Workschool.Article4') }}</h4>
                                <p class="text">{{ trans('Workschool.Article4Text') }}. </p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- row -->
    </div> <!-- conteiner -->
    <div class="services-image d-lg-flex align-items-center">
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="image">
            <img src="../images/public/services.png" alt="Services">
        </div>
    </div> <!-- services image -->
</section>

<!--====== CALL TO ACTION PART START ======-->

<section id="call-to-action" class="call-to-action">
    <div class="call-action-image">
        <img src="../images/public/call-to-action.png" alt="call-to-action">
    </div>

    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-lg-6"> </div>
            <div class="col-lg-6">
                <div class="call-action-content text-center">
                    <h2 class="call-title">{{ trans('Workschool.call-title') }}</h2>
                    <p class="text">{{ trans('Workschool.call-titleText') }}</p>
                    <div class="call-newsletter">
                        <i class="lni-envelope"></i>
                        <input type="text" readonly>
                        <button type="submit">{{ trans('Workschool.Registrate') }}
                </div> <!-- slider-content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="/css/workschool.css">

@endpush
