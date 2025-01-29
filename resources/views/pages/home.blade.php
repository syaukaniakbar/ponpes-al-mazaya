<x-main-layout>

    @section('title', 'Official Website Ponpes Al-Mazaya | Home') <!-- Mengisi bagian @yield('title') di parent -->


    <!-- Floating WhatsApp Button -->
    <div x-data="{ tooltip: false }" class="fixed z-50 flex flex-col items-center space-y-2 bottom-6 right-6">
        <!-- Button -->
        <a href="https://wa.me/+6282324379253"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat via WhatsApp"
            @mouseenter="tooltip = true"
            @mouseleave="tooltip = false"
            @focus="tooltip = true"
            @blur="tooltip = false"
            class="flex items-center justify-center w-16 h-16 text-white transition-all duration-300 ease-in-out bg-green-500 rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-green-300 focus:ring-offset-2">
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
            class="absolute right-0 px-3 py-2 text-xs font-medium text-white transition-all duration-300 ease-in-out bg-gray-800 rounded-md shadow-lg bottom-20">
            WhatsApp
        </div>
    </div>

    <section class="w-full text-white bg-green-800 hero-section">
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
            <div class="flex h-full transition-transform duration-700 ease-out"
                :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                @foreach ($headers as $header)
                    <div class="relative w-full flex-shrink-0 h-full">
                        <img src="{{ asset('storage/' . $header->image_url) }}" alt="Slide" class="w-full object-cover h-full">
                        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-start justify-center p-7 lg:p-28 bg-black bg-opacity-70 text-white">
                            <p class="text-lg font-light border rounded-2xl border-white px-4 py-2 mb-4">
                                {{ $header->label}}
                            </p>
                            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl">
                                {{ $header->title }}
                            </h1>
                            <p class="mb-6 text-lg font-light">
                                {{ $header->description }}
                            </p>
                            <a href="{{ url($header->url_aksi) }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium  bg-green-600 text-white rounded-lg hover:text-white hover:bg-green-600">
                                {{ $header->nama_tombol_aksi}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides - 1"
                class="absolute p-2 text-white -translate-y-1/2 rounded-full shadow-md top-1/2 left-4 bg-black/50">
                &#8592;
            </button>
            <button @click="currentIndex = (currentIndex < slides - 1) ? currentIndex + 1 : 0"
                class="absolute p-2 text-white -translate-y-1/2 rounded-full shadow-md top-1/2 right-4 bg-black/50">
                &#8594;
            </button>

            <!-- Indicators -->
            <div class="absolute flex space-x-2 -translate-x-1/2 bottom-14 left-1/2">
                <template x-for="(slide, index) in slides" :key="index">
                    <div @click="currentIndex = index"
                        :class="{ 'bg-green-500': currentIndex === index, 'bg-white': currentIndex !== index }"
                        class="w-4 h-4 transition-all rounded-full cursor-pointer"></div>
                </template>
            </div>
        </div>
    </section>

    <section class="py-16 highlight bg-gray-50">
        <div class="grid items-center max-w-screen-xl gap-12 px-6 mx-auto sm:px-12 lg:px-20 lg:grid-cols-2">
            <!-- Left Content: Title and Stats -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-4xl font-extrabold text-gray-800">
                        Mengukir Prestasi Gemilang di Al Mazaya Paser
                    </h2>
                    <p class="text-lg leading-relaxed text-gray-600">
                        Di Al Mazaya Paser, pendidikan dan pembinaan karakter menjadi prioritas utama. Berikut adalah data pencapaian santri kami yang mencerminkan dedikasi, kualitas pendidikan, dan keberhasilan dalam membentuk generasi unggul
                    </p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-6 lg:grid-cols-2">
                    @foreach ($students as $tingkatan => $total)
                    <div class="p-8 text-center transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:-translate-y-1">
                        <p class="text-5xl font-extrabold text-green-600">{{ $total }}</p>
                        <p class="mt-2 text-lg font-semibold text-gray-800">Jumlah Siswa {{ $tingkatan }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Content: Image -->
            <div class="flex justify-center lg:justify-end">
                <img
                    src="{{ asset('images/ponpes-headline.png') }}"
                    alt="Ponpes Al-Mazaya Highlight"
                    class="object-contain w-full max-w-md shadow-xl lg:max-w-lg rounded-xl">
            </div>
        </div>
    </section>

    <!-- Guru dan staff -->
    <section class="relative w-full bg-green-700 py-10" x-data="{
        teacherStaffs: {{ Js::from($teacherStaffs) }},
        currentIndex: 0,
        perPage: 4,
        totalSlides: 0,
        updatePerPage() {
            if (window.innerWidth <= 768) {
                this.perPage = 1;
            } else if (window.innerWidth <= 1024) {
                this.perPage = 2;
            } else {
                this.perPage = 4;
            }
            this.totalSlides = Math.ceil(this.teacherStaffs.length / this.perPage);
        },
        get slides() {
            return Array.from({length: this.totalSlides}, (_, i) => 
                this.teacherStaffs.slice(i * this.perPage, (i + 1) * this.perPage)
            );
        }
    }" 
    x-init="updatePerPage(); window.addEventListener('resize', () => { updatePerPage(); currentIndex = 0 })"
>
    <div class="text-center mb-6 px-4">
        <h2 class="text-white text-3xl font-bold">Guru dan Staff Al Mazaya</h2>
        <p class="text-white text-sm max-w-2xl mx-auto">
            Mendidik dengan Hati, Membimbing dengan Dedikasi
        </p>
    </div>

    <!-- Carousel Wrapper -->
    <div class="relative w-full max-w-5xl mx-auto overflow-hidden">
        <!-- Inner Container -->
        <div class="flex transition-transform duration-500 ease-in-out"
            :style="'transform: translateX(-' + (currentIndex * 100) + '%)'">
            <template x-for="(slide, index) in slides" :key="index">
                <div class="flex-shrink-0 w-full flex flex-wrap justify-center gap-4 px-2">
                    <template x-for="teacherStaff in slide" :key="teacherStaff.id">
                        <div class="w-full sm:w-[calc(100%-16px)] md:w-[calc(25%-16px)]">
                            <div class="relative group rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                                <!-- Image Container -->
                                <div class="aspect-square bg-gray-200">
                                    <img :src="'/storage/' + teacherStaff.image_path" :alt="teacherStaff.name" 
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform">
                                </div>
                                
                                <!-- Text Overlay -->
                                <div class="absolute bottom-0 left-0 right-0 bg-white text-left px-4 w-full">
                                    <p class="font-bold text-lg mb-1" x-text="teacherStaff.name"></p>
                                    <p class="text-sm font-medium" x-text="teacherStaff.role_detail"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-center space-x-4 mt-6">
        <button @click="currentIndex = currentIndex > 0 ? currentIndex - 1 : totalSlides - 1"
            class="bg-white text-black px-4 py-2 rounded-full shadow-lg">❮</button>
        <button @click="currentIndex = currentIndex < totalSlides - 1 ? currentIndex + 1 : 0"
            class="bg-white text-black px-4 py-2 rounded-full shadow-lg">❯</button>
    </div>
</section>
    

    <!-- Berita al-mazaya -->
    <section class="p-6 news md:p-12 lg:p-24">
        <!-- Kolom Teks -->
        <div class="max-w-3xl mx-auto mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-gray-800">Berita Al Mazaya</h2>
            <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl">
                Temukan berita terbaru dan informasi menarik seputar Al Mazaya. Dari kegiatan keagamaan hingga kegiatan sosial, kami selalu berusaha memberikan informasi yang bermanfaat untuk Anda.
            </p>
        </div>

        <!-- Blog Cards Section -->
        <div class="grid max-w-screen-xl grid-cols-1 gap-8 px-4 mx-auto sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($blogs as $blog)
                <article class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 relative">
                    <!-- Image -->
                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">
                        <div class="block relative group">
                            <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}" class="w-full h-48 sm:h-56 object-cover group-hover:opacity-90 transition">
                            <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition"></div>
                        </div>
        
                        <!-- Category -->
                        <span class="bg-green-600 text-white absolute text-xs font-semibold uppercase px-3 py-1 rounded right-2 top-2">
                            {{ $blog->category }}
                        </span>
        
                        <!-- Content -->
                        <div class="p-5 flex flex-col flex-grow">
                            <!-- Title -->
                            <p  class="text-lg font-bold text-gray-800 hover:text-green-600 transition mb-2">
                                {{ $blog->title }}
                            </p>
        
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
                    </a>
                </article>
            @empty
                <div class="flex items-center justify-center col-span-full w-full h-72 bg-green-100 border border-green-200 rounded-lg">
                    <p class="text-center text-gray-600 text-lg">Postingan Tidak Tersedia.</p>
                </div>
            </article>
            @empty
            <div class="flex items-center justify-center w-full bg-green-100 border border-green-200 rounded-lg col-span-full h-72">
                <p class="text-lg text-center text-gray-600">No blog posts available.</p>
            </div>
            @endforelse
        </div>

        <!-- Tombol Berita Lainnya -->
        <div class="flex justify-center mt-12">
            <a href="{{ route('blog.al-mazaya') }}" class="inline-block px-8 py-3 text-lg font-semibold text-white transition-colors duration-300 bg-green-600 rounded shadow-md hover:bg-green-700">
                Berita Lainnya
            </a>
        </div>
    </section>
    <!-- End section berita al-mazaya -->

    <!-- section video tentang al-mazaya -->
    <section class="p-6 bg-gray-100 video md:p-32">
        <div class="container flex flex-col items-center justify-center px-6 mx-auto text-center md:px-12">
            <!-- Headline -->
            <h1 class="mb-4 text-3xl font-bold leading-tight text-gray-800 md:text-4xl">
                Video Tentang Al-Mazaya
            </h1>
            <!-- Sub-keterangan -->
            <p class="max-w-2xl mb-8 text-lg text-gray-600 md:text-xl">
                Setiap langkah adalah doa, setiap ilmu adalah cahaya. Temukan semangat juang dan nilai kehidupan yang terpancar dari santri Pondok Pesantren Al-Mazaya.
            </p>

            <!-- Video -->

            <div class="w-full max-w-4xl overflow-hidden rounded-lg shadow-lg aspect-w-16 aspect-h-9">
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
                    <td colspan="3" class="py-10 text-center">Video Tidak Tersedia!</td>
                </tr>
                @endif
        </div>
    </section>



    <!-- End section video tentang al-mazaya -->

</x-main-layout>