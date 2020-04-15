@extends('layaout.header')
@section('contenido')
@extends('layaout.layaout')

<!-- Content
        ================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Hello, {{Auth::user()->name}}!</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @if ( Auth::user()->role == 'SCHOOL_ROLE')
    <!-- Content -->
    <div class="row">
        <h1></h1>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content">
                    <h4>{{$estadisticasVisitas[0]->totalPlaces}}</h4> <span>Listados activos</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content">
                    <h4>{{$estadisticasVisitas[0]->totalVisitas}}</h4> <span>Vistas totales</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content">
                    <h4>{{$estadisticasComentarios[0]->totalComentarios}}</h4> <span>Revisiones totales</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content">
                    <h4>{{$totalReservas[0]->totalReservas}}</h4> <span>Reservas</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
            </div>
        </div>
    </div>


    <div class="row">

        <!-- Recent Activity -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box with-icons margin-top-20">
                <h4>Actividad Reciente</h4>
                <ul>
                    @if (count($notificationes) >=1)
                    @foreach ($notificationes as $notification)
                    <li>
                        <i class="list-box-icon sl sl-icon-star"></i> <strong>
                            {{$notification->mensaje}}
                        </strong>
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>
                    @endforeach
                    @else
                    <li>
                        <strong>
                            No hay notificaciones nuevas
                        </strong>

                    </li>
                    @endif


                </ul>
            </div>
        </div>

        <!-- Invoices -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4>Gestiona tus instutuciónes</h4>
                <ul>
                    @foreach ($escuelas as $escuela)
                    <li>
                        <div class="list-box-listing">
                            <div class="list-box-listing-content">
                                <div class="inner">
                                    <h3><a href="#">{{$escuela->name}}</a></h3>
                                    <span>{{ Illuminate\Support\Str::limit($escuela->address, 20) }}</span>
                                    <div class="star-rating" data-rating="{{$escuela->calification}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <br>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <a href="{{route('school.edit',$escuela->slug)}}" class="button gray"><i class="sl sl-icon-note"></i> Editar</a>

                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('school.delete',$escuela->id)}}" class="button gray"><i class="sl sl-icon-close"></i> Eliminar</a>

                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

    </div>
    <div style="margin-bottom:10%;"></div>

    @else
    <div class="row">
        <div class="col-sm-6">
            <div class="dashboard-stat color-4 margin-top-70 margin-bottom-30" style="height: 70%;">
                <div class="dashboard-stat-content">
                    <h4>Verifica tu identidad</h4><span>Ponte en contacto con nosotros para desbloquear las estadisticas
                        de tu tour</span>

                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Student-Male"></i></div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="headline margin-top-70 margin-bottom-30">Metodos de verificacion</h4>
            <!-- Toggles Container -->
            <div class="style-2">

                <!-- Toggle 1 -->
                <div class="toggle-wrap">
                    <span class="trigger active"><a href="#"><i class="im im-icon-Mail"></i>Via email <i
                                class="sl sl-icon-plus"></i> </a></span>
                    <div class="toggle-container" style="display: none;">
                        <p>Para la verificación por correo es necesario que nos envies un correo a la direcciòn
                            <span> correo@correo.com </span> desde tu correo institutivo solicitando la activación.</p>
                        <br><br>
                        <p> <a href="#" class="button border">Escribenos</a></p>

                    </div>
                </div>

                <!-- Toggle 2 -->
                <div class="toggle-wrap">
                    <span class="trigger active"><a href="#"><i class="fa fa-whatsapp"></i>Via whatsapp <i
                                class="sl sl-icon-plus"></i> </a></span>
                    <div class="toggle-container" style="display: block;">
                        <p>Para la verificación por whatsapp ponte en contacto con uno de nuestros agente el te guiara
                            solicitando algunas detalles de tu institucion para proceder a la validacion.</p>
                        <br><br>
                        <p> <a href="#" class="button border">Contactanos</a></p>
                    </div>
                </div>

            </div>
            <!-- Toggles Container / End -->

        </div>
    </div>

    <div style="margin-bottom:20%;"></div>

    @endif


</div>
<!-- Content / End -->


@endsection
