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
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Edit Postingan</h2>

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

        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input Title -->
            <div class="mb-6">
                <label for="title" class="block mb-2 text-lg font-medium text-gray-800">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Judul"
                    value="{{ old('title', $blog->title) }}">
            </div>

            <p>Jumlah Karakter <span class="jumlah">0</span></p>

            <!-- Radio Button for Category -->
            <fieldset class="mb-6">
                <div class="flex items-center py-4">
                    <input
                        id="prestasi"
                        type="radio"
                        name="category"
                        value="prestasi"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category', $blog->category) == 'prestasi' ? 'checked' : '' }}>
                    <label for="prestasi" class="text-sm font-medium text-gray-900 ms-2">Prestasi</label>
                </div>
                <div class="flex items-center mb-4">
                    <input
                        id="umum"
                        type="radio"
                        name="category"
                        value="umum"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category', $blog->category) == 'umum' ? 'checked' : '' }}>
                    <label for="umum" class="text-sm font-medium text-gray-900 ms-2">Umum</label>
                </div>
                <div class="flex items-center mb-4">
                    <input
                        id="ilmiah"
                        type="radio"
                        name="category"
                        value="ilmiah"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category', $blog->category) == 'ilmiah' ? 'checked' : '' }}>
                    <label for="ilmiah" class="text-sm font-medium text-gray-900 ms-2">Ilmiah</label>
                </div>
            </fieldset>

            <!-- Input Description -->
            <div class="mb-4">
                <label for="description" class="block my-2 text-lg font-medium text-gray-800">Tambahkan Deskripsi</label>
                <input type="hidden" id="description" name="description" value="{{ old('description', $blog->description) }}">
            </div>

            {{-- EDITOR --}}
            <div class="">
                <div class="w-full max-w-6xl mx-auto text-black bg-white rounded-xl" x-data="app()" x-init="init($refs.wysiwyg)">
                    <div class="overflow-hidden border border-gray-200 rounded-md">
                        <div class="flex w-full text-xl text-gray-600 border-b border-gray-200">
                            <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('bold')">
                                <i class="mdi mdi-format-bold"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('italic')">
                                <i class="mdi mdi-format-italic"></i>
                            </button>
                            <button type="button" class="w-10 h-10 mr-1 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('underline')">
                                <i class="mdi mdi-format-underline"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','P')">
                                <i class="mdi mdi-format-paragraph"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="triggerImageUpload()">
                                <i class="mdi mdi-image"></i>
                            </button>
                            <input type="file" id="imageUploader" accept="image/*" class="hidden" @change="handleImageUpload">
                            <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H2')">
                                <i class="mdi mdi-format-header-2"></i>
                            </button>
                            <button type="button" class="w-10 h-10 mr-1 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H3')">
                                <i class="mdi mdi-format-header-3"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('insertUnorderedList')">
                                <i class="mdi mdi-format-list-bulleted"></i>
                            </button>
                            <button type="button" class="w-10 h-10 mr-1 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('insertOrderedList')">
                                <i class="mdi mdi-format-list-numbered"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('justifyLeft')">
                                <i class="mdi mdi-format-align-left"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('justifyCenter')">
                                <i class="mdi mdi-format-align-center"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('justifyRight')">
                                <i class="mdi mdi-format-align-right"></i>
                            </button>
                            <button type="button" class="w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="insertLink()">
                                <i class="mdi mdi-link"></i>
                            </button>
                        </div>
                        <div class="w-full">
                            <iframe x-ref="wysiwyg" class="w-full overflow-y-auto text-base h-96"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Image -->
            <div class="my-7">
                <label for="content" class="block my-4 text-lg font-medium text-gray-800">Tambahkan Cover</label>
                <input
                    class="block w-full text-lg text-gray-900 bg-gray-100 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                    id="image"
                    type="file"
                    name="image"
                    accept="image/*">

                @if ($blog->image_url)
                <div class="mt-4">
                    <p class="mb-2 text-sm text-gray-600">Gambar Saat Ini:</p>
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Thumbnail" class="object-cover w-64 h-64 border rounded-md">
                    </div>
                </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex justify-start">
                <button type="button" class="w-full px-4 py-2 mt-4 text-white transition bg-blue-500 rounded-md hover:bg-blue-700" onclick="openModal('modelConfirm')">
                    Simpan Perubahan
                </button>
                <div id="modelConfirm" class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60">
                    <div class="relative max-w-md mx-auto bg-white rounded-md shadow-xl top-40">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal('modelConfirm')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-6 pt-0 text-center">
                            <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Simpan Perubahan?</h3>
                            <button type="button" onclick="closeModal('modelConfirm')" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg px-3 py-2.5">Batal</button>
                            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 rounded-lg px-3 py-2.5">
                                Ya, Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li class="p-4 mt-4 mb-4 text-sm text-center text-white bg-red-600 border border-green-300 rounded-md">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    {{-- Rich Editor --}}
    <script>
        function app() {
            return {
                wysiwyg: null,
                init: function(el) {
                    this.wysiwyg = el;
                    this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
                        *, ::after, ::before { box-sizing: border-box; }
                        :root { tab-size: 4; }
                        html { line-height: 1.15; text-size-adjust: 100%; }
                        body { margin: 0; padding: 1rem; color: #111827; font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
                        h1, h2, h3, h4, h5, h6 { font-weight: bold; }
                        b, strong { font-weight: bold; }
                        i, em { font-style: italic; }
                        u { text-decoration: underline; }
                        img { 
                            max-width: 100%; /* Membatasi lebar maksimum gambar */
                            height: auto; /* Menjaga rasio aspek gambar */
                        }
                    </style>`;
                    this.wysiwyg.contentDocument.designMode = "on";

                    // Menangani paste event untuk membersihkan konten
                    this.wysiwyg.contentDocument.addEventListener('paste', (event) => {
                        event.preventDefault();
                        const text = (event.clipboardData || window.clipboardData).getData('text');
                        this.insertHTML(`<p>${text}</p>`);
                    });

                    // Set the initial content of the WYSIWYG editor from the hidden input
                    const description = document.getElementById('description').value;
                    this.wysiwyg.contentDocument.body.innerHTML = description; // Set the content of the iframe
                },

                format: function(cmd, param) {
                    try {
                        const success = this.wysiwyg.contentDocument.execCommand(cmd, false, param || null);
                        if (!success) {
                            console.error(`Command "${cmd}" failed.`);
                        }
                    } catch (error) {
                        console.error(`Error executing "${cmd}":`, error);
                    }
                },
                insertHTML: function(html) {
                    const selection = this.wysiwyg.contentDocument.getSelection();
                    if (selection.rangeCount > 0) {
                        const range = selection.getRangeAt(0);
                        range.deleteContents();
                        const div = this.wysiwyg.contentDocument.createElement('div');
                        div.innerHTML = html;
                        const frag = this.wysiwyg.contentDocument.createDocumentFragment();
                        let child;
                        while ((child = div.firstChild)) {
                            frag.appendChild(child);
                        }
                        range.insertNode(frag);
                    }
                },
                insertLink: function() {
                    const url = prompt("Enter the URL:");
                    if (url) {
                        this.format("createLink", url);
                    }
                },
                triggerImageUpload: function() {
                    document.getElementById('imageUploader').click();
                },
                handleImageUpload: function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.format('insertImage', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            };
        }

        function submitForm() {
            // Get the content of the WYSIWYG iframe
            const wysiwygContent = document.querySelector('iframe').contentDocument.body.innerHTML;

            // Set the content in the hidden input
            document.getElementById('description').value = wysiwygContent;
        }
    </script>

    {{-- Menghitung jumlah karakter title --}}
    <script>
        // Get the elements
        const titleInput = document.querySelector('#title');
        const jumlahSpan = document.querySelector('.jumlah');

        // Update character count on page load
        jumlahSpan.textContent = titleInput.value.length;

        // Update character count in real-time
        titleInput.addEventListener('input', function() {
            jumlahSpan.textContent = titleInput.value.length;
        });
    </script>
    {{-- Akhir menghitung jumlah karakter title --}}

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