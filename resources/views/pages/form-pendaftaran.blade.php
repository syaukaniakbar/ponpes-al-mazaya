<x-main-layout><!-- Menghubungkan ke layout parent -->

    @section('title', 'Pendaftaran | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    <section class="max-w-4xl mx-auto p-8 shadow-md rounded-lg my-28 border">
        <h1 class="text-2xl font-bold text-center mb-2">Pendaftaran Santri Baru</h1>
        <p class="text-center text-gray-600 mb-6">Isikan data dengan benar untuk proses pendaftaran.</p>

        <div x-data="{ currentStep: 1, totalSteps: 4 }" class="w-full">
            <!-- Stepper Indicator -->
            <ol class="flex flex-col items-center justify-center w-full text-sm fonat-medium text-center text-gray-500 dark:text-gray-400 md:flex-row md:items-start md:text-base lg:mb-4 lg:mt-20 md:text-start">
                <template x-for="step in totalSteps" :key="step">
                    <li
                        class="flex flex-col items-center lg:mb-20 md:mb-0 md:flex-row md:items-start mx-0 md:mx-3"
                        :class="{
                            'hidden md:flex': currentStep !== step,
                            'block md:flex text-green-600 dark:text-green-500 font-bold': currentStep === step,
                            'text-blue-600': currentStep > step
                        }"
                    >
                        <span
                            class="flex flex-col items-center step-content md:flex-row"
                        >
                            <span x-show="step === 1">
                                <svg class="w-6 h-6 mb-2 md:mb-0 md:me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                    />
                                </svg>
                            </span>
                            <span x-show="step === 2">
                                <svg class="w-6 h-6 mb-2 md:mb-0 md:me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                    />
                                </svg>
                            </span>
                            <span x-show="step === 3">
                                <svg class="w-6 h-6 mb-2 md:mb-0 md:me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                    />
                                </svg>
                            </span>
                            <span x-show="step === 4">
                                <svg class="w-6 h-6 mb-2 md:mb-0 md:me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                    />
                                </svg>
                            </span>
                            <span class="step-label" x-text="step === 1 ? 'Tahapan Pendaftaran' : step === 2 ? 'Aturan Pondok Pesantren' : step === 3 ? 'Unduh Surat Pernyataan' : 'Formulir Pendaftaran'"></span>
                        </span>
                    </li>
                </template>
            </ol>
            

            <!-- Step Content -->
            <div class="mt-4">
                <div 
                    x-data="{ isZoomed: false }"
                    x-show="currentStep === 1" 
                    class="step-content"
                    x-transition:enter="transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-semibold text-gray-800 mb-2">Tahapan Pendaftaran</h2>
                        <p class="text-gray-600 text-lg">Tahapan pendaftaran yang telah ditentukan di Pondok Pesantren Al-Mazaya.</p>
                    </div>
                    <div class="relative">
                        <img 
                            :class="{ 'cursor-zoom-out': isZoomed, 'cursor-zoom-in': !isZoomed }" 
                            @click="isZoomed = !isZoomed" 
                            src="{{ asset('images/alur_pendaftaran_desktop.jpg') }}" 
                            alt="alur_pendaftaran"
                            class="w-full h-auto max-w-md md:max-w-lg lg:max-w-2xl mx-auto transition-transform duration-300"
                            :class="{ 'cursor-zoom-out scale-150': isZoomed, 'cursor-zoom-in': !isZoomed }"
                        >
                    </div>

                    <!-- Zoomed Background (Optional for Modal Effect) -->
                    <div 
                        x-show="isZoomed" 
                        @click="isZoomed = false"
                        class="fixed inset-0 bg-black bg-opacity-50 z-10 flex items-center justify-center"
                    >
                        <img 
                            src="{{ asset('images/alur_pendaftaran_desktop.jpg') }}" 
                            alt="alur_pendaftaran"
                            class="max-w-7xl w-full h-auto transition-transform duration-300 top-"
                        >
                    </div>
                </div>

                <div x-show="currentStep === 2"
                    class="step-content"
                    x-transition:enter="transition-opacity ease-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="py-8 px-6 bg-white rounded-lg shadow-md"
                    style="max-width: 1200px; margin: 0 auto;">
                    
                    <!-- Judul dan Deskripsi PDF -->
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-semibold text-gray-800 mb-2">Aturan Pondok Pesantren</h2>
                        <p class="text-gray-600 text-lg">Dokumen ini menjelaskan berbagai aturan yang berlaku di Pondok Pesantren kami. Pastikan Anda membacanya dengan baik.</p>
                    </div>
                    <!-- Tampilan PDF -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg m-12">
                          <!-- Menampilkan PDF Aturan -->
                        @if ($aturanDocument)
                            <iframe src="{{ asset($aturanDocument->path) }}" width="100%" height="600px"></iframe>
                        @else
                            <p>Dokumen aturan tidak ditemukan.</p>
                        @endif
                    </div>
                </div>


                <!-- Step 2 -->
                <div  x-show="currentStep === 3" 
                        class="step-content"
                        x-transition:enter="transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-semibold text-gray-800 mb-2">Surat Pernyataan</h2>
                        <p class="text-gray-600 text-lg">Surat pernyataan memerlukan tanda tangan, harap mencantumkan materai 10000 sebagai bukti keabsahan dan kesepakatan terhadap aturan yang berlaku.</p>
                    </div>
                    <!-- Tombol Unduh PDF -->
                    <div class="text-center mt-4">
                        <a href="{{ asset($suratPernyataanDocument->path) }}" 
                            download 
                            class="inline-block text-white bg-orange-600 hover:bg-orange-800 rounded-lg px-6 py-3 mt-4">
                             Unduh Surat Pernyataan
                         </a>
                    </div>
                     <!-- Tampilan PDF -->
                     <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg m-12">
                        @if ($suratPernyataanDocument)
                            <iframe src="{{ asset($suratPernyataanDocument->path) }}" width="100%" height="600px"></iframe>
                        @else
                            <p>Dokumen surat pernyataan tidak ditemukan.</p>
                        @endif
                    </div>
                </div>

              <!-- Step 3: Form -->
              <div  x-show="currentStep === 4" 
                    class="step-content"
                    x-transition:enter="transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >

                <form action="{{ route('pendaftaran.store') }}" method="POST" id="form_siswa" enctype="multipart/form-data">
                    @csrf
                    <!-- Nomor Induk Siswa Nasional -->
                    <div class="mb-4">
                        <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Induk Siswa Nasional (NISN)
                        </label>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                            <input 
                                type="text" 
                                id="nisn" 
                                name="nisn"
                                value="{{ old('nisn') }}"  
                                placeholder="Masukkan Nomor NISN Siswa" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                aria-label="Masukkan nomor NISN siswa"
                                maxlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                            >
                            <button 
                                type="button" 
                                class="w-full sm:w-auto min-w-[80px] px-4 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-center items-center"
                                aria-label="Cek nomor NISN"
                                onclick="searchSiswa()"
                            >
                                CEK NISN
                            </button>
        
                        </div>
                        <p id="status-message"  class="p-2 text-xs text-left text-white bg-yellow-400 mt-2 rounded-md w-full sm:w-72">
                            NISN wajib diisi. Untuk bantuan, hubungi 
                            <a href="#" class="underline text-blue-900 hover:text-blue-600">klik disini</a>
                        </p>
                    </div>
                    
                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap (Sesuai Akta/KTP)</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- Program Pendidikan -->
                    <div class="mb-4">
                        <label for="program_pendidikan" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Program Pendidikan</label>
                        <select id="program_pendidikan" name="program_pendidikan" class="w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Pilih Program Pendidikan</option>
                            <option value="wustha" {{ old('program_pendidikan') == 'wustha' ? 'selected' : '' }}>Wustha (Pondok Setara MTs dan SMP)</option>
                            <option value="ulya" {{ old('program_pendidikan') == 'ulya' ? 'selected' : '' }}>Ulya (Pondok Setara MA dan SMA)</option>
                            <option value="mts" {{ old('program_pendidikan') == 'mts' ? 'selected' : '' }}>Madrasah Tsanawiyah (MTS)</option>
                            <option value="ma" {{ old('program_pendidikan') == 'ma' ? 'selected' : '' }}>Madrasah Aliyah (MA)</option>
                        </select>
                    </div>
        
                    <!-- NIK -->
                    <div class="mb-4">
                        <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                        <input 
                            type="text" 
                            id="nik" 
                            name="nik"
                            value="{{ old('nik') }}"   
                            placeholder="Masukkan Nomor Induk Kependudukan" 
                            class="w-full p-2 border border-gray-300 rounded-md"
                            maxlength="16"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                        >
                    </div>
        
                    <!-- Nomor KK -->
                    <div class="mb-4">
                        <label for="nomor_kk" class="block text-sm font-medium text-gray-700 mb-2">Nomor Kartu Keluarga</label>
                        <input 
                            type="text" 
                            id="nomor_kk" 
                            name="nomor_kk" 
                            value="{{ old('nomor_kk') }}"  
                            placeholder="Masukkan Nomor Kartu Keluarga" 
                            class="w-full p-2 border border-gray-300 rounded-md"
                            maxlength="16"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                        >
                    </div>
        
                    <!-- Tempat & Tanggal Lahir -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Tempat Lahir" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
        
                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-2 border border-gray-300 rounded-md" onchange="toggleKopiahDropdown()">
                            <option value="">Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
        
                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat_domisili" class="block text-sm font-medium text-gray-700 mb-2">Alamat Domisili</label>
                        <input type="text" id="alamat_domisili" name="alamat_domisili"  value="{{ old('alamat_domisili') }}"  placeholder="Contoh: Jalan Mawar No. 12, Kelurahan Suka Maju, Kecamatan Sejahtera, Kota Samarinda, Kalimantan Timur" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                
                    <!-- Provinsi -->
                    <div class="mb-4">
                        <label for="provinceDropdown" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                        <!-- Dropdown -->
                        <select 
                            id="provinceDropdown"
                            name="provinsi" 
                            class="w-full p-2 border border-gray-300 rounded-md"
                            onchange="handleProvinceChange(event)"
                        >
                            <option value="">Pilih Provinsi</option>
                        </select>
                        <input 
                            id="customProvinceInput"
                            type="text" 
                            name="custom_provinsi" 
                            placeholder="Masukkan Provinsi..." 
                            class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                            style="display: none;" 
                        >
                        <input type="hidden" id="selectedProvince" name="selected_provinsi">
                    </div>
        
                    <!-- Kota -->
                    <div class="mb-4">
                        <label for="cityDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kota</label>
                        <select 
                            id="cityDropdown"
                            name="kota" 
                            class="w-full p-2 border border-gray-300 rounded-md"
                            onchange="handleCityChange(event)"
                        >
                            <option value="">Pilih Kota</option>
                        </select>
                        
                        <!-- Input teks jika "Pilih Lainnya" dipilih -->
                        <input 
                            id="customCityInput"
                            type="text" 
                            name="custom_city" 
                            placeholder="Masukkan Kota ..." 
                            class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                            style="display: none;" 
                        />
                        <input type="hidden" id="selectedCity" name="selected_kota">
                    </div>
                    
                    <!-- Kecamatan -->
                    <div class="mb-4" >
                        <label for="districtDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                        <select 
                            id="districtDropdown" 
                            name="kecamatan" 
                            class="w-full p-2 border border-gray-300 rounded-md" 
                            onchange="handleDistrictChange(event)"
                        >
                            <option value="">Pilih Kecamatan</option>
                            <option value="other" class="bg-yellow-400 text-white">PILIH LAINNYA</option>
                        </select>
                        <input 
                            id="customDistrictInput" 
                            type="text" 
                            name="custom_district" 
                            placeholder="Masukkan Kecamatan ..." 
                            class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                            style="display: none;"
                        />
                        <input type="hidden" id="selectedDistrict" name="selected_kecamatan">
                    </div>
        
                    <!-- Kelurahan -->
                    <div class="mb-4" >
                        <label for="villageDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                        <select 
                            id="villageDropdown" 
                            name="kelurahan" 
                            class="w-full p-2 border border-gray-300 rounded-md"
                            onchange="handleVillageChange(event)"
                        >
                            <option value="">Pilih Kelurahan</option>
                            <option value="other" class="bg-yellow-400 text-white">PILIH LAINNYA</option>
                        </select>
                        <input 
                            id="customVillageInput" 
                            type="text" 
                            name="custom_village" 
                            placeholder="Masukkan Kelurahan ..." 
                            class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                            style="display: none;"
                        />
                        <input type="hidden" id="selectedVillage" name="selected_kelurahan">
                    </div>
        
                    <!-- Jumlah Saudara -->
                    <div class="mb-4">
                        <label for="jumlah_saudara" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Saudara</label>
                        <input type="number" id="jumlah_saudara" name="jumlah_saudara" value="{{ old('jumlah_saudara') }}" placeholder="Jumlah Saudara" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    
                    <!-- Anak Ke -->
                    <div class="mb-4">
                        <label for="anak_ke" class="block text-sm font-medium text-gray-700 mb-2">Anak Ke*</label>
                        <input type="number" id="anak_ke" name="anak_ke" value="{{ old('anak_ke') }}" placeholder="Anak Ke*" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                   
                    <!-- Asal Sekolah -->
                    <div class="mb-4">
                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah Sebelumnya</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" placeholder="MI / MTS?" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                
                    <!-- Nama Ayah -->
                    <div class="mb-4">
                        <label for="nama_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nama Ayah Kandung</label>
                        <input type="text" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- NIK Ayah -->
                    <div class="mb-4">
                        <label for="nik_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nomor Induk Kependudukan (NIK)</label>
                        <input 
                            type="text" 
                            id="nik_ayah" 
                            name="nik_ayah" 
                            value="{{ old('nik_ayah') }}"
                            placeholder="Nomor Induk Kependudukan Ayah" 
                            class="w-full p-2 border border-gray-300 rounded-md"
                            maxlength="16"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                        >
                    </div>
        
                    <!-- Pendidikan Ayah -->
                    <div class="mb-4">
                        <label for="pendidikan_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pendidikan Terakhir Ayah</label>
                        <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" placeholder="Pendidikan Terakhir Ayah" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- Pekerjaan Ayah -->
                    <div class="mb-4">
                        <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pekerjaan Ayah</label>
                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" placeholder="Pekerjaan Ayah" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- Nama Ibu -->
                    <div class="mb-4">
                        <label for="nama_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nama Ibu Kandung</label>
                        <input type="text" 
                        id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                     <!-- NIK Ibu -->
                     <div class="mb-4">
                        <label for="nik_ibu" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" 
                        id="nik_ibu" 
                        name="nik_ibu" 
                        value="{{ old('nik_ibu') }}" 
                        placeholder="Nomor Induk Kependudukan Ibu" 
                        class="w-full p-2 border border-gray-300 rounded-md"
                        maxlength="16"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)">
                    </div>
        
                    <!-- Pendidikan Ibu -->
                    <div class="mb-4">
                        <label for="pendidikan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pendidikan Terakhir Ibu</label>
                        <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" placeholder="Pendidikan Terakhir Ibu" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- Pekerjaan Ibu -->
                    <div class="mb-4">
                        <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pekerjaan Ibu</label>
                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" placeholder="Pekerjaan Ibu" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- Penghasilan-->
                    <div class="mb-4">
                        <label for="penghasilan" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Penghasilan</label>
                        <select id="penghasilan" name="penghasilan" class="w-full p-2 border border-gray-300 rounded-md" onchange="toggleCustomInput(this)">
                            <option value="-">Rata - Rata Penghasilan</option>
                            <option value="Kurang dari Rp. 500.000"> < Rp. 500.000</option>
                            <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                            <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                            <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                            <option value="Rp. 3.000.000 - Rp. 5.000.000">Rp. 3.000.000 - Rp. 5.000.000</option>
                            <option value="Lebih dari Rp. 5.000.000">> 5.000.000</option>
                        </select>
                    </div>
        
                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat_kk" class="block text-sm font-medium text-gray-700 mb-2">Alamat Sesuai Kartu Keluarga (KK)</label>
                        <input type="text" id="alamat_kk" name="alamat_kk" value="{{ old('alamat_kk') }}" placeholder="Contoh: Jalan Mawar No. 12, Kelurahan Suka Maju, Kecamatan Sejahtera, Kota Samarinda, Kalimantan Timur" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
        
                    <!-- Nomor Hp Orang tua WhatsApp -->
                    <div class="mb-4">
                        <label for="no_hp_orangtua" class="block text-sm font-medium text-gray-700 mb-2">Nomor Hp Orang tua (WhatsApp)</label>
                        <input type="text" id="no_hp_orangtua" name="no_hp_orangtua" value="{{ old('no_hp_orangtua') }}" placeholder="Masukkan Nomor Handphone" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                   
                    <!-- Ukuran Kopiah -->
                    <div class="mb-4" id="kopiah_container">
                        <label for="kopiah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Ukuran Kopiah</label>
                        <select id="kopiah" name="kopiah" class="w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Pilih Ukuran Kopiah</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
        
                     <!-- seragam -->
                     <div class="mb-4">
                        <label for="seragam" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Ukuran Seragam</label>
                        <select id="seragam" name="seragam" class="w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Pilih Ukuran Seragam</option>
                            <option value="s">Ukuran Seragam "S"</option>
                            <option value="m">Ukuran Seragam "M"</option>
                            <option value="l">Ukuran Seragam "L"</option>
                            <option value="xl">Ukuran Seragam "XL"</option>
                            <option value="xxl">Ukuran Seragam "XXL"</option>
                            <option value="xxxl">Ukuran Seragam "XXXL"</option>
                        </select>
                    </div>

                    <div class="mb-6 p-4 bg-white border border-gray-200 rounded-lg shadow-md space-y-4">
                        <!-- Header Informasi -->
                        <div class="text-center">
                            <h1 class="text-lg font-bold text-gray-800 sm:text-xl">YPI AZ ZAINI AL AZHARI PASER</h1>
                            <p class="text-xs text-gray-600 sm:text-sm">
                                <span class="me-4" >Pembayaran Rp. 200.000</span><span class="bg-green-700 text-white p-1 me-2 rounded">BSI</span> 
                                2220120239 
                            </p>
                        </div>
                    
                        <!-- Form Input -->
                        <div>
                            <label for="nama_pengirim" class="block text-sm font-semibold text-gray-700 mb-2">
                                Masukkan Nama Pengirim 
                                <span class="italic text-gray-500">(Sesuai Rekening)</span>
                            </label>
                            <input 
                                type="text" 
                                id="nama_pengirim" 
                                name="nama_pengirim" 
                                value="{{ old('nama_pengirim') }}" 
                                placeholder="Contoh: Muhammad Yusuf" 
                                class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 text-sm sm:text-base"
                            >
                        </div>
                    
                        <!-- File Input & Image Preview -->
                        <div 
                            x-data="{ 
                                imagePreview: null, 
                                handleFilePreview(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    this.imagePreview = URL.createObjectURL(file);

                                    // Cek apakah sudah ada elemen img di dalam .imageDisplay
                                    const imageDisplayCell = document.querySelector('.imageDisplay');
                                    let imgElement = imageDisplayCell.querySelector('img');

                                    if (!imgElement) {
                                    // Jika belum ada, buat elemen img
                                    imgElement = document.createElement('img');
                                    imgElement.classList.add('object-cover', 'w-32', 'h-32', 'rounded-lg', 'shadow-md');
                                    imageDisplayCell.appendChild(imgElement);
                                    }

                                    // Update src gambar
                                    imgElement.src = this.imagePreview;
                                }
                                } 
                            }" 
                            class="space-y-4"
                            >
                            <!-- File Input -->
                            <input
                                class="block w-full text-xs text-gray-900 bg-gray-100 border border-gray-300 rounded-lg cursor-pointer focus:outline-none sm:text-sm"
                                id="image"
                                type="file"
                                name="image"
                                accept="image/*"
                                @change="handleFilePreview($event)"
                            >
                            <p class="p-1 mt-2 text-xs text-center text-white bg-yellow-500 rounded sm:text-sm">
                                Gambar menggunakan format: jpeg, png, jpg | Max: 5MB
                            </p>
                            <!-- Image Preview -->
                            <template x-if="imagePreview">
                                <div class="w-full max-w-xs mx-auto sm:max-w-sm">
                                    <img 
                                        :src="imagePreview" 
                                        alt="Selected Image" 
                                        class="object-cover w-full h-48 border-4 border-gray-200 rounded-lg shadow-lg sm:h-64"
                                    >
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button 
                            type="button" 
                            id="submit" 
                            class="w-full px-6 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-500" 
                            onclick="openModal('modelConfirm')"
                        >
                            Submit
                        </button>
                         <!-- Modal Confirmation -->
                        <div id="modelConfirm" class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60">
                            <div class="relative max-w-md mx-auto bg-white rounded-md shadow-xl top-40">
                                <div class="flex justify-end p-2">
                                    <button                        
                                        type="button" 
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                        onclick="closeModal('modelConfirm')">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-6 pt-0 text-center">
                                    <h3 class="mt-5 mb-6 text-xl font-semibold text-gray-700">Lanjutkan Pendaftaran?</h3>
                                    <table class="w-full text-left table-auto border-separate border-spacing-y-2">
                                        <tbody class="space-y-2">
                                            <tr>
                                                <td class="font-medium text-gray-600">NISN</td>
                                                <td id="nisnDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Nama</td>
                                                <td id="namaDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Program Pendidikan</td>
                                                <td id="programPendidikanDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">NIK</td>
                                                <td id="nikDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Nomor KK</td>
                                                <td id="nomorKkDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Tempat Lahir</td>
                                                <td id="tempatLahirDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Tanggal Lahir</td>
                                                <td id="tanggalLahirDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Jenis Kelamin</td>
                                                <td id="jenisKelaminDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Alamat Domisili</td>
                                                <td id="alamatDomisiliDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Provinsi</td>
                                                <td id="provinceDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Kota</td>
                                                <td id="cityDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Kecamatan</td>
                                                <td id="districtDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Desa</td>
                                                <td id="villageDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Jumlah Saudara</td>
                                                <td id="jumlahSaudaraDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Anak Ke</td>
                                                <td id="anakKeDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Asal Sekolah</td>
                                                <td id="asalSekolahDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Nama Ayah</td>
                                                <td id="namaAyahDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">NIK Ayah</td>
                                                <td id="nikAyahDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Pendidikan Ayah</td>
                                                <td id="pendidikanAyahDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Pekerjaan Ayah</td>
                                                <td id="pekerjaanAyahDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Nama Ibu</td>
                                                <td id="namaIbuDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">NIK Ibu</td>
                                                <td id="nikIbuDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Pendidikan Ibu</td>
                                                <td id="pendidikanIbuDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Pekerjaan Ibu</td>
                                                <td id="pekerjaanIbuDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Penghasilan</td>
                                                <td id="penghasilanDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Alamat KK</td>
                                                <td id="alamatKkDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">No HP Orangtua</td>
                                                <td id="noHpOrangtuaDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Kopiah</td>
                                                <td id="kopiahDisplay" class="text-gray-800 font-semibold"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Seragam</td>
                                                <td id="seragamDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700">Nama Pengirim</td>
                                                <td id="namaPengirimDisplay" class="text-gray-800 font-semibold uppercase"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-semibold text-gray-700" >Gambar Transaksi</td>
                                                <td class="imageDisplay"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Buttons Section -->
                                    <div class="mt-6 flex justify-between space-x-4">
                                        <!-- Tombol batal -->
                                        <button 
                                            type="button" 
                                            onclick="closeModal('modelConfirm')" 
                                            class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg px-4 py-2.5 w-full sm:w-auto"
                                        >
                                            Kembali
                                        </button>
                                        
                                        <!-- Tombol submit -->
                                        <button 
                                            type="submit" 
                                            class="text-white bg-green-600 hover:bg-green-800 rounded-lg px-4 py-2.5 w-full sm:w-auto"
                                        >
                                            Lanjutkan
                                        </button>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        
                    </div>
                </form>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li
                                class="p-4 mt-4 mb-4 text-sm text-center text-white bg-red-600 border border-green-300 rounded-md">
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>
            </div>
          
            <!-- Navigation Buttons -->
            <div class="mt-4 flex justify-between items-center">
                <!-- Spacer untuk posisi Previous -->
                <div class="w-16" x-show="currentStep === 1"></div>
            
                <!-- Previous Button -->
                <button
                    x-show="currentStep > 1"
                    @click="currentStep = Math.max(currentStep - 1, 1)"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded"
                >
                    Previous
                </button>
            
                <!-- Next Button -->
                <button
                    x-show="currentStep < totalSteps"
                    @click="currentStep = Math.min(currentStep + 1, totalSteps)"
                    class="bg-blue-600 text-white px-4 py-2 rounded ml-auto"
                >
                    Next
                </button>
            </div>
            
              
    </section>

{{-- Modal Button Simpan --}}
<script type="text/javascript">
    window.openModal = function(modalId) {

    const nisnValue = document.getElementById('nisn').value;
    const namaValue = document.getElementById('nama').value;
    const programPendidikanValue = document.getElementById('program_pendidikan').value;
    const nikValue = document.getElementById('nik').value;
    const nomorKkValue = document.getElementById('nomor_kk').value;
    const tempatLahirValue = document.getElementById('tempat_lahir').value;
    const tanggalLahirValue = document.getElementById('tanggal_lahir').value;
    const jenisKelaminValue = document.getElementById('jenis_kelamin').value;
    const alamatDomisiliValue = document.getElementById('alamat_domisili').value;
    const provinceValue = document.getElementById('selectedProvince').value;
    const cityValue = document.getElementById('selectedCity').value;
    const districtValue = document.getElementById('selectedDistrict').value;
    const villageValue = document.getElementById('selectedVillage').value;
    const jumlahSaudaraValue = document.getElementById('jumlah_saudara').value;
    const anakKeValue = document.getElementById('anak_ke').value;
    const asalSekolahValue = document.getElementById('asal_sekolah').value;
    const namaAyahValue = document.getElementById('nama_ayah').value;
    const nikAyahValue = document.getElementById('nik_ayah').value;
    const pendidikanAyahValue = document.getElementById('pendidikan_ayah').value;
    const pekerjaanAyahValue = document.getElementById('pekerjaan_ayah').value;
    const namaIbuValue = document.getElementById('nama_ibu').value;
    const nikIbuValue = document.getElementById('nik_ibu').value;
    const pendidikanIbuValue = document.getElementById('pendidikan_ibu').value;
    const pekerjaanIbuValue = document.getElementById('pekerjaan_ibu').value;
    const penghasilanValue = document.getElementById('penghasilan').value;
    const alamatKkValue = document.getElementById('alamat_kk').value;
    const noHpOrangtuaValue = document.getElementById('no_hp_orangtua').value;
    const kopiahValue = document.getElementById('kopiah').value;
    const seragamValue = document.getElementById('seragam').value;
    const namaPengirimValue = document.getElementById('nama_pengirim').value;

    nisnDisplay.textContent = `${nisnValue}`;
    namaDisplay.textContent = `${namaValue}`;
    programPendidikanDisplay.textContent = `${programPendidikanValue}`;
    nikDisplay.textContent = `${nikValue}`;
    nomorKkDisplay.textContent = `${nomorKkValue}`;
    tempatLahirDisplay.textContent = `${tempatLahirValue}`;
    tanggalLahirDisplay.textContent = `${tanggalLahirValue}`;
    jenisKelaminDisplay.textContent = `${jenisKelaminValue}`;
    alamatDomisiliDisplay.textContent = `${alamatDomisiliValue}`;
    provinceDisplay.textContent = `${provinceValue}`;
    cityDisplay.textContent = `${cityValue}`;
    districtDisplay.textContent = `${districtValue}`;
    villageDisplay.textContent = `${villageValue}`;
    jumlahSaudaraDisplay.textContent = `${jumlahSaudaraValue}`;
    anakKeDisplay.textContent = `${anakKeValue}`;
    asalSekolahDisplay.textContent = `${asalSekolahValue}`;
    namaAyahDisplay.textContent = `${namaAyahValue}`;
    nikAyahDisplay.textContent = `${nikAyahValue}`;
    pendidikanAyahDisplay.textContent = `${pendidikanAyahValue}`;
    pekerjaanAyahDisplay.textContent = `${pekerjaanAyahValue}`;
    namaIbuDisplay.textContent = `${namaIbuValue}`;
    nikIbuDisplay.textContent = `${nikIbuValue}`;
    pendidikanIbuDisplay.textContent = `${pendidikanIbuValue}`;
    pekerjaanIbuDisplay.textContent = `${pekerjaanIbuValue}`;
    penghasilanDisplay.textContent = `${penghasilanValue}`;
    alamatKkDisplay.textContent = `${alamatKkValue}`;
    noHpOrangtuaDisplay.textContent = `${noHpOrangtuaValue}`;
    kopiahDisplay.textContent = `${kopiahValue}`;
    seragamDisplay.textContent = `${seragamValue}`;
    namaPengirimDisplay.textContent = `${namaPengirimValue}`;
    

    document.getElementById(modalId).style.display = 'block'
    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
}

window.closeModal = function(modalId) {
    document.getElementById(modalId).style.display = 'none'
    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
}

// Close all modals when press ESC
document.onkeydown = function(event) {
    event = event || window.event;
    if (event.keyCode === 27) {
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
        let modals = document.getElementsByClassName('modal');
        Array.prototype.slice.call(modals).forEach(i => {
            i.style.display = 'none'
        })
    }
};
</script>

{{-- CEK NISN --}}
<script>
    async function searchSiswa() {
        const nisn = document.getElementById('nisn').value.trim(); 
        const statusMessage = document.getElementById('status-message');

        try {
            // Reset status pesan
            statusMessage.textContent = '';
            statusMessage.className = '';

            // Validasi panjang NISN
            if (nisn.length < 10) {
                alert('Masukkan 10 Digit NISN!');
                return;
            }

            // Tampilkan indikator proses
            statusMessage.textContent = 'Memproses...';
            statusMessage.classList.add('bg-blue-400', 'text-center', 'flex', 'items-center', 'justify-center', 'h-8');

            // Kirim request ke backend
            const response = await fetch(`/siswa/search`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ nisn: nisn }),
            });

            // Tangani error HTTP
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const result = await response.json();

            // Jika siswa ditemukan
            if (result.status === 'success') {
                alert('Siswa telah terdaftar, silahkan cek melalui status pendaftaran');

                fieldsToDisable.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        disableField(field);
                    }
                });

                // Kosongkan pesan status
                statusMessage.textContent = '';
                statusMessage.className = '';

            } else { // Jika siswa tidak ditemukan
                fieldsToEnable.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        enableField(field);
                        field.classList.add('enabled-field');
                    }
                });

                // Perbarui status pesan
                statusMessage.textContent = 'Silahkan Lanjutkan Pendaftaran.';
                statusMessage.classList.remove('bg-yellow-400');
                statusMessage.classList.add('bg-green-500', 'text-center', 'text-white','flex', 'items-center', 'justify-center', 'h-8');
            }

        } catch (error) {
            console.error('Terjadi kesalahan:', error);
            alert('Gagal melakukan pencarian. Silakan coba lagi.');

            // Hapus pesan loading jika ada kesalahan
            statusMessage.textContent = 'Gagal memproses pencarian.';
            statusMessage.classList.remove('bg-blue-400');
            statusMessage.classList.add('bg-red-500', 'text-center', 'flex', 'items-center', 'justify-center', 'h-8');
        }
    }

    // Daftar semua elemen yang ingin diaktifkan
    const fieldsToEnable = [
        'nama',
        'program_pendidikan',
        'nik',
        'nomor_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_domisili',
        'provinceDropdown',
        'cityDropdown',
        'districtDropdown',
        'villageDropdown',
        'jumlah_saudara',
        'anak_ke',
        'asal_sekolah',
        'nama_ayah',
        'nik_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'nik_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan',
        'alamat_kk',
        'no_hp_orangtua',
        'kopiah',
        'seragam',
        'nama_pengirim',
        'image',
        'submit'
    ];

    // Fungsi untuk mengaktifkan elemen
    function enableField(field) {
    field.disabled = false; // Aktifkan elemen
        if (field.id !== 'submit') {
            field.style.backgroundColor = '#ffffff'; // Reset warna latar belakang
            field.style.color = '#000000'; // Reset warna teks
            field.style.cursor = 'pointer'; // Ubah kursor menjadi pointer

            // Tambahkan efek highlight sementara
            field.style.boxShadow = '0 0 5px rgba(0, 255, 0, 0.5)'; // Highlight hijau
            setTimeout(() => {
                field.style.boxShadow = 'none'; // Hapus efek highlight setelah animasi
            }, 300); // Durasi sama dengan `transition` di CSS
        } else {
            field.style.cursor = 'pointer'; // Pastikan tombol submit punya kursor yang sesuai
        }
    }

    // Daftar semua elemen yang ingin dinonaktifkan
    const fieldsToDisable = [
        'nama',
        'program_pendidikan',
        'nik',
        'nomor_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_domisili',
        'provinceDropdown',
        'cityDropdown',
        'districtDropdown',
        'villageDropdown',
        'jumlah_saudara',
        'anak_ke',
        'asal_sekolah',
        'nama_ayah',
        'nik_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'nik_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan',
        'alamat_kk',
        'no_hp_orangtua',
        'kopiah',
        'seragam',
        'nama_pengirim',
        'image',
        'submit',
    ];

    // Fungsi untuk mengatur styling elemen yang dinonaktifkan
    function disableField(field) {
    field.disabled = true; // Nonaktifkan elemen
    field.style.cursor = 'not-allowed'; // Terapkan kursor "tidak diizinkan"

    // Terapkan gaya tambahan jika elemen bukan tombol submit
        if (field.id !== 'submit') {
            field.style.backgroundColor = '#ccc'; // Set warna latar belakang
            field.style.color = '#666'; // Set warna teks

            // Tambahkan efek shadow sementara saat perubahan status
            field.style.boxShadow = '0 0 5px rgba(255, 0, 0, 0.5)'; // Highlight merah redup
            setTimeout(() => {
                field.style.boxShadow = 'none'; // Hapus efek shadow setelah animasi selesai
            }, 300); // Durasi sama dengan `transition` di CSS
        }
    }

    // Loop untuk menerapkan disableField ke setiap elemen
    fieldsToDisable.forEach(fieldId => {
    const field = document.getElementById(fieldId);
    if (field) {
        disableField(field);
    }
    });
</script>

{{-- Function Kopiah --}}
<script>
    function toggleKopiahDropdown() {
        const jenisKelamin = document.getElementById('jenis_kelamin').value;
        const kopiahContainer = document.getElementById('kopiah_container');
        const kopiah = document.getElementById('kopiah');

        if (jenisKelamin === 'perempuan') {
            kopiahContainer.style.display = 'none'; 
            kopiah.value = null; 
            let kopiahRow = document.querySelector('#kopiahDisplay').closest('tr');
            if (kopiahRow) {
                kopiahRow.style.display = 'none';  // Menyembunyikan elemen <tr>
            }
        } else {
            kopiahContainer.style.display = 'block';   
        }
    }
</script>

{{-- Fetch API Wilayah --}}
<script>
    const provinceNameToIdMap = {};
    const cityNameToIdMap = {};
    const districtNameToIdMap = {};

    // Fungsi untuk mengambil data provinsi dari API
    async function loadProvinces() {
        try {
            const provinceDropdown = document.getElementById('provinceDropdown');
            
            // Reset dropdown
            provinceDropdown.innerHTML = '<option value="">Pilih Provinsi</option>';

            const response = await fetch('https://syaukaniakbar.github.io/api-wilayah-indonesia/api/provinces.json');
            const provinces = await response.json();

            // Populate the province dropdown
            provinces.forEach(province => {
                const option = document.createElement('option');
                option.value = province.name;
                option.textContent = province.name;
                provinceDropdown.appendChild(option);

                // Save the mapping
                provinceNameToIdMap[province.name] = province.id;
            });

            // Tambahkan opsi "PILIH LAINNYA"
            const otherOption = document.createElement('option');
            otherOption.value = 'other';
            otherOption.textContent = 'PILIH LAINNYA';
            otherOption.className = 'bg-yellow-400 text-white';
            provinceDropdown.appendChild(otherOption);

        } catch (error) {
            console.error('Error fetching provinces:', error);
        }
    }

    //Function to load cities based on selected province
    async function loadCities(provinceName) {
        const cityDropdown = document.getElementById('cityDropdown');
        const customCityInput = document.getElementById('customCityInput');
        const selectedCity = document.getElementById('selectedCity');
        
        // Reset city-related elements
        cityDropdown.innerHTML = '<option value="">Pilih Kota</option>';
        customCityInput.style.display = 'none';
        selectedCity.value = '';

        try {
            // Jika provinsi yang dipilih adalah custom (other)
            if (!provinceNameToIdMap[provinceName]) {
                console.log('Custom province selected, skipping API call.');

                // Pastikan "PILIH LAINNYA" hanya ditambahkan sekali
                if (!cityDropdown.querySelector('option[value="other"]')) {
                    const otherOption = document.createElement('option');
                    otherOption.value = 'other';
                    otherOption.textContent = 'PILIH LAINNYA';
                    otherOption.className = 'bg-yellow-400 text-white';
                    cityDropdown.appendChild(otherOption);
                }
                return;
            }

            // Dapatkan provinceId dari provinceName
            const provinceId = provinceNameToIdMap[provinceName];
            const response = await fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`);
            const cities = await response.json();
            console.log('Fetched cities:', cities);

            // Populate city dropdown dengan data kota
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.name;
                option.textContent = city.name;
                cityDropdown.appendChild(option);
                // Simpan mapping
                cityNameToIdMap[city.name] = city.id;
            });

            // Pastikan "PILIH LAINNYA" hanya ditambahkan sekali
            if (!cityDropdown.querySelector('option[value="other"]')) {
                const otherOption = document.createElement('option');
                otherOption.value = 'other';
                otherOption.textContent = 'PILIH LAINNYA';
                otherOption.className = 'bg-yellow-400 text-white';
                cityDropdown.appendChild(otherOption);
            }

        } catch (error) {
            console.error('Error fetching cities:', error);
        }
    }


    async function loadDistricts(cityName) {
        const districtDropdown = document.getElementById('districtDropdown');
        const customDistrictInput = document.getElementById('customDistrictInput');
        const selectedDistrict = document.getElementById('selectedDistrict');

        // Reset district-related elements
        districtDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
        customDistrictInput.style.display = 'none';
        selectedDistrict.value = '';

        try {
            // Jika kota yang dipilih adalah custom (other)
            if (!cityNameToIdMap[cityName]) {
                console.log('Custom city selected, skipping API call.');

                // Pastikan "PILIH LAINNYA" hanya ditambahkan sekali
                 if (!districtDropdown.querySelector('option[value="other"]')) {
                    const otherOption = document.createElement('option');
                    otherOption.value = 'other';
                    otherOption.textContent = 'PILIH LAINNYA';
                    otherOption.className = 'bg-yellow-400 text-white';
                    districtDropdown.appendChild(otherOption);
                }
                return;
            }

            // Dapatkan cityId dari cityName
            const cityId = cityNameToIdMap[cityName];

            // Fetch data kecamatan dari API
            const response = await fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/districts/${cityId}.json`);
            if (!response.ok) {
                throw new Error(`Failed to fetch districts. HTTP status: ${response.status}`);
            }

            const districts = await response.json();
            if (!Array.isArray(districts)) {
                throw new Error('Invalid districts data format received from API');
            }

            console.log('Fetched districts:', districts);

            // Populate district dropdown dengan data kecamatan
            districts.forEach(district => {
                const option = document.createElement('option');
                option.value = district.name; // Menggunakan nama kecamatan sebagai nilai
                option.textContent = district.name; // Menampilkan nama kecamatan
                districtDropdown.appendChild(option);

                // Simpan mapping
                districtNameToIdMap[district.name] = district.id;
            });

            // Pastikan "PILIH LAINNYA" hanya ditambahkan sekali
            if (!districtDropdown.querySelector('option[value="other"]')) {
                const otherOption = document.createElement('option');
                otherOption.value = 'other';
                otherOption.textContent = 'PILIH LAINNYA';
                otherOption.className = 'bg-yellow-400 text-white';
                districtDropdown.appendChild(otherOption);
            }

        } catch (error) {
            console.error('Error fetching districts:', error);
        }
    }

    async function loadVillages(districtName) {
        try {

            const districtId = districtNameToIdMap[districtName];

            // Ambil districtId dari mapping berdasarkan districtName
            if (!districtId) {
                console.error('District ID not found for:', districtName);
                return;
            }

            // Fetch data dari endpoint dengan districtId yang dinamis
            const response = await fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/villages/${districtId}.json`);
            const villages = await response.json();

            const villageDropdown = document.getElementById('villageDropdown');
            villageDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Reset village dropdown

            // Populate the village dropdown with fetched villages
            villages.forEach(village => {
                const option = document.createElement('option');
                option.value = village.name; // Gunakan nama kelurahan sebagai nilai
                option.textContent = village.name; // Tampilkan nama kelurahan
                villageDropdown.appendChild(option);
            });

            // Add "Pilih Lainnya" option manually
            const otherOption = document.createElement('option');
                otherOption.value = 'other';
                otherOption.textContent = 'PILIH LAINNYA';
                otherOption.className = 'bg-yellow-400 text-white';
                villageDropdown.appendChild(otherOption);

        } catch (error) {
            console.error('Error fetching villages:', error);
        }
    }

    // Function to handle province change
    function handleProvinceChange(event) {
        const selectedValue = event.target.value;
        const customProvinceInput = document.getElementById('customProvinceInput');
        const selectedProvince = document.getElementById('selectedProvince');
        const cityDropdown = document.getElementById('cityDropdown');

        if (selectedValue === 'other') {
            // Tampilkan input custom provinsi
            customProvinceInput.style.display = 'block';
            customProvinceInput.value = '';
            selectedProvince.value = '';
            
            // Hapus event listener lama jika ada
            customProvinceInput.oninput = null;
            
            // Tambahkan event listener baru untuk input custom
            customProvinceInput.oninput = function() {
                selectedProvince.value = this.value;
                
                // Kosongkan city dropdown jika provinsi custom dipilih
                cityDropdown.innerHTML = '<option value="">Pilih Kota</option>';
                
                // Tambahkan "PILIH LAINNYA" di dropdown kota
                const otherOption = document.createElement('option');
                otherOption.value = 'other';
                otherOption.textContent = 'PILIH LAINNYA';
                otherOption.className = 'bg-yellow-400 text-white';
                cityDropdown.appendChild(otherOption);
            };
        } else {
            customProvinceInput.style.display = 'none';
            selectedProvince.value = selectedValue;
            customProvinceInput.value = '';
            loadCities(selectedValue);
        }
    }


    // Function to handle city change
    function handleCityChange(event) {       
        const selectedValue = event.target.value;
        const customCityInput = document.getElementById('customCityInput');
        const selectedCity = document.getElementById('selectedCity');

        if (selectedValue === 'other') {
            // Tampilkan input custom kota
            customCityInput.style.display = 'block';
            customCityInput.value = '';
            selectedCity.value = '';
            
            // Tambahkan event listener untuk custom input kota
            customCityInput.oninput = function() {
                selectedCity.value = this.value;
            };
            
        } else {
            // Sembunyikan input custom kota
            customCityInput.style.display = 'none';
            selectedCity.value = selectedValue;
            customCityInput.value = '';
            loadDistricts(selectedValue); 
        }
    }

    // Function to handle district dropdown change
    function handleDistrictChange(event) {
        
        const selectedValue = event.target.value;
        const customDistrictInput = document.getElementById('customDistrictInput');
        const selectedDistrict = document.getElementById('selectedDistrict');

        if (selectedValue === 'other') {
            // Tampilkan input custom district
            customDistrictInput.style.display = 'block'; // Tampilkan input custom
            customDistrictInput.value = '';
            selectedDistrict.value = ''; 

            // Tambahkan event listener untuk custom input kota
            customDistrictInput.oninput = function() {
                selectedDistrict.value = this.value;
            };
        } else {
            customDistrictInput.style.display = 'none'; 
            selectedDistrict.value = selectedValue; 
            customDistrictInput.value = '';
            loadVillages(selectedValue); 
        }
    }

    function handleVillageChange(event) {
        const selectedValue = event.target.value;
        const customVillageInput = document.getElementById('customVillageInput');
        const selectedVillage = document.getElementById('selectedVillage');

        if (selectedValue === 'other') {
            customVillageInput.style.display = 'block';
            customVillageInput.value = '';
            selectedVillage.value = '';

            customVillageInput.oninput = function () {
                selectedVillage.value = this.value;
            };

        } else {
            customVillageInput.style.display = 'none';
            selectedVillage.value = selectedValue;
            customVillageInput.value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadProvinces();
        loadCities();
        loadDistricts();
        loadVillages();
    });
</script>



    

</x-main-layout>