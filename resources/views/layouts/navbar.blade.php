<nav x-data="{ open: false }" class="text-black bg-white shadow-md">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo_al_mazaya.png') }}" class="h-8" alt="Al-Mazaya Logo" />
        </a>
        <!-- Hamburger Button (Mobile Only) -->
        <button
            @click="open = !open"
            class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm rounded-lg md:hidden focus:ring-2 focus:ring-gray-200 dark:text-gray-400"
            aria-controls="navbar-default"
            :aria-expanded="open">
            <!-- X Icon -->
            <svg x-show="open" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <!-- Hamburger Menu Icon -->
            <svg x-show="!open" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <!-- Menu -->
        <div
            x-bind:class="{ 'hidden': !open }"
            class="w-full md:block md:w-auto"
            id="navbar-default"
            x-cloak>
            <ul class="flex flex-col p-4 mt-4 md:p-0 md:flex-row md:space-x-8 md:mt-0">
                <li>
                    <a href="{{ route('index') }}" class="block py-2 px-3 {{ Request::routeIs('index') ? 'text-green-600 font-semibold' : '' }}" aria-current="{{ Request::routeIs('index') ? 'page' : '' }}">Beranda</a>
                </li>

                <li>
                    <a href="{{ route('about-us') }}" class="block py-2 px-3 {{ Request::routeIs('about-us') ? 'text-green-600 font-semibold' : '' }}" aria-current="{{ Request::routeIs('about-us') ? 'page' : '' }}">Tentang Al-Mazaya</a>
                </li>
                <li>
                    <a href="{{ route('blog.al-mazaya') }}" class="block py-2 px-3 {{ Request::routeIs('blog.al-mazaya') ? 'text-green-600 font-semibold' : '' }}" aria-current="{{ Request::routeIs('about-us') ? 'page' : '' }}">Al-Mazaya Blog</a>
                </li>
                @foreach (App\Models\NavLink::where('is_active', true)->get() as $link)
                <li>
                    <a href="{{ route('nav.show', ['slug' => $link->slug]) }}" class="block px-3 py-2 {{ Request::routeIs('blog.al-mazaya') ? 'text-green-600 font-semibold' : '' }}" aria-current="{{ Request::routeIs('about-us') ? 'page' : '' }}"">{{ $link->name }}</a>
                </li>
                @endforeach
                <li>
                    <a href=" {{ route('pendaftaran') }}" class="block px-3 py-2 text-white bg-green-600 rounded">Daftar Sekarang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>