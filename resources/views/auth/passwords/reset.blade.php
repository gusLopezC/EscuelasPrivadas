@extends('layaout.header')
@section('title', 'Reset Password')
@section('contenido')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" action="{{ route('password.request') }}" method="POST">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-43">
                    Restablecer contraseña
                </span>

                <input type="hidden" name="token" value="{{ $token }}">

                <input id="email" type="email" class="form-control" name="email" value="{{ $email }}"
                    placeholder="Email" required autofocus>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                    required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" required>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Restablecer contraseña
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

            <div class="login100-more" style="background-image: url('../../images/login/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link rel="stylesheet" href="/css/login.css">

@endpush
