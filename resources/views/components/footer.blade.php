<footer id="footer" class="bg-[color:var(--forest)] text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Sukosongo" class="w-7 h-8 object-cover" />
                    <p class="font-display font-semibold">Desa Sukosongo</p>
                </div>
                <p class="text-white/60 text-sm leading-relaxed">Website Desa Sukosongo sebagai sarana informasi Desa
                    Sukosongo</p>
            </div>

            <div>
                <p class="font-semibold text-sm mb-4 uppercase tracking-wide text-white/80">Navigasi</p>
                <ul class="space-y-2.5 text-sm text-white/60">
                    <li><a href="/profil-desa" class="hover:text-white transition-colors">Profil Desa</a></li>
                    <li><a href="/berita" class="hover:text-white transition-colors">Berita</a></li>
                    <li><a href="/umkm" class="hover:text-white transition-colors">UMKM</a></li>
                    <li><a href="/wisata" class="hover:text-white transition-colors">Wisata</a></li>
                </ul>
            </div>

            <div>
                <p class="font-semibold text-sm mb-4 uppercase tracking-wide text-white/80">Kontak</p>
                <ul class="space-y-2.5 text-sm text-white/60">
                    <li><a href="mailto:desasukosongo@gmail.com"
                            class="hover:text-white transition-colors">desasukosongo@gmail.com</a></li>
                    <li><a href="https://wa.me/6281234567890" target="_blank"
                            class="hover:text-white transition-colors">+62 812-3456-7890</a></li>
                </ul>

                <div class="flex items-center gap-3 mt-5">
                    <a href="https://instagram.com/sukosongodesa" target="_blank"
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-[color:var(--gold)] transition-all duration-300 flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 text-white group-hover:text-[color:var(--forest)]">
                            <path
                                d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5ZM12 7.5A4.5 4.5 0 1 1 7.5 12 4.505 4.505 0 0 1 12 7.5Zm5.25-.75a.75.75 0 1 1-.75-.75.75.75 0 0 1 .75.75ZM12 9a3 3 0 1 0 3 3 3.003 3.003 0 0 0-3-3Z" />
                        </svg>
                    </a>
                    <a href="https://youtube.com/@desasukosongo7466" target="_blank"
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-red-600 transition-all duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 text-white">
                            <path
                                d="M21.58 7.19a2.79 2.79 0 0 0-1.96-1.98C17.89 4.75 12 4.75 12 4.75s-5.89 0-7.62.46A2.79 2.79 0 0 0 2.42 7.2 29.77 29.77 0 0 0 2 12a29.77 29.77 0 0 0 .42 4.81 2.79 2.79 0 0 0 1.96 1.98c1.73.46 7.62.46 7.62.46s5.89 0 7.62-.46a2.79 2.79 0 0 0 1.96-1.98A29.77 29.77 0 0 0 22 12a29.77 29.77 0 0 0-.42-4.81ZM10 15.5v-7l6 3.5-6 3.5Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-sm mb-4 uppercase tracking-wide text-white/80">Alamat</p>
                <p class="text-sm text-white/60 leading-relaxed">Kantor Desa Sukosongo,<br>R8VH+VHX, Sukowati,
                    Sukosongo, Kec. Kembangbahu, Kabupaten Lamongan</p>
            </div>
        </div>
        <p class="text-center text-white/40 text-xs pt-6">© {{ date('Y') }} Desa Sukosongo. Seluruh hak cipta
            dilindungi.</p>
    </div>
</footer>
