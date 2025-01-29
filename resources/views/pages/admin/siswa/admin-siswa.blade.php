<x-dashboard-layout>

    @section('title', 'Dashboard Blog | Ponpes Al-Mazaya')


    <div class="w-full mt-12">
        <div class="flex justify-between">
            <a href="{{ route('pendaftaran') }}">
                <button class="p-3 text-white bg-green-600 rounded">
                    Daftar Siswa
                </button>
            </a>
            <!-- Search Form -->
        </div>
        <label for="searchInput" class="block px-6 py-2 mt-8 mb-4 rounded bg-yellow-500 w-44 text-white">Pencarian Siswa</label>
        <form id="searchForm" class="flex items-center w-full mb-6" onsubmit="event.preventDefault(); searchSiswa();">
            <label for="nisn" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                </div>
                <input 
                    type="text" 
                    name="siswa" 
                    id="siswaInput" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4" 
                    placeholder="Masukkan Nama atau NISN" 
                   
                />
            </div>
            <button type="submit" class="inline-flex items-center py-4 px-3 ml-2 text-sm font-medium text-white bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>Cari
            </button>
        </form>
        <div id="errorMessage" class="hidden mt-2"></div> 
        @if(session('success'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 10000)"
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
        <p class="flex items-center py-5 text-xl ">
            Al-Mazaya Blog
        </p>
        <div class="overflow-auto">
            <table class="min-w-full bg-white table-auto hidden" id="resultDetailTable">
                <thead>
                    <tr class="text-white bg-green-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">ID</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">NISN</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Program Pendidikan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">NIK</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nomor Kartu Keluarga</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tempat Lahir</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tanggal Lahir</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Alamat Domisili</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Provinsi</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kota</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kecamatan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kelurahan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Jumlah Saudara</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Anak Ke</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Asal Sekolah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">NIK Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pendidikan Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pekerjaan Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">NIK Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pendidikan Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pekerjaan Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Penghasilan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Alamat Kartu Keluarga</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No HP Orangtua</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kopiah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Seragam</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Bukti Transaksi</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                    </tr>
                </thead>
                <tbody id="resultDetail">
                    @forelse ($siswas as $siswa)
                    <tr class="border-b">
                    </tr>
                    @empty
                    <tr>
                        <td colspan="31" class="py-10 text-center">No records found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>            
        </div>
        <div class="overflow-auto bg-white mt-6">   
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="text-white bg-gray-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nisn</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Program Pendidikan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tahun</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nik</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nomor Kartu Keluarga</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tempat Lahir</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tanggal Lahir</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Alamat Domisili</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Provinsi</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kota</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kecamatan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kelurahan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Jumlah Saudara</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Anak Ke</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Asal Sekolah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">NIK Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pendidikan Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pekerjaan Ayah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">NIK Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pendidikan Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Pekerjaan Ibu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Penghasilan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Alamat Kartu Keluarga</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No Hp Orangtua</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Kopiah</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Seragam</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Bukti Transaksi</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswas as $key => $siswa)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $siswas->firstItem() + $key }}</td>

                        <td class="px-4 py-3">{{ $siswa->nisn }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->nama }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->program_pendidikan}}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->tahun}}</td>
                        <td class="px-4 py-3">{{ $siswa->nik }}</td>
                        <td class="px-4 py-3">{{ $siswa->nomor_kk}}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->tempat_lahir }}</td>
                        <td class="px-4 py-3">{{ $siswa->tanggal_lahir }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->jenis_kelamin }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->alamat_domisili }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->provinsi }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->kota }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->kecamatan }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->kelurahan }}</td>
                        <td class="px-4 py-3">{{ $siswa->jumlah_saudara }}</td>
                        <td class="px-4 py-3">{{ $siswa->anak_ke }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->asal_sekolah }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->nama_ayah }}</td>
                        <td class="px-4 py-3 ">{{ $siswa->nik_ayah }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->pendidikan_ayah }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->pekerjaan_ayah }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->nama_ibu }}</td>
                        <td class="px-4 py-3">{{ $siswa->nik_ibu }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->pendidikan_ibu }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->pekerjaan_ibu }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->penghasilan }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->alamat_kk }}</td>
                        <td class="px-4 py-3">{{ $siswa->no_hp_orangtua }}</td>
                        <td class="px-4 py-3">{{ $siswa->kopiah }}</td>
                        <td class="px-4 py-3 uppercase">{{ $siswa->seragam }}</td>
                        @if ($siswa->image_bukti_transaksi_url)
                        <td class="px-4 py-3">
                            <img src="{{ asset('storage/' . $siswa->image_bukti_transaksi_url) }}" alt="Blog Image" class="object-cover w-32 h-32">
                        </td>
                        @endif
                        <td class="px-4 py-3">
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="block w-full p-2 mb-2 text-center text-white bg-blue-600 rounded">
                                Edit
                            </a>
                            <form action="{{ route('siswa.delete', $siswa->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="w-full p-2 text-white bg-red-600 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center">No records found!</td>
                    </tr>
                    @endforelse
                    <!-- Pagination -->
                </tbody>
            </table>
            <div class="flex justify-center w-full mt-16 mb-16">
                <div class="flex items-center space-x-2">
                    @if ($siswas->onFirstPage())
                    <span class="px-4 py-2 text-gray-700 bg-gray-300 rounded cursor-not-allowed">← Previous</span>
                    @else
                    <a href="{{ $siswas->previousPageUrl() }}" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">← Previous</a>
                    @endif

                    @foreach ($siswas->getUrlRange(1, $siswas->lastPage()) as $page => $url)
                    @if ($page == $siswas->currentPage())
                    <span class="px-4 py-2 font-bold text-white bg-green-600 rounded">{{ $page }}</span>
                    @else
                    <a href="{{ $url }}" class="px-4 py-2 text-gray-800 bg-gray-200 rounded hover:bg-green-600 hover:text-white">{{ $page }}</a>
                    @endif
                    @endforeach

                    @if ($siswas->hasMorePages())
                    <a href="{{ $siswas->nextPageUrl() }}" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Next →</a>
                    @else
                    <span class="px-4 py-2 text-gray-700 bg-gray-300 rounded cursor-not-allowed">Next →</span>
                    @endif
                </div>
            </div>
        </div>

        @if(session('error'))
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
            <span>{{ session('error') }}</span>
        </div>
        @endif
    </div>
    
    <script>
        // Function to search student data
        async function searchSiswa() {
            const siswa = document.getElementById('siswaInput').value.trim(); // Ambil input dan hapus spasi
            const resultDetail = document.getElementById('resultDetail'); // Elemen untuk menampilkan hasil
            const errorMessage = document.getElementById('errorMessage'); // Elemen untuk menampilkan error
            const resultDetailTable = document.getElementById("resultDetailTable"); // Tabel hasil

            // Reset tampilan
            resultDetail.innerHTML = '';
            errorMessage.innerHTML = '';
            errorMessage.classList.add('hidden');
            resultDetailTable.classList.add('hidden');

            // Validasi input
            if (!siswa) {
                errorMessage.classList.remove("hidden");
                errorMessage.innerHTML = `<p class="text-red-500">Siswa tidak boleh kosong.</p>`;
                return;
            }

            try {
                // Kirim request ke backend
                const response = await fetch(`/siswa/search/admin`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ siswa: siswa }),
                });

                const result = await response.json();

                // Jika sukses, tampilkan data
                if (result.status === 'success' && result.data.length > 0) {
                    errorMessage.classList.add("hidden");
                    resultDetailTable.classList.remove("hidden");

                    // Generate baris untuk setiap siswa yang ditemukan
                    resultDetail.innerHTML = result.data.map((siswa) => `
                        <tr>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.id}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nisn}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nama}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.program_pendidikan}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nik}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nomor_kk}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.tempat_lahir}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.tanggal_lahir}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.jenis_kelamin}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.alamat_domisili}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.provinsi}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.kota}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.kecamatan}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.kelurahan}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.jumlah_saudara}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.anak_ke}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.asal_sekolah}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nama_ayah}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nik_ayah}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.pendidikan_ayah}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.pekerjaan_ayah}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nama_ibu}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.nik_ibu}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.pendidikan_ibu}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.pekerjaan_ibu}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.penghasilan}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.alamat_kk}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.no_hp_orangtua}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.kopiah}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">${siswa.seragam}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">
                                <img src="/storage/${siswa.image_bukti_transaksi_url}" alt="Bukti Transaksi" class="object-cover w-full h-full rounded-lg shadow-md">
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold text-left uppercase">
                            <a href="/siswa/edit/${siswa.id}" class="block w-full p-2 mb-2 text-center text-white bg-blue-600 rounded">
                                Edit
                            </a>
                            <form action="/siswa/delete/${siswa.id}" method="post">
                                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="w-full p-2 text-white bg-red-600 rounded">Delete</button>
                            </form>
                        </td>

                        </tr>
                    `).join(""); // Gabungkan semua baris menjadi satu string

                } else {
                    // Jika tidak ditemukan, tampilkan pesan error
                    resultDetailTable.classList.add("hidden");
                    errorMessage.classList.remove("hidden");
                    errorMessage.innerHTML = `
                        <div class="bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-sm text-center p-4">
                            <p class="font-medium">${result.message}</p>
                        </div>
                    `;
                }

            } catch (error) {
                console.error('Error fetching data:', error);
                errorMessage.classList.remove("hidden");
                errorMessage.innerHTML = `
                    <div class="bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-sm text-center p-4">
                        <p class="font-medium">Terjadi kesalahan. Silakan coba lagi.</p>
                    </div>
                `;
            }
        }

    </script>
    
    
    
    
    

</x-dashboard-layout>