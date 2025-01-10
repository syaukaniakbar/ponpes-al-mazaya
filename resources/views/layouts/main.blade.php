<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ponpes-Al-Mazaya')</title>

    <link rel="icon" href="{{ asset('images/logo-only.ico') }}" type="image/x-icon">

    @vite('resources/css/app.css')
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script src="//unpkg.com/alpinejs" defer></script>
        <style>
            p {
                margin: 1rem 0; /* Jarak antar paragraf */
                line-height: 1.8; /* Keterbacaan optimal */
                font-size: 1rem; /* Ukuran font standar */
            }

            /* Gaya untuk heading utama */
            h1 {
                font-size: 2rem; /* Heading utama besar */
                font-weight: bold; /* Ketebalan font */
                margin-bottom: 1rem;
                line-height: 1.3;
            }

            /* Gaya untuk heading kedua */
            h2 {
                font-size: 1.5rem;
                font-weight: bold;
                margin: 1.5rem 0 1rem;
                padding-bottom: 0.5rem;
            }

            /* Gaya untuk heading ketiga */
            h3 {
                font-size: 1.25rem;
                font-weight: bold;
                margin: 1.25rem 0 0.75rem;
            }

            /* Gaya untuk teks tebal */
            b, strong {
                font-weight: bold;
            }

            /* Gaya untuk link */
            a {
                text-decoration: none; /* Hapus garis bawah default */
                font-weight: 500;
            }
         
            /* Gaya untuk tabel */
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 1.5rem 0;
                font-size: 0.9rem;
            }
            table th,
            table td {
                padding: 0.75rem;
                text-align: left;
                border: 1px solid #e5e5e5; /* Garis pemisah */
            }
            table th {
                background: #f0f0f0; /* Warna latar untuk heading */
                font-weight: bold;
            }

            /* Responsif */
            @media (max-width: 768px) {
                .article-container {
                    padding: 1rem; /* Kurangi padding di layar kecil */
                }
                h1 {
                    font-size: 1.75rem;
                }
                h2 {
                    font-size: 1.25rem;
                }
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