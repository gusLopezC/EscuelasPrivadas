
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
                                    <input type="text" name="state" id="state" class="form-control"
                                        placeholder="Select Location" value="{{old('state') }}" readonly required>
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
