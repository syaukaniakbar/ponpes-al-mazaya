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
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Buat Total Siswa</h2>
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

        <form action="{{ route('total-siswa.store') }}" method="POST" enctype="multipart/form-data" onsubmit="submitForm()">
            @csrf
            <div class="mb-6">
                <label for="tingkatan" class="block mb-2 text-lg font-medium text-gray-800">Tingkatan</label>
                <fieldset>
                    <div class="flex items-center my-4">
                        <input
                            id="mts"
                            type="radio"
                            name="tingkatan"
                            value="Wustha"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                            {{ old('tingkatan') == 'Wustha' ? 'checked' : '' }}>
                        <label for="MTS" class="block text-sm font-medium text-gray-900 ms-2">Wustha</label>
                    </div>
                    <div class="flex items-center my-4">
                        <input
                            id="mts"
                            type="radio"
                            name="tingkatan"
                            value="Ulya"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                            {{ old('tingkatan') == 'Ulya' ? 'checked' : '' }}>
                        <label for="MTS" class="block text-sm font-medium text-gray-900 ms-2">Ulya</label>
                    </div>
                    <div class="flex items-center my-4">
                        <input
                            id="mts"
                            type="radio"
                            name="tingkatan"
                            value="MTS"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                            {{ old('tingkatan') == 'MTS' ? 'checked' : '' }}>
                        <label for="MTS" class="block text-sm font-medium text-gray-900 ms-2">MTS</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input
                            id="ma"
                            type="radio"
                            name="tingkatan"
                            value="MA"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                            {{ old('tingkatan') == 'MA' ? 'checked' : '' }}>
                        <label for="MA" class="block text-sm font-medium text-gray-900 ms-2">MA</label>
                    </div>
                </fieldset>
            </div>
            <div class="mb-6">
                <label for="tahun" class="block mb-2 text-lg font-medium text-gray-800">Tahun</label>
                <input
                    type="text"
                    id="tahun"
                    name="tahun"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Tahun"
                    value="{{ old('tahun') }}">
            </div>
            <div class="mb-6">
                <label for="total_siswa" class="block mb-2 text-lg font-medium text-gray-800">Total Siswa</label>
                <input
                    type="text"
                    id="total_siswa"
                    name="total_siswa"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan total siswa"
                    value="{{ old('total_siswa') }}">
            </div>
            <div class="mb-6">
                <div class="flex justify-start">
                    <button type="button" class="w-full px-4 py-2 mt-4 text-white transition bg-blue-500 rounded-md hover:bg-blue-700" onclick="openModal('modelConfirm')">
                        Simpan
                    </button>
                    <div id="modelConfirm" class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60 ">
                        <div class="relative max-w-md mx-auto bg-white rounded-md shadow-xl top-40">
                            <div class="flex justify-end p-2">
                                <button onclick="closeModal('modelConfirm')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 pt-0 text-center">
                                <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Lanjutkan Membuat Total Siswa?</h3>
                                <!-- Tombol batal -->
                                <button type="button" onclick="closeModal('modelConfirm')" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg px-3 py-2.5">Tidak, Kembali</button>
                                <!-- Tombol submit -->
                                <button type="submit" class="text-white bg-green-600 hover:bg-green-800 rounded-lg px-3 py-2.5">Ya, Lanjutkan</button>
                            </div>
                        </div>
                    </div>
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
    {{-- Akhir Modal Button Simpan --}}

</x-dashboard-layout>