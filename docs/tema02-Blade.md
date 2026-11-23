# Tema 02: Blade

| | |
|---|---|
| **Fecha de inicio** | 23/11/2026 |
| **Fecha de fin** | 30/11/2026 |
| **Tiempo dedicado** | X horas |
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

### 2.2 [Nombre del paso]

...

---

## 3. 📋 Resumen de comandos utilizados

| Comando | Para qué sirve |
|---------|----------------|
| `php artisan ...` | ... |
| `composer ...` | ... |
| `git ...` | ... |

---

## 4. 🐞 Problemas encontrados y soluciones

<!-- Documenta TODOS los problemas, aunque te parezcan tontos.
     Copia el error como texto, no como captura.
     Si no has tenido ningún problema, documenta al menos algo que hayas tenido que investigar. -->

### Problema 1: [Descripción corta]

**Qué estaba haciendo:** ...

**Error:**

```
Pega aquí el mensaje de error completo
```

**Causa:** por qué ocurría (lo que has entendido, no solo lo que has hecho).

**Solución:**

```bash
comando o cambio que lo resolvió
```

**Fuente:** [enlace a la documentación, foro, vídeo...](https://)

### Problema 2: [Descripción corta]

...

---

## 5. ✅ Resultado final

<!-- Captura(s) de la aplicación funcionando al terminar el tema. -->

![Resultado final del tema](img/temaXX/99-resultado-final.png)

---

## 6. 💭 Conclusiones

- **Qué he aprendido:** ...
- **Qué me ha costado más:** ...
- **Qué haría diferente / dudas pendientes:** ...


Problemas para luego
/ (index.blade.php): al final tiene un <x-alert> con route('items.index'), que no existe en web.php. Lanza RouteNotFoundException. Borra ese bloque. Además es copia de about: cambia el título y el contenido.
/services (card.blade.php): usa {{ $content }}, pero services.blade.php pasa el texto como slot, así que $content no existe. Usa {{ $slot }}.
landing.blade.php: el <link> está antes de <html>. Muévelo dentro de <head>.
Ubicación de ficheros: las vistas deben estar en resources/views/landing/index.blade.php, resources/views/landing/layouts/landing.blade.php, resources/views/_partials/nav.blade.php y resources/views/components/card.blade.php. El CSS y las imágenes deben estar en public/assets/....