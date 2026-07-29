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
    <section class="relative overflow-hidden bg-gradient-to-b from-[#FDFBF7] via-[#F8F5EE] to-white py-14 lg:py-16">

        <!-- Background Decoration -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-green-300/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -right-20 w-[28rem] h-[28rem] bg-yellow-200/20 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">

            <!-- Heading -->
            <div class="reveal text-center max-w-3xl mx-auto mb-10">

                <span class="inline-flex items-center px-5 py-2 rounded-full bg-green-100 text-green-700 font-semibold text-sm">
                    🌿 Jelajahi Desa Sukosongo
                </span>

                <h2 class="mt-4 font-display text-3xl lg:text-4xl font-bold text-[color:var(--forest)] leading-tight">
                    Semua Informasi Desa
                    <span class="text-green-600">Dalam Satu Pintu</span>
                </h2>

                <p class="mt-3 text-base leading-7 text-gray-500">
                    Temukan informasi desa, berita terbaru, UMKM lokal, hingga wisata religi
                    dalam tampilan yang mudah diakses oleh seluruh masyarakat.
                </p>

            </div>

            <!-- Menu -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- Profil -->
                <a href="/profil-desa"
                    class="group relative overflow-hidden rounded-3xl bg-white p-6 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100">

                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500"
                        style="background:linear-gradient(135deg,var(--forest),var(--forest-light));">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg mb-4
                                bg-[linear-gradient(135deg,var(--forest-light),var(--forest))] text-white
                                group-hover:bg-[color:var(--paper)] group-hover:bg-none group-hover:text-[color:var(--forest)]
                                group-hover:scale-110 group-hover:rotate-6 transition-all duration-500"> 

                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[color:var(--forest)] group-hover:text-white transition">
                            Profil Desa
                        </h3>

                        <p class="mt-3 text-[color:var(--brown)]/80 group-hover:text-white/90 transition leading-7">
                            Sejarah, visi misi, struktur pemerintahan, serta galeri Desa Sukosongo.
                        </p>

                        <div class="mt-4 flex items-center font-semibold text-[color:var(--gold)] group-hover:text-white transition">
                            <span>Lihat Selengkapnya</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                    </div>

                </a>

                <!-- Berita -->
                <a href="/berita"
                    class="group relative overflow-hidden rounded-3xl bg-white p-6 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100">

                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500"
                        style="background:linear-gradient(135deg,var(--forest),var(--forest-light));">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg mb-4
                                bg-[linear-gradient(135deg,var(--forest-light),var(--forest))] text-white
                                group-hover:bg-[color:var(--paper)] group-hover:bg-none group-hover:text-[color:var(--forest)]
                                group-hover:scale-110 group-hover:rotate-6 transition-all duration-500"> 

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 5H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 9h10M7 13h6M7 17h4" />
                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[color:var(--forest)] group-hover:text-white transition">
                            Berita Desa
                        </h3>

                        <p class="mt-3 text-[color:var(--brown)]/80 group-hover:text-white/90 transition leading-7">
                            Ikuti informasi terbaru mengenai kegiatan dan perkembangan Desa Sukosongo.
                        </p>

                        <div class="mt-4 flex items-center font-semibold text-[color:var(--gold)] group-hover:text-white transition">
                            <span>Lihat Selengkapnya</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                    </div>

                </a>

                <!-- UMKM -->
                <a href="/umkm"
                    class="group relative overflow-hidden rounded-3xl bg-white p-6 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100">

                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500"
                        style="background:linear-gradient(135deg,var(--forest),var(--forest-light));">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg mb-4
                                bg-[linear-gradient(135deg,var(--forest-light),var(--forest))] text-white
                                group-hover:bg-[color:var(--paper)] group-hover:bg-none group-hover:text-[color:var(--forest)]
                                group-hover:scale-110 group-hover:rotate-6 transition-all duration-500"> 

                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l1.5-3h15L21 7M3 7h18M5 7v11a1 1 0 001 1h12a1 1 0 001-1V7M9 11a3 3 0 006 0" />
                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[color:var(--forest)] group-hover:text-white transition">
                            UMKM
                        </h3>

                        <p class="mt-3 text-[color:var(--brown)]/80 group-hover:text-white/90 transition leading-7">
                            Produk unggulan, usaha rumahan, dan potensi ekonomi masyarakat Desa Sukosongo.
                        </p>

                        <div class="mt-4 flex items-center font-semibold text-[color:var(--gold)] group-hover:text-white transition">
                            <span>Lihat Selengkapnya</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                    </div>

                </a>

                <!-- Wisata -->
                <a href="#wisata-section"
                    class="group relative overflow-hidden rounded-3xl bg-white p-6 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100">

                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500"
                        style="background:linear-gradient(135deg,var(--forest),var(--forest-light));">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg mb-4
                                bg-[linear-gradient(135deg,var(--forest-light),var(--forest))] text-white
                                group-hover:bg-[color:var(--paper)] group-hover:bg-none group-hover:text-[color:var(--forest)]
                                group-hover:scale-110 group-hover:rotate-6 transition-all duration-500"> 

                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l2 2-2 2-2-2 2-2zm0 4v16m-5-8h10M8 22h8M7 10l5-2 5 2" />
                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[color:var(--forest)] group-hover:text-white transition">
                            Wisata Religi
                        </h3>

                        <p class="mt-3 text-[color:var(--brown)]/80 group-hover:text-white/90 transition leading-7">
                            Jelajahi destinasi religi dan potensi wisata yang dimiliki Desa Sukosongo.
                        </p>

                        <div class="mt-4 flex items-center font-semibold text-[color:var(--gold)] group-hover:text-white transition">
                            <span>Lihat Selengkapnya</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

            </div><!-- PENUTUP: grid menu (sebelumnya hilang) -->

        </div><!-- PENUTUP: div relative z-10 max-w-7xl (sebelumnya hilang) -->

    </section><!-- PENUTUP: section MENU / ICON NAVIGASI (sebelumnya hilang) -->



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
    <section id="statistik-desa" class="relative overflow-hidden bg-[color:var(--forest)] min-h-screen flex flex-col justify-center py-14">

        {{-- Cincin pohon — motif atmosferik --}}
        <svg class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/3 w-[34rem] h-[34rem] opacity-[0.05] pointer-events-none" viewBox="0 0 200 200" fill="none">
            <circle cx="100" cy="100" r="95" stroke="white" stroke-width="0.6"/>
            <circle cx="100" cy="100" r="75" stroke="white" stroke-width="0.6"/>
            <circle cx="100" cy="100" r="55" stroke="white" stroke-width="0.6"/>
            <circle cx="100" cy="100" r="35" stroke="white" stroke-width="0.6"/>
            <circle cx="100" cy="100" r="15" stroke="white" stroke-width="0.6"/>
        </svg>

        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 w-full">

            <div class="reveal text-center max-w-xl mx-auto mb-10">
                <p class="uppercase tracking-[0.25em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Data Kependudukan</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white">Statistik Desa Sukosongo</h2>
            </div>

            {{-- TOTAL PENDUDUK — tengah, jadi judul bersama untuk dua kolom di bawah --}}
            <div class="reveal text-center mb-12">
                <p class="text-white/45 text-xs uppercase tracking-[0.2em] mb-2">Total Penduduk</p>
                <p class="stat-num font-display text-6xl lg:text-7xl font-semibold text-[color:var(--gold-light)] leading-none tabular-nums">
                    <span data-count="3097">0</span>
                </p>
                <p class="text-white/40 text-sm mt-3">jiwa, tersebar di 6 dusun</p>
            </div>

            {{-- LABEL DUA KOLOM — sejajar dalam satu grid row --}}
            <div class="grid lg:grid-cols-12 gap-x-14 lg:gap-x-20 mb-4">
                <p class="reveal lg:col-span-5 text-white/45 text-xs uppercase tracking-[0.2em]">Ringkasan</p>
                <p class="reveal lg:col-span-7 text-white/45 text-xs uppercase tracking-[0.2em]">Sebaran Warga per Dusun</p>
            </div>

            {{-- KONTEN DUA KOLOM — masing-masing dipecah 2 kolom internal agar ritme baris sama --}}
            <div class="grid lg:grid-cols-12 gap-x-14 lg:gap-x-20 items-start">

                {{-- KIRI — ringkasan, grid 2x2 --}}
                <div class="lg:col-span-5 grid grid-cols-2 gap-x-8 border-t border-white/10">
                    @php
                        $ringkasan = [
                            ['label' => 'Jumlah Dusun', 'nilai' => 6],
                            ['label' => 'Kepala Keluarga', 'nilai' => 680],
                            ['label' => 'Laki-laki', 'nilai' => 1615],
                            ['label' => 'Perempuan', 'nilai' => 1682],
                        ];
                    @endphp
                    @foreach ($ringkasan as $r)
                        <div class="reveal group border-b border-white/10 py-4">
                            <p class="text-white/60 text-xs mb-1.5 group-hover:text-white transition-colors">{{ $r['label'] }}</p>
                            <p class="stat-num font-display text-2xl text-white tabular-nums group-hover:text-[color:var(--gold-light)] transition-colors"><span data-count="{{ $r['nilai'] }}">0</span></p>
                        </div>
                    @endforeach
                </div>

                {{-- KANAN — 6 dusun, grid 2x3 supaya tinggi sejajar dengan kolom kiri --}}
                <div class="lg:col-span-7 grid grid-cols-2 gap-x-10 gap-y-5">
                    @php
                        $dusun = [
                                    ['nama' => 'Dusun Kedung Kampil', 'jumlah' => 30],
                                    ['nama' => 'Dusun Songo', 'jumlah' => 24],
                                    ['nama' => 'Dusun Sukowati', 'jumlah' => 19],
                                    ['nama' => 'Dusun Sukolilo', 'jumlah' => 15],
                                    ['nama' => 'Dusun Karang Tengah', 'jumlah' => 16],
                                    ['nama' => 'Dusun Djati', 'jumlah' => 14],
                        ];
                    @endphp
                    @foreach ($dusun as $i => $d)
                        <div class="reveal">
                            <div class="flex items-baseline justify-between mb-2">
                                <span class="font-display text-base text-white">{{ $d['nama'] }}</span>
                                <span class="font-display text-base text-[color:var(--gold-light)] tabular-nums">{{ $d['jumlah'] }}%</span>
                            </div>
                            <div class="relative h-[3px] rounded-full bg-white/15">
                                <div class="dusun-bar absolute inset-y-0 left-0 h-[3px] rounded-full bg-gradient-to-r from-transparent to-[color:var(--gold-light)]"
                                    style="--target-width: {{ $d['jumlah'] }}%"></div>
                                <div class="dusun-dot absolute top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-[color:var(--gold-light)]"
                                    style="--target-left: calc({{ $d['jumlah'] }}% - 4px)"></div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <style>
            .dusun-bar { width: 0; transition: width 1.1s cubic-bezier(0.16, 1, 0.3, 1); }
            .dusun-dot { left: 0; opacity: 0; transition: left 1.1s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.6s ease 0.4s; }

            #statistik-desa.in-view .dusun-bar { width: var(--target-width); }
            #statistik-desa.in-view .dusun-dot { left: var(--target-left); opacity: 1; }
            #statistik-desa.in-view .dusun-dot { animation: glow 2.4s ease-in-out infinite 1.3s; }

            @keyframes glow {
                0%, 100% { box-shadow: 0 0 6px 1px var(--gold-light); }
                50% { box-shadow: 0 0 14px 4px var(--gold-light); }
            }
        </style>

        <script>
            (function () {
                const section = document.getElementById('statistik-desa');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            section.classList.add('in-view');
                        }
                    });
                }, { threshold: 0.35 });
                observer.observe(section);
            })();
        </script>
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
    <section id="wisata-section" class="relative overflow-hidden bg-[color:var(--forest)] pt-10 lg:pt-14 pb-10 lg:pb-14">

        {{-- Motif dekoratif — sekarang melayang pelan, bukan statis --}}
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-[color:var(--gold)]/10 blur-3xl pointer-events-none animate-[float1_9s_ease-in-out_infinite]"></div>
        <div class="absolute -bottom-24 -left-16 w-64 h-64 rounded-full bg-white/5 blur-3xl pointer-events-none animate-[float2_11s_ease-in-out_infinite]"></div>

        <div class="relative max-w-5xl mx-auto px-5 lg:px-8">

            <div class="reveal text-center mb-6" style="transition-delay: 0ms;">

                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-[color:var(--gold)]/15 text-[color:var(--gold-light)] uppercase tracking-[0.25em] text-xs font-semibold mb-3 animate-[pulseGlow_3s_ease-in-out_infinite]">
                    Wisata Religi
                </span>

                <h2 class="font-display text-4xl lg:text-5xl font-bold text-white leading-tight">
                    Makam Syeh Jamaludin
                </h2>

                <p class="mt-3 text-white/60 max-w-xl mx-auto leading-7 text-sm lg:text-base">
                    Salah satu destinasi wisata religi yang menjadi ikon Desa Sukosongo
                    serta memiliki nilai sejarah bagi masyarakat sekitar.
                </p>

            </div>

            {{-- Card — border menyala gold saat hover, bukan cuma shadow polos --}}
            <div class="reveal group relative grid lg:grid-cols-2 overflow-hidden rounded-3xl bg-white shadow-md hover:shadow-2xl transition-shadow duration-500" style="transition-delay: 100ms;">

                {{-- Ring border yang muncul & menyala saat card di-hover --}}
                <div class="absolute inset-0 rounded-3xl ring-1 ring-[color:var(--forest)]/10 group-hover:ring-2 group-hover:ring-[color:var(--gold)]/60 transition-all duration-500 pointer-events-none z-10"></div>

                <a href="https://maps.app.goo.gl/EbpSfmsVoKndoX7Y6"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="relative overflow-hidden block h-64 lg:h-auto"
                    aria-label="Buka lokasi Makam Syeh Jamaludin di Google Maps">

                    <img
                        src="{{ asset('images/pesarean.jpg') }}"
                        alt="Makam Syeh Jamaludin"
                        class="w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-110">

                    <div class="absolute inset-0 bg-gradient-to-t from-[color:var(--forest)]/80 via-[color:var(--forest)]/10 to-transparent"></div>

                    <div class="absolute inset-0 flex items-center justify-center bg-[color:var(--forest)]/0 group-hover:bg-[color:var(--forest)]/50 transition-colors duration-500">
                        <span class="opacity-0 group-hover:opacity-100 scale-90 group-hover:scale-100 transition-all duration-500 ease-out inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[color:var(--gold)] text-white text-sm font-semibold shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Buka di Google Maps
                        </span>
                    </div>

                    <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1.5 rounded-full bg-[color:var(--paper)]/95 backdrop-blur-sm text-[color:var(--forest)] text-sm font-semibold">
                            Wisata Religi
                        </span>
                    </div>
                </a>

                <div class="bg-white p-6 lg:p-8 flex flex-col justify-center">

                    <a href="https://maps.app.goo.gl/EbpSfmsVoKndoX7Y6"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group/pin inline-flex items-start gap-1.5 text-sm text-[color:var(--gold)] font-medium mb-4 w-fit hover:text-[color:var(--forest)] transition-colors duration-300">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 transition-transform duration-300 group-hover/pin:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="underline decoration-dotted underline-offset-4">
                            Dusun Kedung Kampil, Desa Sukosongo, Kecamatan Kembangbahu, Kabupaten Lamongan
                        </span>
                    </a>

                    <p class="text-[color:var(--brown)]/75 leading-7 text-sm lg:text-base">
                        Makam Syeh Jamaludin merupakan salah satu destinasi wisata religi
                        yang menjadi kebanggaan masyarakat Desa Sukosongo. Tempat ini
                        sering dikunjungi peziarah dari berbagai daerah sebagai bentuk
                        penghormatan terhadap tokoh penyebar agama Islam sekaligus menjadi
                        bagian dari warisan sejarah dan budaya desa.
                    </p>

                    <div class="grid grid-cols-3 gap-3 mt-6">

                        <div class="reveal group/card rounded-xl bg-[color:var(--paper)] border border-[color:var(--forest)]/10 p-3 text-center transition-all duration-300 ease-out hover:bg-[color:var(--forest)] hover:-translate-y-1 hover:shadow-md cursor-default" style="transition-delay: 200ms;">
                            <svg class="w-5 h-5 mx-auto mb-1.5 text-[color:var(--gold)] group-hover/card:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V8l7-4 7 4v13M9 21v-6h6v6" />
                            </svg>
                            <p class="text-[11px] text-[color:var(--brown)]/60 uppercase group-hover/card:text-white/60 transition-colors duration-300">Kategori</p>
                            <p class="font-semibold text-[color:var(--forest)] text-sm mt-1 group-hover/card:text-white transition-colors duration-300">Religi</p>
                        </div>

                        <div class="reveal group/card rounded-xl bg-[color:var(--paper)] border border-[color:var(--forest)]/10 p-3 text-center transition-all duration-300 ease-out hover:bg-[color:var(--forest)] hover:-translate-y-1 hover:shadow-md cursor-default" style="transition-delay: 280ms;">
                            <svg class="w-5 h-5 mx-auto mb-1.5 text-[color:var(--gold)] group-hover/card:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="text-[11px] text-[color:var(--brown)]/60 uppercase group-hover/card:text-white/60 transition-colors duration-300">Lokasi</p>
                            <p class="font-semibold text-[color:var(--forest)] text-sm mt-1 group-hover/card:text-white transition-colors duration-300">Sukosongo</p>
                        </div>

                        <div class="reveal group/card rounded-xl bg-[color:var(--paper)] border border-[color:var(--forest)]/10 p-3 text-center transition-all duration-300 ease-out hover:bg-[color:var(--forest)] hover:-translate-y-1 hover:shadow-md cursor-default" style="transition-delay: 360ms;">
                            <svg class="w-5 h-5 mx-auto mb-1.5 text-[color:var(--gold)] group-hover/card:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <p class="text-[11px] text-[color:var(--brown)]/60 uppercase group-hover/card:text-white/60 transition-colors duration-300">Status</p>
                            <p class="font-semibold text-[color:var(--forest)] text-sm mt-1 group-hover/card:text-white transition-colors duration-300">Ikon Desa</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <style>
            @keyframes float1 {
                0%, 100% { transform: translate(0, 0); }
                50% { transform: translate(-20px, 25px); }
            }
            @keyframes float2 {
                0%, 100% { transform: translate(0, 0); }
                50% { transform: translate(20px, -20px); }
            }
            @keyframes pulseGlow {
                0%, 100% { box-shadow: 0 0 0 0 color-mix(in srgb, var(--gold) 30%, transparent); }
                50% { box-shadow: 0 0 0 6px color-mix(in srgb, var(--gold) 0%, transparent); }
            }
        </style>

    </section>

    {{-- ============ PETA LOKASI ============ --}}
    <section id="lokasi" class="bg-[color:var(--paper)] pt-4 lg:pt-8 pb-20 lg:pb-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-10">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Lokasi</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Peta Desa
                    Sukosongo</h2>
            </div>

            <div class="grid lg:grid-cols-3 gap-6">
                {{-- Peta --}}
                <div
                    class="reveal lg:col-span-2 rounded-2xl overflow-hidden border border-[color:var(--forest)]/10 shadow-sm">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7917.444166533023!2d112.32495505!3d-7.1580951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f42f785b67fd%3A0x98eccb6251b092aa!2sSukosongo%2C%20Kec.%20Kembangbahu%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1784179103863!5m2!1sid!2sid"
                        class="w-full h-80 lg:h-full min-h-[320px] border-0" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Desa Sukosongo">
                    </iframe>
                </div>

                {{-- Info Kontak --}}
                <div
                    class="reveal bg-white rounded-2xl border border-[color:var(--forest)]/10 shadow-sm p-6 lg:p-7 flex flex-col gap-5">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-[color:var(--brown)] font-semibold mb-1.5">
                            Alamat</p>
                        <p class="text-sm text-[color:var(--ink)]/70 leading-relaxed">
                            Desa Sukosongo, Kec. Kembangbahu, Kabupaten Lamongan, Jawa Timur
                        </p>
                    </div>

                    <div class="h-px bg-[color:var(--forest)]/10"></div>

                    <div>
                        <p class="text-xs uppercase tracking-wide text-[color:var(--brown)] font-semibold mb-1.5">Jam
                            Layanan</p>
                        <p class="text-sm text-[color:var(--ink)]/70 leading-relaxed">
                            Senin – Jumat, 08.00 – 15.00 WIB
                        </p>
                    </div>

                    <div class="h-px bg-[color:var(--forest)]/10"></div>

                    <div>
                        <p class="text-xs uppercase tracking-wide text-[color:var(--brown)] font-semibold mb-1.5">
                            Kontak
                        </p>
                        <p class="text-sm text-[color:var(--ink)]/70 leading-relaxed">
                            kantordesasukosongo@email.com
                        </p>
                    </div>

                    <a href="https://www.google.com/maps/dir/?api=1&destination=-7.1580951,112.32495505"
                        target="_blank" rel="noopener"
                        class="mt-1 inline-flex items-center justify-center gap-2 rounded-full bg-[color:var(--forest)] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[color:var(--forest-light)] transition-colors">
                        Buka di Google Maps
                    </a>
                </div>
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
