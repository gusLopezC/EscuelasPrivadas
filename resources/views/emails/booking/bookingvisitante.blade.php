@component('mail::message')

<p>
    Tienes una visita para <b>{{$nameEscuela}}</b> el dia {{$reserva->Date}} a las {{$reserva->Hour}}
    para {{$reserva->Guests}} visitantes. </p>

<h6> Datos del visitante</h6>
<p>
    Nombre:{{$reserva->name}}
</p>
<p>
    Email:{{$reserva->email}}
</p>
<p>
    Telefono:{{$reserva->phone}}
</p>

<p> </p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
