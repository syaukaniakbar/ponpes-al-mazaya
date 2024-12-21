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
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Buat Link</h2>
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

        <form action="{{ route('nav-links.store') }}" method="POST" enctype="multipart/form-data" onsubmit="submitForm()">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-lg font-medium text-gray-800">Nama Link</label>
                <input
                    type="text"
                    id="title"
                    name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Nama Link"
                    value="{{ old('name')}}"
                    maxlength="100">

                <p>Jumlah Karakter <span class="jumlah">0</span></p>
            </div>
            <div class="mb-6">
                <label for="content" class="block mb-2 text-lg font-medium text-gray-800">Content</label>
                <input
                    type="hidden"
                    id="content"
                    name="content"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Masukkan Nama Link"
                    value="{{ old('content')}}"
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
                                <button type="button" class="w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H1')">
                                    <i class="mdi mdi-format-header-1"></i>
                                </button>
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

                <div class="mb-6">
                    <label for="is_active" class="block mb-2 text-lg font-medium text-gray-800">Is Active</label>
                    <input
                        type="checkbox"
                        id="is_active"
                        name="is_active"
                        value="1"
                        class="rounded-md"
                        {{ old('is_active') ? 'checked' : '' }}>
                    @error('is_active')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
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
                                <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Lanjutkan Membuat Link?</h3>
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
                    class="p-4 mt-4 mb-4 text-sm text-center text-white bg-red-600 border border-green-300 rounded-md">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>


    <script>
        function app() {
            return {
                wysiwyg: null,
                init: function(el) {
                    // Get el
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
                    // Make editable
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
                insertLink: function() {
                    // Prompt user for the URL to insert
                    const url = prompt("Enter the URL:");
                    if (url) {
                        // Apply the link to the selected text
                        this.format("createLink", url);
                    }
                }
            }
        }

        function submitForm() {
            // Get the content of the WYSIWYG iframe
            const wysiwygContent = document.querySelector('iframe').contentDocument.body.innerHTML;

            // Set the content in the hidden input
            document.getElementById('content').value = wysiwygContent;
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