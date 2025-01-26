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
        <div class="flex flex-col gap-8 p-6 bg-gray-50 md:flex-row md:justify-center md:gap-6 md:p-8 lg:gap-8">
            <!-- Excel Export Form -->
            <form
                action="{{ route('export.excel') }}"
                method="GET"
                class="flex-1 max-w-md p-8 space-y-6 transition-all bg-white shadow-lg rounded-xl hover:shadow-xl">
                @csrf
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-center text-gray-800">
                        Export Data Siswa
                        <span class="block mt-1 text-sm font-medium text-green-600">Format Excel</span>
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label for="export_year" class="block mb-2 text-sm font-medium text-gray-700">
                                Tahun Angkatan
                            </label>
                            <input
                                type="number"
                                name="tahun"
                                id="export_year"
                                min="2000"
                                max="2100"
                                class="w-full px-4 py-3 transition-all border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Enter year (e.g., 2025)"
                                required>
                        </div>

                        <div>
                            <label for="export_program" class="block mb-2 text-sm font-medium text-gray-700">
                                Tingkat Pendidikan
                            </label>
                            <select
                                name="program_pendidikan"
                                id="export_program"
                                class="w-full px-4 py-3 transition-all border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                required>
                                <option value="ulya">Ulya</option>
                                <option value="wustha">Wustha</option>
                                <option value="mts">MTS</option>
                                <option value="ma">MA</option>
                            </select>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full px-6 py-3 font-medium text-white transition-all bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Download Excel
                    </button>
                </div>
            </form>

            <!-- Payment Proof Form -->
            <form
                action="{{ route('download.images') }}"
                method="GET"
                class="flex-1 max-w-md p-8 space-y-6 transition-all bg-white shadow-lg rounded-xl hover:shadow-xl"
                onsubmit="showLoadingIndicator(event)">
                @csrf
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-center text-gray-800">
                        Download Bukti Pembayaran
                        <span class="block mt-1 text-sm font-medium text-green-600">Format Zip</span>
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label for="images_year" class="block mb-2 text-sm font-medium text-gray-700">
                                Tahun Angkatan
                            </label>
                            <input
                                type="number"
                                name="tahun"
                                id="images_year"
                                min="2000"
                                max="2100"
                                class="w-full px-4 py-3 transition-all border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter year (e.g., 2025)"
                                required>
                        </div>

                        <div>
                            <label for="images_program" class="block mb-2 text-sm font-medium text-gray-700">
                                Tingkat Pendidikan
                            </label>
                            <select
                                name="program_pendidikan"
                                id="images_program"
                                class="w-full px-4 py-3 transition-all border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="wustha">Wustha</option>
                                <option value="ulya">Ulya</option>
                                <option value="mts">MTS</option>
                                <option value="ma">MA</option>
                            </select>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full px-6 py-3 font-medium text-white transition-all bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Download Bukti
                    </button>
                </div>

                <!-- Loading Indicator -->
                <div id="loading-indicator" class="hidden mt-4 text-center">
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4 bg-green-600 rounded-full animate-ping"></div>
                        <div class="w-4 h-4 bg-green-600 rounded-full animate-ping"></div>
                        <div class="w-4 h-4 bg-green-600 rounded-full animate-ping"></div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">Sedang mendownload... Harap tunggu.</p>
                </div>
            </form>

            <script>
                function showLoadingIndicator(event) {
                    event.preventDefault(); // Prevent immediate submission for visual feedback
                    const form = event.target;

                    // Show the loading indicator
                    document.getElementById('loading-indicator').classList.remove('hidden');

                    // Submit the form after a slight delay (if needed for effect)
                    setTimeout(() => form.submit(), 500);
                }
            </script>

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