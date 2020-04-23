@extends('layaout.header')
@section('contenido')
<br>
<br>
<br>
<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{ trans('Booking.Title') }}</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>{{ trans('Booking.Title') }}</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
    <div class="row">

        <!-- Content
		================================================== -->
        <div class="col-lg-8 col-md-8 padding-right-30">

            <h3 class="margin-top-0 margin-bottom-30">{{ trans('Booking.DetallesPersonales') }}</h3>
            <form method="POST" action="{{ route('Booking.store')}}">
                {{csrf_field()}}
                <div class="row">

                    <div class="col-md-12">
                        <label>{{ trans('Booking.Nombrecompleto') }}</label>
                        <input name="name" type="text" value="{{$user->name}}" required>
                    </div>

                    <div class="col-md-6">
                        <div class="input-with-icon medium-icons">
                            <label>{{ trans('Booking.E-MailAddress') }}</label>
                            <input name="email" type="email" value="{{$user->email}}" required readonly>
                            <i class="im im-icon-Mail"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-with-icon medium-icons">
                            <label>{{ trans('Booking.Telefono') }}</label>
                            <input name="phone" type="text" value="" required>
                            <i class="im im-icon-Phone-2"></i>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
                    <div class="col-lg-4 col-md-12">
                        <label>{{ trans('Booking.Fecha') }}</label>
                        <input name="date" type="text" id="booking-date" data-lang="es" data-large-mode="true"
                            data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from">
                    </div>

                    <!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
                    <div class="col-lg-4 col-md-12">
                        <label>{{ trans('Booking.Hora') }}</label>
                        <input name="time" type="text" id="booking-time" value="9:00 am">
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <label>{{ trans('Booking.Visitantes') }}</label>
                        <select class="chosen-select-no-single" name="Guests" id="Guests">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="Mas de 5">5 +</option>
                        </select>
                    </div>

                </div>

                <div>
                    <input type="hidden" name="school_id" value="{{$escuela->id}}">
                    <input type="hidden" name="receptor_id" value="{{$escuela->getUser[0]->id}}">
                    <input type="hidden" name="emailEscuela" value="{{$escuela->getUser[0]->email}}">
                    <input type="hidden" name="NameEscuela" value="{{$escuela->name}}">
                </div>

                <button type="submit" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">
                    {{ trans('Booking.ConfirmarReservacion') }}</button>
            </form>
        </div>


        <!-- Sidebar
		================================================== -->
        <div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">

            <!-- Booking Summary -->
            <div class="listing-item-container compact order-summary-widget">
                <div class="listing-item">
                    <img src="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$escuela->photo}}" alt="">

                    <div class="listing-item-content">
                        <div class="numerical-rating" data-rating="{{$escuela->calification}}"></div>
                        <h3>{{$escuela->name}}</h3>
                        <span>{{ Illuminate\Support\Str::limit($escuela->address, 25) }}</span>
                    </div>
                </div>
            </div>

            <!-- Booking Summary / End -->

        </div>

    </div>
</div>
<!-- Container / End -->


@endsection

@push('styles')
<link rel="stylesheet" href="../../css/plugins/datedropper.css" type="text/css">
<link rel="stylesheet" href="../../css/plugins/timedropper.css" type="text/css">


@endpush
@push('scripts')

<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<script src="../../scripts/datedropper.js"></script>
<script>
    $('#booking-date').dateDropper();
</script>

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="../../scripts/timedropper.js"></script>
<script>
    this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script>

<!-- Booking Widget - Quantity Buttons -->
<script src="../../scripts/quantityButtons.js"></script>

@endpush
