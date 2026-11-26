@props(['title', 'image', 'price', 'days', 'url'])
<div class="card">
    <h2>{{ $title }}</h2>
    <img src="{{ asset($image) }}" alt="{{ $title }}">
    <p>{{ $price }} € · {{ $days }} días</p>
    <p>{{ $slot }}</p>
    <a href="{{ $url }}" target="_blank">Más información</a>
</div>