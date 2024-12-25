<x-dashboard-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Postingan</h2>
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Input Title -->
            <div class="mb-6">
                <label for="title" class="block text-lg font-medium text-gray-800 mb-2">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Judul"
                    value="{{ old('title', $blog->title) }}">
            </div>

            <!-- Radio Button for Category -->
            <fieldset>
                <div class="flex items-center mb-4">
                    <input
                        id="prestasi"
                        type="radio"
                        name="category"
                        value="prestasi"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category', $blog->category) == 'prestasi' ? 'checked' : '' }}>
                    <label for="prestasi" class="block ms-2 text-sm font-medium text-gray-900">Prestasi</label>
                </div>
                <div class="flex items-center mb-4">
                    <input
                        id="umum"
                        type="radio"
                        name="category"
                        value="umum"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category', $blog->category) == 'umum' ? 'checked' : '' }}>
                    <label for="umum" class="block ms-2 text-sm font-medium text-gray-900">Umum</label>
                </div>
                <div class="flex items-center mb-4">
                    <input
                        id="ilmiah"
                        type="radio"
                        name="category"
                        value="ilmiah"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category', $blog->category) == 'ilmiah' ? 'checked' : '' }}>
                    <label for="ilmiah" class="block ms-2 text-sm font-medium text-gray-900">Ilmiah</label>
                </div>
            </fieldset>

            <!-- Input Description -->
            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-800 mb-2">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Tuliskan Konten Disini"
                    required>{{ old('description', $blog->description) }}</textarea>
            </div>

            <!-- Input Image -->
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="image">Tambahkan Thumbnail</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-100 focus:outline-none py-4 px-4"
                id="image"
                type="file"
                name="image"
                accept="image/*">

            @if ($blog->image_url)
            <div class="mt-4">
                <p class="text-sm text-gray-600 mb-2">Gambar Saat Ini:</p>
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Thumbnail" class="w-64 h-64 object-cover rounded-md border">
                </div>
            </div>
            @endif


            <!-- Submit Button -->
            <div class="flex justify-start">
                <button type="button" class="w-full bg-blue-500 text-white rounded-md mt-4 px-4 py-2 hover:bg-blue-700 transition" onclick="openModal('modelConfirm')">
                    Simpan Perubahan
                </button>
                <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal('modelConfirm')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-6 pt-0 text-center">
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Simpan Perubahan?</h3>
                            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 rounded-lg px-3 py-2.5">
                                Ya, Simpan
                            </button>

                            <button type="button" onclick="closeModal('modelConfirm')" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg px-3 py-2.5">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Feedback Messages -->
        @if(session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="text-center p-4 mt-4 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-md" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-center p-4 mt-4 mb-4 text-sm text-white bg-red-600 border border-green-300 rounded-md">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>

</x-dashboard-layout>