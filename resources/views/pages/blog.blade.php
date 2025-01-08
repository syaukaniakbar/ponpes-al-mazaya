<x-main-layout>

    @section('title', 'Blog | Ponpes-Al-Mazaya')

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
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-green-600 hover:text-white rounded py-2 px-4 mx-2">PRESTASI</a>
                <a href="#" class="hover:bg-green-600 hover:text-white rounded py-2 px-4 mx-2">UMUM</a>
                <a href="#" class="hover:bg-green-600 hover:text-white rounded py-2 px-4 mx-2">ILMIAH</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Posts Section -->
        <section class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-3">
            @forelse ($blogs as $blog)
                <article class="flex flex-col shadow-lg rounded-lg overflow-hidden">
                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="hover:opacity-90">
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="bg-white p-4 flex flex-col justify-between">
                        <div class="flex justify-between items-center">
                            <span class="bg-green-500 text-white text-xs font-bold rounded px-3 py-1 uppercase">
                                {{ $blog->category }}
                            </span>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800 hover:text-gray-600 mt-2">
                            {{ $blog->title }} test
                        </h2>
                        <p class="text-gray-600 text-sm">
                            {!! Str::limit($blog->description, 100) !!}
               
                        </p>                        
                        <div class="mt-2">
                            <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="text-blue-600 text-sm font-semibold">
                                Continue Reading →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="flex items-center justify-center w-full h-96 bg-green-600">
                    <p class="text-center text-white text-lg">No blog posts available.</p>
                </div>
            @endforelse
        </section>
    </div>
</x-main-layout>