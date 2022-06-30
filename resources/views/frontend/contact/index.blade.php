@extends('layouts.frontendNav')
@section('content')
    <div class="row">

        <div class="col-md-8 offset-md-2">
            <div class="text-center">
                @if(session('contact_message'))
                    <div class="alert alert-info alert-dismissible">
                        <a href="{{route('contact.index')}}" class="btn-close" data-dismiss="alert" aria-label="close"></a>
                        <strong>Info!</strong>  {{session('contact_message')}}
                    </div>
                @endif
                <h1 class="my-md-4">Contact</h1>
                <img class="img-fluid" src="{{asset('img/contact/contact-foto.jpg')}}" alt="">
            </div>

            <!--Start form mail-->
            <div class="row my-2 mx-auto shadow">
                @include('includes.form_error')
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div>
                        <h2 class="my-md-5 fw-bold text-center">Mail ons met jou vragen</h2>
                    </div>
                    <div class="my-1 d-md-flex justify-content-between">
                        <div class="col-md-6 pe-md-2">
                            <label for="contact_voornaam" class="form-label">Uw voornaam</label>
                            <input type="text" name="first_name" class="form-control" id="contact_voornaam"
                                   placeholder="Voornaam" required>
                        </div>
                        <div class="col-md-6 ps-md-2">
                            <label for="contact_achternaam" class="form-label">Uw achternaam</label>
                            <input type="text" name="last_name" class="form-control" id="contact_achternaam"
                                   placeholder="Achternaam" required>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="contact_email" class="form-label">Uw e-mail address</label>
                        <input type="email" name="email" class="form-control" id="contact_email" placeholder="E-mail" required>
                    </div>
                    <div class="my-3">
                        <label for="contact_telefoonnummer" class="form-label">Uw telefoon of Gsm nummer</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+32</span>
                            <input type="tel"
                                   required
                                   class="form-control"
                                   name="phone"
                                   id="contact_telefoonnummer"
                                   placeholder="Telefoon of Gsm">

                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="contact_bericht" class="form-label">Uw bericht</label>
                        <textarea class="form-control" name="description" id="contact_bericht" rows="8" required></textarea>
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">Verzenden</button>

                    </div>
                </form>
            </div>
            <!--Einde form mail-->

            <div class="row my-5">
                <div class="col-lg-6 offset-lg-3 col-sm-8 offset-sm-2">
                    <h2 class="text-center">Contact Gegevens</h2>
                    <div class="fs-2">
                        <p class="">Adres:<span class="text-gradient"> Kunstenstraat 13</span></p>
                        <p>Gemeente:<span class="text-gradient"> Menen</span></p>
                        <p>Land:<span class="text-gradient"> Belgie</span></p>
                        <p>Tel:<span class="text-gradient"> <a href="tel:+0494754693"> +32494754693</a></span></p>
                        <p>E-mail:<span class="text-gradient"> <a href="mailto:lebontje45@hotmail.com"> lebontje45@hotmail.com</a></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-md-5 shadow">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2521.807360950329!2d3.1137010156910105!3d50.79767857952479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c32dfdeb23603b%3A0x46b97aae499444d2!2sKunstenstraat%2013%2C%208930%20Menen!5e0!3m2!1sen!2sbe!4v1655108146126!5m2!1sen!2sbe"
                onload="this.width=screen.width;" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>



@endsection
