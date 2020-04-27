@extends('layaout.headeruser')
@section('title', 'Profile')
@section('contenido')


<!-- Content
	================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ trans('Perfil.MyProfile') }}</h3>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>{{ trans('Perfil.MyProfile') }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="dashboard-list-box margin-top-0">
            <h4 class="gray">{{ trans('Perfil.ProfileDetails') }}</h4>
            <div>

                <!-- Profile -->
                <div class="col-lg-4 col-md-12">
                    <!-- Avatar -->
                    <div class="edit-profile-photo">
                        <img src="https://escuelasprivadas.s3.amazonaws.com/images/profile/{{$user->img}}" alt="">
                        <form enctype="multipart/form-data" action="{{ route('pictureprofile')}}" method="POST">
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i>{{ trans('Perfil.UploadPhoto') }} </span>
                                    <input type="file" name="avatar" class="upload" />
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary" style="margin-top: 30%;">
                        </form>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="dashboard-list-box margin-top-0">
                        <!-- Details -->
                        <div class="my-profile">

                            <form method="POST" action="{{ route('profile.update', $user)}}">
                                {{csrf_field()}} {{ method_field('PUT')}}

                                <label>{{ trans('Perfil.YourName') }} </label>
                                <input name="name" type="text" value="{{old('name', $user->name)}}" class="form-control"
                                    placeholder="Ingrese tu nombre">

                                <label>{{ trans('Perfil.Email') }}</label>
                                <input name="email" type="email" value="{{old('email', $user->email)}}"
                                    class="form-control">

                                <label>{{ trans('Perfil.Phone') }}</label>
                                <input name="telephone" type="number" value="{{old('telephone', $user->telephone)}}"
                                    class="form-control">

                                <label>{{ trans('Perfil.Notes') }}</label>
                                <textarea name="biografy"
                                    id="biografy">{{Request::old('biografy', $user->biografy)}}</textarea>

                        </div>

                        <button class="button margin-top-15">{{ trans('Perfil.SaveChanges') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Change Password -->
    </div>
    <div style="margin-bottom: 10%;"></div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">{{ trans('Perfil.ChangePassword') }}</h4>
                @if (session('error'))
                <div class="errorformulariomensaje">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif

                <div class="dashboard-list-box-static">

                    <form id="form-change-password" role="form" method="POST" action="{{ route('changePassword')  }}"
                        novalidate class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- Change Password -->
                        <div class="my-profile">
                            <label class="margin-top-0">{{ trans('Perfil.OldChanges') }}</label>
                            <input type="password" class="form-control" id="current-password" name="current-password"
                                placeholder="Password" required>

                            <label>{{ trans('Perfil.NewPassword') }}</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>

                            <label>{{ trans('Perfil.ConfirmNewPassword') }}</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Re-enter Password" required>

                            <button type="submit"
                                class="button margin-top-15">{{ trans('Perfil.SaveChanges') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">{{ trans('Perfil.DeleteCount') }}</h4>
                <div class="dashboard-list-box-static">
                    <p>{{ trans('Perfil.DeleteCountText') }}.</p>
                    <!-- Change Password -->

                    <form action="{{ route('profile.delete', $user->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="{{ __("Perfil.DeleteCountBoton")}}" />
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- Content / End -->
@endsection
