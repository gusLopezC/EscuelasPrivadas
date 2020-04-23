@extends('layaout.header')
@section('contenido')
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center">
                        <p class="text-uppercase">
                            {{ trans('Nosotros.Title') }}
                        </p>
                        <h2 class="text-uppercase mt-4 mb-5">
                            {{ trans('Nosotros.SubTitle') }}
                        </h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================ Start About Area =================-->
<section class="about_area section_gap">
    <div class="container">
        <div class="row h_blog_item">
            <div class="col-lg-6">
                <div class="h_blog_img">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <img class="img-fluid" src="../images/banner/about.png" alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="h_blog_text">
                    <div class="h_blog_text_inner left right">
                        <h4>{{ trans('Nosotros.Welcome') }}</h4>
                        <p>
                            {{ trans('Nosotros.Mensaje') }}
                        </p>
                        <p>
                            {{ trans('Nosotros.Mensaje2') }}

                            <br>
                            {{ trans('Nosotros.Mensaje3') }}

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End About Area =================-->

<!--================ Start Feature Area =================-->
<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">{{ trans('Nosotros.MasSobreTrabajo') }}</h2>
                    <p>
                        {{ trans('Nosotros.MasSobreTrabajoText') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-student"></span></div>
                    <div class="desc">
                        <h3 class="mt-3 mb-2">{{ trans('Nosotros.Calidad escolar') }}</h3>
                        <p>
                            {{ trans('Nosotros.Calidad escolarText') }}

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-book"></span></div>
                    <div class="desc">
                        <h3 class="mt-3 mb-2">{{ trans('Nosotros.InformaciónPadres') }}</h3>
                        <p>
                            {{ trans('Nosotros.InformaciónPadresText') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-earth"></span></div>
                    <div class="desc">
                        <h3 class="mt-3 mb-2">{{ trans('Nosotros.ApoyoInst') }}</h3>
                        <p>
                            {{ trans('Nosotros.ApoyoInstText') }}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Feature Area =================-->

<!--================ Start Testimonial Area =================-->
<div class="testimonial_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">{{ trans('Nosotros.Testimonials') }}</h2>
                    <p>
                        {{ trans('Nosotros.TestimonialsText') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="testimonal-fw-slick-carousel dots-nav">
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <img src="../images/testimonials/t1.jpg" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Shane Matteson</h4>
                                <p>
                                    {{ trans('Nosotros.Testimonials1') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <img src="./images/testimonials/t2.jpg" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>
                                    {{ trans('Nosotros.Testimonials2') }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <img src="../images/testimonials/t1.jpg" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Natalie L</h4>
                                <p>
                                    {{ trans('Nosotros.Testimonials3') }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <img src="./images/testimonials/t2.jpg" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Josée Martinez</h4>
                                <p>
                                    {{ trans('Nosotros.Testimonials4') }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!--================ End Testimonial Area =================-->

@endsection
