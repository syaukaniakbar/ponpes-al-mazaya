<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
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
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <!-- Menu -->
            <div
                :class="{ 'hidden': !open }"
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


    <section class="hero-secction bg-green-800 text-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-white">Selamat Datang di Pondok Pesantren Al Mazaya</h1>
                <p class="max-w-2xl mb-6 font-light  lg:mb-8 md:text-lg lg:text-xl ">Membentuk generasi Muslim yang berilmu, berakhlak mulia, dan siap menghadapi tantangan global.</p>
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center border rounded-lg bg-white text-black hover:text-white hover:bg-green-600 ">
                    Daftar Sekarang
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
            </div>
        </div>
    </section>
    <section class="highlight bg-white">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-4">Headline highlighting customer results</h2>
                <p class="text-lg mb-8">Highlight the Unique Selling Proposition (USP) with a short summary of the main feature and how it benefits customers. The idea here is to keep it short and direct. If the visitor wishes to learn more they will hit the button.</p>  

            </div>

            <div class="grid grid-cols-2 gap-8">
                <div class="text-center bg-green-100 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-2">527</h3>
                    <p>Jumlah siswa</p>
                </div>
                <div class="text-center bg-green-100 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-2">4236</h3>
                    <p>Jumlah alumni</p>
                </div>
            </div>

            <div class="mt-16">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="Image description" class="w-full rounded-lg shadow-md border">
            </div>
        </div>
    </section>

</html>