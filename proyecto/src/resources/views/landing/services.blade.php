@extends('landing.layouts.landing')
@section('title', 'Services')

@section('header')
    <h1>Nuestros destinos</h1>
@endsection

@section('content')
    <div class="grid">
        <x-card title="París" image="assets/images/paris.jpg" price="499" days="5"
                url="https://es.wikipedia.org/wiki/Par%C3%ADs">
            La ciudad del amor, la Torre Eiffel y el Louvre.
        </x-card>

        <x-card title="Roma" image="assets/images/roma.jpg" price="429" days="4"
                url="https://es.wikipedia.org/wiki/Roma">
            Historia viva: Coliseo, Vaticano y Fontana di Trevi.
        </x-card>

        <x-card title="Londres" image="assets/images/londres.jpg" price="549" days="6"
                url="https://es.wikipedia.org/wiki/Londres">
            Museos, parques y el Big Ben junto al Támesis.
        </x-card>
    </div>
@endsection