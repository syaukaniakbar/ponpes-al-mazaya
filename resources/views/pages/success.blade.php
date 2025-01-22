<x-main-layout>
    @section('title', 'Official Website Ponpes Al-Mazaya | Home') <!-- Mengisi bagian @yield('title') di parent -->

    <div class="container mx-auto p-4 min-h-screen flex items-center justify-center bg-gray-100">
        <div id="success" class="flex items-center justify-center w-full">
            <div class="relative p-6 w-full max-w-lg bg-white rounded-xl shadow-lg space-y-6">
    
                <!-- Success icon -->
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-green-100 rounded-full">
                    <svg class="w-8 h-8 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
    
                <!-- Success message -->
                <div class="text-center">
                    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900">Pendaftaran Berhasil!</h2>
                    <p class="mt-2 text-sm sm:text-base text-gray-600">
                        Kami dengan senang hati mengonfirmasi bahwa <span class="text-green-600 font-semibold uppercase">{{ $siswa->nama }}</span> 
                        dengan NISN <span class="text-green-600 font-semibold uppercase">{{ $siswa->nisn }}</span> telah berhasil terdaftar 
                        dalam program pendidikan <span class="text-green-600 font-semibold uppercase">({{ $siswa->program_pendidikan }})</span>.
                    </p>
                </div>
    
                <!-- Button to close or redirect -->
                <div class="text-center">
                    <p class="text-sm text-gray-600 mb-4">
                        Untuk melanjutkan, Anda dapat memeriksa status pendaftaran dengan menekan tombol berikut.
                    </p>
                    <a href="{{ route('cek-status') }}" class="block px-6 py-3 text-white bg-green-500 rounded-lg shadow-md hover:bg-green-600 transition duration-300 w-full sm:w-auto text-center">
                        Cek Status Pendaftaran
                    </a>                    
                </div>
            </div>
        </div>
    </div>    
    
</x-main-layout>
