<!doctype html>
<html>

<hea>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ponpes-Al-Mazaya')</title>
    @vite('resources/css/app.css')
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    </head>

    <body class="overflow-x-hidden">
        <!-- navbar -->
        <header>
            @include('layouts.navbar') <!-- Komponen reusable -->
        </header>
        <!-- main -->
        <main>
            {{ $slot }}<!-- Tempat konten dari child view -->
        </main>
        <!-- footer -->
        <footer>
            @include('layouts.footer') <!-- Komponen reusable -->
        </footer>






</html>