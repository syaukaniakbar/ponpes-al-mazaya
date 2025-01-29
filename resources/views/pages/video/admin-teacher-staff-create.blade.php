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
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Tambah Guru atau Staf</h2>
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

        <form action="{{ route('teacher-staff.store') }}" method="POST" enctype="multipart/form-data" onsubmit="submitForm()">
            @csrf
            <div class="my-6">
                <label for="name" class="block mb-2 text-lg font-medium text-gray-800">Nama</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Nama"
                    value="{{ old('name')}}">
            </div>
            <div class="my-6">
                <label for="email" class="block mb-2 text-lg font-medium text-gray-800">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Email"
                    value="{{ old('email')}}">
            </div>
            <div class="my-6">
                <label for="phone" class="block mb-2 text-lg font-medium text-gray-800">No handphone</label>
                <input
                    type="number"
                    id="phone"
                    name="phone"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan No handphone"
                    value="{{ old('phone')}}">
            </div>
            <div class="my-6">
                <label for="joined_date" class="block mb-2 text-lg font-medium text-gray-800">Tanggal masuk sebagai guru/staf</label>
                <input
                    type="date"
                    id="joined_date"
                    name="joined_date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan tanggal bergabung sebagai guru atau staf"
                    value="{{ old('joined_date')}}">
            </div>
            <fieldset>
                <label>Status</label>
                <div class="flex items-center gap-4 my-4">
                    <div class="flex items-center">
                        <input
                            id="guru"
                            type="radio"
                            name="role"
                            value="guru"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                            {{ old('role') == 'guru' ? 'checked' : '' }}>
                        <label for="guru" class="block text-sm font-medium text-gray-900 ms-2">Guru</label>
                    </div>
                    <div class="flex items-center">
                        <input
                            id="staf"
                            type="radio"
                            name="role"
                            value="staf"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                            {{ old('role') == 'staf' ? 'checked' : '' }}>
                        <label for="staf" class="block text-sm font-medium text-gray-900 ms-2">Staf</label>
                    </div>
                </div>
            </fieldset>

            <label class="block my-5 text-sm font-medium text-gray-900" for="image">Tambahkan Foto Guru atau Staf</label>

            <div x-data="{ imagePreview: null, handleFilePreview(event) {
                const file = event.target.files[0];
                if (file) {
                    this.imagePreview = URL.createObjectURL(file); // Membuat URL sementara untuk file yang diupload
                }
                 } }" class="space-y-4">
                <!-- File Input -->
                <input
                    class="block w-full text-2xl text-gray-900 bg-gray-100 border border-gray-300 rounded-lg cursor-pointer focus:outline-none "
                    id="image"
                    type="file"
                    name="image"
                    accept="image/*"
                    @change="handleFilePreview($event)">

                <p class="p-4 text-center text-red-600 border border-red-600 rounded">foto menggunakan format ; jpeg,png,jpg | max: 5mb | 3:4 diutamakan</p>

                <!-- Image Preview -->
                <template x-if="imagePreview">
                    <div class="w-full mx-auto max-w-48">
                        <img :src="imagePreview" alt="Selected Image" class="object-cover w-full h-full aspect-[3/4] border-4 border-gray-200 rounded-lg shadow-lg" />
                    </div>
                </template>
            </div>
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
                            <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Lanjutkan Menambahkan Guru/Staf?</h3>
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

</x-dashboard-layout>