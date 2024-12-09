<x-main-layout>

<<<<<<< HEAD
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Al-Mazaya</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{ asset('images/logo-only.ico') }}" type="image/x-icon" />
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="text-black bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{url('/')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{asset('images/logo_al_mazaya.png')}}" class="h-8" alt="Al-Mazaya Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 ">
                    <li>
                        <a href="#" class="block py-2 px-3 " aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 " aria-current="page">Tentang Al-Mazaya</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 ">Artikel Berita</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 rounded bg-green-600 text-white">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
=======
    @section('title', 'Blog | Ponpes-Al-Mazaya') <!-- Mengisi bagian @yield('title') di parent -->
>>>>>>> 758525b95b14aa05a8ebcd639a271882ac15f84f

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Al-Mazaya Blog
            </a>
            <p class="text-lg text-gray-600">
                Meraih Ilmu, Membentuk Akhlak, Menggapai Ridha Ilahi.
            </p>
        </div>
    </header>
    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
<<<<<<< HEAD
                class="block md:flex text-base font-bold uppercase text-center justify-center items-center"
=======
                class="md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
>>>>>>> 758525b95b14aa05a8ebcd639a271882ac15f84f
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:text-white hover:bg-green-600 rounded py-2 px-4 mx-2">Umum</a>
                <a href="#" class="hover:text-white hover:bg-green-600 rounded py-2 px-4 mx-2">Prestasi</a>
                <a href="#" class="hover:text-white hover:bg-green-600 rounded py-2 px-4 mx-2">Ilmiah</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @forelse ($blogs as $blog)
            <article class="flex flex-col shadow my-4">
                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="flex flex-col space-y-4"> <!-- space-y-4 untuk memberi jarak antara gambar dan konten -->
                    <div class="hover:opacity-75">
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}" class="w-full h-80 object-cover rounded-t-lg">
                    </div>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <span class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category }}</span>
                        <h2 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</h2>
                        <p class="text-sm pb-3">
                            By <span class="font-semibold hover:text-gray-800">{{ $blog->user->name }}</span>,
                            Published on {{ $blog->created_at->format('Y-m-d') }}
                        </p>
                        <p class="pb-6">{{ Str::limit($blog->description, 300) }}</p>
                        <span class="uppercase text-gray-800 hover:text-black">
                            Continue Reading <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </article>
            @empty
            <div class="text-center py-6">
                <p class="text-lg text-gray-500">No blog posts available at the moment.</p>
                <p class="text-sm text-gray-400">
                    Please check back later or
                    <a href="{{ route('blog.create') }}" class="text-blue-600 hover:text-blue-800">create a new blog post</a>.
                </p>
            </div>
            @endforelse
            <!-- Pagination -->
            <a class="mt-6">
                {{ $blogs->links('pagination::tailwind') }}
            </a>
        </section>
        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside>
    </div>
<<<<<<< HEAD

    <footer class="w-full border-t bg-white pb-12">
        <div
            class="relative w-full flex items-center invisible md:visible md:pb-12"
            x-data="getCarouselData()">
            <button
                class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="image.id">
                <img class="w-1/6 hover:opacity-75" :src="image.src">
            </template>
            <button
                class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>

    <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script>

</body>

</html>
=======
</x-main-layout>
>>>>>>> 758525b95b14aa05a8ebcd639a271882ac15f84f
