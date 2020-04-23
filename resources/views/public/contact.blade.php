@extends('layaout.header')
@section('contenido')
<!-- Container / Start -->

<div class="container">

    <div class="row">
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <!-- Contact Details -->
        <div class="col-md-4">

            <h4 class="headline margin-bottom-30">{{ trans('Contact.AtenciónCliente') }}</h4>

            <!-- Contact Details -->
            <div class="sidebar-textbox">
                <p>{{ trans('Contact.AtenciónClienteText') }}</p>

                <ul class="contact-details">
                    <li><i class="im im-icon-Phone-2"></i> <strong>{{ trans('Contact.Phone') }}:</strong> <span>(123) 123-456 </span></li>
                    <li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a
                                href="#">www.example.com</a></span></li>
                    <li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a
                                href="#">office@example.com</a></span></li>
                </ul>
            </div>

        </div>

        <!-- Contact Form -->
        <div class="col-md-8">

            <section id="contact">
                <h4 class="headline margin-bottom-35">{{ trans('Contact.Contactanos') }}</h4>

                <div id="contact-message"></div>

                <form method="POST" action="{{ route('contactSend')}}" name="contactform" id="contactform"
                    autocomplete="on">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <input name="name" type="text" id="name" placeholder="{{ __("Contact.Name")}}" required="required" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <input name="email" type="email" id="email" placeholder="{{ __("Contact.Email")}}"
                                    pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                                    required="required" />
                            </div>
                        </div>
                    </div>


                    <div>
                        <textarea name="comments" cols="40" rows="3" id="comments" placeholder="{{ __("Contact.Message")}}"
                            spellcheck="true" required="required"></textarea>
                    </div>

                    <input type="submit" class="submit button" id="submit" value="{{ __("Contact.Enviar")}}" />

                </form>
            </section>
        </div>
        <!-- Contact Form / End -->

    </div>

</div>
<!-- Container / End -->

<div style="margin-bottom: 10%;"></div>
@endsection
