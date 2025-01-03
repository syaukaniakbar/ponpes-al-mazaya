<x-main-layout>

    @section('title', 'Official Website Ponpes Al-Mazaya | Home') <!-- Mengisi bagian @yield('title') di parent -->

    <section class="hero-section bg-green-800 text-white w-full">
        <div class="relative w-full h-[700px] overflow-hidden" x-data="{ currentIndex: 0, slides: 3 }">
            <!-- Slides Container -->
            <div class="flex transition-transform duration-700 ease-out h-full"
                :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                <div class="relative w-full flex-shrink-0 h-full">
                    <img src="{{ asset('images/header_1.jpg') }}"
                        alt="Slide 1"
                        class="w-full object-cover h-full">
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col items-start justify-center p-7 lg:p-28 bg-black bg-opacity-40 text-white">
                        <p class="text-lg font-light border rounded-2xl border-white px-4 py-2 mb-4">
                            Pendaftaran Dibuka
                        </p>
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl">
                            Selamat Datang di Pondok Pesantren Al Mazaya
                        </h1>
                        <p class="mb-6 text-lg font-light">
                            Membentuk generasi Muslim yang berilmu, berakhlak mulia, dan siap menghadapi tantangan global.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-black bg-white rounded-lg hover:text-white hover:bg-green-600">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="relative w-full flex-shrink-0 h-full">
                    <img src="{{ asset('images/header_2.jpg') }}"
                        alt="Slide 2"
                        class="w-full object-cover h-full">
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col items-start justify-center p-7 lg:p-28 bg-black bg-opacity-40 text-white">
                        <p class="text-lg font-light border rounded-2xl border-white px-4 py-2 mb-4">
                            Pendaftaran Dibuka
                        </p>
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl">
                            Selamat Datang di Pondok Pesantren Al Mazaya
                        </h1>
                        <p class="mb-6 text-lg font-light">
                            Membentuk generasi Muslim yang berilmu, berakhlak mulia, dan siap menghadapi tantangan global.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-black bg-white rounded-lg hover:text-white hover:bg-green-600">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="relative w-full flex-shrink-0 h-full">
                    <img src="{{ asset('images/header_3.jpg') }}"
                        alt="Slide 3"
                        class="w-full object-cover h-full">
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col items-start justify-center p-7 lg:p-28 bg-black bg-opacity-40 text-white">
                        <p class="text-lg font-light border rounded-2xl border-white px-4 py-2 mb-4">
                            Pendaftaran Dibuka
                        </p>
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl">
                            Selamat Datang di Pondok Pesantren Al Mazaya
                        </h1>
                        <p class="mb-6 text-lg font-light">
                            Membentuk generasi Muslim yang berilmu, berakhlak mulia, dan siap menghadapi tantangan global.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-black bg-white rounded-lg hover:text-white hover:bg-green-600">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
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

    <section class="highlight bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12 my-32">
            <!-- Title Headline -->
            <div class="mr-auto place-self-center lg:col-span-7">
                <h2 class="text-5xl font-bold mb-4">Headline highlighting customer results</h2>
                <p class="text-lg mb-8">Highlight the Unique Selling Proposition (USP) with a short summary of the main feature and how it benefits customers. The idea here is to keep it short and direct. If the visitor wishes to learn more they will hit the button.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Card 1 -->
                    <div class="relative text-start p-4 bg-gray-100 transform transition duration-300 shadow-lg hover:shadow-xl">
                        <p class="font-bold mb-2 text-5xl text-green-600 hover:text-green-700 transition duration-300">230</p>
                        <p class="text-black font-medium">Jumlah Siswa MTs</p>
                        <div class="absolute inset-0 border-green-500 border-l-4 hover:border-l-0 hover:border-b-4 transition-all duration-300"></div>
                    </div>
                    <!-- Card 2 -->
                    <div class="relative text-start p-4 bg-gray-100 transform transition duration-300 shadow-lg hover:shadow-xl">
                        <p class="font-bold mb-2 text-5xl text-green-600 hover:text-green-700 transition duration-300">98</p>
                        <p class="text-black font-medium">Jumlah Siswa MA</p>
                        <div class="absolute inset-0 border-green-500 border-l-4 hover:border-l-0 hover:border-b-4 transition-all duration-300"></div>
                    </div>
                    <!-- Card 3 -->
                    <div class="relative text-start p-4 bg-gray-100 transform transition duration-300 shadow-lg hover:shadow-xl">
                        <p class="font-bold mb-2 text-5xl text-green-600 hover:text-green-700 transition duration-300">0</p>
                        <p class="text-black font-medium">Jumlah Santri Pondok</p>
                        <div class="absolute inset-0 border-green-500 border-l-4 hover:border-l-0 hover:border-b-4 transition-all duration-300"></div>
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
                <iframe 
                    src="https://www.youtube.com/embed/XqeDosXJJ1M" 
                    title="Video Tentang Al-Mazaya" 
                    class="w-full h-96"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>


    
    <!-- End section video tentang al-mazaya -->

</x-main-layout>