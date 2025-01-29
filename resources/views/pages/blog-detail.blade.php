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
    
        <!-- Main Content -->
        <div class="container mx-auto px-4 lg:px-8 py-6 grid grid-cols-1 lg:grid-cols-12 gap-4">
            <!-- Article Section -->
            <main class="lg:col-span-8">
                <article class="bg-white shadow-md rounded-lg overflow-hidden">
                    <!-- Article Header -->
                    <header class="p-6">
                        <div class="flex justify-between items-center text-sm text-gray-600">
                            <span>Published on {{ $blog->created_at->translatedFormat('l, d F Y') }}</span>
                            <span class="bg-blue-500 text-white px-3 py-1 rounded uppercase font-bold text-xs">
                                {{ strtoupper($blog->category) }}
                            </span>
                        </div>
                        <h1 class="text-2xl font-bold mt-4 text-gray-800 leading-tight">
                            {{ $blog->title }}
                        </h1>
                        <p class="text-sm mt-2 text-gray-500">
                            By <span class="font-semibold hover:text-gray-800">{{ $blog->user->name }}</span>
                        </p>
                    </header>
            
                    <!-- Article Image -->
                    <div class="relative">
                        <img 
                            class="w-full h-64 lg:h-96 object-cover" 
                            src="{{ asset('storage/' . $blog->image_url) }}" 
                            alt="Article Image">
                    </div>
            
                    <!-- Article Body -->
                    <div class="p-6 leading-relaxed text-gray-700">
                        {!! $blog->description !!}
                    </div>
            
                    <!-- Navigation Links -->
                    <div class="flex flex-col md:flex-row justify-between items-center border-t border-gray-200 p-6 bg-gray-50 rounded-lg shadow-sm space-y-4 md:space-y-0">
                        @if ($previousBlog)
                        <!-- Previous Blog -->
                        <a href="{{ route('blog.show', $previousBlog->slug) }}" 
                           class="flex items-center space-x-3 md:space-x-4 group w-full md:w-auto">
                            <!-- Icon -->
                            <div class="bg-blue-100 p-2 rounded-full group-hover:bg-green-600 transition">
                                <i class="fas fa-arrow-left text-green-600 group-hover:text-white"></i>
                            </div>
                            <!-- Text -->
                            <div class="text-left">
                                <p class="text-sm text-gray-500">Previous</p>
                                <p class="text-base font-semibold text-green-600 group-hover:text-green-800 transition">
                                    {{ $previousBlog->title }}
                                </p>
                            </div>
                        </a>
                        @else
                        <div class="w-full md:w-auto"></div>
                        @endif
                    
                        @if ($nextBlog)
                        <!-- Next Blog -->
                        <a href="{{ route('blog.show', $nextBlog->slug) }}" 
                           class="flex items-center justify-end space-x-3 md:space-x-4 group w-full md:w-auto">
                            <!-- Text -->
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Next</p>
                                <p class="text-base font-semibold text-green-600 group-hover:text-green-800 transition">
                                    {{ $nextBlog->title }}
                                </p>
                            </div>
                            <!-- Icon -->
                            <div class="bg-green-100 p-2 rounded-full group-hover:bg-green-600 transition">
                                <i class="fas fa-arrow-right text-green-600 group-hover:text-white"></i>
                            </div>
                        </a>
                        @else
                        <div class="w-full md:w-auto"></div>
                        @endif
                    </div>
                    
            
                </article>
            </main>
            
            <!-- Sidebar -->
            <aside class="w-full lg:col-span-4 flex flex-col items-center px-3">
                <div class="w-full flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5 border-b border-gray-300">Berita Lainnya</p>
            
                    <div class="flex flex-col space-y-6 mt-6">
                        @foreach ($blogs as $blogItem)
                            <div class="relative group border border-gray-200 rounded-xl overflow-hidden bg-white hover:shadow-lg transition-shadow duration-300">
                                <!-- Gambar -->
                               <a href="{{ route('blog.show', ['slug' => $blogItem->slug]) }}">
                                    <div class="overflow-hidden">
                                        <img src="{{ asset('storage/' . $blogItem->image_url) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover group-hover:opacity-90 transition">
                                    </div>
                                
                                    <!-- Label Kategori -->
                                    <div class="absolute top-3 right-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded shadow-md uppercase">
                                        {{ $blogItem->category }}
                                    </div>
                                
                                    <!-- Konten -->
                                    <div class="p-5 space-y-3">
                                        <!-- Judul -->
                                        <p
                                        class="block text-lg font-bold text-gray-800 hover:text-blue-600 leading-snug transition-colors duration-300">
                                            {{ $blogItem->title }}
                                        </p>
                                
                                        <!-- Deskripsi -->
                                        <p class="text-gray-600 text-sm mt-2 mb-4">
                                            {!! Str::limit($blogItem->description, 100) !!}
                                        </p>
                                
                                        <!-- Tanggal atau Metadata -->
                                        <div class="flex items-center text-xs text-green-400 space-x-2">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span> {{$blogItem->created_at->translatedFormat('l, d F Y') }}</span>
                                        </div>
                                    </div>
                               </a>
                            </div>
                        @endforeach
                </div>
            </aside>
                     
        </div>
    </body>
    


</x-main-layout>