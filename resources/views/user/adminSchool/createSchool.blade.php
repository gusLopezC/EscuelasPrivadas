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

    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
                <form method="POST"  action="{{ route('createschool.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

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

                            @endif
                        </div>
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                        </div>


                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Nombre Escuela <i class="tip" data-tip-content="Nombre de tu escuela"></i></h5>
                                <input name="name" id="name" class="search-field" type="text" required
                                    value="{{old('name') }}" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6">
                                <h5>Category</h5>
                                <select class="chosen-select-no-single" name="categoria" id="categoria"
                                    value="{{old('categoria') }}" required>
                                    <option label="blank">Selecciona Categoria</option>
                                    <option>Tradicional</option>
                                    <option>Religiosa</option>
                                    <option>Montessori</option>
                                    <option>Tecnólogia</option>
                                    <option>Bicultural</option>
                                    <option>Mixtas</option>
                                    <option>Laicas</option>
                                    <option>Otras</option>
                                </select>
                            </div>

                            <!-- Type -->
                            <div class="col-md-6">
                                <h5>Niveles educativos <i class="tip"
                                        data-tip-content="Maximum of 5 keywords related with your business"></i></h5>
                                <select data-placeholder="Select Multiple Items" class="chosen-select" multiple
                                    name="niveleducativo[]" id="niveleducativo" required>
                                    <option value="guarderia">Guarderia</option>
                                    <option value="preescolar">Pree-escolar</option>
                                    <option value="primarias">Primaria</option>
                                    <option value="secundarias">Secundaria</option>
                                    <option value="preparatorias">Preparatoria</option>
                                    <option value="universidades">Universidad</option>
                                    <option value="otras">Deportes</option>
                                    <option value="otras">Arte</option>
                                    <option value="otras">Tecnica</option>
                                    <option value="otras">Idiomas</option>
                                </select>
                            </div>

                        </div>
                        <!-- Row / End -->
                        <button class="button preview" type="submit">Enviar <i
                            class="fa fa-arrow-circle-right"></i></button>

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
                                        placeholder="Select Location" value="{{old('address') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <h5>Ciudad</h5>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control"
                                        placeholder="Select Location" value="{{old('ciudad') }}" readonly required>
                                </div>
                                <div class="col-md-4">
                                    <h5>Estado</h5>
                                    <input type="text" name="estado" id="estado" class="form-control"
                                        placeholder="Select Location" value="{{old('estado') }}" readonly required>
                                </div>

                                <div class="col-md-4">
                                    <h5>Pais</h5>
                                    <input type="text" name="pais" id="pais" class="form-control"
                                        placeholder="Select Location" value="{{old('pais') }}" readonly required>
                                </div>

                                <div style="display:none">
                                    <input type="text" name="latitude" id="latitude" class="form-control"
                                        value="{{old('pais') }}" readonly required>
                                    <input type="text" name="longitude" id="longitude" class="form-control"
                                        value="{{old('pais') }}" readonly required>

                                </div>

                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->


                    <!-- Section -->
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
                                        <input type='file' name="image[]" id="image[]" accept=".png, .jpg, .jpeg"
                                            multiple="" class="upload">
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- Section / End -->


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
                                value="{{old('description') }}" required></textarea>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5>Phone </h5>
                                <input type="text" name="phone" id="phone" value="{{old('phone') }}" required>
                            </div>

                            <!-- Website -->
                            <div class="col-md-4">
                                <h5>Website <span>(optional)</span></h5>
                                <input type="text" name="website" id="website" value="{{old('website') }}">
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-4">
                                <h5>E-mail</h5>
                                <input type="text" name="emailcontacto" id="emailcontacto" value="{{old('emailcontacto') }}"
                                    required>
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
                                <input type="text" name="redsocial[]" id="redsocial">
                            </div>
                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5 class="twitter-input"><i class="fa fa-twitter-square"></i> Twitter
                                    <span>(optional)</span>
                                </h5>
                                <input type="text" name="redsocial[]" id="redsocial">
                            </div>
                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5 class="gplus-input"><i class="fa fa-instagram"></i> Instagram
                                    <span>(optional)</span>
                                </h5>
                                <input type="text" name="redsocial[]" id="redsocial">
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

                            <input id="check-a" type="checkbox" name="services[]" value="1">
                            <label for="check-a">Horario extendido</label>

                            <input id="check-b" type="checkbox" name="services[]" value="2">
                            <label for="check-b">Extra clases(futbol, basquet, Voleibol, etc)</label>

                            <input id="check-c" type="checkbox" name="services[]" value="3">
                            <label for="check-c">Centro de idiomas</label>

                            <input id="check-d" type="checkbox" name="services[]" value="4">
                            <label for="check-d">Estacionamiento gratuito</label>

                            <input id="check-e" type="checkbox" name="services[]" value="5">
                            <label for="check-e">Internet didactico/ simetrico</label>

                            <input id="check-f" type="checkbox" name="services[]" value="6">
                            <label for="check-f">Proyector por aula</label>

                            <input id="check-g" type="checkbox" name="services[]" value="7">
                            <label for="check-g">Servicios de cafeteria/ Alimentos</label>

                            <input id="check-h" type="checkbox" name="services[]" value="8">
                            <label for="check-h">Aula Maker/ Media Lab</label>

                            <input id="check-i" type="checkbox" name="services[]" value="9">
                            <label for="check-i">Robotica / Programación </label>

                            <input id="check-j" type="checkbox" name="services[]" value="10">
                            <label for="check-j">Otros </label>

                        </div>
                        <!-- Checkboxes / End -->

                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <div class="margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
                            <!-- Switcher -->

                        </div>

                        <!-- Switcher ON-OFF Content -->
                        <div class="switcher-content">

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="pricing-list-container">
                                        <tr class="pricing-list-item pattern">
                                            <td>
                                                <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                <div class="fm-input pricing-name">
                                                    <input type="text" placeholder="Title" name="textprecio[]"
                                                        id="textprecio" />
                                                </div>

                                                <div class="fm-input pricing-price">
                                                    <input type="text" placeholder="Price" name="precio[]" id="precio"
                                                        data-unit="MXN" /></div>
                                                <div class="fm-close"><a class="delete" href="#"><i
                                                            class="fa fa-remove"></i></a></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="#" class="button add-pricing-list-item">Add Item</a>
                                </div>
                            </div>

                        </div>
                        <!-- Switcher ON-OFF Content / End -->

                    </div>
                    <!-- Section / End -->


                    <button class="button preview" type="submit">Enviar <i
                            class="fa fa-arrow-circle-right"></i></button>

                </form>

            </div>
        </div>

    </div>

</div>
<!-- Content / End -->
@endsection

@push('styles')

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
            $('#estado').val(place.address_components['1'].long_name);
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
