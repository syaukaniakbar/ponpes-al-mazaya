<x-main-layout>

    @section('title', 'Official Website Ponpes Al-Mazaya | Home') <!-- Mengisi bagian @yield('title') di parent -->


    <!-- Floating WhatsApp Button -->
    <div x-data="{ tooltip: false }" class="fixed bottom-6 right-6 z-50 flex flex-col items-center space-y-2">
        <!-- Button -->
        <a href="https://wa.me/+6282324379253" 
        target="_blank" 
        rel="noopener noreferrer" 
        aria-label="Chat via WhatsApp"
        @mouseenter="tooltip = true" 
        @mouseleave="tooltip = false"
        @focus="tooltip = true" 
        @blur="tooltip = false"
        class="flex items-center justify-center w-16 h-16 bg-green-500 text-white rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-green-300 focus:ring-offset-2 transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 256 256" aria-hidden="true">
                <path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path>
            </svg>
        </a>

        <!-- Tooltip -->
        <div x-show="tooltip" 
            x-transition:enter="transition-opacity duration-300 ease-out" 
            x-transition:enter-start="opacity-0 translate-y-2" 
            x-transition:enter-end="opacity-100 translate-y-0" 
            x-transition:leave="transition-opacity duration-200 ease-in" 
            x-transition:leave-start="opacity-100 translate-y-0" 
            x-transition:leave-end="opacity-0 translate-y-2"
            class="absolute bottom-20 right-0 bg-gray-800 text-white text-xs font-medium px-3 py-2 rounded-md shadow-lg transition-all duration-300 ease-in-out">
            WhatsApp
        </div>
    </div>




    <section class="hero-section bg-green-800 text-white w-full">
        <div class="relative w-full h-[700px] overflow-hidden" 
            x-data="{
                currentIndex: 0, 
                slides: {{ count($headers) }},
                autoSlide() {
                    setInterval(() => {
                        this.currentIndex = (this.currentIndex < this.slides - 1) ? this.currentIndex + 1 : 0;
                    }, 10000); // 10 detik
                }
            }" x-init="autoSlide">


            <!-- Slides Container -->
            <div class="flex transition-transform duration-700 ease-out h-full"
                :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                @foreach ($headers as $header)
                    <div class="relative w-full flex-shrink-0 h-full">
                        <img src="{{ asset('storage/' . $header->image_url) }}" alt="Slide" class="w-full object-cover h-full">
                        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-start justify-center p-7 lg:p-28 bg-black bg-opacity-70 text-white">
                            <p class="text-lg font-light border rounded-2xl border-white px-4 py-2 mb-4">
                                Pendaftaran Dibuka
                            </p>
                            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl">
                                {{ $header->title }}
                            </h1>
                            <p class="mb-6 text-lg font-light">
                                {{ $header->description }}
                            </p>
                            <a href="{{ route('pendaftaran') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium  bg-green-600 text-white rounded-lg hover:text-white hover:bg-green-600">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides - 1"
                class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full shadow-md">
                &#8592;
            </button>
            <button @click="currentIndex = (currentIndex < slides - 1) ? currentIndex + 1 : 0"
                class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full shadow-md">
                &#8594;
            </button>

            <!-- Indicators -->
            <div class="absolute bottom-14 left-1/2 -translate-x-1/2 flex space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <div @click="currentIndex = index"
                        :class="{ 'bg-green-500': currentIndex === index, 'bg-white': currentIndex !== index }"
                        class="w-4 h-4 rounded-full cursor-pointer transition-all"></div>
                </template>
            </div>
        </div>
    </section>

    <section class="highlight bg-gray-50 py-16">
        <div class="max-w-screen-xl mx-auto px-6 sm:px-12 lg:px-20 grid lg:grid-cols-2 items-center gap-12">
            <!-- Left Content: Title and Stats -->
            <div class="space-y-8">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-800 leading-tight">
                    Highlighting Our Best Results
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Experience the best outcomes with our unique approach. Here are some of the metrics that define our excellence and success in helping students achieve their goals.
                </p>
    
                <!-- Stats Grid -->
                <div class="grid grid-cols-2 lg:grid-cols-2 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 text-center">
                        <p class="text-5xl font-extrabold text-green-600">230</p>
                        <p class="text-gray-800 mt-2 text-lg font-semibold">Jumlah Siswa MTs</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 text-center">
                        <p class="text-5xl font-extrabold text-green-600">98</p>
                        <p class="text-gray-800 mt-2 text-lg font-semibold">Jumlah Siswa MA</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 text-center">
                        <p class="text-5xl font-extrabold text-green-600">0</p>
                        <p class="text-gray-800 mt-2 text-lg font-semibold">Jumlah Santri Wustha</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 text-center">
                        <p class="text-5xl font-extrabold text-green-600">0</p>
                        <p class="text-gray-800 mt-2 text-lg font-semibold">Jumlah Santri Ulya</p>
                    </div>
                </div>
            </div>
    
            <!-- Right Content: Image -->
            <div class="flex justify-center lg:justify-end">
                <img 
                    src="{{ asset('images/ponpes-headline.png') }}" 
                    alt="Ponpes Al-Mazaya Highlight" 
                    class="w-full max-w-md lg:max-w-lg object-contain rounded-xl shadow-xl"
                >
            </div>
        </div>
    </section>
    
    <!-- Guru dan staff -->
    <section class="staff bg-green-800">
        <div class="grid max-w-screen-xl px-4 py-16 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
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

    <!-- Berita al-mazaya -->
    <section class="news p-6 md:p-12 lg:p-24">
        <!-- Kolom Teks -->
        <div class="max-w-3xl mx-auto mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-gray-800">Berita Al Mazaya</h2>
            <p class="text-base md:text-lg text-gray-600 leading-relaxed">
                Temukan berita terbaru dan informasi menarik seputar Al Mazaya. Dari kegiatan keagamaan hingga kegiatan sosial, kami selalu berusaha memberikan informasi yang bermanfaat untuk Anda.
            </p>
        </div>
    
        <!-- Blog Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-screen-xl mx-auto px-4">
            @forelse ($blogs as $blog)
                <article class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 relative">
                    <!-- Image -->
                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="block relative group">
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}" class="w-full h-48 sm:h-56 object-cover group-hover:opacity-90 transition">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition"></div>
                    </a>
    
                    <!-- Category -->
                    <span class="bg-green-600 text-white absolute text-xs font-semibold uppercase px-3 py-1 rounded right-2 top-2">
                        {{ $blog->category }}
                    </span>
    
                    <!-- Content -->
                    <div class="p-5 flex flex-col flex-grow">
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
                            <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="text-green-600 font-medium hover:underline">
                                Continue Reading &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="flex items-center justify-center col-span-full w-full h-72 bg-green-100 border border-green-200 rounded-lg">
                    <p class="text-center text-gray-600 text-lg">No blog posts available.</p>
                </div>
            @endforelse
        </div>
    
        <!-- Tombol Berita Lainnya -->
        <div class="flex justify-center mt-12">
            <a href="{{ route('blog.al-mazaya') }}" class="inline-block px-8 py-3 text-lg bg-green-600 text-white font-semibold rounded shadow-md hover:bg-green-700 transition-colors duration-300">
                Berita Lainnya
            </a>
        </div>
    </section>
    <!-- End section berita al-mazaya -->

    <!-- section video tentang al-mazaya -->
    <section class="video bg-gray-100 p-6 md:p-32">
        <div class="container mx-auto flex flex-col justify-center items-center text-center px-6 md:px-12">
            <!-- Headline -->
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 leading-tight">
                Video Tentang Al-Mazaya
            </h1>
            <!-- Sub-keterangan -->
            <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl">
                Setiap langkah adalah doa, setiap ilmu adalah cahaya. Temukan semangat juang dan nilai kehidupan yang terpancar dari santri Pondok Pesantren Al-Mazaya.
            </p>
           
                <!-- Video -->
                
                <div class="w-full max-w-4xl aspect-w-16 aspect-h-9 rounded-lg shadow-lg overflow-hidden">
                @if($embedUrl)
                    <iframe 
                        src="{{ $embedUrl }}" 
                        title="Video Tentang Al-Mazaya" 
                        class="w-full h-96"
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                @else
                </div>
                <tr>
                    <td colspan="3" class="py-10 text-center">No records found!</td>
                </tr>
                @endif
         
        </div>
    </section>


    
    <!-- End section video tentang al-mazaya -->

</x-main-layout>