@extends('layaout.headeruser')
@section('contenido')
<div class="dashboard-content">
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Editar Reviews</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Reviews</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">


        <!-- Add Review Box -->
        <div id="add-review" class="add-review-box">

            <!-- Add Review -->
            <h3 class="listing-desc-headline margin-bottom-20">Editar Review</h3>
            <!-- Review Comment -->
            <form method="POST" action="{{ route('reviews.update',$comentario)}}" enctype="multipart/form-data">
                {{ csrf_field()}} {{ method_field('PUT') }}

                <span class="leave-rating-title">Your rating for this listing</span>

                <!-- Rating / Upload Button -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Leave Rating -->
                        <div class="clearfix"></div>
                        <div class="leave-rating margin-bottom-30">
                            <select class="chosen-select-no-single" name="calification" id="calification" required
                                style="width: 150%; !important">
                                <option value="5"
                                    {{old('calification',$comentario->calification) == 5 ? 'selected' : ''}}>
                                    Excelente</option>
                                <option value="4"
                                    {{old('calification',$comentario->calification) == 4 ? 'selected' : ''}}>
                                    Bueno</option>
                                <option value="3"
                                    {{old('calification',$comentario->calification) == 3 ? 'selected' : ''}}>
                                    Regular</option>
                                <option value="2"
                                    {{old('calification',$comentario->calification) == 2 ? 'selected' : ''}}>
                                    Malo</option>
                                <option value="1"
                                    {{old('calification',$comentario->calification) == 1 ? 'selected' : ''}}>
                                    Pesimo</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-6">
                        <!-- Uplaod Photos -->
                        <div class="add-review-photos margin-bottom-30">
                            <div class="photoUpload">
                                <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
                                <input type='file' name="image[]" id="image[]" accept=".png, .jpg, .jpeg" multiple=""
                                    class="upload">
                            </div>
                        </div>

                    </div>
                </div>


                <fieldset>
                    <input type="text" name="escuela_id" id="escuela_id"
                        value="{{old('escuela_id',$comentario->escuela_id)}}" style="display:none" />
                    <div>
                        <label>Review:</label>
                        <textarea cols="40" rows="3" name="comentario" id="comentario"
                            required>{{Request::old('comentario', $comentario->comentario)}}</textarea>
                    </div>
                </fieldset>
                <button type="submit" class="button">Guardar</button>
            </form>

            <div class="row">

                <div class="col-sm-12">
                    <h3 class="listing-desc-headline margin-bottom-20">Administra tus fotos</h3>
                    <div class="row">
                        @foreach ($comentario->getPhotosComentario as $photo)
                        <div class="col-sm-2">
                            <form method="POST" action="{{ route('reviewsreviewsphoto.delete',$photo)}}">
                                {{ csrf_field() }} {{ method_field('DELETE') }}

                                <button class="button" style="position:absolute"><i class="sl sl-icon-ban"></i></button>
                                <img src="https://escuelasprivadas.s3.amazonaws.com/images/comentarios/{{$photo->photo}}"
                                    class="img-responsive" alt="">
                            </form>
                        </div>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div style="margin-bottom: 10%"></div>
</div>



@endsection
