<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Desa Sukosongo') }}</title>
    <meta name="description" content="Website resmi Desa Sukosongo: profil desa, berita, UMKM, dan wisata religi.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind (utility classes only, theme handled via CSS variables below) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root{
            --forest: #1F3D2B;
            --forest-light: #3B6B4A;
            --gold: #C99A2E;
            --gold-light: #E4C46C;
            --cream: #FAF6EC;
            --paper: #F3EDDD;
            --brown: #6B4226;
            --ink: #23281F;
        }
        *{ box-sizing:border-box; }
        html,body{ background: var(--cream); color: var(--ink); font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display{ font-family: 'Fraunces', serif; }

        /* Batik-inspired contour pattern used as a signature motif (topography of the village) */
        .contour-bg{
            background-image:
                radial-gradient(circle at 20% 30%, transparent 0 38px, rgba(255,255,255,0.05) 39px 40px, transparent 41px),
                radial-gradient(circle at 80% 70%, transparent 0 60px, rgba(255,255,255,0.05) 61px 62px, transparent 63px);
        }
        .grain{
            background-image: radial-gradient(rgba(255,255,255,.045) 1px, transparent 1px);
            background-size: 3px 3px;
        }

        .nav-link{ position:relative; }
        .nav-link::after{
            content:''; position:absolute; left:0; bottom:-4px; height:2px; width:0%;
            background: var(--gold); transition: width .25s ease;
        }
        .nav-link:hover::after{ width:100%; }

        .reveal{ opacity:0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.in{ opacity:1; transform: translateY(0); }

        .stat-num{ font-variant-numeric: tabular-nums; }

        .menu-card{ transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease; }
        .menu-card:hover{ transform: translateY(-6px); box-shadow: 0 20px 40px -18px rgba(31,61,43,.35); border-color: var(--gold); }

        .divider-wave{ display:block; width:100%; height:48px; }

        #mobileMenu{ transition: max-height .35s ease; overflow:hidden; }

        .carousel-track{ transition: transform .5s cubic-bezier(.65,0,.35,1); }
    </style>
</head>
<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <header id="navbar" class="fixed top-0 inset-x-0 z-50 bg-[color:var(--forest)]/95 backdrop-blur border-b border-white/10">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="#beranda" class="flex items-center gap-3 shrink-0">
                    {{-- Logo desa: ganti src dengan logo asli PNG dari perangkat desa --}}
                    <div class="w-10 h-10 rounded-full bg-[color:var(--gold)] flex items-center justify-center font-display font-semibold text-[color:var(--forest)] text-sm">
                        DS
                    </div>
                    <div class="leading-tight">
                        <p class="font-display text-white text-base font-semibold">Desa Sukosongo</p>
                        <p class="text-[11px] text-white/60 tracking-wide uppercase">Kabupaten &middot; Provinsi</p>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-black/85">
                    <a href="#beranda" class="nav-link">Beranda</a>
                    <a href="/profil-desa" class="nav-link">Profil Desa</a>
                    <a href="/berita" class="nav-link">Berita</a>
                    <a href="/umkm" class="nav-link">UMKM</a>
                    <a href="/wisata" class="nav-link">Wisata</a>
                    <a href="#kontak" class="nav-link">Kontak</a>
                </nav>

                <button id="menuBtn" aria-label="Buka menu" class="lg:hidden text-white p-2 -mr-2">
                    <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Mobile menu (hamburger toggle) --}}
            <div id="mobileMenu" class="lg:hidden max-h-0">
                <nav class="flex flex-col gap-1 pb-5 text-white/90 text-sm font-medium">
                    <a href="#beranda" class="px-2 py-2.5 rounded-md hover:bg-white/10">Beranda</a>
                    <a href="/profil-desa" class="px-2 py-2.5 rounded-md hover:bg-white/10">Profil Desa</a>
                    <a href="/berita" class="px-2 py-2.5 rounded-md hover:bg-white/10">Berita</a>
                    <a href="/umkm" class="px-2 py-2.5 rounded-md hover:bg-white/10">UMKM</a>
                    <a href="/wisata" class="px-2 py-2.5 rounded-md hover:bg-white/10">Wisata</a>
                    <a href="#kontak" class="px-2 py-2.5 rounded-md hover:bg-white/10">Kontak</a>
                </nav>
            </div>
        </div>
    </header>

    {{-- ============ HERO / PROFIL SINGKAT ============ --}}
    <section
    id="beranda"
        class="relative pt-32 pb-24 lg:pt-44 lg:pb-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-5 lg:px-8 max-w-3xl mx-auto flex flex-col items-center gap-12 items-center">
            <div class="reveal text-center">
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-5">Selamat Datang di</p>
                <h1 class="font-display text-white text-4xl sm:text-5xl lg:text-6xl font-semibold leading-[1.08] mb-6">
                    Desa Sukosongo,<br>tumbuh dari gotong&nbsp;royong.
                </h1>
                <p class="text-white/70 shadow-lg text-base lg:text-lg leading-relaxed max-w-lg mx-auto mb-8">
                    Portal informasi resmi warga: profil desa, kabar terbaru, produk UMKM lokal,
                    hingga wisata religi &mdash; semua dalam satu tempat.
                </p>
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="/profil-desa" class="px-6 py-3 rounded-full bg-[color:var(--gold)] text-[color:var(--forest)] font-semibold text-sm hover:bg-[color:var(--gold-light)] transition-colors">
                        Lihat Profil Desa
                    </a>
                    <a href="#kontak" class="px-6 py-3 rounded-full border border-white/30 text-white font-semibold text-sm hover:bg-white/10 transition-colors">
                        Hubungi Kami
                    </a>
                </div>
            </div>            
        </div>
    </section>

    {{-- ============ MENU / ICON NAVIGASI ============ --}}
    <section class="bg-[color:var(--cream)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Jelajahi</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Semua Informasi Desa, Satu Pintu</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                {{-- Profil Desa --}}
                <a href="/profil-desa" class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">Profil Desa</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Sejarah, visi misi, dan galeri foto Desa Sukosongo.</p>
                </a>

                {{-- Berita --}}
                <a href="/berita" class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v8a2 2 0 01-2 2z" /><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h4" /></svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">Berita</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Kabar dan kegiatan terbaru seputar warga desa.</p>
                </a>

                {{-- UMKM --}}
                <a href="/umkm" class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l1.5-3h15L21 7M3 7v12a1 1 0 001 1h16a1 1 0 001-1V7M3 7h18M9 11a3 3 0 006 0" /></svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">UMKM</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Produk unggulan dan usaha rumahan warga desa.</p>
                </a>

                {{-- Wisata --}}
                <a href="/wisata" class="menu-card reveal group block bg-white border border-[color:var(--forest)]/10 rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-[color:var(--forest)]/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-[color:var(--forest)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.418-3.5-7-6.686-7-10a7 7 0 1114 0c0 3.314-2.582 6.5-7 10z" /><circle cx="12" cy="11" r="2.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-1.5">Wisata Religi</h3>
                    <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed">Destinasi religi dan potensi wisata desa.</p>
                </a>
            </div>
        </div>
    </section>

    {{-- ============ STRUKTUR ORGANISASI ============ --}}
    <section class="bg-[color:var(--paper)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Pemerintahan Desa</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Kepala Desa &amp; Perangkat</h2>
            </div>

            {{-- Kades --}}
            <div class="reveal flex flex-col sm:flex-row items-center gap-6 bg-white rounded-2xl p-6 sm:p-8 mb-10 border border-[color:var(--forest)]/10">
                <div class="w-28 h-28 rounded-full bg-[color:var(--forest)]/10 shrink-0 flex items-center justify-center font-display text-2xl text-[color:var(--forest)]">
                    Foto
                </div>
                <div class="text-center sm:text-left">
                    <p class="font-display text-2xl font-semibold text-[color:var(--forest)]">Nama Kepala Desa</p>
                    <p class="text-sm text-[color:var(--gold)] font-semibold uppercase tracking-wide mt-1">Kepala Desa Sukosongo</p>
                    <p class="text-sm text-[color:var(--ink)]/60 mt-3 max-w-md">Data akan diperbarui setelah dokumen resmi diterima dari perangkat desa.</p>
                </div>
            </div>

            {{-- Carousel struktur organisasi --}}
            <div class="reveal relative">
                <div class="overflow-hidden">
                    <div id="orgTrack" class="carousel-track flex gap-5">
                        @php
                            $perangkat = ['Sekretaris Desa','Kaur Keuangan','Kaur Perencanaan','Kasi Pemerintahan','Kasi Kesejahteraan','Kadus I'];
                        @endphp
                        @foreach ($perangkat as $jabatan)
                            <div class="min-w-[220px] sm:min-w-[240px] bg-white border border-[color:var(--forest)]/10 rounded-2xl p-6 text-center">
                                <div class="w-20 h-20 mx-auto rounded-full bg-[color:var(--forest)]/10 flex items-center justify-center font-display text-sm text-[color:var(--forest)] mb-4">
                                    Foto
                                </div>
                                <p class="font-semibold text-[color:var(--forest)] text-sm">Nama Perangkat</p>
                                <p class="text-xs text-[color:var(--ink)]/50 mt-1">{{ $jabatan }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center gap-3 mt-8">
                    <button id="orgPrev" aria-label="Sebelumnya" class="w-10 h-10 rounded-full border border-[color:var(--forest)]/20 flex items-center justify-center hover:bg-[color:var(--forest)] hover:text-white transition-colors text-[color:var(--forest)]">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                    </button>
                    <button id="orgNext" aria-label="Berikutnya" class="w-10 h-10 rounded-full border border-[color:var(--forest)]/20 flex items-center justify-center hover:bg-[color:var(--forest)] hover:text-white transition-colors text-[color:var(--forest)]">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ STATISTIK DESA ============ --}}
    <section class="bg-[color:var(--forest)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Data Kependudukan</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white">Statistik Desa Sukosongo</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span data-count="4">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Jumlah Dusun</p>
                </div>
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span data-count="978">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Kepala Keluarga</p>
                </div>
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span data-count="1720">0</span></p>
                    <p class="text-white/60 text-sm mt-2">Laki-laki</p>
                </div>
                <div class="reveal bg-white/5 border border-white/10 rounded-2xl p-6">
                    <p class="stat-num font-display text-4xl text-[color:var(--gold-light)] font-semibold"><span data-count="1762">0</span></p>
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
                                <div class="h-full rounded-full bg-[color:var(--gold)]" style="width: {{ $d['jumlah'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ============ BERITA ============ --}}
    <section id="berita-section" class="bg-[color:var(--cream)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal flex flex-wrap items-end justify-between gap-4 mb-14">
                <div class="max-w-xl">
                    <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Kabar Desa</p>
                    <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Berita Terbaru</h2>
                </div>
                <a href="/berita" class="text-sm font-semibold text-[color:var(--forest)] underline underline-offset-4 hover:text-[color:var(--gold)] transition-colors">
                    Lihat Semua Berita →
                </a>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $berita = [
                        ['judul' => 'Musyawarah Desa Bahas Anggaran 2026', 'tanggal' => '10 Juli 2026'],
                        ['judul' => 'Gotong Royong Bersih Sungai Dusun Krajan', 'tanggal' => '5 Juli 2026'],
                        ['judul' => 'Pelatihan Digitalisasi UMKM bagi Warga', 'tanggal' => '28 Juni 2026'],
                    ];
                @endphp
                @foreach ($berita as $b)
                    <a href="/berita" class="reveal group block bg-white rounded-2xl overflow-hidden border border-[color:var(--forest)]/10 hover:shadow-lg transition-shadow">
                        <div class="h-44 bg-[color:var(--forest)]/10 flex items-center justify-center text-[color:var(--forest)]/40 font-display text-sm">
                            Foto Kegiatan
                        </div>
                        <div class="p-6">
                            <p class="text-xs text-[color:var(--gold)] font-semibold uppercase tracking-wide mb-2">{{ $b['tanggal'] }}</p>
                            <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] leading-snug group-hover:text-[color:var(--brown)] transition-colors">
                                {{ $b['judul'] }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ PETA LOKASI ============ --}}
    <section class="bg-[color:var(--paper)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-10">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Lokasi</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Peta Desa Sukosongo</h2>
            </div>
            <div class="reveal rounded-2xl overflow-hidden border border-[color:var(--forest)]/10 shadow-sm">
                {{-- Ganti src berikut dengan link embed Google Maps lokasi asli Desa Sukosongo --}}
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7917.444166533023!2d112.32495505!3d-7.1580951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f42f785b67fd%3A0x98eccb6251b092aa!2sSukosongo%2C%20Kec.%20Kembangbahu%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1784179103863!5m2!1sid!2sid"
                    class="w-full h-80 lg:h-96 border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi Desa Sukosongo">
                </iframe>
            </div>
        </div>
    </section>

    {{-- ============ FOOTER / KONTAK ============ --}}
    <footer id="kontak" class="bg-[color:var(--forest)] text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-[color:var(--gold)] flex items-center justify-center font-display font-semibold text-[color:var(--forest)] text-sm">DS</div>
                        <p class="font-display font-semibold">Desa Sukosongo</p>
                    </div>
                    <p class="text-white/60 text-sm leading-relaxed">Website Desa Sukosongo sebagai sarana informasi Desa Sukosongo</p>
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
                        <li>desasukosongo@gmail.com</li>
                        <li>+62 812-3456-7890</li>
                        <li>@desasukosongo</li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold text-sm mb-4 uppercase tracking-wide text-white/80">Alamat</p>
                    <p class="text-sm text-white/60 leading-relaxed">Kantor Desa Sukosongo,<br>R8VH+VHX, Sukowati, Sukosongo, Kec. Kembangbahu, Kabupaten Lamongan</p>
                </div>
            </div>
            <p class="text-center text-white/40 text-xs pt-6">© {{ date('Y') }} Desa Sukosongo. Seluruh hak cipta dilindungi.</p>
        </div>
    </footer>

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
        }, { threshold: 0.15 });
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
        }, { threshold: 0.4 });
        counters.forEach(el => counterObserver.observe(el));

        // Struktur organisasi carousel
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
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const y = target.getBoundingClientRect().top + window.pageYOffset - 64;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
