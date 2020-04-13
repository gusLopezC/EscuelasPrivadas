@component('mail::message')

#Hemos recibido un email

<p>Este mensaje es recibido desde schoola.com</p>
<div>
<p><b>Remitente:</b>&nbsp;{{$demo->name}}</p>
<p><b>Email:</b>&nbsp;{{$demo->email}}</p>
<p><b>Mensaje:</b>&nbsp;{{$demo->comments}}</p>
</div>

Thank You,
<br/>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
