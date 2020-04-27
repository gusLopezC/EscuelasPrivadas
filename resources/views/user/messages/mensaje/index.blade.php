<div  class="message-wrapper">

@foreach ($messages as $message)
<div class="message-bubble {{ ($message->from == Auth::id()) ? 'me' : '' }}">

    <div class="message-text">
        <p>{{$message->message}}</p>
    </div>
</div>

@endforeach
</div>

<!-- Reply Area me -->
<div class="clearfix"></div>
<div class="message-reply">
    <input type="text" placeholder="Your Message" name="message">

</div>
