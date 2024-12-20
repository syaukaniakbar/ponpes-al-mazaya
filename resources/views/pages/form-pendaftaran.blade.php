<x-main-layout><!-- Menghubungkan ke layout parent -->

    @section('title', 'Pendaftaran | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->

    <section class="max-w-4xl mx-auto p-8 shadow-md rounded-lg my-28 border">
        <h1 class="text-2xl font-bold text-center mb-2">Pendaftaran Santri Baru</h1>
        <p class="text-center text-gray-600 mb-6">Isikan data dengan benar untuk proses pendaftaran.</p>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
        
            <!-- Nomor Induk Siswa Nasional -->
            <div class="mb-4">
                <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Siswa Nasional (NISN)</label>
                <input type="text" id="nisn" name="nisn" placeholder="Nomor NISN Siswa" class="w-full p-2 border border-gray-300 rounded-md">
                <p class="text-sm text-gray-500 mt-1">NISN wajib diisi, untuk bantuan hubungi <a href="#" class="text-blue-500">klik disini</a></p>
            </div>
        
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap (Sesuai Akta/KTP)</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat Rumah</label>
                <input type="text" id="alamat" name="alamat" placeholder="Alamat Rumah" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Provinsi, Kota, Kecamatan, Kelurahan -->
            <div class="mb-4">
                <label for="provinceDropdown" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                <select id="provinceDropdown" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Provinsi</option>
                </select>
            </div>
        
            <div class="mb-4">
                <label for="cityDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                <select id="cityDropdown" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Kota/Kabupaten</option>
                </select>
            </div>
        
            <div class="mb-4">
                <label for="districtDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                <select id="districtDropdown" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>
        
            <div class="mb-4">
                <label for="villageDropdown" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                <select id="villageDropdown" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Kelurahan</option>
                </select>
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
        
            <!-- Asal Sekolah -->
            <div class="mb-4">
                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah Sebelumnya</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="SD, SMP, atau SMA?" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Upload Foto, Kartu Keluarga, dan Ijazah -->
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto 3x4 (maksimal 2MB)</label>
                <input type="file" id="foto" name="foto" class="w-full border border-gray-300 rounded-md">
            </div>
        
            <div class="mb-4">
                <label for="kk" class="block text-sm font-medium text-gray-700 mb-2">Upload Kartu Keluarga (maksimal 2MB)</label>
                <input type="file" id="kk" name="kk" class="w-full  border border-gray-300 rounded-md">
            </div>
        
            <div class="mb-4">
                <label for="ijazah" class="block text-sm font-medium text-gray-700 mb-2">Upload Ijazah (maksimal 2MB)</label>
                <input type="file" id="ijazah" name="ijazah" class="w-full  border border-gray-300 rounded-md">
            </div>
        
            <!-- Nama Orang Tua -->
            <div class="mb-4">
                <label for="nama_ortu" class="block text-sm font-medium text-gray-700 mb-2">Masukkan NIK (Wali)*</label>
                <input type="text" id="nama_ortu" name="nama_ortu" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

             <!-- Nama Orang Tua -->
             <div class="mb-4">
                <label for="nama_ortu" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap Orang Tua/Wali</label>
                <input type="text" id="nama_ortu" name="nama_ortu" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Email & Nomor HP Orang Tua -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Orang Tua/Wali</label>
                    <input type="email" id="email" name="email" placeholder="Email aktif" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="nomor_hp" class="block text-sm font-medium text-gray-700 mb-2">Nomor HP Orang Tua/Wali</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" placeholder="Nomor HP aktif" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
            </div>
        
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full px-6 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-500">Submit</button>
            </div>
        </form>
        
        
    </section>


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

            // Kosongkan dropdown kota sebelum mengisi yang baru
            cityDropdown.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
            districtDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
            villageDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';

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

            // Kosongkan dropdown kecamatan sebelum mengisi yang baru
            districtDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
            villageDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';

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

            // Kosongkan dropdown kelurahan sebelum mengisi yang baru
            villageDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';

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