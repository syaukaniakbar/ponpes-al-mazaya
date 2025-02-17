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
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Buat Dokumen</h2>
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
        <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-6">
                <label for="name" class="block my-4 text-sm font-medium text-gray-900">Nama Dokumen</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Nama Dokumen"
                    value="{{ old('name')}}"
                    maxlength="100">
            </div>
            
            <label for="type" class="block text-sm font-medium text-gray-700 my-4">Pilih Jenis Dokumen</label>
            <select id="type" name="type" class="w-full p-2 border border-gray-300 rounded-md">
                <option value="">Jenis Dokumen</option>
                <option value="aturan" {{ old('type') == 'aturan' ? 'selected' : '' }}>Aturan</option>
                <option value="surat_pernyataan" {{ old('type') == 'surat_pernyataan' ? 'selected' : '' }}>Surat Pernyataan</option>
            </select>
        
            <div class="my-6">
                <label for="document" class="block text-sm font-medium text-gray-700 my-4">Upload Dokumen (PDF)</label>
                <input
                    type="file"
                    id="document"
                    name="document"
                    accept="application/pdf"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <div class="flex justify-start">
                <button type="submit" class="w-full px-4 py-2 mt-4 text-white transition bg-blue-500 rounded-md hover:bg-blue-700">
                    Simpan
                </button>
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

    {{-- Menghitung jumlah karakter title --}}
    <script>
        // Get the elements
        const titleInput = document.querySelector('#title');
        const jumlahSpan = document.querySelector('.jumlah');

        // Update character count in real-time
        titleInput.addEventListener('input', function() {
            jumlahSpan.textContent = titleInput.value.length;
        });
    </script>

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

</x-dashboard-layout>