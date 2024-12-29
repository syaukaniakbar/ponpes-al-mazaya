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
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Postingan</h2>
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

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data"  onsubmit="submitForm()">
            @csrf
            <div class="my-6">
                <label for="title" class="block text-lg font-medium text-gray-800 mb-2">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Judul"
                    value="{{ old('title')}}"
                    maxlength="100">
                    
            </div>
            <p>Jumlah Karakter <span class="jumlah">0</span></p>
            <fieldset>
                <div class="flex items-center my-4">
                    <input
                        id="prestasi"
                        type="radio"
                        name="category"
                        value="prestasi"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category') == 'prestasi' ? 'checked' : '' }}>
                    <label for="prestasi" class="block ms-2 text-sm font-medium text-gray-900">Prestasi</label>
                </div>
                <div class="flex items-center mb-4">
                    <input
                        id="umum"
                        type="radio"
                        name="category"
                        value="umum"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category') == 'umum' ? 'checked' : '' }}>
                    <label for="umum" class="block ms-2 text-sm font-medium text-gray-900">Umum</label>
                </div>
                <div class="flex items-center mb-4">
                    <input
                        id="ilmiah"
                        type="radio"
                        name="category"
                        value="ilmiah"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        {{ old('category') == 'ilmiah' ? 'checked' : '' }}>
                    <label for="ilmiah" class="block ms-2 text-sm font-medium text-gray-900">Ilmiah</label>
                </div>
            </fieldset>

            <div class="mb-6">
                <label for="content" class="block my-2 text-lg font-medium text-gray-800">Tambahkan Deskripsi</label>
                <input
                    type="hidden"
                    id="description"
                    name="description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Nama Link"
                    value="{{ old('description')}}">
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
                            <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="triggerImageUpload()">
                                <i class="mdi mdi-image"></i>
                            </button>
                            <input type="file" id="imageUpload" class="hidden" accept="image/*" @change="insertImageFromFile">
                                                     
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

            <label class="block my-5 text-sm font-medium text-gray-900" for="image">Tambahkan Gambar Thumbnail</label>

            <div x-data="{ imagePreview: null, handleFilePreview(event) {
                const file = event.target.files[0];
                if (file) {
                    this.imagePreview = URL.createObjectURL(file); // Membuat URL sementara untuk file yang diupload
                }
                 } }" class="space-y-4">
                <!-- File Input -->
                <input 
                    class="block w-full text-2xl text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-100 focus:outline-none "
                    id="image" 
                    type="file" 
                    name="image" 
                    accept="image/*"
                    @change="handleFilePreview($event)" 
                >
                
                <!-- Image Preview -->
                <template x-if="imagePreview">
                    <div class="w-full max-w-sm mx-auto">
                        <img :src="imagePreview" alt="Selected Image" class="w-full h-64 object-cover rounded-lg shadow-lg border-4 border-gray-200">
                    </div>
                </template>
            </div>
               
            

            <div class="flex justify-start">
                <button type="button" class="w-full bg-blue-500 text-white rounded-md mt-4 px-4 py-2 hover:bg-blue-700 transition" onclick="openModal('modelConfirm')">
                    Simpan
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
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Lanjutkan Membuat Blog?</h3>
                            <!-- Tombol submit -->
                            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 rounded-lg px-3 py-2.5">Ya, Lanjutkan</button>
                            <!-- Tombol batal -->
                            <button type="button" onclick="closeModal('modelConfirm')" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg px-3 py-2.5">Tidak, Kembali</button>
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
                    class="text-center p-4 mt-4 mb-4 text-sm text-white bg-red-600 border border-green-300 rounded-md">
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
                    // Initialize the WYSIWYG editor
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
                    </style>`;
                    // Make the iframe content editable
                    this.wysiwyg.contentDocument.designMode = "on";
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
                triggerImageUpload: function() {
                    // Trigger the file input click event to open file selection
                    document.getElementById('imageUpload').click();
                },
                insertImageFromFile: function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const img = new Image();
                            img.src = e.target.result;
    
                            // Apply max-width and max-height to prevent oversized images
                            img.style.maxWidth = "100%";  // Prevent image from overflowing the editor
                            img.style.maxHeight = "400px"; // Adjust this value based on your preference
    
                            // Insert the image at the current selection in the WYSIWYG editor
                            const iframeDoc = this.wysiwyg.contentDocument;
                            iframeDoc.body.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                },
                insertLink: function() {
                    const url = prompt("Enter the URL:");
                    if (url) {
                        this.format("createLink", url);
                    }
                }
            }
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
    {{-- Akhir Modal Button Simpan --}}
 


</x-dashboard-layout>