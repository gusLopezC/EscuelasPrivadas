@extends('layaout.headeruser')
@section('title', 'Crear School')
@section('contenido')

<!-- Content
	================================================== -->
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ trans('CreateSchool.Title') }}</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li>Home</li>
                        <li>Dashboard</li>
                        <li>{{ trans('CreateSchool.Title') }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
                <form method="POST" action="{{ route('createschool.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}



                    <!-- Section -->
                    <div class="add-listing-section">
                        @if (count($errors) > 0)
                        <div class="errorformulariomensaje">

                            <strong>Whoops!</strong> Existen algunos problemas con la información proporcionada.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                        @endif
                        @error('name')
                        <p>{{ $message }}</p>
                        @enderror

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> {{ trans('CreateSchool.InformacionBasica') }}</h3>
                        </div>


                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>{{ trans('CreateSchool.NombreEscuela') }}<i class="tip"
                                        data-tip-content="Nombre de tu escuela"></i></h5>
                                <input name="name" id="name" class="search-field" type="text" required
                                    value="{{old('name') }}" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6">
                                <h5>{{ trans('CreateSchool.Categoria') }}</h5>
                                <select class="chosen-select-no-single" name="categoria" id="categoria"
                                    value="{{old('categoria') }}" required>
                                    <option value="" selected disabled>{{ trans('CreateSchool.SeleccionaCategoria') }}
                                    </option>
                                    <option>{{ trans('CreateSchool.Tradicional') }}</option>
                                    <option>{{ trans('CreateSchool.Religiosa') }}</option>
                                    <option>{{ trans('CreateSchool.Montessori') }}</option>
                                    <option>{{ trans('CreateSchool.Tecnólogia') }}</option>
                                    <option>{{ trans('CreateSchool.Bicultural') }}</option>
                                    <option>{{ trans('CreateSchool.Mixtas') }}</option>
                                    <option>{{ trans('CreateSchool.Laicas') }}</option>
                                    <option>{{ trans('CreateSchool.Otras') }}</option>
                                </select>
                            </div>

                            <!-- Type -->
                            <div class="col-md-6">
                                <h5>{{ trans('CreateSchool.NivelesEducativos') }}<i class="tip"
                                        data-tip-content="Maximum of 5 keywords related with your business"></i></h5>
                                <select data-placeholder="Select Multiple Items" class="chosen-select" multiple
                                    name="niveleducativo[]" id="niveleducativo" required>
                                    <option value="guarderia">{{ trans('CreateSchool.Guarderia') }}</option>
                                    <option value="preescolar">{{ trans('CreateSchool.Pre-escolar') }}</option>
                                    <option value="primarias">{{ trans('CreateSchool.Primaria') }}</option>
                                    <option value="secundarias">{{ trans('CreateSchool.Secundaria') }}</option>
                                    <option value="preparatorias">{{ trans('CreateSchool.Preparatoria') }}</option>
                                    <option value="universidades">{{ trans('CreateSchool.Universidad') }}</option>
                                    <option value="otras">{{ trans('CreateSchool.Deportes') }}</option>
                                    <option value="otras">{{ trans('CreateSchool.Arte') }}</option>
                                    <option value="otras">{{ trans('CreateSchool.Tecnica') }}</option>
                                    <option value="otras">{{ trans('CreateSchool.Idiomas') }}</option>
                                </select>
                            </div>

                        </div>
                        <!-- Row / End -->


                    </div>
                    <!-- Section / End -->


                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i>{{ trans('CreateSchool.Locación') }} </h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">


                                <!-- Address -->
                                <div class="col-md-12">
                                    <h5>{{ trans('CreateSchool.Dirección') }}</h5>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Select Location" value="{{old('address') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ trans('CreateSchool.Ciudad') }}</h5>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control"
                                        placeholder="Select Location" value="{{old('ciudad') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ trans('CreateSchool.Estado') }}</h5>
                                    <input type="text" name="state" id="state" class="form-control"
                                        placeholder="Select Location" value="{{old('state') }}" required>
                                </div>

                                <div class="col-md-4">
                                    <h5>{{ trans('CreateSchool.Pais') }}</h5>
                                    <input type="text" name="pais" id="pais" class="form-control"
                                        placeholder="Select Location" value="{{old('pais') }}" required>
                                </div>

                                <div style="display:none">
                                    <input type="hidden" name="latitude" id="latitude" class="form-control"
                                        value="{{old('pais') }}" readonly required>
                                    <input type="hidden" name="longitude" id="longitude" class="form-control"
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
                            <h3><i class="sl sl-icon-picture"></i> {{ trans('CreateSchool.Galeria') }}</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="add-review-photos margin-bottom-30" style="margin-top: 30px;">
                                    <div class="photoUpload">
                                        <span><i class="sl sl-icon-arrow-up-circle"></i>
                                            {{ trans('CreateSchool.CargarPhotos') }}</span>
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
                            <h3><i class="sl sl-icon-docs"></i> {{ trans('CreateSchool.Detalles') }}</h3>
                        </div>

                        <!-- Description -->
                        <div class="form">
                            <h5>{{ trans('CreateSchool.Descripción') }}</h5>
                            <textarea class="WYSIWYG" name="description" id="description" spellcheck="true"
                                value="{{old('description') }}" required></textarea>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5>{{ trans('CreateSchool.Telefono') }} </h5>
                                <input type="text" name="phone" id="phone" value="{{old('phone') }}" required>
                            </div>

                            <!-- Website -->
                            <div class="col-md-4">
                                <h5>{{ trans('CreateSchool.Website') }} <span>(optional)</span></h5>
                                <input type="text" name="website" id="website" value="{{old('website') }}">
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-4">
                                <h5>{{ trans('CreateSchool.Website') }}</h5>
                                <input type="email" name="emailcontacto" id="emailcontacto"
                                    value="{{old('emailcontacto') }}" required>
                            </div>

                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook
                                    <span>({{ trans('CreateSchool.optional') }})</span>
                                </h5>
                                <input type="text" name="redsocial[]" id="redsocial">
                            </div>
                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5 class="twitter-input"><i class="fa fa-twitter-square"></i> Twitter
                                    <span>({{ trans('CreateSchool.optional') }})</span>
                                </h5>
                                <input type="text" name="redsocial[]" id="redsocial">
                            </div>
                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5 class="gplus-input"><i class="fa fa-instagram"></i> Instagram
                                    <span>({{ trans('CreateSchool.optional') }})</span>
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
                            <h3><i class="sl sl-icon-docs"></i>{{ trans('CreateSchool.Servicios') }} </h3>
                        </div>
                        <!-- Checkboxes -->
                        <div class="checkboxes in-row margin-bottom-20">

                            <input id="check-a" type="checkbox" name="services[]" value="1">
                            <label for="check-a">{{ trans('CreateSchool.Services1') }}</label>

                            <input id="check-b" type="checkbox" name="services[]" value="2">
                            <label for="check-b">{{ trans('CreateSchool.Services2') }}</label>

                            <input id="check-c" type="checkbox" name="services[]" value="3">
                            <label for="check-c">{{ trans('CreateSchool.Services3') }}</label>

                            <input id="check-d" type="checkbox" name="services[]" value="4">
                            <label for="check-d">{{ trans('CreateSchool.Services4') }}</label>

                            <input id="check-e" type="checkbox" name="services[]" value="5">
                            <label for="check-e">{{ trans('CreateSchool.Services5') }}</label>

                            <input id="check-f" type="checkbox" name="services[]" value="6">
                            <label for="check-f">{{ trans('CreateSchool.Services6') }}</label>

                            <input id="check-g" type="checkbox" name="services[]" value="7">
                            <label for="check-g">{{ trans('CreateSchool.Services7') }}</label>

                            <input id="check-h" type="checkbox" name="services[]" value="8">
                            <label for="check-h">{{ trans('CreateSchool.Services8') }}</label>

                            <input id="check-i" type="checkbox" name="services[]" value="9">
                            <label for="check-i">{{ trans('CreateSchool.Services9') }}</label>

                            <input id="check-j" type="checkbox" name="services[]" value="10">
                            <label for="check-j">{{ trans('CreateSchool.Services10') }}</label>

                        </div>
                        <!-- Checkboxes / End -->

                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-book-open"></i>{{ trans('CreateSchool.Precios') }} </h3>
                            <!-- Switcher -->
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="pricing-list-container">
                                    <tr class="pricing-list-item pattern">
                                        <td>
                                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                            <div class="fm-input pricing-name"><input type="text" name="pricetitle[]"
                                                    placeholder="Title" required /></div>

                                            <div class="fm-input pricing-price"><input type="text" name="price[]"
                                                    placeholder="Price" data-unit="MXN" required /></div>
                                            <div class="fm-close"><a class="delete" href="#"><i
                                                        class="fa fa-remove"></i></a></div>
                                        </td>
                                    </tr>
                                </table>
                                <a href="#" class="button add-pricing-list-item">{{ trans('CreateSchool.AddItem') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- Section / End -->


                    <button class="button preview" type="submit" style="width:100%">{{ trans('CreateSchool.Enviar') }} <i
                            class="fa fa-arrow-circle-right"></i></button>

                </form>

            </div>
        </div>
    </div>
    <div style="margin-bottom:15%"></div>

</div>
<!-- Content / End -->
@endsection

@push('styles')

@endpush
@push('scripts')


<script src="https://maps.google.com/maps/api/js?key=AIzaSyAioR39TAyFp6nIBvQGDdcl0Q10TaoMXjw&libraries=places"
    type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript" src="../../scripts/jquery-ui.min.js"></script>


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
