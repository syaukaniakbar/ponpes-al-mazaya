<x-main-layout>
    @section('title', 'Official Website Ponpes Al-Mazaya | Home') <!-- Mengisi bagian @yield('title') di parent -->
    
    <div class="container mx-auto p-4 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-2xl relative">
            <h1 class="text-2xl text-center mb-6">Cek Status Pendaftaran | <span class="font-bold text-green-900" >Ponpes Al-Mazaya</span> </h1>

            <form id="searchForm" class="flex items-center w-full mb-6" onsubmit="event.preventDefault(); searchSiswa();">
                <label for="nisn" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                    </div>
                    <input 
                        type="number" 
                        name="nisn" 
                        id="nisnInput" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4" 
                        placeholder="Masukkan NISN ..." 
                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);" 
                    />
                </div>
                <button type="submit" class="inline-flex items-center py-4 px-3 ml-2 text-sm font-medium text-white bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>Cari
                </button>
            </form>
            <!-- Error -->    
            <div id="errorMessage" class="hidden transition-opacity duration-500 ease-in-out absolute w-full">
               
            </div>  
        </div>
        <!-- Modal for Showing Cek NISN -->
        <div id="cekModal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-900 bg-opacity-60">
            <div class="relative max-w-4xl mx-auto bg-white rounded-lg shadow-xl top-6">
                <!-- Close Button -->
                <div class="flex justify-end p-4">
                    <button onclick="closeModal()" class="inline-flex items-center p-2 text-sm text-white bg-red-600 rounded-lg hover:bg-white hover:text-red-600 duration-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Cek NISN Content -->
                <div id="blogDetailContent" class="ps-8 pe-8 pb-8 mb-12">
                    <!-- Cek NISN will be inserted here dynamically -->
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to open modal
        function openModal() {
            document.getElementById('cekModal').classList.remove('hidden');
        }
    
        // Function to close modal
        function closeModal() {
            document.getElementById('cekModal').classList.add('hidden');
        }
    
        // Function to search student data
        async function searchSiswa() {
            const nisn = document.getElementById('nisnInput').value.trim(); // Get NISN value and remove spaces
            const blogDetailContent = document.getElementById('blogDetailContent'); // Get the element to display the results
    
            // Validate input
            if (!nisn) {
                blogDetailContent.innerHTML = `<p class="text-red-500">NISN tidak boleh kosong.</p>`;
                openModal();
                return; // Stop execution if NISN is empty
            }
    
            try {
                // Send request to backend
                const response = await fetch(`/siswa/search`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ nisn: nisn }),
                });
    
                const result = await response.json();
                
    
                // If successful, display data
                if (result.status === 'success') {

                    const imageUrl = result.data.image_bukti_transaksi_url;
                    console.log(imageUrl);

                    let content = `
                        <div class="grid grid-cols-1 gap-6">
                            <h2 class="text-3xl font-semibold text-center text-gray-900">Detail Siswa</h2>
                            <!-- Nomor Induk Siswa Nasional -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Siswa Nasional (NISN)</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.nisn}
                                </div>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap (Sesuai Akta/KTP)</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.nama}
                                </div>
                            </div>

                            <!-- Program Pendidikan -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Program Pendidikan</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.program_pendidikan}
                                </div>
                            </div>

                            <!-- NIK -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.nik}
                                </div>
                            </div>

                            <!-- Nomor KK -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Kartu Keluarga</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.nomor_kk}
                                </div>
                            </div>

                            <!-- Tempat & Tanggal Lahir -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                        ${result.data.tempat_lahir}
                                    </div>
                                </div>
                                <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                        ${result.data.tanggal_lahir}
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.jenis_kelamin}
                                </div>
                            </div>

                            <!-- Alamat Domisili -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Domisili</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.alamat_domisili}
                                </div>
                            </div>

                            <!-- Provinsi -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.provinsi}
                                </div>
                            </div>

                            <!-- Kota -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.kota}
                                </div>
                            </div>

                            <!-- Kecamatan -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.kecamatan}
                                </div>
                            </div>

                            <!-- Kelurahan -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.kelurahan}
                                </div>
                            </div>

                            <!-- Jumlah Saudara -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Saudara</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.jumlah_saudara}
                                </div>
                            </div>

                            <!-- Anak Ke -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Anak Ke</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.anak_ke}
                                </div>
                            </div>

                            <!-- Asal Sekolah -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.asal_sekolah}
                                </div>
                            </div>

                            <!-- Nama Ayah -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ayah</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.nama_ayah}
                                </div>
                            </div>

                            <!-- NIK Ayah -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIK Ayah</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.nik_ayah}
                                </div>
                            </div>

                            <!-- Pendidikan Ayah -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Ayah</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.pendidikan_ayah}
                                </div>
                            </div>

                            <!-- Pekerjaan Ayah -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Ayah</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.pekerjaan_ayah}
                                </div>
                            </div>

                            <!-- Nama Ibu -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ibu</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.nama_ibu}
                                </div>
                            </div>

                            <!-- NIK Ibu -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIK Ibu</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    ${result.data.nik_ibu}
                                </div>
                            </div>

                            <!-- Pendidikan Ibu -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Ibu</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.pendidikan_ibu}
                                </div>
                            </div>

                            <!-- Pekerjaan Ibu -->
                            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Ibu</label>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                    ${result.data.pekerjaan_ibu}
                                </div>
                            </div>
                        </div>

                        <!-- Penghasilan -->
                        <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Penghasilan</label>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                ${result.data.penghasilan}
                            </div>
                        </div>

                        <!-- Alamat Sesuai Kartu Keluarga (KK) -->
                        <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Sesuai Kartu Keluarga (KK)</label>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                ${result.data.alamat_kk}
                            </div>
                        </div>

                        <!-- Nomor HP Orangtua -->
                        <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP Orangtua (WhatsApp)</label>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                ${result.data.no_hp_orangtua}
                            </div>
                        </div>
                    `;
    
                    // Only show Kopiah field if gender is male
                    if (result.data.jenis_kelamin === "laki-laki") {
                        content += `
                        <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ukuran Kopiah</label>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                                ${result.data.kopiah}
                            </div>
                        </div>`;
                    }
    
                    // Display Seragam field
                    content += `
                    <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ukuran Seragam</label>
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 uppercase">
                            ${result.data.seragam}
                        </div>        
                    </div>
                    <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Transaksi</label>
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 flex justify-center items-center">
                            <img src="/storage/${imageUrl}" alt="Bukti Transaksi" class="object-cover w-full h-full rounded-lg shadow-md">
                        </div>
                    </div>



                    `;
    
                    blogDetailContent.innerHTML = content;
                    openModal(); // Open modal

                    errorMessage.innerHTML = '';
                } else {
                    // If not found, display error message
                    document.getElementById("errorMessage").classList.remove("hidden");

                    errorMessage.innerHTML = `
                    <div class="bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-sm text-center">
                        <p class="font-medium">${result.message}</p>
                    </div>

                    
                    `;
                }
    
            } catch (error) {
                // If an error occurs during fetch
                console.error('Error fetching data:', error); // Log error for debugging

                document.getElementById("errorMessage").classList.remove("hidden");

                errorMessage.innerHTML = 
                `
                <div class="bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-sm text-center">
                    <p class="font-medium">Terjadi kesalahan. Silakan coba lagi.</p>
                </div>
                `;
            }
        }
    </script>
    
    
</x-main-layout>
