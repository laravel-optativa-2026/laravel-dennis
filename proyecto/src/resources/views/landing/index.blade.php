@extends('landing.layouts.landing')
@section('title', 'Sobre nosotros')
@section('header')
    <h1>Sobre nosotros</h1>
@endsection
@section('content')
    <p>Información sobre nuestra empresa.</p>
@endsection
<x-alert type="success" title="¡Listo!" class="mb-4">
  Los cambios se guardaron correctamente.
  <x-slot:actions>
    <a href="{{ route('items.index') }}" class="underline">Volver</a>
  </x-slot:actions>
</x-alert>