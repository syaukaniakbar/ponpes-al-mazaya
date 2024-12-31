<x-main-layout><!-- Menghubungkan ke layout parent -->

    @section('title', 'Pendaftaran | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    <section class="max-w-4xl mx-auto p-8 shadow-md rounded-lg my-28 border">
        <h1 class="text-2xl font-bold text-center mb-2">Pendaftaran Santri Baru</h1>
        <p class="text-center text-gray-600 mb-6">Isikan data dengan benar untuk proses pendaftaran.</p>
        <form action="#" method="POST" enctype="multipart/form-data">
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
                        placeholder="Nomor NISN Siswa" 
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Masukkan nomor NISN siswa"
                    />
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
                <input type="text" id="nik" name="nik" placeholder="Masukkan Nomor Induk Kependudukan" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

             <!-- Nomor KK -->
             <div class="mb-4">
                <label for="nomor_kk" class="block text-sm font-medium text-gray-700 mb-2">Nomor Kartu Keluarga</label>
                <input type="text" id="nomor_kk" name="nomor_kk" placeholder="Masukkan Nomor Kartu Keluarga" class="w-full p-2 border border-gray-300 rounded-md">
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
                <label for="jenisKelamin" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jenis Kelamin</label>
                <select id="jenisKelamin" name="jenis_kelamin" class="w-full p-2 border border-gray-300 rounded-md" onchange="toggleKopiahDropdown()">
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
        
            <!-- Provinsi, Kota, Kecamatan, Kelurahan -->
            <div x-data="{ isCustomProvince: false }"  class="mb-4">
                <label for="provinceDropdown" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                <select id="provinceDropdown" name="provinsi" @change="isCustomProvince = ($event.target.value === 'other')" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Provinsi</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                </select>
                <input 
                    x-show="isCustomProvince" 
                    x-transition 
                    type="text" 
                    name="provinsi" 
                    placeholder="Masukkan Provinsi..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomProvince" 
                />
            </div>
        
            <div x-data="{ isCustomCity: false }" class="mb-4">
                <label for="cityDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                <select id="cityDropdown" name="kota" @change="isCustomCity = ($event.target.value === 'other')" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Kota/Kabupaten</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                </select>
                <input 
                    x-show="isCustomCity" 
                    x-transition 
                    type="text" 
                    name="kota" 
                    placeholder="Masukkan Kota/Kabupaten..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomCity" 
                />
            </div>
            
        
            <div x-data="{ isCustomDistrict: false }" class="mb-4">
                <label for="districtDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                <select id="districtDropdown" name="kecamatan" @change="isCustomDistrict = ($event.target.value === 'other')" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Kecamatan</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                </select>
                
                <input 
                    x-show="isCustomDistrict" 
                    x-transition 
                    type="text" 
                    name="kecamatan"  
                    placeholder="Masukkan Kecamatan..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomDistrict" 
                />
            </div>
            
        
            <div x-data="{ isCustomVillage: false }" class="mb-4">
                <label for="villageDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                <select id="villageDropdown" name="kelurahan" @change="isCustomVillage = ($event.target.value === 'other')" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Kelurahan</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
            
                </select>
                
                <input 
                    x-show="isCustomVillage" 
                    x-transition 
                    type="text" 
                    name="kelurahan" 
                    placeholder="Masukkan Kelurahan..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomVillage" 
                />
            </div>
            
            <!-- Jumlah Saudara -->
            <div x-data="{ isCustomSiblings: false }" class="mb-4">
                <label for="jumlah_saudara" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jumlah Saudara</label>
                <select id="jumlah_saudara" name="jumlah_saudara" @change="isCustomSiblings = ($event.target.value === 'other')" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Jumlah Saudara</option>
                    <option class="bg-yellow-400 text-white" value="other">PILIH LAINNYA</option>
                    <option value="1">1 Orang</option>
                    <option value="2">2 Orang</option>
                    <option value="3">3 Orang</option>
                    <option value="4">4 Orang</option>
                    <option value="5">5 Orang</option>
                    <option value="6">6 Orang</option>
                    <option value="7">7 Orang</option>
                    <!-- Daftar jumlah saudara lainnya bisa ditambahkan di sini -->
                </select>
            
                <input 
                    x-show="isCustomSiblings" 
                    x-transition 
                    type="number" 
                    name="jumlah_saudara"
                    placeholder="Masukkan Jumlah Saudara..." 
                    class="w-full p-2 border border-gray-300 rounded-md mt-2" 
                    :required="isCustomSiblings" 
                />
            </div>
            

            <!-- Anak Ke -->
            <div x-data="{ isCustom: false }" class="mb-4">
                <label for="anak_ke" class="block text-sm font-medium text-gray-700 mb-2">Anak Ke-*</label>
                <select 
                    id="anak_ke" 
                    name="anak_ke" 
                    class="w-full p-2 border border-gray-300 rounded-md" 
                    @change="isCustom = ($event.target.value === 'other')">
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
                />
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
                <input type="text" id="nik_ayah" name="nik_ayah" placeholder="Nomor Induk Kependudukan Ayah" class="w-full p-2 border border-gray-300 rounded-md">
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
    </section>

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
        // Ambil elemen dropdown
        const provinceDropdown = document.getElementById('provinceDropdown');
        const cityDropdown = document.getElementById('cityDropdown');
        const districtDropdown = document.getElementById('districtDropdown');
        const villageDropdown = document.getElementById('villageDropdown');

        // Fetch data provinsi dan isi dropdown
        fetch('https://syaukaniakbar.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id; // Set value dengan ID provinsi
                    option.textContent = province.name; // Set teks dengan nama provinsi
                    provinceDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching provinces:', error);
            });

        // Event listener untuk mengambil kota/kabupaten berdasarkan provinsi yang dipilih
        provinceDropdown.addEventListener('change', () => {
            const provinceId = provinceDropdown.value; // Ambil ID provinsi yang dipilih

            if (provinceId) {
                fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then(response => response.json())
                    .then(regencies => {
                        regencies.forEach(regency => {
                            const option = document.createElement('option');
                            option.value = regency.id; // Set value dengan ID kota/kabupaten
                            option.textContent = regency.name; // Set teks dengan nama kota/kabupaten
                            cityDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching regencies:', error);
                    });
            }
        });

        // Event listener untuk mengambil kecamatan berdasarkan kota/kabupaten yang dipilih
        cityDropdown.addEventListener('change', () => {
            const cityId = cityDropdown.value; // Ambil ID kota/kabupaten yang dipilih

            if (cityId) {
                fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/districts/${cityId}.json`)
                    .then(response => response.json())
                    .then(districts => {
                        districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id; // Set value dengan ID kecamatan
                            option.textContent = district.name; // Set teks dengan nama kecamatan
                            districtDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching districts:', error);
                    });
            }
        });

        // Event listener untuk mengambil kelurahan berdasarkan kecamatan yang dipilih
        districtDropdown.addEventListener('change', () => {
            const districtId = districtDropdown.value; // Ambil ID kecamatan yang dipilih

            if (districtId) {
                fetch(`https://syaukaniakbar.github.io/api-wilayah-indonesia/api/villages/${districtId}.json`)
                    .then(response => response.json())
                    .then(villages => {
                        villages.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.id; // Set value dengan ID kelurahan
                            option.textContent = village.name; // Set teks dengan nama kelurahan
                            villageDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching villages:', error);
                    });
            }
        });
    </script>


    </script>
</x-main-layout>