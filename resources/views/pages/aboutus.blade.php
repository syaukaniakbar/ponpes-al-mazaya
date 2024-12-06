<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="shortcut icon" href="{{ asset('images/logo-only.ico') }}" type="image/x-icon" />
</head>

<body>
    <nav x-data="{ open: false }" class="text-black bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo_al_mazaya.png') }}" class="h-8" alt="Al-Mazaya Logo" />
            </a>

            <!-- Hamburger Button (Mobile Only) -->
            <button
                @click="open = !open"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:ring-2 focus:ring-gray-200 dark:text-gray-400"
                aria-controls="navbar-default"
                :aria-expanded="open">
                <!-- X Icon -->
                <svg x-show="open" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <!-- Hamburger Menu Icon -->
                <svg x-show="!open" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>

            </button>

            <!-- Menu -->
            <div
                x-bind:class="{ 'hidden': !open }"
                class="w-full md:block md:w-auto"
                id="navbar-default"
                x-cloak>
                <ul class="flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="#" class="block py-2 px-3" aria-current="page">Tentang Al-Mazaya</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3">Artikel Berita</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 rounded bg-green-600 text-white">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- isi kodingan section dibawah ini -->
    <section class="aboutus">




    </section>


    <!-- footer -->
    <footer class="bg-green-900 text-white py-8">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Grid untuk Layout Responsif -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo dan Deskripsi -->
                <div>
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/logo_al_mazaya_2.png') }}" class="h-10 mr-3" alt="Al-Mazaya Logo" />
                    </div>
                    <p class="text-sm leading-relaxed">
                        Yayasan pendidikan islam az zaini al azhari paser pondok pesantren
                    </p>
                </div>

                <!-- Halaman -->
                <div>
                    <h2 class="text-lg font-semibold mb-4">Halaman</h2>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-300">Beranda</a></li>
                        <li><a href="#" class="hover:text-gray-300">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-gray-300">Artikel Berita</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h2 class="text-lg font-semibold mb-4">Kontak</h2>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fab fa-instagram mr-2"></i>
                            <a href="#" class="hover:text-gray-300">Instagram</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fab fa-facebook mr-2"></i>
                            <a href="#" class="hover:text-gray-300">Facebook</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fab fa-youtube mr-2"></i>
                            <a href="#" class="hover:text-gray-300">YouTube</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <a href="mailto:almazaya@gmail.com" class="hover:text-gray-300">almazaya@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Garis dan Hak Cipta -->
            <div class="mt-8 border-t border-white/50"></div>
            <p class="text-center text-sm mt-4">
                © 2024 Al Mazaya. All rights reserved.
            </p>
        </div>
    </footer>

</html>