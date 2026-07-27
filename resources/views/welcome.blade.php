<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Desa Sukosongo') }}</title>
    <meta name="description" content="Website resmi Desa Sukosongo: profil desa, berita, UMKM, dan wisata religi.">

    <!-- Fonts -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind (utility classes only, theme handled via CSS variables below) -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        :root {
            --forest: #1F3D2B;
            --forest-light: #3B6B4A;
            --gold: #C99A2E;
            --gold-light: #E4C46C;
            --cream: #FAF6EC;
            --paper: #F3EDDD;
            --brown: #6B4226;
            --ink: #23281F;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            background: var(--cream);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        /* Batik-inspired contour pattern used as a signature motif (topography of the village) */
        .contour-bg {
            background-image:
                radial-gradient(circle at 20% 30%, transparent 0 38px, rgba(255, 255, 255, 0.05) 39px 40px, transparent 41px),
                radial-gradient(circle at 80% 70%, transparent 0 60px, rgba(255, 255, 255, 0.05) 61px 62px, transparent 63px);
        }

        .grain {
            background-image: radial-gradient(rgba(255, 255, 255, .045) 1px, transparent 1px);
            background-size: 3px 3px;
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            height: 2px;
            width: 0%;
            background: var(--gold);
            transition: width .25s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .reveal.in {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-num {
            font-variant-numeric: tabular-nums;
        }

        .menu-card {
            transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px -18px rgba(31, 61, 43, .35);
            border-color: var(--gold);
        }

        .divider-wave {
            display: block;
            width: 100%;
            height: 48px;
        }

        #mobileMenu {
            transition: max-height .35s ease;
            overflow: hidden;
        }

        .carousel-track {
            transition: transform .5s cubic-bezier(.65, 0, .35, 1);
        }
    </style>
</head>

<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <x-navbar transparent />

    {{-- ============ HERO / PROFIL SINGKAT ============ --}}
    <section id="beranda"
        class="relative pt-32 pb-24 lg:pt-44 lg:pb-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative px-5 lg:px-8 max-w-3xl mx-auto flex flex-col gap-12 items-center">
            <div class="reveal text-center">
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-bold mb-5">Selamat
                    Datang di</p>
                <h1 class="font-display text-white text-4xl sm:text-5xl lg:text-6xl font-semibold leading-[1.08] mb-6">
                    Desa Sukosongo,<br>tumbuh bersama alam&nbsp;dan masyarakat.
                </h1>
                <p class="text-white/70 text-base lg:text-lg leading-relaxed max-w-lg mx-auto mb-8">
                    Portal informasi Desa Sukosongo: profil desa, kabar terbaru, produk UMKM lokal,
                    hingga wisata religi &mdash; semua dalam satu tempat.
                </p>
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="/profil-desa"
                        class="px-6 py-3 rounded-full bg-[color:var(--gold)] text-[color:var(--forest)] font-semibold text-sm hover:bg-[color:var(--gold-light)] transition-colors">
                        Lihat Profil Desa
                    </a>
                    <a href="#kontak"
                        class="px-6 py-3 rounded-full border border-white/30 text-white font-semibold text-sm hover:bg-white/10 transition-colors">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MENU / ICON NAVIGASI ============ --}}
    <section id="menu" class="bg-[color:var(--cream)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Jelajahi</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Semua Informasi
                    Desa, Satu Pintu</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                {{-- Profil Desa --}}
                <a href="/profil-desa"
                    class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">Profil Desa</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Sejarah, visi misi, dan galeri foto
                        Desa Sukosongo.</p>
                </a>

                {{-- Berita --}}
                <a href="/berita"
                    class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v8a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h4" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">Berita</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Kabar dan kegiatan terbaru seputar
                        warga desa.</p>
                </a>

                {{-- UMKM --}}
                <a href="/umkm"
                    class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 7l1.5-3h15L21 7M3 7v12a1 1 0 001 1h16a1 1 0 001-1V7M3 7h18M9 11a3 3 0 006 0" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">UMKM</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Produk unggulan dan usaha rumahan
                        warga desa.</p>
                </a>

                {{-- Wisata --}}
                <a href="/wisata"
                    class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21c-4.418-3.5-7-6.686-7-10a7 7 0 1114 0c0 3.314-2.582 6.5-7 10z" />
                            <circle cx="12" cy="11" r="2.3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">Wisata Religi</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Destinasi religi dan potensi wisata
                        desa.</p>
                </a>
            </div>
        </div>
    </section>

    {{-- ============ STRUKTUR ORGANISASI ============ --}}
    <section id="struktur" class="bg-[color:var(--paper)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            {{-- Judul --}}
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Pemerintahan
                    Desa</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Kepala Desa &amp;
                    Perangkat</h2>
            </div>

            {{-- Kades --}}
            <div class="reveal flex flex-col sm:flex-row items-center gap-3  bg-white rounded-2xl p-6 sm:p-8 mb-5 border border-[color:var(--forest)]/10">
                <div class="w-28 h-28 rounded-full bg-[color:var(--forest)]/10 shrink-0 flex items-center justify-center font-display text-2xl text-[color:var(--forest)]">
                    Foto
                </div>
                <div class="text-center sm:text-left">
                    <p class="font-display text-2xl font-semibold text-[color:var(--forest)]">Nama Kepala Desa</p>
                    <p class="text-sm text-[color:var(--gold)] font-semibold uppercase tracking-wide mt-1">Kepala Desa
                        Sukosongo</p>
                    <p class="text-sm text-[color:var(--ink)]/60 mt-3 max-w-md">Data akan diperbarui setelah dokumen
                        resmi diterima dari perangkat desa.</p>
                </div>
            </div>

            {{-- Swiper perangkat desa (foto persegi panjang penuh) --}}
            <div class="reveal relative pt-8">
                <div class="swiper strukturSwiper">
                    <div class="swiper-wrapper">
                        @php
                            $perangkat = [
                                'Sekretaris Desa',
                                'Kaur Keuangan',
                                'Kaur Perencanaan',
                                'Kasi Pemerintahan',
                                'Kasi Kesejahteraan',
                                'Kadus I',
                            ];
                        @endphp
                        @foreach ($perangkat as $jabatan)
                            <x-perangkat-card
                                image="{{ asset('images/perangkat/default.jpg') }}"
                                nama="Nama Perangkat"
                                jabatan="{{ $jabatan }}"
                            />
                        @endforeach
                    </div>
                </div>

                <div class="swiper-button-prev struktur-prev">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="3">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 19l-7-7 7-7"/>
                </svg>
            </div>

<div class="swiper-button-next struktur-next">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 text-white"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="3">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 5l7 7-7 7"/>
    </svg>
</div>
            </div>

        </div>
    </section>


    {{-- ============ STATISTIK DESA ============ --}}
    <section id="statistik" class="bg-[color:var(--forest)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Data
                    Kependudukan</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white">Statistik Desa Sukosongo</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span
                            data-count="4">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Jumlah Dusun</p>
                </div>
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span
                            data-count="978">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Kepala Keluarga</p>
                </div>
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span
                            data-count="1720">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Laki-laki</p>
                </div>
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span
                            data-count="1762">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Perempuan</p>
                </div>
            </div>

            {{-- Warga per dusun --}}
            <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6 lg:p-8">
                <p class="text-white/80 font-semibold text-sm mb-5 uppercase tracking-wide">Jumlah Warga per Dusun</p>
                <div class="space-y-4">
                    @php
                        $dusun = [
                            ['nama' => 'Dusun Krajan', 'jumlah' => 40],
                            ['nama' => 'Dusun Sukosari', 'jumlah' => 28],
                            ['nama' => 'Dusun Tegalrejo', 'jumlah' => 20],
                            ['nama' => 'Dusun Sumberasri', 'jumlah' => 12],
                        ];
                    @endphp
                    @foreach ($dusun as $d)
                        <div>
                            <div class="flex justify-between text-sm text-white/80 mb-1.5">
                                <span>{{ $d['nama'] }}</span>
                                <span class="text-white/50">{{ $d['jumlah'] }}%</span>
                            </div>
                            <div class="w-full h-2 rounded-full bg-white/10 overflow-hidden">
                                <div class="h-full rounded-full bg-[color:var(--gold)]"
                                    style="width: {{ $d['jumlah'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- ============ BERITA ============ --}}
    <section id="berita" class="bg-[color:var(--cream)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="reveal flex flex-wrap items-end justify-between gap-4 mb-14">
                <div class="max-w-xl">
                    <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">
                        Kabar Desa
                    </p>

                    <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">
                        Berita Terbaru
                    </h2>

                    <p class="mt-3 text-[color:var(--ink)]/70">
                        Ikuti informasi dan kegiatan terbaru yang berlangsung di Desa Sukosongo.
                    </p>
                </div>

                <a href="{{ route('berita.page') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-[color:var(--forest)] px-5 py-2.5 text-sm font-semibold text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white transition">
                    Lihat Semua Berita ->
                </a>
            </div>

            @php
                $berita = [
                    [
                        'judul' => 'Musyawarah Desa Bahas Anggaran 2026',
                        'tanggal' => '10 Juli 2026',
                        'kategori' => 'Pemerintahan',
                        'gambar' => asset('images/berita1.jpg'),
                        'ringkasan' =>
                            'Pemerintah Desa bersama BPD melaksanakan musyawarah desa dalam penyusunan anggaran tahun 2026.',
                    ],
                    [
                        'judul' => 'Gotong Royong Bersih Sungai Dusun Krajan',
                        'tanggal' => '5 Juli 2026',
                        'kategori' => 'Kegiatan',
                        'gambar' => asset('images/berita2.jpg'),
                        'ringkasan' =>
                            'Warga Desa Sukosongo bergotong royong membersihkan aliran sungai untuk menjaga lingkungan tetap bersih.',
                    ],
                    [
                        'judul' => 'Pelatihan Digitalisasi UMKM bagi Warga',
                        'tanggal' => '28 Juni 2026',
                        'kategori' => 'UMKM',
                        'gambar' => asset('images/berita3.jpg'),
                        'ringkasan' =>
                            'Pelaku UMKM mendapatkan pelatihan pemasaran digital dan branding produk agar mampu bersaing secara online.',
                    ],
                ];
            @endphp

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($berita as $b)
                    <a href="/berita"
                        class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                        <div class="relative overflow-hidden h-56">

                            <img src="{{ $b['gambar'] }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                            <span
                                class="absolute top-4 left-4 bg-[color:var(--gold)] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $b['kategori'] }}
                            </span>

                        </div>

                        <div class="p-6">

                            <p class="text-xs uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-2">
                                {{ $b['tanggal'] }}
                            </p>

                            <h3
                                class="font-display text-xl font-semibold text-[color:var(--forest)] group-hover:text-[color:var(--gold)] transition">
                                {{ $b['judul'] }}
                            </h3>

                            <p class="mt-3 text-sm text-[color:var(--ink)]/70 leading-relaxed line-clamp-2">
                                {{ $b['ringkasan'] }}
                            </p>

                            <div
                                class="mt-5 flex items-center text-[color:var(--forest)] font-semibold group-hover:text-[color:var(--gold)]">
                                Baca Selengkapnya →
                            </div>

                        </div>

                    </a>
                @endforeach

            </div>

        </div>
    </section>

    {{-- ============ PETA LOKASI ============ --}}
    <section id="lokasi" class="bg-[color:var(--paper)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-10">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Lokasi</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Peta Desa
                    Sukosongo</h2>
            </div>
            <div class="reveal rounded-2xl overflow-hidden border border-[color:var(--forest)]/10 shadow-sm">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7917.444166533023!2d112.32495505!3d-7.1580951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f42f785b67fd%3A0x98eccb6251b092aa!2sSukosongo%2C%20Kec.%20Kembangbahu%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1784179103863!5m2!1sid!2sid"
                    class="w-full h-80 lg:h-96 border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi Desa Sukosongo">
                </iframe>
            </div>
        </div>
    </section>

    {{-- ============ FOOTER / KONTAK ============ --}}
    <x-footer />

    <script>
        // Mobile hamburger menu
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('iconOpen');
        const iconClose = document.getElementById('iconClose');
        let menuOpen = false;

        menuBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.style.maxHeight = menuOpen ? mobileMenu.scrollHeight + 'px' : '0px';
            iconOpen.classList.toggle('hidden', menuOpen);
            iconClose.classList.toggle('hidden', !menuOpen);
        });

        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                menuOpen = false;
                mobileMenu.style.maxHeight = '0px';
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });

        // Scroll reveal animation
        const revealEls = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });
        revealEls.forEach(el => revealObserver.observe(el));

        // Animated counters
        const counters = document.querySelectorAll('[data-count]');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-count').replace(/\D/g, ''), 10) || 0;
                const duration = 1200;
                const start = performance.now();

                function tick(now) {
                    const progress = Math.min((now - start) / duration, 1);
                    el.textContent = Math.floor(progress * target).toLocaleString('id-ID');
                    if (progress < 1) requestAnimationFrame(tick);
                    else el.textContent = target.toLocaleString('id-ID');
                }
                requestAnimationFrame(tick);
                counterObserver.unobserve(el);
            });
        }, {
            threshold: 0.4
        });
        counters.forEach(el => counterObserver.observe(el));

        const track = document.getElementById('orgTrack');
        const prevBtn = document.getElementById('orgPrev');
        const nextBtn = document.getElementById('orgNext');
        let orgIndex = 0;

        function orgStep() {
            const card = track.children[0];
            return card ? card.offsetWidth + 20 : 260; // width + gap
        }

        function orgMaxIndex() {
            const visible = Math.floor(track.parentElement.offsetWidth / orgStep());
            return Math.max(track.children.length - visible, 0);
        }

        function updateOrgTrack() {
            track.style.transform = `translateX(-${orgIndex * orgStep()}px)`;
        }
        nextBtn.addEventListener('click', () => {
            orgIndex = Math.min(orgIndex + 1, orgMaxIndex());
            updateOrgTrack();
        });
        prevBtn.addEventListener('click', () => {
            orgIndex = Math.max(orgIndex - 1, 0);
            updateOrgTrack();
        });
        window.addEventListener('resize', updateOrgTrack);

        // Smooth scroll offset for fixed navbar
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const y = target.getBoundingClientRect().top + window.pageYOffset - 64;
                    window.scrollTo({
                        top: y,
                        behavior: 'smooth'
                    });
                }
            });
        });
        const navbar = document.getElementById('navbar');

        const greenSections = [
            'menu',
            'struktur',
            'statistik',
            'berita',
            'lokasi'
        ];

        function updateNavbar() {
            let isGreen = false;

            greenSections.forEach(id => {
                const section = document.getElementById(id);

                if (!section) return;

                const rect = section.getBoundingClientRect();

                if (rect.top <= 80 && rect.bottom >= 80) {
                    isGreen = true;
                }
            });

            if (isGreen) {
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-[color:var(--forest)]', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-[color:var(--forest)]', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        }

        window.addEventListener('scroll', updateNavbar);
        window.addEventListener('load', updateNavbar);
    </script>
</body>

</html>