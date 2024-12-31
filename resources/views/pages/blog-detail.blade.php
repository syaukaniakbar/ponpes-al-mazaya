<x-main-layout>
    @section('title', 'Post | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    @section('content')

    <body class="bg-white font-family-karla">

        <!-- Text Header -->
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                    Al-MAZAYA BLOG
                </a>
                <p class="text-lg text-gray-600">
                    Meraih Ilmu, Membentuk Akhlak, Menggapai Ridha Ilahi.
                </p>
            </div>
        </header>

        <!-- Topic Nav -->
        <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
            <div class="block sm:hidden">
                <a
                    href="#"
                    class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                    @click="open = !open">
                    Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
                </a>
            </div>
            <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                    <a href="#" class="hover:bg-green-400 rounded py-2 px-4 mx-2">PRESTASI</a>
                    <a href="#" class="hover:bg-green-400 rounded py-2 px-4 mx-2">UMUM</a>
                    <a href="#" class="hover:bg-green-400 rounded py-2 px-4 mx-2">ILMIAH</a>
                </div>
            </div>
        </nav>
        <div class="container mx-auto flex flex-wrap py-6">
            
            <!-- Post Section -->
            <section class="w-full md:w-2/3 flex flex-col items-center px-3">
                <article class="flex flex-col my-4">
                    <!-- Article Image -->
                    <div class="flex justify-between items-center py-4">
                        <p class="text-gray-600">Published on {{ $blog->created_at->translatedFormat('l, d F Y') }}</p>
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase">ARTIKEL {{ strtoupper($blog->category) }}</a>
                    </div>
                    <div class="relative h-96 w-full overflow-hidden">
                        <img 
                            class="absolute top-0 left-0 w-full h-full object-cover" 
                            src="{{ asset('storage/' . $blog->image_url) }}" 
                            alt="Article Image">
                    </div>
                    <div class="bg-white flex flex-col justify-start py-6">
                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-8">{{ $blog->title }}</a>
                        <p href="#" class="text-sm pb-4">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{ $blog->user->name }}</a>
                        </p>
                        <p class="pb-3">{!! $blog->description !!}</p>
                    </div>
                </article>
                <div class="w-full flex pt-6">
                    @if ($previousBlog)
                    <a href="{{ route('blog.show', $previousBlog->slug) }}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center">
                            <i class="fas fa-arrow-left pr-1"></i> Previous
                        </p>
                        <p class="pt-2">{{ $previousBlog->title }}</p>
                    </a>
                    @else
                    <div class="w-1/2"></div>
                    @endif
                    @if ($nextBlog)
                    <a href="{{ route('blog.show', $nextBlog->slug) }}" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                            Next <i class="fas fa-arrow-right pl-1"></i>
                        </p>
                        <p class="pt-2">{{ $nextBlog->title }}</p>
                    </a>
                    @else
                    <div class="w-1/2"></div>
                    @endif
                </div>
            </section>

            <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Berita Lainnya</p>
            
                    <div class="flex flex-col space-y-6">
                        <!-- Berita 1 -->
                        <div class="relative">
                            <!-- Gambar -->
                            <img src="{{ asset('images/ponpes-headline.png') }}" alt="Berita 1" class="rounded-lg w-full object-cover">
                            <!-- Kategori -->
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-sm font-bold px-3 py-1 rounded  uppercase">
                                ILMIAH
                            </div>
                            <!-- Konten -->
                            <div class="mt-4">
                                <a href="#" class="text-lg font-semibold hover:underline block">
                                    Al Mazaya mengadakan kurban di lingkungan pondok
                                </a>
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Berita 2 -->
                        <div class="relative">
                            <!-- Gambar -->
                            <img src="{{ asset('images/ponpes-headline.png') }}" alt="Berita 1" class="rounded-lg w-full object-cover">
                            <!-- Kategori -->
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-sm font-bold px-3 py-1 rounded  uppercase">
                                ILMIAH
                            </div>
                            <!-- Konten -->
                            <div class="mt-4">
                                <a href="#" class="text-lg font-semibold hover:underline block">
                                    Al Mazaya mengadakan kurban di lingkungan pondok
                                </a>
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.
                                </p>
                            </div>
                        </div>
            
                        <!-- Berita 3 -->
                        <div class="relative">
                            <!-- Gambar -->
                            <img src="{{ asset('images/ponpes-headline.png') }}" alt="Berita 1" class="rounded-lg w-full object-cover">
                            <!-- Kategori -->
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-sm font-bold px-3 py-1 rounded  uppercase">
                                ILMIAH
                            </div>
                            <!-- Konten -->
                            <div class="mt-4">
                                <a href="#" class="text-lg font-semibold hover:underline block">
                                    Al Mazaya mengadakan kurban di lingkungan pondok
                                </a>
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            
            
            

        </div>


    </body>


</x-main-layout>