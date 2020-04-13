@component('mail::message')
# Tu reserva a sida confirmada

<p>
Tu reserva para visitar la escuela <b>{{$nameEscuela}}</b> a sida confirmada para el dia {{$reserva->Date}} a las {{$reserva->Hour}}
para {{$reserva->Guests}} visitantes. </p>

<p>Recuerda ser puntual </p>

@component('mail::button', ['url' => ''])
Administra tus reservas
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
