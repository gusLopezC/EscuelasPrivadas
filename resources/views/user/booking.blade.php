@extends('layaout.headeruser')
@section('title', 'Reservas')
@section('contenido')
<!-- Content
	================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ trans('Booking.Reservas') }}</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a>Home</a></li>
                        <li><a>Dashboard</a></li>
                        <li>{{ trans('Booking.Reservas') }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">

                <!-- Sort by -->
                <div class="sort-by">
                    <div class="sort-by-select">
                        <select onchange="location = this.value;" class="chosen-select">
                            <option value="{{ route('booking', ['orderBy' => 'Activas' ]) }}">{{ trans('Booking.Activas') }}</option>
                            <option value="{{ route('booking', ['orderBy' => 'Historial' ]) }}">{{ trans('Booking.Historial') }}</option>

                        </select>
                    </div>
                </div>

                <!-- Reply to review popup -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                    <div class="small-dialog-header">
                        <h3>Send Message</h3>
                    </div>
                    <div class="message-reply margin-top-0">
                        <textarea cols="40" rows="3" placeholder="Your Message"></textarea>
                        <button class="button">Send</button>
                    </div>
                </div>

                <h4>{{ trans('Booking.Listareservas') }}</h4>
                @if (count($reservas) >=1 )
                <ul>
                    @foreach ($reservas as $reserva)

                    @if ($reserva->status == 'Pendiente')
                    <li class="pending-booking">
                        @endif
                        @if ($reserva->status == 'Cancelado')
                    <li class="canceled-booking">
                        @endif
                        <div class="list-box-listing bookings">
                            <div class="list-box-listing-img"><img
                                    src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120"
                                    alt=""></div>
                            <div class="list-box-listing-content">
                                <div class="inner">
                                    <h3>{{$reserva->getEscuela[0]->name}}
                                        @if ($reserva->status == 'Pendiente')
                                        <span class="booking-status pending">{{ trans('Booking.Pendiente') }}</span>
                                        @endif
                                        @if ($reserva->status == 'Cancelado')
                                        <span class="booking-status">{{ trans('Booking.Cancelado') }}</span>
                                        @endif
                                    </h3>

                                    <div class="inner-booking-list">
                                        <h5>{{ trans('Booking.FechaReserva') }}:</h5>
                                        <ul class="booking-list">
                                            <li class="highlighted">{{$reserva->Date}} {{ trans('Booking.alas') }}
                                                {{$reserva->Hour}}</li>
                                        </ul>
                                    </div>

                                    <div class="inner-booking-list">
                                        <h5>{{ trans('Booking.DetallesdeReserva') }}:</h5>
                                        <ul class="booking-list">
                                            <li class="highlighted">{{$reserva->Guests}} {{ trans('Booking.People') }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="inner-booking-list">
                                        <h5>{{ trans('Booking.Cliente') }} :</h5>
                                        <ul class="booking-list">
                                            <li>{{$reserva->name}}</li>
                                            <li>{{$reserva->email}}</li>
                                            <li>{{$reserva->phone}}</li>
                                        </ul>
                                    </div>

                                    <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i
                                            class="sl sl-icon-envelope-open"></i>{{ trans('Booking.EnviarMensaje') }}</a>

                                </div>
                            </div>
                        </div>
                        @if ($reserva->status == 'Pendiente')
                        <div class="buttons-to-right">
                            <a href="{{route('cancelBooking',$reserva->id)}}" class="button gray reject"><i
                                    class="sl sl-icon-close"></i>{{ trans('Booking.Cancelar') }} </a>
                        </div>
                        @endif

                    </li>
                    @endforeach
                    <div class="pagination">
                        {{ $reservas->render() }}
                    </div>
                </ul>
                @else
                <ul>
                    <li>
                        <div class="list-box-listing">

                            <div class="list-box-listing-content">
                                <div class="inner" style="text-align: center;">
                                    <h3>{{ trans('Booking.Noreservacion') }}</h3>
                                    <br>
                                    <br>
                                    <br> <a href="{{route('/')}}">
                                        <button class="button margin-top-15" style="width: 80%;">
                                            {{ trans('Booking.Explora') }}
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
