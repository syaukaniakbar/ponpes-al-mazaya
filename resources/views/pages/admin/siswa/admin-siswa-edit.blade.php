<x-dashboard-layout>

    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

        /**
         * tailwind.config.js
         * module.exports = {
         *   variants: {
         *     extend: {
         *       backgroundColor: ['active'],
         *     }
         *   },
         * }
         */
        .active\:bg-gray-50:active {
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
        }
    </style>

    <div class="max-w-2xl p-6 mx-auto bg-white rounded-md shadow-md">
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Edit Siswa</h2>

        @if(session('success'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="fixed z-50 flex items-center w-full max-w-xs p-4 space-x-3 text-sm text-green-800 bg-green-100 border border-green-300 rounded-md shadow-lg top-24 right-5"
            role="alert">
            <!-- Icon -->
            <svg class="w-5 h-5 text-green-800" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            <!-- Message -->
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" id="form_siswa" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                        value="{{ old('nisn', $siswa->nisn ?? '') }}"
                        placeholder="Masukkan Nomor NISN Siswa" 
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Masukkan nomor NISN siswa"
                        maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                    >
                </div>
            </div>
            
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap (Sesuai Akta/KTP)</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Program Pendidikan -->
            <div class="mb-4">
                <label for="program_pendidikan" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Program Pendidikan</label>
                <select id="program_pendidikan" name="program_pendidikan" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Program Pendidikan</option>
                    <option value="pondok" {{ old('program_pendidikan', $siswa->program_pendidikan ?? '') == 'wustha' ? 'selected' : '' }}>wustha</option>
                    <option value="pondok" {{ old('program_pendidikan', $siswa->program_pendidikan ?? '') == 'ulya' ? 'selected' : '' }}>Pondok</option>
                    <option value="mts" {{ old('program_pendidikan', $siswa->program_pendidikan ?? '') == 'mts' ? 'selected' : '' }}>Madrasah Tsanawiyah (MTS)</option>
                    <option value="ma" {{ old('program_pendidikan', $siswa->program_pendidikan ?? '') == 'ma' ? 'selected' : '' }}>Madrasah Aliyah (MA)</option>
                </select>
            </div>

            <!-- NIK -->
            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                <input 
                    type="text" 
                    id="nik" 
                    name="nik"
                    value="{{ old('nik', $siswa->nik) }}"   
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
                    value="{{ old('nomor_kk', $siswa->nomor_kk) }}"  
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
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"  placeholder="Tempat Lahir" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-2 border border-gray-300 rounded-md" onchange="toggleKopiahDropdown()">
                    <option value="">Jenis Kelamin</option>
                    <option value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '' ) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat_domisili" class="block text-sm font-medium text-gray-700 mb-2">Alamat Domisili</label>
                <input type="text" id="alamat_domisili" name="alamat_domisili"  value="{{ old('alamat_domisili', $siswa->alamat_domisili) }}"  placeholder="Contoh: Jalan Mawar No. 12, Kelurahan Suka Maju, Kecamatan Sejahtera, Kota Samarinda, Kalimantan Timur" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Provinsi -->
            <div class="mb-4" >
                <label for="provinceDropdown" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                <!-- Dropdown -->
                <select 
                    id="provinceDropdown"
                    name="provinsi" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    onchange="handleProvinceChange(event)"
                >
                     <option value="">Pilih Provinsi</option>
                     <?php if (!empty($siswa->provinsi)): ?>
                        <option value="<?= htmlspecialchars($siswa->provinsi) ?>" selected>
                            <?= htmlspecialchars($siswa->provinsi) ?>
                        </option>
                    <?php endif; ?>
                    <option value="other" class="bg-yellow-400 text-white">PILIH LAINNYA</option>
                    <!-- Options akan diisi oleh JavaScript -->
                </select>
                
                <!-- Input teks jika "Pilih Lainnya" dipilih -->
                <input 
                    id="customProvinceInput"
                    type="text" 
                    name="custom_provinsi" 
                    placeholder="Masukkan Provinsi..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    style="display: none;" 
                />
                
                <!-- Hidden input untuk mengirimkan nilai provinsi -->
                <input type="hidden" id="selectedProvince" name="selected_provinsi">
            </div>

            <!-- Kota -->
            <div class="mb-4" >
                <label for="cityDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kota</label>
                <!-- Dropdown -->
                <select 
                    id="cityDropdown"
                    name="kota" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    onchange="handleCityChange(event)"
                >
                    <option value="">Pilih Kota</option>
                    <?php if (!empty($siswa->kota)): ?>
                        <option value="<?= htmlspecialchars($siswa->kota) ?>" selected>
                            <?= htmlspecialchars($siswa->kota) ?>
                        </option>
                    <?php endif; ?>
                    <option value="other" class="bg-yellow-400 text-white">PILIH LAINNYA</option>
                    <!-- Options akan diisi oleh JavaScript -->
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
                
                <!-- Hidden input untuk mengirimkan nilai kota -->
                <input type="hidden" id="selectedCity" name="selected_kota">
            </div>
            
            <!-- Kecamatan -->
            <div class="mb-4" >
                <label for="districtDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                <!-- Kecamatan -->
                <select 
                    id="districtDropdown" 
                    name="kecamatan" 
                    class="w-full p-2 border border-gray-300 rounded-md" 
                    onchange="handleDistrictChange(event)"
                >
                    <option value="">Pilih Kecamatan</option>
                    <?php if (!empty($siswa->kecamatan)): ?>
                        <option value="<?= htmlspecialchars($siswa->kecamatan) ?>" selected>
                            <?= htmlspecialchars($siswa->kecamatan) ?>
                        </option>
                    <?php endif; ?>
                    <option value="other" class="bg-yellow-400 text-white">PILIH LAINNYA</option>
                    <!-- Options akan diisi oleh JavaScript -->
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
                    <?php if (!empty($siswa->kelurahan)): ?>
                        <option value="<?= htmlspecialchars($siswa->kelurahan) ?>" selected>
                            <?= htmlspecialchars($siswa->kelurahan) ?>
                        </option>
                    <?php endif; ?>
                    <option value="other" class="bg-yellow-400 text-white">PILIH LAINNYA</option>
                    <!-- Options akan diisi oleh JavaScript -->
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
                <input type="number" id="jumlah_saudara" name="jumlah_saudara" value="{{ old('jumlah_saudara', $siswa->jumlah_saudara ?? '') }}" placeholder="Jumlah Saudara" class="w-full p-2 border border-gray-300 rounded-md">

            </div>
            
            <!-- Anak Ke -->
            <div class="mb-4">
                <label for="anak_ke" class="block text-sm font-medium text-gray-700 mb-2">Anak Ke*</label>
                <input type="number" id="anak_ke" name="anak_ke" value="{{ old('anak_ke', $siswa->anak_ke ?? '') }}" placeholder="Anak Ke*" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
          
            <!-- Asal Sekolah -->
            <div class="mb-4">
                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah Sebelumnya</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $siswa->asal_sekolah ?? '') }}" placeholder="MI / MTS?" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Nama Ayah -->
            <div class="mb-4">
                <label for="nama_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nama Ayah Kandung</label>
                <input type="text" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah ?? '') }}" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- NIK Ayah -->
            <div class="mb-4">
                <label for="nik_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nomor Induk Kependudukan (NIK)</label>
                <input 
                    type="text" 
                    id="nik_ayah" 
                    name="nik_ayah" 
                    value="{{ old('nik_ayah', $siswa->nik_ayah ?? '') }}"
                    placeholder="Nomor Induk Kependudukan Ayah" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    maxlength="16"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                >
            </div>

            <!-- Pendidikan Ayah -->
            <div class="mb-4">
                <label for="pendidikan_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pendidikan Terakhir Ayah</label>
                <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" value="{{ old('pendidikan_ayah', $siswa->pendidikan_ayah ?? '') }}" placeholder="Pendidikan Terakhir Ayah" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Pekerjaan Ayah -->
            <div class="mb-4">
                <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pekerjaan Ayah</label>
                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $siswa->pekerjaan_ayah ?? '') }}" placeholder="Pekerjaan Ayah" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Nama Ibu -->
            <div class="mb-4">
                <label for="nama_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nama Ibu Kandung</label>
                <input type="text" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu ?? '') }}" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

             <!-- NIK Ibu -->
             <div class="mb-4">
                <label for="nik_ibu" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" id="nik_ibu" name="nik_ibu" value="{{ old('nik_ibu', $siswa->nik_ibu ?? '') }}" placeholder="Nomor Induk Kependudukan Ibu" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Pendidikan Ibu -->
            <div class="mb-4">
                <label for="pendidikan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pendidikan Terakhir Ibu</label>
                <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" value="{{ old('pendidikan_ibu', $siswa->pendidikan_ibu ?? '') }}" placeholder="Pendidikan Terakhir Ibu" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Pekerjaan Ibu -->
            <div class="mb-4">
                <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pekerjaan Ibu</label>
                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $siswa->pekerjaan_ibu ?? '') }}" placeholder="Pekerjaan Ibu" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Penghasilan-->
            <div class="mb-4">
                <label for="penghasilan" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Penghasilan</label>
                <select id="penghasilan" name="penghasilan" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="-" {{ old('penghasilan', $siswa->penghasilan ?? '-') === '-' ? 'selected' : '' }}>Rata - Rata Penghasilan</option>
                    <option value="Kurang dari Rp. 500.000" {{ old('penghasilan', $siswa->penghasilan ?? '') === 'Kurang dari Rp. 500.000' ? 'selected' : '' }}>< Rp. 500.000</option>
                    <option value="Rp. 500.000 - Rp. 1.000.000" {{ old('penghasilan', $siswa->penghasilan ?? '') === 'Rp. 500.000 - Rp. 1.000.000' ? 'selected' : '' }}>Rp. 500.000 - Rp. 1.000.000</option>
                    <option value="Rp. 1.000.000 - Rp. 2.000.000" {{ old('penghasilan', $siswa->penghasilan ?? '') === 'Rp. 1.000.000 - Rp. 2.000.000' ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 2.000.000</option>
                    <option value="Rp. 2.000.000 - Rp. 3.000.000" {{ old('penghasilan', $siswa->penghasilan ?? '') === 'Rp. 2.000.000 - Rp. 3.000.000' ? 'selected' : '' }}>Rp. 2.000.000 - Rp. 3.000.000</option>
                    <option value="Rp. 3.000.000 - Rp. 5.000.000" {{ old('penghasilan', $siswa->penghasilan ?? '') === 'Rp. 3.000.000 - Rp. 5.000.000' ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                    <option value="Lebih dari Rp. 5.000.000" {{ old('penghasilan', $siswa->penghasilan ?? '') === 'Lebih dari Rp. 5.000.000' ? 'selected' : '' }}>> 5.000.000</option>
                </select>
            </div>
            

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat_kk" class="block text-sm font-medium text-gray-700 mb-2">Alamat Sesuai Kartu Keluarga (KK)</label>
                <input type="text" id="alamat_kk" name="alamat_kk" value="{{ old('alamat_kk', $siswa->alamat_kk?? '') }}" placeholder="Contoh: Jalan Mawar No. 12, Kelurahan Suka Maju, Kecamatan Sejahtera, Kota Samarinda, Kalimantan Timur" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Nomor Hp Orang tua WhatsApp -->
               <div class="mb-4">
                <label for="no_hp_orangtua" class="block text-sm font-medium text-gray-700 mb-2">Nomor Hp Orang tua (WhatsApp)</label>
                <input type="text" id="no_hp_orangtua" name="no_hp_orangtua" value="{{ old('no_hp_orangtua', $siswa->no_hp_orangtua ?? '') }}" placeholder="Masukkan Nomor Handphone" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
           
            <!-- Ukuran Kopiah -->
            <div class="mb-4" id="kopiahContainer">
                <label for="kopiah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Ukuran Kopiah</label>
                <select id="kopiah" name="kopiah" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="" {{ (old('kopiah') ?: $siswa->kopiah) === '' ? 'selected' : '' }}>Pilih Ukuran Kopiah</option>
                    <option value="2" {{ (old('kopiah') ?: $siswa->kopiah) === 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ (old('kopiah') ?: $siswa->kopiah) === 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ (old('kopiah') ?: $siswa->kopiah) === 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ (old('kopiah') ?: $siswa->kopiah) === 5 ? 'selected' : '' }}>5</option>
                    <option value="6" {{ (old('kopiah') ?: $siswa->kopiah) === 6 ? 'selected' : '' }}>6</option>
                    <option value="7" {{ (old('kopiah') ?: $siswa->kopiah) === 7 ? 'selected' : '' }}>7</option>
                    <option value="8" {{ (old('kopiah') ?: $siswa->kopiah) === 8 ? 'selected' : '' }}>8</option>
                    <option value="9" {{ (old('kopiah') ?: $siswa->kopiah) === 9 ? 'selected' : '' }}>9</option>
                </select>
            </div>
        


             <!-- seragam -->
             <div class="mb-4">
                <label for="seragam" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Ukuran Seragam</label>
                <select id="seragam" name="seragam" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="" {{ old('seragam', $siswa->seragam ?? '') === '' ? 'selected' : '' }}>Pilih Ukuran Seragam</option>
                    <option value="s" {{ old('seragam', $siswa->seragam ?? '') === 's' ? 'selected' : '' }}>Ukuran Seragam "S"</option>
                    <option value="m" {{ old('seragam', $siswa->seragam ?? '') === 'm' ? 'selected' : '' }}>Ukuran Seragam "M"</option>
                    <option value="l" {{ old('seragam', $siswa->seragam ?? '') === 'l' ? 'selected' : '' }}>Ukuran Seragam "L"</option>
                    <option value="xl" {{ old('seragam', $siswa->seragam ?? '') === 'xl' ? 'selected' : '' }}>Ukuran Seragam "XL"</option>
                    <option value="xxl" {{ old('seragam', $siswa->seragam ?? '') === 'xxl' ? 'selected' : '' }}>Ukuran Seragam "XXL"</option>
                    <option value="xxxl" {{ old('seragam', $siswa->seragam ?? '') === 'xxxl' ? 'selected' : '' }}>Ukuran Seragam "XXXL"</option>
                </select>
            </div>

            <!-- File Input & Image Preview -->
            <div x-data="{ 
                imagePreview: '{{ asset('storage/' . $siswa->image_bukti_transaksi_url) }}', // Menggunakan URL gambar yang sudah ada
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
                    Gambar menggunakan format: jpeg, png, jpg | Max: 2MB
                </p>
            <!-- Image Preview -->
                <template x-if="imagePreview">
                    <div class="w-full max-w-xs mx-auto sm:max-w-sm imageDisplay">
                        <img 
                            :src="imagePreview" 
                            alt="Selected Image" 
                            class="object-cover w-full h-48 border-4 border-gray-200 rounded-lg shadow-lg sm:h-64"
                        >
                    </div>
                </template>
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
                                onclick="closeModal('modelConfirm')"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-6 pt-0 text-center">
                            <h3 class="mt-5 mb-6 text-xl font-semibold text-gray-700">Lanjutkan Perubahan?</h3>
                            
                        
                            <!-- Buttons Section -->
                            <div class="mt-6 flex justify-center space-x-4">
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
                <li class="p-4 mt-4 mb-4 text-sm text-center text-white bg-red-600 border border-green-300 rounded-md">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    {{-- Modal Button Simpan --}}
    <script type="text/javascript">
        window.openModal = function(modalId) {

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

<script>
        function toggleKopiahDropdown() {
            const jenisKelamin = document.getElementById('jenisKelamin').value;
            const kopiahContainer = document.getElementById('kopiahContainer');
    
            if (jenisKelamin === 'perempuan') {
                kopiahContainer.style.display = 'none'; // Sembunyikan dropdown kopiah
                kopiahDropdown.value = null; // Mengatur nilai NULL
            } else {
                kopiahContainer.style.display = 'block'; // Tampilkan dropdown kopiah
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
            const response = await fetch('https://syaukaniakbar.github.io/api-wilayah-indonesia/api/provinces.json');
            const provinces = await response.json();

            const provinceDropdown = document.getElementById('provinceDropdown');

            // Populate the province dropdown
            provinces.forEach(province => {
                const option = document.createElement('option');
                option.value = province.name; // Use province ID as the value
                option.textContent = province.name; // Display province name
                provinceDropdown.appendChild(option);

                // Save the mapping
                provinceNameToIdMap[province.name] = province.id;
            });
        } catch (error) {
            console.error('Error fetching provinces:', error);
        }
    }

    // Function to load cities based on selected province
    async function loadCities(provinceName) {
        try {

            // Get the provinceId from the name
            const provinceId = provinceNameToIdMap[provinceName];

            if (!provinceId) {
                console.error('Province ID not found for:', provinceName);
                return;
            }

            const response = await fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`);
            const cities = await response.json();

            const cityDropdown = document.getElementById('cityDropdown');
            cityDropdown.innerHTML = '<option value="">Pilih Kota</option>'; // Reset city dropdown

            // Populate the city dropdown with fetched cities
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.name; // Gunakan nama kota sebagai nilai
                option.textContent = city.name; // Tampilkan nama kota
                cityDropdown.appendChild(option);

                // Save the mapping
                cityNameToIdMap[city.name] = city.id; // Simpan ID kota
            });

            // Add "Pilih Lainnya" option manually
            const otherOption = document.createElement('option');
            otherOption.value = 'other';
            otherOption.textContent = 'PILIH LAINNYA';
            otherOption.className = 'bg-yellow-400 text-white';
            cityDropdown.appendChild(otherOption);

        } catch (error) {
            console.error('Error fetching cities:', error);
        }
    }

    // Function to load districts based on selected city
    async function loadDistricts(cityName) {
        try {
            // Get the cityId from the name
            const cityId = cityNameToIdMap[cityName];

            if (!cityId) {
                console.error('City ID not found for:', cityName);
                return;
            }

            // Fetch data from the updated endpoint
            const response = await fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/districts/${cityId}.json`);
            const districts = await response.json();

            const districtDropdown = document.getElementById('districtDropdown');
            districtDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Reset district dropdown

            // Populate the district dropdown with fetched districts
            districts.forEach(district => {
                const option = document.createElement('option');
                option.value = district.name; // Use district ID as the value
                option.textContent = district.name; // Display district name
                districtDropdown.appendChild(option);

                // Save the mapping
                districtNameToIdMap[district.name] = district.id;
            });

            // Add "Pilih Lainnya" option manually
            const otherOption = document.createElement('option');
            otherOption.value = 'other';
            otherOption.textContent = 'PILIH LAINNYA';
            otherOption.className = 'bg-yellow-400 text-white';
            districtDropdown.appendChild(otherOption);

        } catch (error) {
            console.error('Error fetching districts:', error);
        }
    }

   async function loadVillages(districtName) {
    try {
        // Ambil districtId dari mapping berdasarkan districtName
        const districtId = districtNameToIdMap[districtName];

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

    // Function to handle province dropdown change
    function handleProvinceChange(event) {
        const selectedValue = event.target.value;
        const customProvinceInput = document.getElementById('customProvinceInput');
        const selectedProvince = document.getElementById('selectedProvince');

        if (selectedValue === 'other') {
            customProvinceInput.style.display = 'block'; // Show custom input for province
            selectedProvince.value = ''; // Clear hidden input value
        } else {
            customProvinceInput.style.display = 'none'; // Hide custom input
            selectedProvince.value = selectedValue; // Set hidden input with selected province ID

            // Load cities for the selected province
            if (selectedValue) {
                loadCities(selectedValue);
            }
        }
    }

    // Function to handle city dropdown change
    function handleCityChange(event) {
        const selectedValue = event.target.value;
        const customCityInput = document.getElementById('customCityInput');
        const selectedCity = document.getElementById('selectedCity');

        if (selectedValue === 'other') {
            customCityInput.style.display = 'block';
            selectedCity.value = '';
        } else {
            customCityInput.style.display = 'none';
            selectedCity.value = selectedValue;
            if (selectedValue) {
                loadDistricts(selectedValue); // Load districts based on selected city
            }
        }
    }

    // Function to handle district dropdown change
    function handleDistrictChange(event) {
        const selectedValue = event.target.value;
        const customDistrictInput = document.getElementById('customDistrictInput');
        const selectedDistrict = document.getElementById('selectedDistrict');

        if (selectedValue === 'other') {
            customDistrictInput.style.display = 'block'; // Tampilkan input custom
            selectedDistrict.value = ''; // Kosongkan hidden input
        } else {
            customDistrictInput.style.display = 'none'; // Sembunyikan input custom
            selectedDistrict.value = selectedValue; // Set hidden input ke nilai yang dipilih

            if (selectedValue) {
                loadVillages(selectedValue); // Muat kelurahan berdasarkan kecamatan
            }
        }
    }


    // Function to handle village dropdown change
    function handleVillageChange(event) {
        const selectedValue = event.target.value;
        const customVillageInput = document.getElementById('customVillageInput');
        const selectedVillage = document.getElementById('selectedVillage');

        if (selectedValue === 'other') {
            customVillageInput.style.display = 'block'; // Tampilkan input custom
            selectedVillage.value = ''; // Kosongkan hidden input
        } else {
            customVillageInput.style.display = 'none'; // Sembunyikan input custom
            selectedVillage.value = selectedValue; // Set hidden input ke nilai yang dipilih
        }
    }

    document.addEventListener('DOMContentLoaded', loadProvinces);
    document.addEventListener('DOMContentLoaded', loadCities);
    document.addEventListener('DOMContentLoaded', loadDistricts);
    document.addEventListener('DOMContentLoaded', loadVillages);
</script>

</x-dashboard-layout>