<x-main-layout>

    @section('title', 'Home | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->
    <section class="hero-section bg-green-800 text-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="lg:col-span-12">
                <!-- Carousel -->
                <div class="carousel relative overflow-hidden w-full max-w-lg mx-auto bg-gray-200 rounded-lg shadow-md"
                    x-data="{ currentIndex: 0, slides: 3 }">
                    <!-- Slides -->
                    <div class="flex transition-transform duration-500 h-[300px]" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                        <img src="{{ asset('images/highlight.svg') }}"
                            alt=" Slide 1" class="w-full flex-shrink-0 rounded-lg object-cover">
                        <img src="{{ asset('images/highlight.svg') }}"
                            alt=" Slide 2" class="w-full flex-shrink-0 rounded-lg object-cover">
                        <img src="{{ asset('images/highlight.svg') }}"
                            alt=" Slide 3" class="w-full flex-shrink-0 rounded-lg object-cover">
                    </div>

                    <!-- Navigation -->
                    <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides - 1"
                        class="absolute top-1/2 left-4 -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full shadow-md">
                        <
                            </button>
                            <button @click="currentIndex = (currentIndex < slides - 1) ? currentIndex + 1 : 0"
                                class="absolute top-1/2 right-4 -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full shadow-md">
                                >
                            </button>

                            <!-- Indicators -->
                            <div class="flex justify-center space-x-2 mt-4 mb-4">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <div @click="currentIndex = index"
                                        :class="{ 'bg-green-800': currentIndex === index, 'bg-gray-300': currentIndex !== index }"
                                        class="w-3 h-3 rounded-full cursor-pointer"></div>
                                </template>
                            </div>
                </div>
            </div>
        </div>
    </section>
    <section class="highlight bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12 my-32">
            <!-- Title Headline -->
            <div class="mr-auto place-self-center lg:col-span-7">
                <h2 class="text-5xl font-bold mb-4">Headline highlighting customer results</h2>
                <p class="text-lg mb-8">Highlight the Unique Selling Proposition (USP) with a short summary of the main feature and how it benefits customers. The idea here is to keep it short and direct. If the visitor wishes to learn more they will hit the button.</p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="text-start  p-4  border-l-4 border-green-500">
                        <p class="font-bold mb-2 text-5xl">527</p>
                        <p>Jumlah siswa</p>
                    </div>
                    <div class="text-start  p-4  border-l-4 border-green-500">
                        <p class="font-bold mb-2 text-5xl">4236</p>
                        <p>Jumlah alumni</p>
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
    <section class="video">
        <div class="flex flex-col justify-center items-center px-0 pt-16 pb-16 mx-auto text-center">
            <h1 class="text-3xl font-bold mb-6 text-black">Video Tentang Al-Mazaya</h1>
            <img src="{{ asset('images/placeholder-img.png') }}" alt="ponpes-al-mazaya-highlight" class="max-w-3xl w-full h-auto rounded-lg shadow-md">
        </div>
    </section>
    <!-- End section video tentang al-mazaya -->

</x-main-layout>