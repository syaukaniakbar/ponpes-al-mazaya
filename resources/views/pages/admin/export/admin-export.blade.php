<x-dashboard-layout>

    @section('title', 'Dashboard Blog | Ponpes Al-Mazaya')


    <div class="w-full mt-12">
        <p class="flex items-center py-5 text-xl ">
            Al-Mazaya Export
        </p>
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
        <div class="flex flex-col gap-10 py-20 bg-white md:flex-row">
            <form action="{{ route('export.excel') }}" method="GET" class="w-full max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
                @csrf
                <div class="mb-4">
                    <h2 class="mb-4 text-lg font-bold text-center">Download Data Siswa (Excel)</h2>
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-700">Year</label>
                    <input
                        type="number"
                        name="tahun"
                        id="tahun"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter year (e.g., 2025)"
                        required>
                </div>

                <div class="mb-4">
                    <label for="program_pendidikan" class="block mb-2 text-sm font-medium text-gray-700">Program Pendidikan</label>
                    <select name="program_pendidikan" id="program_pendidikan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="ulya">Ulya</option>
                        <option value="wustha">Wustha</option>
                        <option value="mts">MTS</option>
                        <option value="ma">MA</option>
                    </select>
                </div>

                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">Export Excel</button>
            </form>

            <form action="{{ route('download.images') }}" method="GET" class="w-full max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
                @csrf
                <div class="mb-4">
                    <h2 class="mb-4 text-lg font-bold text-center">Download Bukti Pembayaran</h2>
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-700">Year</label>
                    <input
                        type="number"
                        name="tahun"
                        id="tahun"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter year (e.g., 2025)"
                        required>
                </div>

                <div class="mb-4">
                    <label for="program_pendidikan" class="block mb-2 text-sm font-medium text-gray-700">Program Pendidikan</label>
                    <select
                        name="program_pendidikan"
                        id="program_pendidikan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="wustha">Wustha</option>
                        <option value="ulya">Ulya</option>
                        <option value="mts">MTS</option>
                        <option value="ma">MA</option>
                    </select>
                </div>

                <button
                    type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                    Download Bukti Pembayaran
                </button>
            </form>
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