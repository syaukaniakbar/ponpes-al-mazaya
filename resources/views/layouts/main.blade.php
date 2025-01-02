<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ponpes-Al-Mazaya')</title>

    @vite('resources/css/app.css')
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script src="//unpkg.com/alpinejs" defer></script>
        <style>
            /* Gaya untuk teks tebal */
            b, strong {
                font-weight: bold;
                color: #333; /* Warna teks */
            }

            /* Gaya untuk daftar terurut (ol) */
            ol {
                margin: 1rem 0; /* Margin atas dan bawah */
                padding-left: 1.5rem; /* Padding kiri untuk indentasi */
                list-style-type: decimal; /* Tipe daftar */
            }

            /* Gaya untuk item daftar (li) */
            li {
                margin-bottom: 0.5rem; /* Jarak antar item */
                line-height: 1.5; /* Tinggi baris */
            }

            /* Gaya untuk h2 */
            h2 {
                font-size: 1.5rem; /* Ukuran font */
                font-weight: bold; /* Ketebalan font */
                margin: 1.5rem 0; /* Margin atas dan bawah */
                padding-bottom: 0.5rem; /* Padding bawah */
            }

            /* Gaya untuk h3 */
            h3 {
                font-size: 1.25rem; /* Ukuran font */
                font-weight: bold; /* Ketebalan font */
                margin: 1.25rem 0; /* Margin atas dan bawah */
                padding-bottom: 0.25rem; /* Padding bawah */
            }
        </style>
        
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