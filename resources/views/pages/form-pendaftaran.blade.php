<x-main-layout><!-- Menghubungkan ke layout parent -->

    @section('title', 'Pendaftaran | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    <section class="max-w-4xl mx-auto p-8 shadow-md rounded-lg my-28 border">
        <h1 class="text-2xl font-bold text-center mb-2">Pendaftaran Santri Baru</h1>
        <p class="text-center text-gray-600 mb-6">Isikan data dengan benar untuk proses pendaftaran.</p>
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
        <form action="{{ route('pendaftaran.store') }}" method="POST" id="form_siswa">
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
                        placeholder="Masukkan Nomor NISN Siswa" 
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Masukkan nomor NISN siswa"
                        maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                    >

                    <button 
                        type="submit" 
                        class="w-full sm:w-auto min-w-[80px] px-4 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-center items-center"
                        aria-label="Cek nomor NISN"
                    >
                        CEK NISN
                    </button>

                </div>
                <p class="p-2 text-xs text-left text-white bg-yellow-400 mt-2 rounded-md w-full sm:w-72">
                    NISN wajib diisi. Untuk bantuan, hubungi 
                    <a href="#" class="underline text-blue-900 hover:text-blue-600">klik disini</a>
                </p>
            </div>
            
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap (Sesuai Akta/KTP)</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Program Pendidikan -->
            <div class="mb-4">
                <label for="program_pendidikan" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Program Pendidikan</label>
                <select id="program_pendidikan" name="program_pendidikan" class="w-full p-2 border border-gray-300 rounded-md" onchange="toggleKopiahDropdown()">
                    <option value="">Pilih Program Pendidikan</option>
                    <option value="pondok">Pondok</option>
                    <option value="mts">Madrasah Tsanawiyah (MTS)</option>
                    <option value="ma">Madrasah Aliyah (MA)</option>
                </select>
            </div>

            <!-- NIK -->
            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                <input 
                    type="text" 
                    id="nik" 
                    name="nik" 
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
                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-2 border border-gray-300 rounded-md" onchange="toggleKopiahDropdown()">
                    <option value="">Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat_domisili" class="block text-sm font-medium text-gray-700 mb-2">Alamat Domisili</label>
                <input type="text" id="alamat_domisili" name="alamat_domisili" placeholder="Contoh: Jalan Mawar No. 12, Kelurahan Suka Maju, Kecamatan Sejahtera, Kota Samarinda, Kalimantan Timur" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Provinsi -->
            <div x-data="{ isCustomProvince: false, selectedProvince: '', provinces: [] }" class="mb-4">
                <label for="provinceDropdown" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                <select 
                    id="provinceDropdown" 
                    name="provinsi" 
                    @change="
                        isCustomProvince = ($event.target.value === 'other'); 
                        selectedProvince = $event.target.options[$event.target.selectedIndex]?.text || ''; 
                        $dispatch('province-changed', $event.target.value);
                    "
                    class="w-full p-2 border border-gray-300 rounded-md"
                    :required="!isCustomProvince"
                    x-init="
                        fetch('https://syaukaniakbar.github.io/api-wilayah-indonesia/api/provinces.json')
                            .then(response => response.json())
                            .then(data => { provinces = data; })
                            .catch(error => console.error('Error fetching provinces:', error));
                    "
                >
                    <option value="">Pilih Provinsi</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <template x-for="province in provinces" :key="province.id">
                        <option :value="province.id" x-text="province.name"></option>
                    </template>
                </select>

                <input 
                    x-show="isCustomProvince" 
                    x-transition 
                    type="text" 
                    name="custom_provinsi"
                    placeholder="Masukkan Provinsi..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomProvince" 
                    @input="selectedProvince = $event.target.value"
                />
                <!-- Hidden input to hold the final value -->
                <input type="hidden" name="provinsi" :value="selectedProvince">
            </div>

            <!-- Kota -->
            <div x-data="{ isCustomCity: false, selectedCity: '', cities: [] }" class="mb-4">
                <label for="cityDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                <select 
                    id="cityDropdown" 
                    name="kota" 
                    @change="
                        isCustomCity = ($event.target.value === 'other'); 
                        selectedCity = $event.target.options[$event.target.selectedIndex]?.text || '';
                    "
                    class="w-full p-2 border border-gray-300 rounded-md"
                    :required="!isCustomCity"
                    x-init="
                        $watch('selectedProvince', (provinceId) => {
                            if (provinceId && provinceId !== 'other') {
                                fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                                    .then(response => response.json())
                                    .then(data => { cities = data; })
                                    .catch(error => console.error('Error fetching cities:', error));
                            } else {
                                cities = [];
                            }
                        });
                    "
                >
                    <option value="">Pilih Kota/Kabupaten</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <template x-for="city in cities" :key="city.id">
                        <option :value="city.id" x-text="city.name"></option>
                    </template>
                </select>

                <input 
                    x-show="isCustomCity" 
                    x-transition 
                    type="text" 
                    name="custom_kota"
                    placeholder="Masukkan Kota/Kabupaten..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomCity" 
                    @input="selectedCity = $event.target.value"
                />
                <!-- Hidden input to hold the final value -->
                <input type="hidden" name="kota" :value="selectedCity">
            </div>


            <!-- Kecamatan -->
            <div x-data="{ isCustomDistrict: false, selectedDistrict: '', districts: [] }" class="mb-4">
                <label for="districtDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                <select 
                    id="districtDropdown" 
                    name="kecamatan" 
                    @change="isCustomDistrict = ($event.target.value === 'other'); selectedDistrict = $event.target.options[$event.target.selectedIndex]?.text || '';"
                    class="w-full p-2 border border-gray-300 rounded-md"
                    :required="!isCustomDistrict"
                >
                    <option value="">Pilih Kecamatan</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <template x-for="district in districts" :key="district.id">
                        <option :value="district.id" x-text="district.name"></option>
                    </template>
                </select>
                
                <input 
                    x-show="isCustomDistrict" 
                    x-transition 
                    type="text" 
                    name="custom_kecamatan"
                    placeholder="Masukkan Kecamatan..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomDistrict" 
                    @input="selectedDistrict = $event.target.value"
                />
                <!-- Hidden input to hold the final value -->
                <input type="hidden" name="kecamatan" :value="selectedDistrict">
            </div>

            <!-- Kelurahan -->
            <div x-data="{ isCustomVillage: false, selectedVillage: '', villages: [] }" class="mb-4">
                <label for="villageDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                <select 
                    id="villageDropdown" 
                    name="kelurahan" 
                    @change="isCustomVillage = ($event.target.value === 'other'); selectedVillage = $event.target.options[$event.target.selectedIndex]?.text || '';" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    :required="!isCustomVillage"
                >
                    <option value="">Pilih Kelurahan</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <template x-for="village in villages" :key="village.id">
                        <option :value="village.id" x-text="village.name"></option>
                    </template>
                </select>
                
                <input 
                    x-show="isCustomVillage" 
                    x-transition 
                    type="text" 
                    name="custom_kelurahan"
                    placeholder="Masukkan Kelurahan..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomVillage" 
                    @input="selectedVillage = $event.target.value"
                />
                <!-- Hidden input to hold the final value -->
                <input type="hidden" name="kelurahan" :value="selectedVillage">
            </div>
            
            
            <!-- Jumlah Saudara -->
            <div x-data="{ isCustomSiblings: false, selectedSiblings: '' }" class="mb-4">
                <label for="jumlah_saudara" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jumlah Saudara</label>
                <select 
                    id="jumlah_saudara" 
                    name="jumlah_saudara" 
                    @change="isCustomSiblings = ($event.target.value === 'other'); selectedSiblings = $event.target.value" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    :required="!isCustomSiblings"
                >
                    <option value="">Jumlah Saudara</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <option value="1">1 Orang</option>
                    <option value="2">2 Orang</option>
                    <option value="3">3 Orang</option>
                    <option value="4">4 Orang</option>
                    <option value="5">5 Orang</option>
                    <option value="6">6 Orang</option>
                    <option value="7">7 Orang</option>
                </select>
            
                <input 
                    x-show="isCustomSiblings" 
                    x-transition 
                    type="number" 
                    name="custom_jumlah_saudara" 
                    placeholder="Masukkan Jumlah Saudara..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomSiblings" 
                    @input="selectedSiblings = $event.target.value"
                />
            
                <!-- Hidden input to hold the final value -->
                <input type="hidden" name="jumlah_saudara" :value="selectedSiblings">
            </div>
            
            <!-- Anak Ke -->
            <div x-data="{ isCustom: false, selectedChild: '' }" class="mb-4">
                <label for="anak_ke" class="block text-sm font-medium text-gray-700 mb-2">Anak Ke-*</label>
                <select 
                    id="anak_ke" 
                    name="anak_ke" 
                    @change="isCustom = ($event.target.value === 'other'); selectedChild = $event.target.value" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    :required="!isCustom"
                >
                    <option value="">Pilih Anak Ke -</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>

                <!-- Input Angka -->
                <input 
                    x-show="isCustom" 
                    x-transition 
                    type="number" 
                    id="custom_anak_ke" 
                    name="custom_anak_ke" 
                    placeholder="Masukkan angka..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustom" 
                    @input="selectedChild = $event.target.value"
                />

                <!-- Hidden input to hold the final value -->
                <input type="hidden" name="anak_ke" :value="selectedChild">
            </div>

          
            <!-- Asal Sekolah -->
            <div class="mb-4">
                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah Sebelumnya</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="MI / MTS?" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Nama Ayah -->
            <div class="mb-4">
                <label for="nama_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nama Ayah Kandung</label>
                <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- NIK Ayah -->
            <div class="mb-4">
                <label for="nik_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nomor Induk Kependudukan (NIK)</label>
                <input 
                    type="text" 
                    id="nik_ayah" 
                    name="nik_ayah" 
                    placeholder="Nomor Induk Kependudukan Ayah" 
                    class="w-full p-2 border border-gray-300 rounded-md"
                    maxlength="16"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                >
            </div>

            <!-- Pendidikan Ayah -->
            <div class="mb-4">
                <label for="pendidikan_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pendidikan Terakhir Ayah</label>
                <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Pendidikan Terakhir Ayah" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Pekerjaan Ayah -->
            <div class="mb-4">
                <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pekerjaan Ayah</label>
                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Nama Ibu -->
            <div class="mb-4">
                <label for="nama_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Nama Ibu Kandung</label>
                <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

             <!-- NIK Ibu -->
             <div class="mb-4">
                <label for="nik_ibu" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" id="nik_ibu" name="nik_ibu" placeholder="Nomor Induk Kependudukan Ibu" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Pendidikan Ibu -->
            <div class="mb-4">
                <label for="pendidikan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pendidikan Terakhir Ibu</label>
                <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Pendidikan Terakhir Ibu" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Pekerjaan Ibu -->
            <div class="mb-4">
                <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Pekerjaan Ibu</label>
                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="w-full p-2 border border-gray-300 rounded-md">
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
                <input type="text" id="alamat_kk" name="alamat_kk" placeholder="Contoh: Jalan Mawar No. 12, Kelurahan Suka Maju, Kecamatan Sejahtera, Kota Samarinda, Kalimantan Timur" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Nomor Hp Orang tua WhatsApp -->
               <div class="mb-4">
                <label for="no_hp_orangtua" class="block text-sm font-medium text-gray-700 mb-2">Nomor Hp Orang tua (WhatsApp)</label>
                <input type="text" id="no_hp_orangtua" name="no_hp_orangtua" placeholder="Masukkan Nomor Handphone" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
           
            <!-- Ukuran Kopiah -->
            <div class="mb-4" id="kopiahContainer">
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
        
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full px-6 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-500">Submit</button>
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
    </section>

    <script>
        document.getElementById('form_siswa').addEventListener('submit', (event) => {
            // Ambil data dari Alpine.js untuk provinsi dan kota
            const provinceDropdown = document.getElementById('provinceDropdown');
            const customProvinceInput = document.querySelector('input[name="custom_provinsi"]');
            const selectedProvince = provinceDropdown.value;

            // Jika "PILIH LAINNYA" dipilih, set nilai dropdown ke input custom
            if (selectedProvince === 'other') {
                provinceDropdown.value = customProvinceInput.value; // Set nilai dropdown ke input custom
            }

            // Validasi jika tidak ada provinsi yang dipilih
            if (!provinceDropdown.value) {
                alert('Provinsi harus dipilih atau masukkan provinsi lainnya!');
                event.preventDefault(); // Mencegah form dari pengiriman
            }

            const cityDropdown = document.getElementById('cityDropdown');
            const customCityInput = document.querySelector('input[name="custom_kota"]');
            const selectedCity = cityDropdown.value;

            // Jika "PILIH LAINNYA" dipilih, set nilai dropdown ke input custom
            if (selectedCity === 'other') {
                cityDropdown.value = customCityInput.value; // Set nilai dropdown ke input custom
            }

            // Validasi jika tidak ada kota yang dipilih
            if (!cityDropdown.value) {
                alert('Kota/Kabupaten harus dipilih atau masukkan kota/kabupaten lainnya!');
                event.preventDefault(); // Mencegah form dari pengiriman
            }

            const districtDropdown = document.getElementById('districtDropdown');
            const customDistrictInput = document.querySelector('input[name="custom_kecamatan"]');
            const selectedDistrict = districtDropdown.value;

            // Jika "PILIH LAINNYA" dipilih, set nilai dropdown ke input custom
            if (selectedDistrict === 'other') {
                districtDropdown.value = customDistrictInput.value;
            }

            // Validasi jika tidak ada kecamatan yang dipilih
            if (!districtDropdown.value) {
                alert('Kecamatan harus dipilih atau masukkan kecamatan lainnya!');
                event.preventDefault();
            }

            const villageDropdown = document.getElementById('villageDropdown');
            const customVillageInput = document.querySelector('input[name="custom_kelurahan"]');
            const selectedVillage = villageDropdown.value;

            // Jika "PILIH LAINNYA" dipilih, set nilai dropdown ke input custom
            if (selectedVillage === 'other') {
                villageDropdown.value = customVillageInput.value;
            }

            // Validasi jika tidak ada kelurahan yang dipilih
            if (!villageDropdown.value) {
                alert('Kelurahan harus dipilih atau masukkan kelurahan lainnya!');
                event.preventDefault();
            }
        });
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
    // Watch for province change and update cities accordingly
    document.addEventListener('alpine:init', () => {
        Alpine.data('locationSelection', () => ({
            provinces: [],
            cities: [],
            districts: [],
            villages: [],
            selectedProvince: '',
            selectedCity: '',
            selectedDistrict: '',
            init() {
                // Fetch provinces
                fetch('https://syaukaniakbar.github.io/api-wilayah-indonesia/api/provinces.json')
                    .then(response => response.json())
                    .then(data => { this.provinces = data; })
                    .catch(error => console.error('Error fetching provinces:', error));

                // Watch for province changes
                this.$watch('selectedProvince', (provinceId) => {
                    if (provinceId && provinceId !== 'other') {
                        fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                            .then(response => response.json())
                            .then(data => { this.cities = data; })
                            .catch(error => console.error('Error fetching cities:', error));
                    } else {
                        this.cities = [];
                    }
                });

                // Watch for city changes
                this.$watch('selectedCity', (cityId) => {
                    if (cityId && cityId !== 'other') {
                        fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/districts/${cityId}.json`)
                            .then(response => response.json())
                            .then(data => { this.districts = data; })
                            .catch(error => console.error('Error fetching districts:', error));
                    } else {
                        this.districts = [];
                    }
                });

                // Watch for district changes
                this.$watch('selectedDistrict', (districtId) => {
                    if (districtId && districtId !== 'other') {
                        fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/villages/${districtId}.json`)
                            .then(response => response.json())
                            .then(data => { this.villages = data; })
                            .catch(error => console.error('Error fetching villages:', error));
                    } else {
                        this.villages = [];
                    }
                });
            }
        }));
    });
</script>

    

</x-main-layout>