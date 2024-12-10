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
                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="{{ asset('storage/' . $blog->image_url) }}">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category }}</a>
                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</a>
                        <p href="#" class="text-sm pb-8">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{ $blog->user->name }}</a>, Published on {{ $blog->created_at->format('Y-m-d') }}
                        </p>
                        <p class="pb-3">{{ $blog->description }}</p>
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

                <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
                    <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                        <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="rounded-full shadow h-32 w-32">
                    </div>
                    <div class="flex-1 flex flex-col justify-center md:justify-start">
                        <p class="font-semibold text-2xl">David</p>
                        <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                        <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                            <a class="" href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a class="pl-4" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="pl-4" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="pl-4" href="#">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Sidebar Section -->
            <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">About Us</p>
                    <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                    <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                        Get to know us
                    </a>
                </div>

                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Instagram</p>
                    <div class="grid grid-cols-3 gap-3">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                    </div>
                    <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                        <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                    </a>
                </div>

            </aside>

        </div>


    </body>


</x-main-layout>