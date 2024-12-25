<x-main-layout>
    @section('title', 'Post | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    @section('content')

    <body class="bg-white font-family-karla">

        <!-- Text Header -->
        <header class="container w-full mx-auto">
            <div class="flex flex-col items-center py-12">
                <a class="text-5xl font-bold text-gray-800 uppercase hover:text-gray-700" href="#">
                    Al-MAZAYA
                </a>
                <p class="text-lg text-gray-600">
                    Meraih Ilmu, Membentuk Akhlak, Menggapai Ridha Ilahi.
                </p>
            </div>
        </header>

        <div class="flex flex-wrap max-w-screen-xl px-4 py-6 mx-auto">
            <!-- Post Section -->
            <section class="container flex flex-col px-3">
                <article class="flex flex-col my-4">
                    <!-- Article Image -->
                    <div class="flex items-center justify-between py-5">
                        <p class="text-gray-600">Published on {{ $navLink->created_at->translatedFormat('l, d F Y') }}</p>
                    </div>

                    <div class="flex flex-col justify-start py-6 bg-white">
                        <a href="#" class="pb-4 text-3xl font-bold hover:text-gray-700">{{ $navLink->name }}</a>
                        <p href="#" class="pb-8 text-sm">
                        </p>
                        <div class="pb-3">{!! $navLink->content !!}</div>
                    </div>
                </article>
            </section>
        </div>
    </body>


</x-main-layout>