<footer class="bg-green-900 text-white py-8">
    <div class="max-w-screen-xl mx-auto px-4">
        <!-- Grid untuk Layout Responsif -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo dan Deskripsi -->
            <div>
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/logo_al_mazaya_2.png') }}" class="h-10 mr-3" alt="Al-Mazaya Logo" />
                </div>
                <p class="text-sm leading-relaxed">
                    Yayasan Pendidikan Islam Az Zaini Al Azhari Paser 
                </p>
            </div>

            <!-- Halaman -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Halaman</h2>
                <ul class="space-y-2">
                    <li><a href=" {{route('index')}} " class="hover:text-gray-300">Beranda</a></li>
                    <li><a href=" {{route('about-us')}} " class="hover:text-gray-300">Tentang Kami</a></li>
                    <li><a href=" {{route('blog.al-mazaya')}} " class="hover:text-gray-300">Artikel Berita</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Kontak</h2>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <i class="fab fa-instagram mr-2"></i>
                        <a href="https://www.instagram.com/al_mazaya_paser/" target="_blank" class="hover:text-gray-300">Instagram</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fab fa-facebook mr-2"></i>
                        <a href="https://www.facebook.com/profile.php?id=100071068262797" target="_blank" class="hover:text-gray-300">Facebook</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fab fa-youtube mr-2"></i>
                        <a href="https://www.youtube.com/@almazayapaser5436/streams" target="_blank" class="hover:text-gray-300">YouTube</a>
                    </li>
                    {{-- <li class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:almazaya@gmail.com" target="_blank" class="hover:text-gray-300">almazaya@gmail.com</a>
                    </li> --}}
                </ul>
            </div>
        </div>

        <!-- Garis dan Hak Cipta -->
        <div class="mt-8 border-t border-white/50"></div>
        <p class="text-center text-sm mt-4">
            © 2025 Al Mazaya. All rights reserved.
        </p>
    </div>
</footer>