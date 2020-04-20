@extends('layaout.headeruser')
@section('title', 'Edit School')
@section('contenido')
<!-- Content
	================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Listing</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Add Listing</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('school.update',$escuela)}}" enctype="multipart/form-data">
        {{ csrf_field()}} {{ method_field('PUT') }}
        <div class="row">
            <div class="col-lg-12">

                <div id="add-listing">


                    <!-- Section -->
                    <div class="add-listing-section">
                        @if (count($errors) > 0)
                        <div class="errorformulariomensaje">

                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                        @endif
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                        </div>


                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Nombre Escuela <i class="tip" data-tip-content="Nombre de tu escuela"></i></h5>
                                <input name="name" id="name" class="search-field" type="text" required
                                    value="{{old('name', $escuela->name)}}" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6">
                                <h5>Categoria</h5>
                                <select class="chosen-select-no-single" name="categoria" id="categoria"
                                    value="{{old('categoria') }}" required>
                                    <option {{ old('categoria',$escuela->categoria) == '1' ? 'selected' : '' }}
                                        label="blank">Selecciona Categoria</option>
                                    <option
                                        {{ old('categoria',$escuela->categoria) == 'Tradicional' ? 'selected' : '' }}>
                                        Tradicional</option>
                                    <option {{ old('categoria',$escuela->categoria) == 'Religiosa' ? 'selected' : '' }}>
                                        Religiosa</option>
                                    <option
                                        {{ old('categoria',$escuela->categoria) == 'Montessori' ? 'selected' : '' }}>
                                        Montessori</option>
                                    <option
                                        {{ old('categoria',$escuela->categoria) == 'Tecnólogia' ? 'selected' : '' }}>
                                        Tecnólogia</option>
                                    <option
                                        {{ old('categoria',$escuela->categoria) == 'Bicultural' ? 'selected' : '' }}>
                                        Bicultural</option>
                                    <option {{ old('categoria',$escuela->categoria) == 'Mixtas' ? 'selected' : '' }}>
                                        Mixtas</option>
                                    <option {{ old('categoria',$escuela->categoria) == 'Laicas' ? 'selected' : '' }}>
                                        Laicas</option>
                                    <option {{ old('categoria',$escuela->categoria) == 'Otras' ? 'selected' : '' }}>
                                        Otras</option>
                                </select>
                            </div>



                        </div>

                    </div>
                    <!-- Section / End -->


                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> Location</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">


                                <!-- Address -->
                                <div class="col-md-12">
                                    <h5>Address</h5>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Select Location" value="{{old('address',$escuela->address) }}"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <h5>Ciudad</h5>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control"
                                        placeholder="Select Location" value="{{old('ciudad',$escuela->ciudad) }}"
                                        readonly required>
                                </div>
                                <div class="col-md-4">
                                    <h5>Estado</h5>
                                    <input type="text" name="state" id="state" class="form-control"
                                        placeholder="Select Location" value="{{old('state',$escuela->state) }}" readonly
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <h5>Pais</h5>
                                    <input type="text" name="pais" id="pais" class="form-control"
                                        placeholder="Select Location" value="{{old('pais',$escuela->pais) }}" readonly
                                        required>
                                </div>

                                <div style="display:none">
                                    <input type="text" name="latitude" id="latitude"
                                        value="{{old('latitude',$escuela->coordenadasGoogle[0]) }}" class="form-control"
                                        value="{{old('pais') }}" readonly required>
                                    <input type="text" name="longitude" id="longitude"
                                        value="{{old('longitude',$escuela->coordenadasGoogle[1]) }}"
                                        class="form-control" value="{{old('pais') }}" readonly required>

                                </div>

                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                </div>
            </div>
        </div>

        <!-- Section -->
        <div class="add-listing-section margin-top-45">

            <!-- Headline -->
            <div class="add-listing-headline">
                <h3><i class="sl sl-icon-docs"></i> Details</h3>
            </div>

            <!-- Description -->
            <div class="form">
                <h5>Description</h5>
                <textarea class="WYSIWYG" name="description" id="description" spellcheck="true"
                    required>{{Request::old('description', $escuela->description)}}</textarea>
            </div>

            <!-- Row -->
            <div class="row with-forms">

                <!-- Phone -->
                <div class="col-md-4">
                    <h5>Phone </h5>
                    <input type="text" name="phone" id="phone" value="{{old('phone', $escuela->phone) }}" required>
                </div>

                <!-- Website -->
                <div class="col-md-4">
                    <h5>Website <span>(optional)</span></h5>
                    <input type="text" name="website" id="website" value="{{old('website', $escuela->website) }}">
                </div>

                <!-- Email Address -->
                <div class="col-md-4">
                    <h5>E-mail</h5>
                    <input type="text" name="emailcontacto" id="emailcontacto"
                        value="{{old('emailcontacto', $escuela->emailcontacto) }}" required>
                </div>

            </div>
            <!-- Row / End -->


            <!-- Row -->
            <div class="row with-forms">

                <!-- Phone -->
                <div class="col-md-4">
                    <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook
                        <span>(optional)</span>
                    </h5>
                    <input type="text" name="redsocial[]" id="redsocial"
                        value="{{old('redsocial', $escuela->redsocial[0]) }}">
                </div>
                <!-- Phone -->
                <div class="col-md-4">
                    <h5 class="twitter-input"><i class="fa fa-twitter-square"></i> Twitter
                        <span>(optional)</span>
                    </h5>
                    <input type="text" name="redsocial[]" id="redsocial"
                        value="{{old('redsocial', $escuela->redsocial[1]) }}">
                </div>
                <!-- Phone -->
                <div class="col-md-4">
                    <h5 class="gplus-input"><i class="fa fa-instagram"></i> Instagram
                        <span>(optional)</span>
                    </h5>
                    <input type="text" name="redsocial[]" id="redsocial"
                        value="{{old('redsocial', $escuela->redsocial[2]) }}">
                </div>



            </div>
            <!-- Row / End -->
        </div>

        <!-- Section -->
        <div class="add-listing-section margin-top-45">

            <!-- Headline -->
            <div class="add-listing-headline">
                <h3><i class="sl sl-icon-docs"></i> Servicios</h3>
            </div>
            <!-- Checkboxes -->
            <div class="checkboxes in-row margin-bottom-20">

                <input id="check-a" type="checkbox" name="services[]" value="1" @if(in_array(2,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-a">Horario extendido</label>

                <input id="check-b" type="checkbox" name="services[]" value="2" @if(in_array(2,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-b">Extra clases(futbol, basquet, Voleibol, etc)</label>

                <input id="check-c" type="checkbox" name="services[]" value="3" @if(in_array(3,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-c">Centro de idiomas</label>

                <input id="check-d" type="checkbox" name="services[]" value="4" @if(in_array(4,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-d">Estacionamiento gratuito</label>

                <input id="check-e" type="checkbox" name="services[]" value="5" @if(in_array(5,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-e">Internet didactico/ simetrico</label>

                <input id="check-f" type="checkbox" name="services[]" value="6" @if(in_array(6,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-f">Proyector por aula</label>

                <input id="check-g" type="checkbox" name="services[]" value="7" @if(in_array(7,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-g">Servicios de cafeteria/ Alimentos</label>

                <input id="check-h" type="checkbox" name="services[]" value="8" @if(in_array(8,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-h">Aula Maker/ Media Lab</label>

                <input id="check-i" type="checkbox" name="services[]" value="9" @if(in_array(9,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-i">Robotica / Programación </label>

                <input id="check-j" type="checkbox" name="services[]" value="10" @if(in_array(10,
                    old('services',$escuela->services))) checked @endif >
                <label for="check-j">Otros </label>

            </div>
            <!-- Checkboxes / End -->

        </div>
        <!-- Section / End -->

        <div class="add-listing-section margin-top-45">

            <!-- Headline -->
            <div class="add-listing-headline">
                <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="add-review-photos margin-bottom-30" style="margin-top: 30px;">
                        <div class="photoUpload">
                            <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
                            <input type='file' name="image[]" id="image[]" accept=".png, .jpg, .jpeg" multiple=""
                                class="upload">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="button preview" style="width:100%;" type="submit">Enviar <i
                class="fa fa-arrow-circle-right"></i></button>
    </form>
    <div style="margin-bottom:5%"></div>

    <!-- Section -->
    <div class="add-listing-section margin-top-45">

        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class="sl sl-icon-book-open"></i> Administrar Imagenes</h3>
            <!-- Switcher -->

        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    @foreach ($escuela->getPhotos as $photo)
                    <div class="col-sm-2">
                        <form method="POST" action="{{ route('school.photos.destroy',$photo)}}">
                            {{ csrf_field() }} {{ method_field('DELETE') }}

                            <button class="button" style="position:absolute"><i class="fa fa-remove"></i></button>
                            <img src="https://escuelasprivadas.s3.amazonaws.com/images/escuelas/{{$photo->photo}}"
                                class="img-responsive" alt="">
                        </form>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>


    </div>
    <div style="margin-bottom:5%"></div>

    <div class="add-listing-section margin-top-45">

        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class="sl sl-icon-book-open"></i>Gestionar precios</h3>
            <!-- Switcher -->

        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('school.prices.update',$escuela->id)}}">
                    {{ csrf_field()}} {{ method_field('PUT') }}
                <table id="pricing-list-container">
                    @foreach ($Pricing as $precio)
                    <tr class="pricing-list-item pattern">
                        <td>
                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                            <div class="fm-input pricing-name">
                                <input type="text" placeholder="Title" name="textprecio[]" id="textprecio"
                                    value="{{$precio->description}}" required />
                            </div>

                            <div class="fm-input pricing-price">
                                <input type="text" placeholder="Price" name="precio[]" id="precio"
                                    value="{{$precio->precio}}" data-unit="MXN" required />
                            </div>
                            <div class="fm-close"><a class="" href="{{route('school.price.delete',$precio->id)}}"><i class="fa fa-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </table>
                <a href="#" class="button add-pricing-list-item">Add Item</a>
                <br>
                <!-- Checkboxes / End -->
                <button class="button preview" style="width:100%;" type="submit">Enviar <i
                        class="fa fa-arrow-circle-right"></i></button>
            </div>
        </div>
    </form>

    </div>

    <!-- Section / End -->
    <div style="margin-bottom:5%"></div>


    <form method="POST" action="{{ route('school.Nivel.update',$EscuelasNivel)}}">
        {{ csrf_field()}} {{ method_field('PUT') }}

        <!-- Section -->
        <div class="add-listing-section margin-top-45">

            <!-- Headline -->
            <div class="add-listing-headline">
                <h3><i class="sl sl-icon-docs"></i> Editar niveles educativos</h3>
            </div>
            <!-- Checkboxes
             -->
            <div class="checkboxes in-row margin-bottom-20">

                <input id="check-ser-a" type="checkbox" name="guarderia" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->preescolar)) checked @endif>
                <label for="check-ser-a">guarderia</label>

                <input id="check-ser-b" type="checkbox" name="preescolar" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->preescolar)) checked @endif >
                <label for="check-ser-b">Preescolar</label>

                <input id="check-ser-c" type="checkbox" name="primarias" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->primarias)) checked @endif >
                <label for="check-ser-c">primarias</label>

                <input id="check-ser-d" type="checkbox" name="secundarias" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->secundarias)) checked @endif >
                <label for="check-ser-d">Secundarias</label>

                <input id="check-ser-e" type="checkbox" name="preparatorias" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->preparatorias)) checked @endif >
                <label for="check-ser-e">Preparatoria</label>

                <input id="check-ser-f" type="checkbox" name="universidades" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->universidades)) checked @endif >
                <label for="check-ser-f">Universidad</label>

                <input id="check-ser-g" type="checkbox" name="otras" value="1"
                    @if(old('EscuelasNivel',$EscuelasNivel->otras)) checked @endif >
                <label for="check-ser-g">Otros</label>



            </div>
            <!-- Checkboxes / End -->
            <button class="button preview" style="width:100%;" type="submit">Enviar <i
                    class="fa fa-arrow-circle-right"></i></button>
        </div>
        <!-- Section / End -->


    </form>
    <div style="margin-bottom:15%"></div>
</div>

<!-- Content / End -->
@endsection

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('scripts')


<script src="https://maps.google.com/maps/api/js?key=AIzaSyAioR39TAyFp6nIBvQGDdcl0Q10TaoMXjw&libraries=places"
    type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('name');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            console.log(place);
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            $('#address').val(place.formatted_address);
            $('#ciudad').val(place.address_components['0'].long_name);
            $('#state').val(place.address_components['1'].long_name);
            $('#pais').val(place.address_components['2'].long_name);
            $('#phone').val(place.international_phone_number);
            $('#website').val(place.website);


        });
    }
</script>

<script>
    CKEDITOR.replace( 'description' );
</script>

@endpush
