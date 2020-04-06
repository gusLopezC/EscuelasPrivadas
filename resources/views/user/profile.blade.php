@extends('layaout.header')
@section('contenido')

@extends('layaout.layaout')

<!-- Content
	================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h3>My Profile</h3>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>My Profile</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="dashboard-list-box margin-top-0">
            <h4 class="gray">Profile Details</h4>
            <div>

                <!-- Profile -->
                <div class="col-lg-4 col-md-12">
                    <!-- Avatar -->
                    <div class="edit-profile-photo">
                        <img src="https://escuelasprivadas.s3.amazonaws.com/images/profile/{{$user->img}}" alt="">
                        <form enctype="multipart/form-data" action="{{ route('pictureprofile')}}" method="POST">
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
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

                                <label>Your Name </label>
                                <input name="name" type="text" value="{{old('name', $user->name)}}" class="form-control"
                                    placeholder="Ingrese tu nombre">

                                <label>Email</label>
                                <input name="email" type="email" value="{{old('email', $user->email)}}"
                                    class="form-control">

                                <label>Phone</label>
                                <input name="telephone" type="number" value="{{old('telephone', $user->telephone)}}"
                                    class="form-control">

                                <label>Notes</label>
                                <textarea name="biografy"
                                    id="biografy">{{Request::old('biografy', $user->biografy)}}</textarea>

                        </div>

                        <button class="button margin-top-15">Save Changes</button>
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
                <h4 class="gray">Change Password</h4>
                <div class="dashboard-list-box-static">

                    <!-- Change Password -->
                    <div class="my-profile">
                        <label class="margin-top-0">Current Password</label>
                        <input type="password">

                        <label>New Password</label>
                        <input type="password">

                        <label>Confirm New Password</label>
                        <input type="password">

                        <button class="button margin-top-15">Change Password</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">Desactivar cuenta</h4>
                <div class="dashboard-list-box-static">
                    <p>Si desactiva su cuenta, ya no estará disponible. No podrá iniciar sesión y acceder a su perfil.
                        Todas las opiniones, fotos y consejos que ha proporcionado específicamente aparecieron en el
                        sitio web.</p>
                    <!-- Change Password -->

                    <form action="{{ route('profile.delete', $user->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Delete" />
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- Content / End -->
@endsection
