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

        .strukturSwiper {
            overflow: hidden;
            padding: 4px 2px 8px;
        }

        .strukturSwiper .swiper-slide {
            height: auto;
        }

        .strukturSwiper .swiper-slide>* {
            height: 100%;
        }

        .struktur-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-top: 28px;
        }

        .struktur-prev,
        .struktur-next {
            position: static;
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            background: #fff;
            border: 1px solid rgba(31, 61, 43, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color .2s ease, border-color .2s ease, transform .2s ease;
        }

        .struktur-prev svg,
        .struktur-next svg {
            width: 18px;
            height: 18px;
            color: var(--forest);
        }

        .struktur-prev:hover,
        .struktur-next:hover {
            background: var(--forest);
            border-color: var(--forest);
        }

        .struktur-prev:hover svg,
        .struktur-next:hover svg {
            color: #fff;
        }

        .struktur-prev:active,
        .struktur-next:active {
            transform: scale(0.92);
        }

        .struktur-prev.swiper-button-disabled,
        .struktur-next.swiper-button-disabled {
            opacity: 0.3;
            pointer-events: none;
        }

        .struktur-pagination {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .struktur-pagination .swiper-pagination-bullet {
            width: 6px;
            height: 6px;
            background: var(--forest);
            opacity: 0.25;
            transition: opacity .2s ease, width .2s ease;
            border-radius: 9999px;
        }

        .struktur-pagination .swiper-pagination-bullet-active {
            opacity: 1;
            width: 20px;
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
                    Portal informasi Desa Sukosongo yang menghadirkan profil desa, kabar terbaru, produk UMKM lokal, dan
                    wisata religi dalam satu tempat.
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
    <section id="struktur" class="bg-[color:var(--paper)] py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            {{-- Judul --}}
            <div class="reveal max-w-xl mb-6">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-2">Pemerintahan
                    Desa</p>
                <h2 class="font-display text-2xl lg:text-3xl font-semibold text-[color:var(--forest)]">Kepala Desa &amp;
                    Perangkat</h2>
            </div>

            {{-- Kades --}}
            <div class="reveal relative overflow-hidden bg-[color:var(--forest)] rounded-2xl mb-5">
                <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-[color:var(--gold)]/10 blur-2xl">
                </div>
                <div class="absolute -left-10 -bottom-10 w-48 h-48 rounded-full bg-white/5 blur-2xl"></div>

                <div class="relative flex flex-col sm:flex-row items-center gap-5 p-4 sm:p-5">
                    <div
                        class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl overflow-hidden shrink-0 bg-white/10 border border-white/15 flex items-center justify-center">
                        {{-- Ganti src ini dengan foto asli Kades kalau sudah tersedia --}}
                        <img src="{{ asset('images/kades.jpg') }}" alt="Kepala Desa Sukosongo"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <span
                            class="hidden w-full h-full items-center justify-center font-display text-lg text-white/40">
                            Foto
                        </span>
                    </div>

                    <div class="text-center sm:text-left">
                        <span
                            class="inline-block px-2.5 py-0.5 rounded-full bg-[color:var(--gold)]/15 text-[color:var(--gold-light)] text-[10px] font-semibold uppercase tracking-wide mb-1.5">
                            Kepala Desa Sukosongo
                        </span>
                        <p class="font-display text-lg sm:text-xl font-semibold text-white leading-tight">
                            Nama Kepala Desa
                        </p>
                        <p class="text-xs text-white/50 mt-1">
                            Masa Jabatan 2026 &ndash; 2032
                        </p>
                        <p class="text-xs text-white/60 mt-1.5 max-w-md leading-relaxed">
                            Data akan diperbarui setelah dokumen resmi diterima dari perangkat desa.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Swiper perangkat desa --}}
            <div class="reveal pt-1">
                <div class="swiper strukturSwiper">
                    <div class="swiper-wrapper">
                        @php
                            $perangkat = [
                                ['jabatan' => 'Sekretaris Desa', 'periode' => '2023 – 2029'],
                                ['jabatan' => 'Kaur Keuangan', 'periode' => '2023 – 2029'],
                                ['jabatan' => 'Kaur Perencanaan', 'periode' => '2023 – 2029'],
                                ['jabatan' => 'Kasi Pemerintahan', 'periode' => '2023 – 2029'],
                                ['jabatan' => 'Kasi Kesejahteraan', 'periode' => '2023 – 2029'],
                                ['jabatan' => 'Kadus I', 'periode' => '2023 – 2029'],
                            ];
                        @endphp
                        @foreach ($perangkat as $p)
                            <div class="swiper-slide">
                                <div
                                    class="bg-white rounded-xl overflow-hidden border border-[color:var(--forest)]/10 h-full flex flex-col">
                                    <div class="relative aspect-square bg-[color:var(--forest)]/5 overflow-hidden">
                                        <img src="{{ asset('images/perangkat/default.jpg') }}"
                                            alt="{{ $p['jabatan'] }}" class="w-full h-full object-cover"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <span
                                            class="hidden absolute inset-0 items-center justify-center font-display text-sm text-[color:var(--forest)]/30">
                                            Foto
                                        </span>
                                    </div>
                                    <div class="p-2.5 flex-1 flex flex-col">
                                        <span
                                            class="inline-block w-fit px-2 py-0.5 rounded-full bg-[color:var(--forest)]/8 text-[color:var(--forest)] text-[9px] font-semibold uppercase tracking-wide mb-1">
                                            {{ $p['jabatan'] }}
                                        </span>
                                        <p
                                            class="font-display text-xs font-semibold text-[color:var(--forest)] leading-snug">
                                            Nama Perangkat
                                        </p>
                                        <p class="text-[10px] text-[color:var(--ink)]/50 mt-0.5">
                                            Masa Jabatan {{ $p['periode'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="struktur-nav">
                    <div class="struktur-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>

                    <div class="struktur-pagination"></div>

                    <div class="struktur-next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
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
                    class="group inline-flex items-center gap-2.5 rounded-full bg-[color:var(--forest)] pl-6 pr-5 py-3 text-sm font-semibold text-white shadow-sm hover:shadow-lg hover:shadow-[color:var(--forest)]/20 hover:bg-[color:var(--forest-light)] transition-all duration-300">
                    Lihat Semua Berita
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse ($beritaTerbaru as $b)
                    <a href="{{ route('berita.detail', $b->id) }}"
                        class="reveal group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="relative overflow-hidden h-40">
                            <img src="{{ \Storage::url($b->gambar) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>

                        <div class="p-4">
                            <p
                                class="text-[11px] uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-1.5">
                                {{ $b->tanggal_publish->translatedFormat('d F Y') }}
                            </p>
                            <h3
                                class="font-display text-base font-semibold text-[color:var(--forest)] group-hover:text-[color:var(--gold)] transition leading-snug">
                                {{ $b->judul }}
                            </h3>
                            <p class="mt-2 text-xs text-[color:var(--ink)]/70 leading-relaxed line-clamp-2">
                                {{ \Illuminate\Support\Str::limit(strip_tags($b->isi_berita), 110) }}
                            </p>
                            <div
                                class="mt-3 flex items-center text-xs text-[color:var(--forest)] font-semibold group-hover:text-[color:var(--gold)]">
                                Baca Selengkapnya →
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full text-center text-[color:var(--ink)]/60 py-10">
                        Belum ada berita yang dipublikasikan.
                    </p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- ============ WISATA RELIGI ============ --}}
    <section id="wisata" class="bg-white py-12 lg:py-16">

        <div class="max-w-6xl mx-auto px-5 lg:px-8">

            {{-- Heading --}}
            <div class="text-center max-w-xl mx-auto mb-8 reveal">

                <p class="uppercase tracking-[0.2em] text-[color:var(--gold)] text-xs font-semibold">
                    Wisata Religi
                </p>

                <h2 class="mt-2 font-display text-3xl lg:text-4xl font-bold text-[color:var(--forest)]">
                    Destinasi Wisata Religi
                </h2>

                <p class="mt-3 text-sm lg:text-base text-gray-500 leading-7">
                    Jelajahi salah satu destinasi religi yang menjadi ikon
                    Desa Sukosongo.
                </p>

            </div>

            {{-- Content --}}
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-8 items-center">

                {{-- FOTO --}}
                <div class="overflow-hidden rounded-2xl shadow-lg reveal">

                    <img src="{{ asset('images/wisata.jpg') }}" alt="Makam Syekh Jamaludin"
                        class="w-full h-[280px] lg:h-[330px] object-cover hover:scale-105 transition duration-500">

                </div>

                {{-- KONTEN --}}
                <div class="reveal">

                    <span
                        class="inline-flex items-center px-3 py-1.5 rounded-full bg-green-100 text-green-700 font-semibold text-xs">
                        🌿 Wisata Religi
                    </span>

                    <h3 class="mt-4 font-display text-2xl lg:text-3xl font-bold text-[color:var(--forest)]">
                        Makam Syekh Jamaludin
                    </h3>

                    <p class="mt-2 text-sm text-[color:var(--gold)] font-medium">
                        📍 Desa Sukosongo, Kecamatan Kembangbahu
                    </p>

                    <p class="mt-4 text-gray-600 text-sm lg:text-base leading-7">
                        Makam Syekh Jamaludin merupakan salah satu destinasi wisata religi
                        yang menjadi tujuan masyarakat untuk berziarah serta mengenal
                        sejarah penyebaran agama Islam di Desa Sukosongo. Tempat ini
                        menjadi salah satu ikon religi yang masih terjaga dan ramai
                        dikunjungi pada hari-hari tertentu.
                    </p>

                    <div class="mt-6">

                        <a href="/wisata"
                            class="inline-flex items-center px-5 py-2.5 rounded-xl bg-[color:var(--forest)] text-white font-semibold hover:bg-green-700 transition">

                            Lihat Detail

                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />

                            </svg>

                        </a>

                    </div>

                </div>

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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

        // ============ SWIPER: PERANGKAT DESA ============
        const strukturSwiper = new Swiper('.strukturSwiper', {
            loop: true,
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.struktur-next',
                prevEl: '.struktur-prev',
            },
            pagination: {
                el: '.struktur-pagination',
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 14
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 16
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
            },
        });

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
        const greenSections = ['menu', 'struktur', 'statistik', 'berita', 'lokasi'];

        function updateNavbar() {
            let isGreen = false;

            greenSections.forEach(id => {
                const section = document.getElementById(id);
                if (!section) return;
                const rect = section.getBoundingClientRect();
                if (rect.top <= 80 && rect.bottom >= 80) isGreen = true;
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
