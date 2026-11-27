@extends('landing.layouts.landing')
@section('title', 'Home')

@section('header')
    <h1>Viajes Dennis</h1>
@endsection

@section('content')
    <div class="cover">
        <img src="{{ asset('assets/images/portada.png') }}" alt="Portada">
    </div>
@endsection