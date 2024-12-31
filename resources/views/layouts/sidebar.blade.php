<aside class="relative hidden h-screen shadow-xl bg-sidebar w-80 sm:block">
    <div class="p-6">
        <a href="/">
            <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
        </a>
    </div>
    <nav class="pt-3 text-base font-semibold text-black">
        <a href="{{route('dashboard')}}" class="{{ request()->is('dashboard') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
            <svg  xmlns="http://www.w3.org/2000/svg" width="28" height="28"  viewBox="0 0 256 256"><path d="M207.06,72.67A111.24,111.24,0,0,0,128,40h-.4C66.07,40.21,16,91,16,153.13V176a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V152A111.25,111.25,0,0,0,207.06,72.67ZM224,176H119.71l54.76-75.3a8,8,0,0,0-12.94-9.42L99.92,176H32V153.13c0-3.08.15-6.12.43-9.13H56a8,8,0,0,0,0-16H35.27c10.32-38.86,44-68.24,84.73-71.66V80a8,8,0,0,0,16,0V56.33A96.14,96.14,0,0,1,221,128H200a8,8,0,0,0,0,16h23.67c.21,2.65.33,5.31.33,8Z"></path></svg>
            <p class="px-4" >Halaman Panel</p>
        </a>
        <a href="{{route('header')}}" class="{{ request()->is('header*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item'">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"  viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V158.75l-26.07-26.06a16,16,0,0,0-22.63,0l-20,20-44-44a16,16,0,0,0-22.62,0L40,149.37V56ZM40,172l52-52,80,80H40Zm176,28H194.63l-36-36,20-20L216,181.38V200ZM144,100a12,12,0,1,1,12,12A12,12,0,0,1,144,100Z"></path></svg>
            <p class="px-4" >Banner</p>
        </a>
        </a>
 
        <a href="{{route('blog')}}" class="{{ request()->is('blog*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path d="M88,112a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H96A8,8,0,0,1,88,112Zm8,40h80a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16ZM232,64V184a24,24,0,0,1-24,24H32A24,24,0,0,1,8,184.11V88a8,8,0,0,1,16,0v96a8,8,0,0,0,16,0V64A16,16,0,0,1,56,48H216A16,16,0,0,1,232,64Zm-16,0H56V184a23.84,23.84,0,0,1-1.37,8H208a8,8,0,0,0,8-8Z"></path></svg>
            <p class="px-4" >Berita</p>
        </a>
        <a href="{{route('nav-links')}}" class="{{ request()->is('nav-links*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path d="M237.33,106.21,61.41,41l-.16-.05A16,16,0,0,0,40.9,61.25a1,1,0,0,0,.05.16l65.26,175.92A15.77,15.77,0,0,0,121.28,248h.3a15.77,15.77,0,0,0,15-11.29l.06-.2,21.84-78,78-21.84.2-.06a16,16,0,0,0,.62-30.38ZM149.84,144.3a8,8,0,0,0-5.54,5.54L121.3,232l-.06-.17L56,56l175.82,65.22.16.06Z"></path></svg>
            <p class="px-4" >Tambah Navbar</p>
        </a>
        <a href="{{route('video')}}" class="{{ request()->is('video*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M251.77,73a8,8,0,0,0-8.21.39L208,97.05V72a16,16,0,0,0-16-16H32A16,16,0,0,0,16,72V184a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V159l35.56,23.71A8,8,0,0,0,248,184a8,8,0,0,0,8-8V80A8,8,0,0,0,251.77,73ZM192,184H32V72H192V184Zm48-22.95-32-21.33V116.28L240,95Z"></path></svg>
            <p class="px-4" >Video Link</p>
        </a>
    </nav>
</aside>