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

    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Postingan</h2>

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
                class="fixed top-24 right-5 max-w-xs w-full p-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-md shadow-lg flex items-center space-x-3 z-50"
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
                <label for="title" class="block text-lg font-medium text-gray-800 mb-2">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Judul"
                    value="{{ old('title', $blog->title) }}">
            </div>
        
            <p>Jumlah Karakter <span class="jumlah">0</span></p>
        
            <label for="message" class="block my-4 text-sm font-medium text-gray-900 dark:text-white">Tambahkan Deskripsi</label>
            <textarea 
                id="description" 
                name="description" 
                rows="4" 
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                placeholder="Masukkan Deskripsi">{{ old('description') }}
            </textarea>
        
            <!-- Input Image -->
            <div class="my-7">
                <label for="content" class="block my-4 text-lg font-medium text-gray-800">Tambahkan Cover</label>
                <input
                    class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-100 focus:outline-none"
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
            </div>
        
            <!-- Submit Button -->
            <div class="flex justify-start">
                <button type="button" class="w-full bg-blue-500 text-white rounded-md mt-4 px-4 py-2 hover:bg-blue-700 transition" onclick="openModal('modelConfirm')">
                    Simpan Perubahan
                </button>
                <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
                    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal('modelConfirm')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5">
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

    {{-- Rich Editor --}}
    <script>
        function app() {
            return {
                wysiwyg: null,
                init: function (el) {
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
                    
                format: function (cmd, param) {
                    try {
                        const success = this.wysiwyg.contentDocument.execCommand(cmd, false, param || null);
                        if (!success) {
                            console.error(`Command "${cmd}" failed.`);
                        }
                    } catch (error) {
                        console.error(`Error executing "${cmd}":`, error);
                    }
                },
                insertHTML: function (html) {
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
                insertLink: function () {
                    const url = prompt("Enter the URL:");
                    if (url) {
                        this.format("createLink", url);
                    }
                },
                triggerImageUpload: function () {
                    document.getElementById('imageUploader').click();
                },
                handleImageUpload: function (event) {
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