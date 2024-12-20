<!-- isi kodingan section dibawah ini -->
<x-main-layout>
    <section class="aboutus">
        <div class="relative isolate overflow-hidden bg-gray-900 py-48 sm:py-52 ">
            <img src="{{ asset('images/hero-section-ponpes.png') }}"
                class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center"
                alt="Al-Mazaya Logo" />
            <!-- Overlay Gelap -->
            <div class="            absolute inset-0 bg-black bg-opacity-55 -z-10"></div>
            <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
                aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
                aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center text-center">
                <!-- Lapisan gelap semi-transparan untuk kontras -->
                <div class="mx-auto max-w-2xl">
                    <h2 class="text-5xl font-semibold tracking-tight text-zinc-50 sm:text-7xl">Tentang Al-Mazaya</h2>
                    <p class="mt-8 text-pretty text-lg font-light text-zinc-50 sm:text-xl/8"> Ponpes Al-Mazaya adalah
                        lembaga pendidikan dengan layanan program Tahfidzul Quran, Madrasah Diniyah Takmiliyah, SMP, dan
                        SMK.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="highlight bg-white">
         <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12 my-32">
            <!-- img section -->
            <div
                class="flex justify-center items-center lg:col-span-5 lg:justify-start px-4 lg:pr-8 lg:pl-0 mb-6 lg:mb-0">
                <img src="{{ asset('images/ponpes-headline.png') }}" alt="ponpes-al-mazaya-highlight"
                    class="w-full max-w-xs md:max-w-sm lg:max-w-lg rounded-lg">
            </div>
            <!-- end img section -->

            <div class="mr-auto place-self-center lg:col-span-7 px-4 lg:pl-16">
                <div class="flex flex-col items-center">
                    <h2 class="text-5xl font-bold mb-4">Kata Sambutan</h2>
                    <!-- Garis Bawah -->
                    <div class="w-64 h-1 bg-black mb-6"></div>
                </div>
                <p class="text-lg mb-8">
                    Alhamdulillah, segala puji dan syukur kita panjatkan kehadirat Allah Subhanahu Wa Ta'ala yang telah
                    melimpahkan nikmat-Nya kepada kita semua, mulai dari nikmat iman, nikmat islam, nikmat sehat dan
                    kesempatan untuk berkarya serta berdakwah di bidang pendidikan sebagai bagian penting dari upaya
                    mewujudkan generasi muslim yang beriman dan bertaqwa.
                </p>
            </div>
        </div>
    </section>

</x-main-layout>
