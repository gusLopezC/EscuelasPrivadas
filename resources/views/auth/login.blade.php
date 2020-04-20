@extends('layaout.header')

@section('contenido')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-43">
                    Inicia sesión
                </span>


                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Email" required autofocus>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" id="password" name="password" value="{{ old('password') }}"
                        placeholder="Password" required>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me"
                                    style="display:none">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('password.request') }}" class="txt1">
                                    Forgot Password?
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                <div class="text-center p-t-46 p-b-20">
                    ¿Nuevo aqui? <strong>
                        <a href="{{ route('register') }}" class="txt1">
                            Registrate
                        </a>
                    </strong>
                </div>
                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                       o inicia sesión con
                    </span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="{{ url('/auth/redirect/facebook') }}" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <div style="margin-right:3%"></div>
                    <a href="#" class="login100-form-social-item flex-c-m bg3 m-r-5">
                        <i class="fa fa-google" aria-hidden="true"></i>
                    </a>
                </div>
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
