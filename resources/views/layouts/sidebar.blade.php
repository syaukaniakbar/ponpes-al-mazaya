<aside class="relative hidden h-screen shadow-xl bg-sidebar w-80 sm:block">
    <div class="p-6">
        <a href="/">
            <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
        </a>
    </div>
    <nav class="pt-3 text-base font-semibold text-black">
        <a href="{{route('dashboard')}}" class="{{ request()->is('dashboard') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="mr-3 fas fa-tachometer-alt"></i>
            Dashboard
        </a>
        <!-- <a href="{{route('dashboard')}}" class="{{ request()->is('dashboard') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="mr-3 fas fa-tachometer-alt"></i>
            Header
        </a> -->
        <a href="{{route('blog')}}" class="{{ request()->is('blog*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="mr-3 fas fa-table"></i>
            Blog news
        </a>
        <a href="{{route('nav-links')}}" class="{{ request()->is('nav-links*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="mr-3 fas fa-table"></i>
            Nav links
        </a>
    </nav>
</aside>