<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Santri Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <nav class="text-black bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{url('/')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{asset('images/logo_al_mazaya.png')}}" class="h-8" alt="Al-Mazaya Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 ">
                    <li>
                        <a href="#" class="block py-2 px-3 " aria-current="page">Tentang Al-Mazaya</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 ">Artikel Berita</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 rounded bg-green-600 text-white">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-2xl font-bold text-center mb-2">Pendaftaran Santri Baru</h1>
        <p class="text-center text-gray-600 mb-6">Isikan data dengan benar untuk proses pendaftaran.</p>

        <form action="#" method="POST" enctype="multipart/form-data">
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

            <!-- Provinsi -->
            <div class="mb-4">
                <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                <input type="text" id="provinsi" name="provinsi" placeholder="Provinsi" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Kabupaten/Kota -->
            <div class="mb-4">
                <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                <input type="text" id="kabupaten" name="kabupaten" placeholder="Kabupaten/Kota" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Kecamatan -->
            <div class="mb-4">
                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" placeholder="Kecamatan" class="w-full p-2 border border-gray-300 rounded-md">
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

            <!-- Upload Foto -->
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto 3x4 (maksimal 2MB)</label>
                <input type="file" id="foto" name="foto" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Upload Kartu Keluarga -->
            <div class="mb-4">
                <label for="kk" class="block text-sm font-medium text-gray-700 mb-2">Upload Kartu Keluarga (maksimal 2MB)</label>
                <input type="file" id="kk" name="kk" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Upload Ijazah -->
            <div class="mb-4">
                <label for="ijazah" class="block text-sm font-medium text-gray-700 mb-2">Upload Ijazah (maksimal 2MB)</label>
                <input type="file" id="ijazah" name="ijazah" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Nama Orang Tua -->
            <div class="mb-4">
                <label for="nama_ortu" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap Orang Tua/Wali</label>
                <input type="text" id="nama_ortu" name="nama_ortu" placeholder="Nama Lengkap" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Email & Nomor HP -->
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
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>