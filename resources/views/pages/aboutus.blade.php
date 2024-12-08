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
                        <a href="#" class="block py-2 px-3" aria-current="page">Beranda</a>
                    </li>
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
        <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
            <img src="{{ asset('images/hero-section-ponpes.png') }}" class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center" alt="Al-Mazaya Logo" />

            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-black bg-opacity-55 -z-10"></div>

            <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center text-center">
                <!-- Lapisan gelap semi-transparan untuk kontras -->
                <div class="mx-auto max-w-2xl">
                    <h2 class="text-5xl font-semibold tracking-tight text-zinc-50 sm:text-7xl">Tentang Al-Mazaya</h2>
                    <p class="mt-8 text-pretty text-lg font-light text-zinc-50 sm:text-xl/8"> Ponpes Al-Mazaya adalah lembaga pendidikan dengan layanan program Tahfidzul Quran, Madrasah Diniyah Takmiliyah, SMP, dan SMK.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="highlight bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12 my-32">
            <!-- Title Headline -->
            <div class="mr-auto place-self-center lg:col-span-7">
                <h2 class="text-5xl font-bold mb-4">Headline highlighting customer results</h2>
                <p class="text-lg mb-8">Highlight the Unique Selling Proposition (USP) with a short summary of the main feature and how it benefits customers. The idea here is to keep it short and direct. If the visitor wishes to learn more they will hit the button.</p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="text-start  p-4  border-l-4 border-green-500">
                        <p class="font-bold mb-2 text-5xl">527</p>
                        <p>Jumlah siswa</p>
                    </div>
                    <div class="text-start  p-4  border-l-4 border-green-500">
                        <p class="font-bold mb-2 text-5xl">4236</p>
                        <p>Jumlah alumni</p>
                    </div>
                </div>
            </div>

            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex pl-14">
                <img src="{{ asset('images/ponpes-headline.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-lg lg:max-w-xl">
            </div>
        </div>
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