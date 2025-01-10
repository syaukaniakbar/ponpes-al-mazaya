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
        <!-- Mobile Toggle -->
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center" @click="open = !open">
                Topics 
                <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>

        <!-- Navigation Links -->
        <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <!-- Prestasi -->
                <a href="{{ route('category', ['category' => 'prestasi']) }}" 
                    class="rounded py-2 px-4 mx-2 
                    {{ request()->is('category/pestasi') ? 'bg-green-600 text-white' : 'hover:bg-green-600 hover:text-white' }}">
                    PRESTASI
                </a>
                <!-- Umum -->
                <a href="{{ route('category', ['category' => 'umum']) }}" 
                    class="rounded py-2 px-4 mx-2
                    {{ request()->is('category/umum') ? 'bg-green-600 text-white' : 'hover:bg-green-600 hover:text-white' }}">
                    UMUM
                </a>
                <!-- Ilmiah -->
                <a href="{{ route('category', ['category' => 'ilmiah']) }}" 
                    class="rounded py-2 px-4 mx-2 
                    {{ request()->is('category/ilmiah') ? 'bg-green-600 text-white' : 'hover:bg-green-600 hover:text-white' }}">
                    ILMIAH
                </a>
            </div>
        </div>
    </nav>

    <form class="flex flex-col sm:flex-row items-center max-w-lg mx-auto mt-10 px-4">
        <div class="relative w-full sm:w-4/5 mb-4 sm:mb-0">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-non            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                    <path d="M88,112a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H96A8,8,0,0,1,88,112Zm8,40h80a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16ZM232,64V184a24,24,0,0,1-24,24H32A24,24,0,0,1,8,184.11V88a8,8,0,0,1,16,0v96a8,8,0,0,0,16,0V64A16,16,0,0,1,56,48H216A16,16,0,0,1,232,64Zm-16,0H56V184a23.84,23.84,0,0,1-1.37,8H208a8,8,0,0,0,8-8Z"></path>
                </svg>
            </div>
            <input 
                type="text" 
                id="cari" 
                class="border-gray-300 border text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-3 sm:ps-16" 
                placeholder="Cari Berita Disini ..." 
                required 
            />
        </div>
    </form>
  
    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Posts Section -->
        <section class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4 py-6">
            @forelse ($blogs as $blog)
                <article class="flex flex-col bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300 relative">
                    <!-- Image -->
                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="block relative group">
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover group-hover:opacity-90 transition">
                        <div class="absolute inset-0 bg-black bg-opacity-25 group-hover:bg-opacity-40 transition"></div>
                    </a>
                     <!-- Category -->
                     <span class="bg-green-600 text-white absolute text-xs font-semibold uppercase px-3 py-1 rounded self-end right-2 top-2">
                        {{ $blog->category }}
                    </span>
        
                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-grow">
                        <!-- Title -->
                        <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="text-lg font-bold text-gray-800 hover:text-green-600 transition mb-2">
                            {{ $blog->title }}
                        </a>
        
                        <!-- Description -->
                        <p class="text-gray-600 text-sm mt-2 mb-4">
                            {!! Str::limit($blog->description, 100) !!}
                        </p>
        
                        <!-- Continue Reading -->
                        <div class="mt-auto">
                            <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="inline-block text-green-600 font-semibold hover:underline">
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
        
        

        <!-- Pagination Section -->
        <div class="w-full mt-6 flex justify-center">
            <div class="flex items-center space-x-2">
                @if ($blogs->onFirstPage())
                    <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">← Previous</span>
                @else
                    <a href="{{ $blogs->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">← Previous</a>
                @endif

                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                    @if ($page == $blogs->currentPage())
                        <span class="px-4 py-2 bg-green-600 text-white rounded font-bold">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-green-600 hover:text-white">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next →</a>
                @else
                    <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next →</span>
                @endif
            </div>
        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.querySelector('#cari');
            const searchResults = document.createElement('div');
            searchResults.className = 'absolute bg-white shadow-lg rounded-lg mt-1 z-50 w-full';
            searchInput.parentNode.appendChild(searchResults);
    
            searchInput.addEventListener('input', async (event) => {
                const query = event.target.value;
    
                // Jika input kosong, sembunyikan hasil
                if (!query) {
                    searchResults.innerHTML = '';
                    searchResults.style.display = 'none';
                    return;
                }
    
                try {
                    const response = await fetch(`/search?query=${query}`);
                    const blogs = await response.json();
    
                    // Tampilkan hasil pencarian
                    if (blogs.length > 0) {
                        searchResults.innerHTML = blogs
                            .map(blog => `
                                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="block px-4 py-2 hover:bg-gray-100">
                                    <p>${blog.title}</p>
                                </a>
                            `)
                            .join('');
                    } else {
                        searchResults.innerHTML = '<p class="px-4 py-2 text-gray-600">No results found.</p>';
                    }
    
                    searchResults.style.display = 'block';
                } catch (error) {
                    console.error('Error fetching search results:', error);
                }
            });
    
            // Klik di luar pencarian untuk menutup hasil
            document.addEventListener('click', (event) => {
                if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                    searchResults.innerHTML = '';
                    searchResults.style.display = 'none';
                }
            });
        });
    </script>
    
</x-main-layout>