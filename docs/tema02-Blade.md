# Tema 02: Blade

| | |
|---|---|
| **Fecha de inicio** | 23/11/2026 |
| **Fecha de fin** | 30/11/2026 |
| **Tiempo dedicado** | 5 horas |
| **Rama de Git** | `tema02` |

---

## 1. 🎯 Objetivo del tema

<!-- Explica con TUS palabras qué había que conseguir en este tema (2-4 líneas).
     No copies el enunciado. -->
Aprender que es Blade, para que sirve y como utilizarlo, asi como saber crear layouts y utilizar sus componentes.
---

## 2. 🛠️ Desarrollo paso a paso

<!-- Un apartado por cada paso importante. Para cada uno:
     - Qué haces y POR QUÉ.
     - El comando o el código, en un bloque de código (nunca como captura).
     - Una captura solo si aporta algo visual (navegador, resultado, estructura...). -->

### 2.1 Creacion de paginas html

Creo las paginas en su respectiva carpeta "resources/views/landings" para poder visualizarlas y saber que funcionan

Fragmento de código relevante (indica el archivo):

```html
//index.blade.php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>    
</head>
<body>
    <header>
        <h1>Bienvenido a nuestra web</h1>
    </header>

    <main>
        <p>Esta es la página de inicio.</p>
    </main>

    <footer>
        <p>Pie de página &copy; 2025</p>
    </footer>
</body>
</html>
```

```html
//about.blade.php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sobre nosotros</title>
</head>
<body>
    <header>
        <h1>Sobre nosotros</h1>
    </header>

    <main>
        <p>Información sobre nuestra empresa.</p>
    </main>

    <footer>
        <p>Pie de página &copy; 2025</p>
    </footer>
</body>
</html>
```

![Descripción de la captura](img/temaXX/01-descripcion.png)

### 2.2 Creación de un Layout base

... Creacion de Layouts, junto a su blade.php correspondiente

```html
//landing.blade.php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <header>
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Pie de página &copy; 2025</p>
    </footer>
</body>
</html>
```

Y para mostrar la vista 

```html
//index.blade.php
@extends('landing.layouts.landing')
@section('title', 'Inicio')
@section('header')
    <h1>Bienvenido a nuestra web</h1>
@endsection
@section('content')
    <p>Esta es la página de inicio.</p>
@endsection
```
---

### 2.3 Añadir un menú de navegación

... Añadimos al layout el menu de navegacion que vamos a utlizar

```html
<header>
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/about">Sobre nosotros</a></li>
            <li><a href="/services">Servicios</a></li>
            <li><a href="/contact">Contacto</a></li>
        </ul>
    </nav>
    @yield('header')
</header>
```

En caso de querer usar rutas podemos utilizar:

```html
<nav>
    <ul>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li><a href="{{ route('about') }}">Sobre nosotros</a></li>
        <li><a href="{{ route('services') }}">Servicios</a></li>
        <li><a href="{{ route('contact') }}">Contacto</a></li>
    </ul>
</nav>
```

---

### 2.4 Añadir tarjetas

... Añadimos tarjetas que son mejoras para distinguir cada cosa de mejor manera separandola.

```html
//services.blade.php
<div class="card">
    <h2>Servicio 1</h2>
    <p>Descripción breve del servicio 1.</p>
</div>

<div class="card">
    <h2>Servicio 2</h2>
    <p>Descripción breve del servicio 2.</p>
</div>

<div class="card">
    <h2>Servicio 3</h2>
    <p>Descripción breve del servicio 3.</p>
</div>
```

Pero podemos mejorarlo, para ello tendremos que crear un card.blade.php y para usarlo alterar el services.blade.php.

```html
//card.blade.php
<div class="card">
    <h2>{{ $title }}</h2>
    <p>{{ $content }}</p>
</div>
```


```html
//services.blade.php
@extends('landing.layouts.landing')
@section('title', 'Servicios')
@section('header')
    <h1>Servicios</h1>
@endsection
@section('content')
    @component('components.card')
        @slot('title', 'Servicio 1');
        @slot('content')
            <p>Descripción breve del servicio 1.</p>
        @endslot
    @endcomponent
    @component('components.card')
        @slot('title', 'Servicio 2');
        @slot('content')
            <p>Descripción breve del servicio 2.</p>
        @endslot
    @endcomponent
    @component('components.card')
        @slot('title', 'Servicio 3');
        @slot('content')
            <p>Descripción breve del servicio 3.</p>
        @endslot
    @endcomponent
@endsection
```
---

### 2.5 Creacion de estructura para ejercicio.

... Preparamos el terreno alterando el web.php, landing.blade.php, card.blade.php y el nav.blade.php.
Tambien añadimos el footer.blade.php

```php
//web.php
<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing.index')->name('home');
Route::view('/services', 'landing.services')->name('services');
Route::view('/contact', 'landing.contact')->name('contact');
```

```html
//nav.blade.php
<nav>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('services') }}">Services</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</nav>
```

```html
//landing.blade.php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <header>
        @include('_partials.nav')
        @yield('header')
    </header>
    <main>@yield('content')</main>
    @include('_partials.footer')
</body>
</html>
```
```html
//landing.blade.php
@props(['title', 'image', 'price', 'days', 'url'])
<div class="card">
    <h2>{{ $title }}</h2>
    <img src="{{ asset($image) }}" alt="{{ $title }}">
    <p>{{ $price }} € · {{ $days }} días</p>
    <p>{{ $slot }}</p>
    <a href="{{ $url }}" target="_blank">Más información</a>
</div>
```

```html
//footer.blade.php
<footer>
    <p>&copy; {{ date('Y') }} Viajes Dennis. Todos los derechos reservados.</p>
</footer>
```

---

### 2.6 Cambio en archivos blade.php

... Cambiamos el contenido de los archivos que teniamos creados

```html
//index.blade.php
@extends('landing.layouts.landing')
@section('title', 'Home')

@section('header')
    <h1>Viajes Dennis</h1>
@endsection

@section('content')
    <div class="cover">
        <img src="{{ asset('assets/images/portada.jpg') }}" alt="Portada">
    </div>
@endsection
```

```html
//services.blade.php
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
```

```html
//contact.blade.php
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
```

---

## 3. 📋 Resumen de comandos utilizados

| Comando | Para qué sirve |
|---------|----------------|
| `Ninguno` | ... |


---

## 4. 🐞 Problemas encontrados y soluciones

<!-- Documenta TODOS los problemas, aunque te parezcan tontos.
     Copia el error como texto, no como captura.
     Si no has tenido ningún problema, documenta al menos algo que hayas tenido que investigar. -->

### Problema 1: Fallo en algunas paginas a la hora de configurar.

**Qué estaba haciendo:** Configurar el repositorio para poder realizar los ejercicios

**Error:**

```
Undefined variable: content
```

**Causa:** /services (card.blade.php): usa {{ $content }}, pero services.blade.php pasa el texto como slot, así que $content no existe. Usa {{ $slot }}.

**Solución:** Cambiar donde ponia content por el slot


**Fuente:** [ChatGPT y Claude]

## 5. ✅ Resultado final

<!-- Captura(s) de la aplicación funcionando al terminar el tema. -->

![Home](img\tema02\Home_viajes_Dennis.png)
![Services](img\tema02\services_viajes_dennis.png)
![Contact](img\tema02\Contact_viajes_dennis.png)

---

## 6. 💭 Conclusiones

- **Qué he aprendido:** A generar archivos blade y configurarlos
- **Qué me ha costado más:** Cuando se me ha reventado todo y solo funcionaban dos paginas
- **Qué haría diferente / dudas pendientes:** ¿Es necesario crear 10 ficheros diferentes o puedes hacer uno que englobe todo?




