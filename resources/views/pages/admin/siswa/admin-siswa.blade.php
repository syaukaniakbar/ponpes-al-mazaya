<x-dashboard-layout>

    @section('title', 'Dashboard Blog | Ponpes Al-Mazaya')


    <div class="w-full mt-12">
        <a href="{{ route('pendaftaran') }}">
            <button class="p-3 text-white bg-green-600 rounded">
                Daftar Siswa
            </button>
        </a>
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
        <p class="flex items-center p-5 text-xl ">
            Al-Mazaya Blog
        </p>
        <div class="overflow-auto bg-white">
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="text-white bg-gray-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nisn</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Nama</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Program Pendidikan</th>
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
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswas as $key => $siswa)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $siswas->firstItem() + $key }}</td>
                            <td class="px-4 py-3">{{ $siswa->nisn }}</td>
                            <td class="px-4 py-3 uppercase">{{ $siswa->nama }}</td>
                            <td class="px-4 py-3 uppercase">{{ $siswa->program_pendidikan}}</td>
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
            <div class="w-full mt-16 mb-16 flex justify-center">
                <div class="flex items-center space-x-2">
                    @if ($siswas->onFirstPage())
                        <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">← Previous</span>
                    @else
                        <a href="{{ $siswas->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">← Previous</a>
                    @endif
        
                    @foreach ($siswas->getUrlRange(1, $siswas->lastPage()) as $page => $url)
                        @if ($page == $siswas->currentPage())
                            <span class="px-4 py-2 bg-green-600 text-white rounded font-bold">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-green-600 hover:text-white">{{ $page }}</a>
                        @endif
                    @endforeach
        
                    @if ($siswas->hasMorePages())
                        <a href="{{ $siswas->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next →</a>
                    @else
                        <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next →</span>
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


</x-dashboard-layout>