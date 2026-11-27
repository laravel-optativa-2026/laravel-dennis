@extends('landing.layouts.landing')
@section('title', 'Contact')

@section('header')
    <h1>Contacto</h1>
@endsection

@section('content')
    <div class="contact">
        <img src="{{ asset('assets/images/mapa.png') }}" alt="Mapa de ubicación">

        <ul>
            <li>📞 <a href="tel:+34600123456">+34 600 123 456</a></li>
            <li>✉️ <a href="mailto:info@viajesdennis.com">info@viajesdennis.com</a></li>
            <li>📍 Calle Colón, 25, 46004 Valencia</li>
            <li>🕒 Lunes a viernes, 9:00 - 18:00</li>
        </ul>
    </div>
@endsection