<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Official Website Pondok Pesantren Al-Mazaya</title>
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
                class="w-full md:block md:w-auto px-1 !important"
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
    <!-- Hero section -->
    <section class="hero-section py-20 bg-green-800 text-white">
        <div class="grid max-w-screen-xl px-0 py-0 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <div class="flex items-center justify-left">
                    <p class="max-w-2xl mb-2 font-light border rounded-2xl border-white px-2 py-2 lg:mb-2 md:text-lg lg:text-xl">Pendaftaran Dibuka</p>
                </div>
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-white">Selamat Datang di Pondok Pesantren Al Mazaya</h1>
                <p class="max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl">Membentuk generasi Muslim yang berilmu, berakhlak mulia, dan siap menghadapi tantangan global.</p>
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center border rounded-lg bg-white text-black hover:text-white hover:bg-green-600">
                    Daftar Sekarang
                </a>
            </div>

            <!-- <div class="hidden lg:mt-4 lg:col-span-5 lg:flex">
                <img src="{{ asset('images/school.png') }}"
                    alt="ponpes-al-mazaya-highlight"
                    class="w-full max-w-md absolute right-0 pt-">
            </div> -->
        </div>
    </section>
    <!-- End hero section -->

    <!-- Headline customer section -->
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

    <!-- Guru dan staff -->
    <section class="staff bg-green-800">
        <div class="grid max-w-screen-xl px-4 py-16 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 my-32">
            <!-- Title Guru dan staff -->
            <div class="mr-auto place-self-center lg:col-span-12 text-center">
                <h2 class="text-3xl font-bold mb-4 text-white">Guru dan Staff Al Mazaya</h2>
                <p class="text-sm mb-8 text-white">
                    Highlight the Unique Selling Proposition (USP) with a short summary of the main feature and how it benefits customers. The idea here is to keep it short and direct. If the visitor wishes to learn more they will hit the button.
                </p>
            </div>

            <!-- Cards Guru -->
            <div class="lg:col-span-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 justify-center">

                    <div class="text-start bg-gray-200 p-8 rounded-lg shadow-md">
                        <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md mb-6">
                        <div class="border-white p-2 rounded-lg bg-white">
                            <h3 class="text-xl font-bold mb-2">Alifudin Rahman</h3>
                            <p>Guru Tajwid</p>
                        </div>
                    </div>

                    <div class="text-start bg-gray-200 p-8 rounded-lg shadow-md">
                        <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md mb-6">
                        <div class="border border-white p-2 rounded-lg bg-white">
                            <h3 class="text-xl font-bold mb-2">Alifudin Rahman</h3>
                            <p>Guru Fiqih</p>
                        </div>
                    </div>

                    <div class="text-start bg-gray-200 p-8 rounded-lg shadow-md">
                        <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md mb-6">
                        <div class="border border-white p-2 rounded-lg bg-white">
                            <h3 class="text-xl font-bold mb-2">Alifudin Rahman</h3>
                            <p>Guru Akidah</p>
                        </div>
                    </div>

                    <div class="text-start bg-gray-200 p-8 rounded-lg shadow-md">
                        <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md mb-6">
                        <div class="border-white p-2 rounded-lg bg-white">
                            <h3 class="text-xl font-bold mb-2">Alifudin Rahman</h3>
                            <p>Guru Akhlak</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End section guru dan staff -->
    <!-- Berita al-mazaya -->
    <section class="news">
        <div class="flex flex-col justify-center items-center max-w-screen-xl px-4 py-8 mx-auto text-center">
            <!-- Kolom Teks -->
            <div class="lg:w-3/4">
                <h2 class="text-3xl font-bold mb-4 text-black">Berita Al Mazaya</h2>
                <p class="text-lg mb-8 text-black">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio corporis, molestiae in aperiam debitis dignissimos excepturi ipsam fuga pariatur sint eum recusandae nesciunt, sequi iure perspiciatis placeat, voluptatem cupiditate.
                </p>
            </div>

            <!-- Card section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full lg:w-3/4">
                <!-- Card 1 -->
                <div class="text-start p-4 rounded-lg">
                    <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md">
                    <h3 class="text-xl font-bold mt-4 mb-2">Al Mazaya mengadakan kurban di lingkungan pondok</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et saepe doloribus veniam.</p>
                </div>
                <!-- Card 2 -->
                <div class="text-start p-4 rounded-lg">
                    <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md">
                    <h3 class="text-xl font-bold mt-4 mb-2">Al Mazaya mengadakan kurban di lingkungan pondok</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et saepe doloribus veniam.</p>
                </div>
                <!-- Card 3 -->
                <div class="text-start p-4 rounded-lg">
                    <img src="{{ asset('images/asset-berita.png') }}" alt="ponpes-al-mazaya-highlight" class="w-full max-w-md rounded-md">
                    <h3 class="text-xl font-bold mt-4 mb-2">Al Mazaya mengadakan kurban di lingkungan pondok</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et saepe doloribus veniam.</p>
                </div>
            </div>
        </div>
        <!-- Tombol Berita Lainnya -->
        <div class="flex justify-center mt-2 mb-10">
            <a href="#" class="inline-block px-6 py-3 text-black font-medium border border-black rounded-lg hover:bg-black hover:text-white transition">
                Berita Lainnya
            </a>
        </div>
        </div>
    </section>
    <!-- End section berita al-mazaya -->

    <!-- section video tentang al-mazaya -->
    <section class="video">
        <div class="flex flex-col justify-center items-center px-0 pt-16 pb-16 mx-auto text-center">
            <h1 class="text-3xl font-bold mb-6 text-black">Video Tentang Al-Mazaya</h1>
            <img src="{{ asset('images/placeholder-img.png') }}" alt="ponpes-al-mazaya-highlight" class="max-w-3xl w-full h-auto rounded-lg shadow-md">
        </div>
    </section>
    <!-- End section video tentang al-mazaya -->

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
                        <li><a href="#" class="hover:text-gray-300">Tentang Al-Mazaya</a></li>
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