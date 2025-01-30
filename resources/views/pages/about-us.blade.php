<!-- isi kodingan section dibawah ini -->
<x-main-layout class="overflow-x-hidden">
    <!-- First Section -->
    <section class="aboutus w-full overflow-hidden">
        <div class="relative isolate overflow-hidden bg-gray-900 py-48 sm:py-56 w-full">
            <!-- Background Image -->
            <img src="{{ asset('images/hero-section-ponpes.png') }}" class="absolute inset-0 -z-10 w-full h-full object-cover object-center" alt="Al-Mazaya Logo" />
    
            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-black bg-opacity-90 -z-10"></div>
    
            <!-- Decorative Blur Effects -->
            <div class="hidden sm:block sm:absolute sm:-top-10 sm:right-1/2 sm:transform sm:translate-x-1/2 sm:blur-3xl" aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#4cff46] to-[#6f91ff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
    
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center text-center">
                <div class="mx-auto max-w-2xl">
                    <h2 class="text-5xl font-semibold tracking-tight text-zinc-50 sm:text-6xl md:text-7xl leading-tight">Tentang Al-Mazaya</h2>
                    <p class="mt-8 text-lg font-light text-zinc-200 sm:text-xl/8 md:text-2xl leading-relaxed">
                        Pondok Pesantren Al Mazaya Paser, yang didirikan pada 2021 oleh H. Nashruddin, Lc, M.Pd, bertujuan mencetak generasi yang berilmu, beriman, dan berakhlak. Terletak di Desa Sempulang, Tanah Grogot, Paser, pesantren ini berafiliasi dengan Nahdhatul Ulama dan mengelola MTs serta MA. Al Mazaya menawarkan pendidikan yang mengintegrasikan ilmu agama, bahasa Arab dan Inggris, serta teknologi. Pendidikan dibagi dalam tiga tingkatan: Ûlâ, Wushtha, dan Úlya.
                    </p>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Second section -->
    <section class="sambutan bg-white relative w-full overflow-hidden py-12 px-4 sm:py-16 sm:px-6 lg:py-20 lg:px-8">
        <div class="grid max-w-screen-xl mx-auto lg:gap-16 xl:gap-24 lg:grid-cols-12 items-center">
            <!-- Gambar dan Informasi -->
            <div class="flex flex-col justify-center items-center lg:col-span-5 lg:items-start text-center lg:text-start px-6 lg:px-8 mb-8 lg:mb-0">
                <img
                    src="{{ asset('images/ponpes-headline.png') }}"
                    alt="Pengasuh Pondok Pesantren Al Mazaya"
                    class="w-full max-w-md lg:max-w-lg rounded-xl shadow-lg mb-6">
                <div>
                    <p class="text-gray-600 text-base font-medium mb-1">Pengasuh Pondok Pesantren Al Mazaya</p>
                    <p class="text-xl font-semibold text-gray-800">H. Nashruddin, Lc, M.Pd</p>
                </div>
            </div>
    
            <!-- Kata Sambutan -->
            <div class="lg:col-span-7 relative px-6 lg:px-8">
                <!-- Tanda Kutip Kiri Atas -->
                <img
                    src="{{ asset('images/kutip-besar1.png') }}"
                    alt="Tanda kutip kiri"
                    class="absolute top-0 left-0 w-12 lg:w-16 -translate-x-6 -translate-y-6 opacity-50">
    
                <div class="text-center lg:text-start mb-8 md:mt-12">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4 sm:mb-6">
                        Kata Sambutan
                    </h2>
                    <!-- Garis dekoratif -->
                    <div class="w-24 sm:w-36 h-1 bg-blue-600 mx-auto lg:mx-0 mb-6"></div>
                </div>
                <p class="text-lg sm:text-xl leading-relaxed text-gray-700 mb-10 sm:mb-12">
                    Bersyukur kepada Allah Subhanahu Wa Ta’ala, Pondok Pesantren Al Mazaya Paser hadir sejak 2021 dengan visi sederhana: mengubah mimpi santri menjadi nyata. Dari dua rumah sewaan, kini kami melihat generasi berakar iman, bersayap ilmu, dan berhati kokoh melanjutkan studi ke Al Azhar Mesir. Setiap langkah ini adalah buah doa, kerja keras, dan dukungan Anda semua. Terima kasih. Mari terus bersama menanam benih cahaya untuk masa depan umat dan bangsa.
                </p>
    
                <!-- Tanda Kutip Kanan Bawah -->
                <img
                    src="{{ asset('images/kutip-besar2.png') }}"
                    alt="Tanda kutip kanan"
                    class="absolute bottom-0 right-0 w-12 lg:w-16 translate-x-6 translate-y-6 opacity-50">
            </div>
        </div>
    </section>
    
    

    <!-- Third section -->
    <section class="sejarah bg-white relative w-full overflow-hidden">
        <div class="bg-green-900 rounded-2xl mx-6 sm:mx-auto max-w-screen-xl px-6 py-10 my-16 shadow-lg">
        <div class="flex flex-col items-center text-center text-white">
            <!-- Judul Section -->
            <h2 class="text-4xl sm:text-6xl font-extrabold tracking-wide mb-4">Sejarah</h2>
            <p class="text-lg sm:text-2xl font-light mb-4">Pondok Pesantren Al-Mazaya</p>
            
            <!-- Garis Bawah -->
            <div class="w-24 sm:w-32 h-1 bg-white rounded-full mx-auto mb-8"></div>
            
            <!-- Konten -->
            <p class="text-base sm:text-lg font-light text-left leading-relaxed px-6 sm:px-10 lg:px-16">
            Pondok Pesantren Al Mazaya Paser didirikan pada pertengahan tahun 2021 oleh Ustadz H. Nashruddin, Lc, M.Pd atas arahan 
            Dr. Habib Segaf Baharun, Rektor UII Darul Lughah wad Da’wah, Pasuruan, Jawa Timur. <br><br>
            Awalnya, Ustadz Nashruddin menyewa 2 rumah untuk menampung santri Al Mazaya Center Paser yang akan melanjutkan studi di Universitas Al Azhar, Mesir. 
            Mazaya Center merupakan lembaga di bawah Yayasan Az Zaini Al Azhari Paser yang fokus memberikan bimbingan dan pendampingan bagi santri yang ingin ber-tafaqquh ke Timur Tengah. <br><br>
            Pada awal tahun 2022, 6 (enam) orang santri Al Mazaya Paser berangkat menuju Mesir untuk melanjutkan pendidikan di Universitas Al Azhar, Kairo, Mesir. Pada tahun 2023, 12 (dua belas) orang santri Al Mazaya akan menyusul angkatan pertama yang sudah berada di Mesir. Perdana membuka pendaftaran santri baru pada bulan Februari 2022, jumlah santri yang diterima saat itu sebanyak 98 (sembilan puluh delapan) orang santri. Memulai pembelajaran tahun ajaran 2022/2023 pada bulan Agustus 2022.
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
                    <h3 class="text-4xl font-bold mt-4 mb-2 text-center text-green-700">4</h3>
                    <p class="font-bold text-2xl text-center text-green-700">Program Pendidikan</p>
                </div>
                <!-- Card 2 -->
                <div class="text-start p-4 rounded-lg border border-green-100 bg-green-100">
                    <img src="{{ asset('images/students.png') }}" alt="ponpes-al-mazaya-highlight" class="mx-auto rounded-md max-w-none">
                    <h3 class="text-4xl font-bold mt-4 mb-2 text-center text-green-700">{{ $students->sum() }}</h3>
                    <p class="font-bold text-2xl text-center text-green-700">Santri Aktif</p>
                </div>
                <!-- Card 3 -->
                <div class="text-start p-4 rounded-lg border border-green-100 bg-green-100">
                    <img src="{{ asset('images/teachers.png') }}" alt="ponpes-al-mazaya-highlight" class="mx-auto rounded-md max-w-none">
                    <h3 class="text-4xl font-bold mt-4 mb-2 text-center text-green-700">{{ $totalTeacherStaffs }}</h3>
                    <p class="font-bold text-2xl text-center text-green-700">Guru</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fifth section -->
    <section class="visi-misi bg-green-900 py-20 w-full overflow-hidden">
        <div class="bg-white rounded-2xl mx-4 sm:mx-auto max-w-screen-xl px-6 sm:px-10 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-24 items-start"> <!-- Tambah items-start -->
                <!-- Kolom Visi (Revisi) -->
                <div class="flex flex-col text-center md:text-left text-black h-full">
                    <h2 class="text-4xl md:text-5xl font-semibold mb-4 text-gray-800">Visi</h2>
                    <div class="w-24 h-1 bg-black mx-auto mb-6"></div>
                    <p class="text-xl font-light text-gray-700 md:px-0 leading-tight">
                        Mencetak generasi yang berilmu, beriman, beramal, berakhlak, dan berwawasan.
                    </p>
                </div>
    
                <!-- Kolom Misi (Tetap) -->
                <div class="flex flex-col text-center md:text-left text-black h-full">
                    <h2 class="text-4xl md:text-5xl font-semibold mb-4 text-gray-800">Misi</h2>
                    <div class="w-24 h-1 bg-black mx-auto mb-6"></div>
                    <ul class="list-disc pl-6 space-y-4 text-xl font-light text-gray-700 text-left">
                        <li>Menanamkan nilai-nilai iman, takwa, dan akhlak mulia sebagai fondasi karakter santri.</li>
                        <li>Mengembangkan sistem pembelajaran terintegrasi yang mencakup ilmu (kognitif), amal (psikomotorik), dan akhlak (afektif).</li>
                        <li>Memperluas wawasan santri melalui penguatan kearifan lokal dan perspektif global.</li>
                        <li>Menerapkan <em>manhaj Ahlusunnah wal Jama'ah</em> dalam kurikulum dan praktik keagamaan.</li>
                        <li>Meningkatkan kompetensi bahasa Arab dan Inggris mencakup empat keterampilan: mendengar (<em>istimâ’</em>), membaca (<em>qirâ’ah</em>), menulis (<em>kitâbah</em>), dan komunikasi (<em>kalâm</em>).</li>
                        <li>Melakukan regenerasi dan spesialisasi ilmu agama (seperti tafsir, hadis, fiqh) secara sistematis.</li>
                        <li>Mengintegrasikan kemampuan dasar teknologi informasi dalam proses pembelajaran sebagai bekal di era digital.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    

    <!-- Sixth section -->
    {{-- <section class="cerita-alumni bg-white relative w-full overflow-hidden">
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
    </section> --}}

    <!-- Seventh section -->
    <section class="bg-white py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
        <h2 class="text-4xl sm:text-6xl font-extrabold tracking-wide mb-4 text-center">
            Kerja Sama
        </h2>
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/kemenag.png') }}" alt="Logo Kerja Sama" class="w-64 h-64 object-contain transition-transform transform hover:scale-110 hover:shadow-xl hover:shadow-green-500/50 rounded-lg">
        </div>
    </section>
    
    

    <!-- Eighth section -->
    <section class="alamat bg-white relative w-full overflow-hidden">
        <div class="flex flex-col justify-center items-center max-w-screen-xl px-4 py-8 md:py-20 mx-auto text-center w-full">
            <!-- Kolom Teks -->
            <h2 class="text-4xl sm:text-6xl font-extrabold tracking-wide mb-4">Alamat Kami</h2>
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