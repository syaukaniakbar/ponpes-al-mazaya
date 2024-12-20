<aside class="relative bg-sidebar h-screen w-80 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div>
    <nav class="text-black text-base font-semibold pt-3">
        <a href="{{route('dashboard')}}" class="{{ request()->is('dashboard') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{route('dashboard')}}" class="{{ request()->is('dashboard') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Header
        </a>
        <a href="{{route('blog')}}" class="{{ request()->is('blog*') ? 'active-nav-link' : '' }} flex items-center text-black  py-4 pl-6 nav-item hover:text-green-400'">
            <i class="fas fa-table mr-3"></i>
            Blog news
        </a>
    </nav>
</aside>