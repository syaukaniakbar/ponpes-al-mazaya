<x-main-layout>

    @section('title', 'Blog | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Al-Mazaya Blog
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
                class="md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:text-white hover:bg-green-600 rounded py-2 px-4 mx-2">Umum</a>
                <a href="#" class="hover:text-white hover:bg-green-600 rounded py-2 px-4 mx-2">Prestasi</a>
                <a href="#" class="hover:text-white hover:bg-green-600 rounded py-2 px-4 mx-2">Ilmiah</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @forelse ($blogs as $blog)
            <article class="flex flex-col shadow my-4">
                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="flex flex-col space-y-4"> <!-- space-y-4 untuk memberi jarak antara gambar dan konten -->
                    <div class="hover:opacity-75">
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}" class="w-full h-80 object-cover rounded-t-lg">
                    </div>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <span class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category }}</span>
                        <h2 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</h2>
                        <p class="text-sm pb-3">
                            By <span class="font-semibold hover:text-gray-800">{{ $blog->user->name }}</span>,
                            Published on {{ $blog->created_at->format('Y-m-d') }}
                        </p>
                        <p class="pb-6">{{ Str::limit($blog->description, 300) }}</p>
                        <span class="uppercase text-gray-800 hover:text-black">
                            Continue Reading <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </article>
            @empty
            <div class="text-center py-6">
                <p class="text-lg text-gray-500">No blog posts available at the moment.</p>
                <p class="text-sm text-gray-400">
                    Please check back later or
                    <a href="{{ route('blog.create') }}" class="text-blue-600 hover:text-blue-800">create a new blog post</a>.
                </p>
            </div>
            @endforelse
            <!-- Pagination -->
            <a class="mt-6">
                {{ $blogs->links('pagination::tailwind') }}
            </a>
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
</x-main-layout>