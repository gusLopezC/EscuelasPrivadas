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
                <h2>Mensajes</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a>Home</a></li>
                        <li><a>Dashboard</a></li>
                        <li>Mensajes</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Listings -->
        <div class="col-lg-12 col-md-12">

            <div class="messages-container margin-top-0">
                <div class="messages-container-inner">

                    <!-- Messages -->
                    <div class="messages-inbox">
                        <ul class="users">
                            @foreach ($users as $user)
                            <li class="user" id="{{ $user->visitante_id }}">
                                @if($user->MensajesNoVistos)
                                <span class="pending">{{($user->MensajesNoVistos / 2) }}</span>
                                @endif
                                <a>
                                    <div class="message-avatar"><img
                                            src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                            alt="" /></div>

                                    <div class="message-by">
                                        <div class="message-by-headline">
                                            <h5>{{$user->name}}</h5>

                                        </div>

                                    </div>
                                </a>
                            </li>

                            @endforeach


                        </ul>
                    </div>
                    <!-- Messages / End -->

                    <!-- Message Content -->
                    <div class="message-content" id="messages">



                    </div>
                    <!-- Message Content -->

                </div>

            </div>
            <div style="margin-top:10%">

            </div>
        </div>
    </div>
</div>
<!-- Content / End -->

@endsection

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/css/chat.css">

@endpush
@push('scripts')

<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
         // ajax setup form csrf token
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('c42a483f30bfcca0850f', {
            cluster: 'us2',
            forceTLS: true
            });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            console.log('=======================');
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());
                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');

            receiver_id = $(this).attr('id');

            $.ajax({
                type: "get",
                url: "message/" + receiver_id,
                data: "",
                cache: false,
                success: function (data) {
                    // console.log(data);
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });

        });

        $(document).on('keyup', '.message-reply input', function (e) {
            var message = $(this).val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty
                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        'receiver_id': receiver_id,
                        'message': message,

                    },
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });


    // make a function to scroll down auto

    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }

    });//end documentready
</script>
@endpush
