<!-- isi kodingan section dibawah ini -->
<x-main-layout class="overflow-x-hidden">
    <!-- First Section -->
    <section class="aboutus w-full overflow-hidden">
        <div class="relative isolate overflow-hidden bg-gray-900 py-48 sm:py-52 w-full">
            <img src="{{ asset('images/hero-section-ponpes.png') }}" class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center" alt="Al-Mazaya Logo" />

            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-black bg-opacity-55 -z-10"></div>
            <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center text-center">
                <!-- Lapisan gelap semi-transparan untuk kontras -->
                <div class="mx-auto max-w-2xl">
                    <h2 class="text-5xl font-semibold tracking-tight text-zinc-50 sm:text-7xl">Tentang Al-Mazaya</h2>
                    <p class="mt-8 text-pretty text-lg font-light text-zinc-50 sm:text-xl/8"> Ponpes Al-Mazaya adalah lembaga pendidikan dengan layanan program Tahfidzul Quran, Madrasah Diniyah Takmiliyah, SMP, dan SMK.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Second section -->
    <section class="sambutan bg-white relative w-full overflow-hidden">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12 my-12 w-full">
            <!-- img section -->
            <div class="flex flex-col justify-center items-center lg:col-span-5 lg:justify-start px-4 lg:pr-8 lg:pl-0">
                <img
                    src="{{ asset('images/ponpes-headline.png') }}"
                    alt="ponpes-al-mazaya-highlight"
                    class="w-full max-w-xs md:max-w-sm lg:max-w-lg rounded-lg mb-4">
                <div class="text-center">
                    <p class="text-lg font-normal">Pengasuh Umum Pondok Pesantren Al-Mazaya</p>
                    <p class="text-lg font-bold">Dr. H. Isran Noor, Lc., M.A.</p>
                </div>
            </div>
            <!-- end img section -->

            <div class="mr-auto place-self-center lg:col-span-7 px-4 lg:pl-16 flex flex-col justify-between mb-10 relative">
                <!-- Tanda Kutip Kiri Atas -->
                <img
                    src="{{ asset('images/kutip-besar1.png') }}"
                    alt="quote-left"
                    class="absolute top-0 left-0 w-12 md:w-16 transform md:translate-x-6 lg:translate-x-8 -translate-y-6">

                <div class="text-center">
                    <h2 class="text-6xl font-bold mb-4">Kata Sambutan</h2>
                    <!-- Garis Bawah -->
                    <div class="w-72 h-0.5 bg-black mx-auto mb-6"></div>
                </div>
                <p class="text-2xl font-light text-justify">
                    Alhamdulillah, segala puji dan syukur kita panjatkan kehadirat Allah Subhanahu Wa Ta'ala yang telah melimpahkan nikmat-Nya kepada kita semua, mulai dari nikmat iman, nikmat islam, nikmat sehat dan kesempatan untuk berkarya serta berdakwah di bidang pendidikan sebagai bagian penting dari upaya mewujudkan generasi muslim yang beriman dan bertaqwa.
                </p>

                <!-- Tanda Kutip Kanan Bawah -->
                <img
                    src="{{ asset('images/kutip-besar2.png') }}"
                    alt="quote-right"
                    class="absolute bottom-0 right-4 w-12 md:w-16 transform translate-x-6 translate-y-8 md:translate-y-12 lg:translate-y-16">
            </div>
        </div>
    </section>

    <!-- Third section -->
    <section class="sejarah bg-white relative w-full overflow-hidden">
        <div class="bg-green-900 rounded-2xl mx-4 sm:mx-auto max-w-screen-xl px-4 py-8 my-16">
            <div class="flex flex-col justify-center text-center text-white">
                <h2 class="text-6xl font-bold mb-2">Sejarah</h2>
                <p class="text-2xl font-light mb-2">Pondok Pesantren Al-Mazaya</p>
                <!-- Garis Bawah -->
                <div class="w-72 h-0.5 bg-white mx-auto mb-6"></div>
                <p class="text-2xl font-light text-justify px-10">
                    Pondok Pesantren Al-Mazaya dibangun di atas pondasi TAQWA dengan Asas Al-Qur’an dan Sunnah, berupaya mengembalikan masyarakat islam kepada jalan Islam yang sesungguhnya yang datang dari Allah dan Rosul-Nya serta berupaya mendidik dan membekali kader dakwah dengan Aqidah Sholihah, ‘Ibadah, Adab dan Akhlak dan Mu’amalah berdasarkan Al-Qur’an dan Sunnah dengan Manhaj Salafus Sholeh, Ahlus Sunnah wal Jama’ah serta ditambah materi khusus Hafalan Qur’an juga dipadu dengan Ilmu umum dan keterampilan yang dibimbing oleh tenaga pengajar lulusan dalam dan luar negeri.
                </p>
            </div>
        </div>
    </section>

    <!-- fourth section -->
    <section class="data-ponpes bg-white relative w-full overflow-hidden">
        <div class="flex flex-col justify-center items-center max-w-screen-xl px-4 py-2 mx-auto text-center mb-10">
            <!-- Card section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full lg:w-3/4">
                <!-- Card 1 -->
                <div class="text-start p-4 rounded-lg border border-green-100 bg-green-100">
                    <img src="{{ asset('images/class.png') }}" alt="ponpes-al-mazaya-highlight" class="mx-auto rounded-md max-w-none">
                    <h3 class="text-4xl font-bold mt-4 mb-2 text-center text-green-700">10</h3>
                    <p class="font-bold text-2xl text-center text-green-700">Program Pendidikan</p>
                </div>
                <!-- Card 2 -->
                <div class="text-start p-4 rounded-lg border border-green-100 bg-green-100">
                    <img src="{{ asset('images/students.png') }}" alt="ponpes-al-mazaya-highlight" class="mx-auto rounded-md max-w-none">
                    <h3 class="text-4xl font-bold mt-4 mb-2 text-center text-green-700">1278</h3>
                    <p class="font-bold text-2xl text-center text-green-700">Santri Aktif</p>
                </div>
                <!-- Card 3 -->
                <div class="text-start p-4 rounded-lg border border-green-100 bg-green-100">
                    <img src="{{ asset('images/teachers.png') }}" alt="ponpes-al-mazaya-highlight" class="mx-auto rounded-md max-w-none">
                    <h3 class="text-4xl font-bold mt-4 mb-2 text-center text-green-700">15</h3>
                    <p class="font-bold text-2xl text-center text-green-700">Asatidzah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fifth section -->
    <section class="visi-misi bg-green-900 py-20 w-full overflow-hidden">
        <div class="bg-white rounded-2xl mx-4 sm:mx-auto max-w-screen-xl px-4 sm:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Visi -->
                <div class="flex flex-col justify-center text-center text-black">
                    <h2 class="text-6xl font-bold mb-2">Visi</h2>
                    <div class="w-20 h-0.5 bg-black mx-auto mb-6"></div>
                    <p class="text-2xl font-light text-justify px-4">
                        Pondok Pesantren Al-Mazaya dibangun di atas pondasi TAQWA dengan Asas Al-Qur'an dan Sunnah, berupaya mengembalikan masyarakat islam kepada jalan Islam yang sesungguhnya yang datang dari Allah dan Rosul-Nya serta berupaya mendidik dan membekali kader dakwah dengan Aqidah Sholihah.
                    </p>
                </div>

                <!-- Kolom Misi -->
                <div class="flex flex-col justify-center text-center text-black">
                    <h2 class="text-6xl font-bold mb-2">Misi</h2>
                    <div class="w-20 h-0.5 bg-black mx-auto mb-6"></div>
                    <p class="text-2xl font-light text-justify px-4">
                        Ibadah, Adab dan Akhlak dan Mu'amalah berdasarkan Al-Qur'an dan Sunnah dengan Manhaj Salafus Sholeh, Ahlus Sunnah wal Jama'ah serta ditambah materi khusus Hafalan Qur'an juga dipadu dengan Ilmu umum dan keterampilan yang dibimbing oleh tenaga pengajar lulusan dalam dan luar negeri.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sixth section -->
    <section class="cerita-alumni bg-white relative w-full overflow-hidden">
        <div class="flex flex-col justify-center items-center max-w-screen-xl px-4 py-8 mx-auto text-center w-full">
            <!-- Kolom Teks -->
            <h2 class="text-6xl font-bold mb-2">Cerita Alumni</h2>
            <p class="text-2xl font-light mb-2">Pengalaman beberapa alumni terbaik kami</p>
            <!-- Garis Bawah -->
            <div class="w-52 h-0.5 bg-black mx-auto mb-6"></div>
            <!-- Card section - mengubah grid menjadi 2x2 pada tablet -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 w-full lg:w-full">
                <!-- Card 1 -->
                <div class="text-start p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow border-2 border-green-600">
                    <div class="flex items-start">
                        <img src="{{ asset('images/chat.png') }}" alt="ponpes-al-mazaya-highlight" class="w-[43px] h-[43px] rounded-md">
                    </div>
                    <p class="text-base font-light mt-4 mb-2 text-start">Bismillah, Ma'had Riyadhussholihiin sudah tidak asing lagi bagi saya, 6 tahun menuntut ilmu & mengabdi di sana sungguh menyenangkan</p>
                    <!-- Profile section with image -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/character.png') }}" alt="alumni-profile" class="w-12 h-12 rounded-full">
                        <div class="flex flex-col items-start">
                            <p class="font-bold text-base">Faqih Al-Bukhori</p>
                            <p class="font-bold text-base text-green-600">Alumni Th. 2016</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="text-start p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow border-2 border-green-600">
                    <div class="flex items-start">
                        <img src="{{ asset('images/chat.png') }}" alt="ponpes-al-mazaya-highlight" class="w-[43px] h-[43px] rounded-md">
                    </div>
                    <p class="text-base font-light mt-4 mb-2 text-start">Bismillah, Ma'had Riyadhussholihiin sudah tidak asing lagi bagi saya, 6 tahun menuntut ilmu & mengabdi di sana sungguh menyenangkan</p>
                    <!-- Profile section with image -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/character.png') }}" alt="alumni-profile" class="w-12 h-12 rounded-full">
                        <div class="flex flex-col items-start">
                            <p class="font-bold text-base">Faqih Al-Bukhori</p>
                            <p class="font-bold text-base text-green-600">Alumni Th. 2016</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="text-start p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow border-2 border-green-600">
                    <div class="flex items-start">
                        <img src="{{ asset('images/chat.png') }}" alt="ponpes-al-mazaya-highlight" class="w-[43px] h-[43px] rounded-md">
                    </div>
                    <p class="text-base font-light mt-4 mb-2 text-start">Bismillah, Ma'had Riyadhussholihiin sudah tidak asing lagi bagi saya, 6 tahun menuntut ilmu & mengabdi di sana sungguh menyenangkan</p>
                    <!-- Profile section with image -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/character.png') }}" alt="alumni-profile" class="w-12 h-12 rounded-full">
                        <div class="flex flex-col items-start">
                            <p class="font-bold text-base">Faqih Al-Bukhori</p>
                            <p class="font-bold text-base text-green-600">Alumni Th. 2016</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="text-start p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow border-2 border-green-600">
                    <div class="flex items-start">
                        <img src="{{ asset('images/chat.png') }}" alt="ponpes-al-mazaya-highlight" class="w-[43px] h-[43px] rounded-md">
                    </div>
                    <p class="text-base font-light mt-4 mb-2 text-start">Bismillah, Ma'had Riyadhussholihiin sudah tidak asing lagi bagi saya, 6 tahun menuntut ilmu & mengabdi di sana sungguh menyenangkan</p>
                    <!-- Profile section with image -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/character.png') }}" alt="alumni-profile" class="w-12 h-12 rounded-full">
                        <div class="flex flex-col items-start">
                            <p class="font-bold text-base">Faqih Al-Bukhori</p>
                            <p class="font-bold text-base text-green-600">Alumni Th. 2016</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seventh section -->
    <section class="kerjasama bg-white relative mb-14 w-full overflow-hidden">
        <div class="flex flex-col justify-center items-center max-w-screen-xl px-4 py-8 mx-auto text-center">
            <!-- Kolom Teks -->
            <h2 class="text-6xl font-bold mb-4">Kerjasama Lembaga</h2>
            <div class="w-52 h-0.5 bg-black mx-auto mb-6"></div>
            <!-- Carousel section -->
            <div class="max-w-4xl mx-auto relative" x-data="{
    activeSlide: 1,
    slides: [
        // Slide 1 (3 gambar)
        {id: 1, title: 'Gambar 1', image: 'images/lembaga.png'},
        {id: 2, title: 'Gambar 2', image: 'images/asset-berita.png'},
        {id: 3, title: 'Gambar 3', image: 'images/nucuy.png'},
        // Slide 2 (3 gambar)
        {id: 4, title: 'Gambar 4', image: 'images/asset-berita.png'},
        {id: 5, title: 'Gambar 5', image: 'images/univmuhammadiyah.png'},
        {id: 6, title: 'Gambar 6', image: 'images/tutwuri.png'},
        // Slide 3 (3 gambar)
        {id: 7, title: 'Gambar 7', image: 'images/asset-berita.png'},
        {id: 8, title: 'Gambar 8', image: 'images/lembaga.png'},
        {id: 9, title: 'Gambar 9', image: 'images/tutwuri.png'},
        // Slide 4 (3 gambar)
        {id: 10, title: 'Gambar 10', image: 'images/univmuhammadiyah.png'},
        {id: 11, title: 'Gambar 11', image: 'images/asset-berita.png'},
        {id: 12, title: 'Gambar 12', image: 'images/tutwuri.png'}
    ],
    totalGroups: 4,
    loop(){
        setInterval(() => {
            this.activeSlide = this.activeSlide === this.totalGroups ? 1 : this.activeSlide + 1;
        }, 2000);
    },
    get visibleSlides() {
        const groupSize = 3;
        const start = (this.activeSlide - 1) * groupSize;
        const end = start + groupSize;
        return this.slides.slice(start, end);
    }
}"
                x-init="loop">
                <!-- Data loop -->
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <template x-for="slide in visibleSlides" :key="slide.id">
                        <div class="p-4 h-80 flex flex-col items-center justify-center bg-white text-black rounded-lg">
                            <img :src="slide.image" :alt="slide.title" class="w-full h-auto object-cover rounded-lg shadow-md">
                            <!-- Menghapus baris title di bawah ini -->
                            <!-- <h2 class="font-bold text-xl text-center mt-2" x-text="slide.title"></h2> -->
                        </div>
                    </template>
                </div>

                <!-- Next/Previous buttons -->
                <div class="absolute flex inset-0">
                    <div class="flex items-center justify-start w-1/2">
                        <button
                            x-on:click="activeSlide = activeSlide === 1 ? totalGroups : activeSlide - 1"
                            class="bg-slate-100 text-slate-500 font-bold rounded-full w-12 h-12 shadow flex justify-center items-center -ml-16 hover:bg-green-600 transition hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-end w-1/2">
                        <button
                            x-on:click="activeSlide = activeSlide === totalGroups ? 1 : activeSlide + 1"
                            class="bg-slate-100 text-slate-500 font-bold rounded-full w-12 h-12 shadow flex justify-center items-center -mr-16 hover:bg-green-600 transition hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- 4 Dots buttons -->
                <div class="absolute -bottom-8 w-full flex items-center justify-center px-4">
                    <template x-for="n in totalGroups" :key="n">
                        <button
                            class="w-4 h-4 mx-1 rounded-full transition-colors duration-200 ease-out hover:bg-slate-600 hover:shadow-lg"
                            :class="{
                    'bg-green-600' : activeSlide === n, 
                    'bg-slate-400' : activeSlide !== n
                }"
                            x-on:click="activeSlide = n"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Eighth section -->
    <section class="alamat bg-white relative w-full overflow-hidden">
        <div class="flex flex-col justify-center items-center max-w-screen-xl px-4 py-8 mx-auto text-center w-full">
            <!-- Kolom Teks -->
            <h2 class="text-6xl font-bold mb-4">Alamat Kami</h2>
            <div class="w-64 h-0.5 bg-black mx-auto mb-10"></div>
            <!-- Maps section -->
            <div class="flex justify-center items-center w-full h-96 bg-gray-100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.7138177830107!2d116.15041040000001!3d-1.8610364999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df047bf07ccd1d5%3A0x52b859ed2883afba!2sPondok%20Pesantren%20Al%20Mazaya%20Paser!5e0!3m2!1sid!2sid!4v1734686179315!5m2!1sid!2sid"
                    width="600"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-lg shadow-lg border border-gray-300 w-full h-full">
                </iframe>
            </div>

        </div>
    </section>

</x-main-layout>