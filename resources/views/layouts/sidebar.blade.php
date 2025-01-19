<aside class="relative hidden h-screen shadow-xl bg-sidebar w-80 sm:block">
    <div class="p-6">
        <a href="/">
            <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
        </a>
    </div>
    <nav class="pt-3 text-base font-semibold text-black">
        <a href="{{route('dashboard')}}" class="{{ request()->is('dashboard') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="{{ request()->is('dashboard*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                <path d="M207.06,72.67A111.24,111.24,0,0,0,128,40h-.4C66.07,40.21,16,91,16,153.13V176a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V152A111.25,111.25,0,0,0,207.06,72.67ZM224,176H119.71l54.76-75.3a8,8,0,0,0-12.94-9.42L99.92,176H32V153.13c0-3.08.15-6.12.43-9.13H56a8,8,0,0,0,0-16H35.27c10.32-38.86,44-68.24,84.73-71.66V80a8,8,0,0,0,16,0V56.33A96.14,96.14,0,0,1,221,128H200a8,8,0,0,0,0,16h23.67c.21,2.65.33,5.31.33,8Z"></path>
            </svg>
            <p class="px-4">Halaman Panel</p>
        </a>
        <a href="{{route('header')}}" class="{{ request()->is('header*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('header*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                <path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V158.75l-26.07-26.06a16,16,0,0,0-22.63,0l-20,20-44-44a16,16,0,0,0-22.62,0L40,149.37V56ZM40,172l52-52,80,80H40Zm176,28H194.63l-36-36,20-20L216,181.38V200ZM144,100a12,12,0,1,1,12,12A12,12,0,0,1,144,100Z"></path>
            </svg>
            <p class="px-4">Banner</p>
        </a>

        <div x-data="{ open: false }">
            <div
                class="flex items-center py-4 pl-6 text-black cursor-pointer nav-item"
                @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                    <path d="M152,80a8,8,0,0,1,8-8h88a8,8,0,0,1,0,16H160A8,8,0,0,1,152,80Zm96,40H160a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16Zm0,48H184a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm-96.25,22a8,8,0,0,1-5.76,9.74,7.55,7.55,0,0,1-2,.26,8,8,0,0,1-7.75-6c-6.16-23.94-30.34-42-56.25-42s-50.09,18.05-56.25,42a8,8,0,0,1-15.5-4c5.59-21.71,21.84-39.29,42.46-48a48,48,0,1,1,58.58,0C129.91,150.71,146.16,168.29,151.75,190ZM80,136a32,32,0,1,0-32-32A32,32,0,0,0,80,136Z"></path>
                </svg>
                <p class="px-4">Siswa</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ml-auto transform mr-14" :class="open ? 'rotate-180 ml-14' : 'rotate-0'" viewBox="0 0 256 256">
                    <path d="M128,176a8,8,0,0,1-5.66-2.34l-64-64a8,8,0,0,1,11.32-11.32L128,158.34l58.34-58.34a8,8,0,0,1,11.32,11.32l-64,64A8,8,0,0,1,128,176Z"></path>
                </svg>
            </div>
            <!-- Submenu -->
            <div
                class="pl-12 submenu"
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2">
                <a href="{{ route('siswa', ['program_pendidikan' => 'wustha']) }}" class="{{ request()->is('wustha*') ? 'active-nav-link' : '' }} block py-2">Wustha</a>
                <a href="{{ route('siswa', ['program_pendidikan' => 'ulya']) }}" class="{{ request()->is('ulya*') ? 'active-nav-link' : '' }} block py-2">Ulya</a>
                <a href="{{ route('siswa', ['program_pendidikan' => 'mts']) }}" class="{{ request()->is('mts*') ? 'active-nav-link' : '' }} block py-2">MTS</a>
                <a href="{{ route('siswa', ['program_pendidikan' => 'ma']) }}" class="{{ request()->is('ma*') ? 'active-nav-link' : '' }} block py-2">MA</a>
            </div>


            <a href="{{route('blog')}}" class="{{ request()->is('blog*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('blog*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M88,112a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H96A8,8,0,0,1,88,112Zm8,40h80a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16ZM232,64V184a24,24,0,0,1-24,24H32A24,24,0,0,1,8,184.11V88a8,8,0,0,1,16,0v96a8,8,0,0,0,16,0V64A16,16,0,0,1,56,48H216A16,16,0,0,1,232,64Zm-16,0H56V184a23.84,23.84,0,0,1-1.37,8H208a8,8,0,0,0,8-8Z"></path>
                </svg>
                <p class="px-4">Berita</p>
            </a>
            <a href="{{route('teacher-staff')}}" class="{{ request()->is('teacher-staff*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('teacher-staff*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
                </svg>
                <p class="px-4">Guru dan Staff</p>
            </a>
            <a href="{{route('nav-links')}}" class="{{ request()->is('nav-links*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('nav-links*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M237.33,106.21,61.41,41l-.16-.05A16,16,0,0,0,40.9,61.25a1,1,0,0,0,.05.16l65.26,175.92A15.77,15.77,0,0,0,121.28,248h.3a15.77,15.77,0,0,0,15-11.29l.06-.2,21.84-78,78-21.84.2-.06a16,16,0,0,0,.62-30.38ZM149.84,144.3a8,8,0,0,0-5.54,5.54L121.3,232l-.06-.17L56,56l175.82,65.22.16.06Z"></path>
                </svg>
                <p class="px-4">Tambah Navbar</p>
            </a>
            <a href="{{route('total-siswa')}}" class="{{ request()->is('total-siswa*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('total-siswa*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M168,56a8,8,0,0,1,8-8h16V32a8,8,0,0,1,16,0V48h16a8,8,0,0,1,0,16H208V80a8,8,0,0,1-16,0V64H176A8,8,0,0,1,168,56Zm62.56,54.68a103.92,103.92,0,1,1-85.24-85.24,8,8,0,0,1-2.64,15.78A88.07,88.07,0,0,0,40,128a87.62,87.62,0,0,0,22.24,58.41A79.66,79.66,0,0,1,98.3,157.66a48,48,0,1,1,59.4,0,79.66,79.66,0,0,1,36.06,28.75A87.62,87.62,0,0,0,216,128a88.85,88.85,0,0,0-1.22-14.68,8,8,0,1,1,15.78-2.64ZM128,152a32,32,0,1,0-32-32A32,32,0,0,0,128,152Zm0,64a87.57,87.57,0,0,0,53.92-18.5,64,64,0,0,0-107.84,0A87.57,87.57,0,0,0,128,216Z"></path>
                </svg>
                <p class="px-4">Tambah Total Siswa</p>
            </a>
            <a href="{{route('video')}}" class="{{ request()->is('video*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('video*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M251.77,73a8,8,0,0,0-8.21.39L208,97.05V72a16,16,0,0,0-16-16H32A16,16,0,0,0,16,72V184a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V159l35.56,23.71A8,8,0,0,0,248,184a8,8,0,0,0,8-8V80A8,8,0,0,0,251.77,73ZM192,184H32V72H192V184Zm48-22.95-32-21.33V116.28L240,95Z"></path>
                </svg>
                <p class="px-4">Video Profile</p>
            </a>
            <a href="{{route('export')}}" class="{{ request()->is('export*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('export*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M251.77,73a8,8,0,0,0-8.21.39L208,97.05V72a16,16,0,0,0-16-16H32A16,16,0,0,0,16,72V184a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V159l35.56,23.71A8,8,0,0,0,248,184a8,8,0,0,0,8-8V80A8,8,0,0,0,251.77,73ZM192,184H32V72H192V184Zm48-22.95-32-21.33V116.28L240,95Z"></path>
                </svg> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="{{ request()->is('export*') ? '#ffffff' : '' }}" viewBox="0 0 256 256">
                    <path d="M213.66,66.34l-40-40A8,8,0,0,0,168,24H88A16,16,0,0,0,72,40V56H56A16,16,0,0,0,40,72V216a16,16,0,0,0,16,16H168a16,16,0,0,0,16-16V200h16a16,16,0,0,0,16-16V72A8,8,0,0,0,213.66,66.34ZM168,216H56V72h76.69L168,107.31v84.53c0,.06,0,.11,0,.16s0,.1,0,.16V216Zm32-32H184V104a8,8,0,0,0-2.34-5.66l-40-40A8,8,0,0,0,136,56H88V40h76.69L200,75.31Zm-56-32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,152Zm0,32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,184Z"></path>
                </svg>
                <p class="px-4">Export Data</p>
            </a>
    </nav>
</aside>