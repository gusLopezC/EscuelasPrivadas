@extends('layaout.header')
@section('title', 'Reset Password')
@section('contenido')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-43">
                    Forgot Password?
                </span>


                <p>Ingresa una dirección de correo a la cual enviar un email y las instrucciones para realizar el cambio
                    de contraseña.</p>
                <br>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required
                    autofocus>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Send Password Reset Link
                    </button>
                </div>
                <br>
                @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
                @endif @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </form>

            <div class="login100-more" style="background-image: url('../images/login/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link rel="stylesheet" href="/css/login.css">

@endpush
