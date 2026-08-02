<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil — Desa Sukosongo</title>
    <meta name="description" content="Katalog UMKM Desa Sukosongo: temukan toko, produk, dan pelaku usaha lokal.">

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

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .reveal.in {
            opacity: 1;
            transform: translateY(0);
        }

        #mobileMenu {
            transition: max-height .35s ease;
            overflow: hidden;
        }
    </style>
</head>

<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <x-navbar active="profil-desa" />

    {{-- ============ HERO / BREADCRUMB ============ --}}
    <section
        class="relative pt-24 pb-10 lg:pt-28 lg:pb-12 bg-gradient-to-b from-[#14261A] via-[color:var(--forest)] to-[color:var(--forest-light)] overflow-hidden">
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
            <div class="data-reveal">
                <p class="text-white/50 text-sm mb-3">
                    <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    <span class="mx-2">/</span>
                    <span class="text-white/80">Profil Desa</span>
                </p>
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Mengenal
                    lebih dekat Desa Sukosongo</p>
                <h1
                    class="font-display text-white text-2xl sm:text-3xl lg:text-4xl font-semibold leading-tight max-w-2xl">
                    Profil Desa Sukosongo
                </h1>
                <p class="text-white/70 text-sm mt-3 max-w-xl">
                    Mengenal profil, potensi, dan perkembangan Desa Sukosongo
                </p>
            </div>
        </div>
    </section>

    {{-- ============ KONDISI UMUM DESA ============ --}}
<section class="bg-[#FAF6EC] py-16 sm:py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-5 lg:px-8">
        <div class="grid sm:grid-cols-2 gap-6 sm:gap-8 lg:gap-14 items-center">

            {{-- ================= KIRI (judul) ================= --}}
            <div data-reveal class="opacity-0 translate-y-6 transition-all duration-700 ease-out">

                <p class="uppercase tracking-[0.2em] text-[#6B4226] text-xs font-semibold mb-3">
                    Gambaran Umum
                </p>

                <h2 class="font-['Fraunces',serif] text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#1F3D2B] mb-4 sm:mb-6">
                    Kondisi Umum Desa
                </h2>

                <p class="hidden sm:block text-[#23281F]/75 text-sm lg:text-base leading-7 lg:leading-8 text-justify">
                    Desa Sukosongo merupakan salah satu desa di Kecamatan
                    Kembangbahu, Kabupaten Lamongan, Provinsi Jawa Timur.
                    Sebagai desa yang memiliki potensi besar pada sektor
                    pertanian dan ekonomi masyarakat, Sukosongo terus
                    mengembangkan berbagai inovasi melalui penguatan UMKM,
                    pemanfaatan sumber daya lokal, serta pembangunan yang
                    berkelanjutan. Semangat gotong royong masyarakat menjadi
                    modal utama dalam mewujudkan desa yang mandiri, produktif,
                    dan berdaya saing.
                </p>
            </div>

            {{-- ================= KANAN (gambar) ================= --}}
            <div data-reveal class="opacity-0 translate-y-6 transition-all duration-700 ease-out">

                {{-- Mobile: grid-cols-2 (sejajar kiri-kanan) | Tablet & Desktop: grid-cols-1 (stack) --}}
                <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-3 lg:gap-5">

                    {{-- Foto 1 (flipTop) --}}
                    <div class="aspect-square sm:aspect-auto sm:h-24 md:h-32 lg:h-40 [perspective:1200px]">
                        <div id="flipTop" class="relative h-full w-full transition-transform duration-1000 [transform-style:preserve-3d]">
                            <div class="absolute inset-0 rounded-2xl overflow-hidden [backface-visibility:hidden]">
                                <img src="{{ asset('images/profil-desa/kantordesa.webp') }}" alt="Kantor Desa" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 rounded-2xl overflow-hidden [transform:rotateX(180deg)] [backface-visibility:hidden]">
                                <img src="{{ asset('images/profil-desa/hasil1.webp') }}" alt="Hasil Pertanian" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                    {{-- Foto 2 (flipBottom) --}}
                    <div class="aspect-square sm:aspect-auto sm:h-24 md:h-32 lg:h-40 [perspective:1200px]">
                        <div id="flipBottom" class="relative h-full w-full transition-transform duration-1000 [transform-style:preserve-3d]">
                            <div class="absolute inset-0 rounded-2xl overflow-hidden [backface-visibility:hidden]">
                                <img src="{{ asset('images/profil-desa/padi1.webp') }}" alt="Sawah Desa" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 rounded-2xl overflow-hidden [transform:rotateX(180deg)] [backface-visibility:hidden]">
                                <img src="{{ asset('images/profil-desa/pertanian.webp') }}" alt="Pertanian Desa" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Paragraf: hanya muncul di mobile, di bawah gambar --}}
                <p class="sm:hidden text-[#23281F]/75 leading-7 text-justify mt-5">
                    Desa Sukosongo merupakan salah satu desa di Kecamatan
                    Kembangbahu, Kabupaten Lamongan, Provinsi Jawa Timur.
                    Sebagai desa yang memiliki potensi besar pada sektor
                    pertanian dan ekonomi masyarakat, Sukosongo terus
                    mengembangkan berbagai inovasi melalui penguatan UMKM,
                    pemanfaatan sumber daya lokal, serta pembangunan yang
                    berkelanjutan. Semangat gotong royong masyarakat menjadi
                    modal utama dalam mewujudkan desa yang mandiri, produktif,
                    dan berdaya saing.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ================= DUSUN ================= --}}
@php
    $dusun = [
        ['nama' => 'Dusun Jati',         'gambar' => 'padi1.webp'],
        ['nama' => 'Dusun Sukowati',     'gambar' => 'kantordesa.webp'],
        ['nama' => 'Dusun Songo',        'gambar' => 'irigasi.webp'],
        ['nama' => 'Dusun Kedungkampil', 'gambar' => 'pekarangan1.webp'],
        ['nama' => 'Dusun Karangtengah', 'gambar' => 'pertanian.webp'],
        ['nama' => 'Dusun Sukolilo',     'gambar' => 'padi2.webp'],
    ];
@endphp

<div data-reveal class="opacity-0 translate-y-6 transition-all duration-700 ease-out lg:mt-8 mt-4 mb-14 max-w-6xl mx-auto px-5 lg:px-8">
    <div class="flex items-end justify-between mb-7">
        <div>
            <p class="uppercase tracking-[0.18em] text-[#6B4226] text-xs font-semibold mb-2">
                Wilayah Desa
            </p>
            <h3 class="font-['Fraunces',serif] text-xl lg:text-2xl font-semibold text-[#1F3D2B]">
                Dusun di Desa Sukosongo
            </h3>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">
        @foreach($dusun as $item)
            <div
                class="group relative h-32 sm:h-36 lg:h-40 overflow-hidden rounded-2xl cursor-pointer border border-[#1F3D2B]/10 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">

                <img
                    src="{{ asset('images/profil-desa/'.$item['gambar']) }}"
                    alt="{{ $item['nama'] }}"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>

                <div class="absolute top-4 left-4">
                    <span class="bg-white/20 backdrop-blur-md text-white text-[10px] px-2.5 py-1 rounded-full">
                        Dusun
                    </span>
                </div>

                <div class="absolute bottom-0 left-0 right-0 p-5 transition-all duration-500 group-hover:-translate-y-1">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 text-[#E4C46C] shrink-0"
                            fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 016 6c0 4.2-6 10-6 10S4 12.2 4 8a6 6 0 016-6z"/>
                        </svg>
                        <p class="text-white font-semibold text-[13px] lg:text-lg drop-shadow">
                            {{ $item['nama'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    {{-- ============ VISI MISI ============ --}}
    <section class="relative py-20 lg:py-28 overflow-hidden">

        {{-- Layer foto blur — terpisah dari konten, biar cuma foto yang blur --}}
        <div class="absolute inset-0 bg-cover bg-center scale-110 blur-[6px]"
            style="background-image: url('{{ asset('images/profil-desa/kantordesa.webp') }}');"></div>

        {{-- Konten — di layer paling atas, gak ikut blur --}}
        <div class="relative max-w-6xl mx-auto px-5 lg:px-8">
            <div data-reveal
                class="opacity-0 translate-y-6 transition-all duration-700 ease-out text-center max-w-2xl mx-auto mb-14">
                <p class="uppercase tracking-[0.2em] text-[#E4C46C] text-xs font-semibold mb-3">Arah Pembangunan</p>
                <h2 class="font-['Fraunces',serif] text-3xl lg:text-4xl font-semibold text-[#1F3D2B]">Visi &amp; Misi
                    Desa</h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-6">

                {{-- VISI --}}
                <div data-reveal
                    class="opacity-0 translate-y-6 transition-all duration-700 ease-out bg-[#1F3D2B] border border-white/10 rounded-2xl p-8 lg:p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-full bg-[#C99A2E] flex items-center justify-center font-['Fraunces',serif] font-semibold text-[#1F3D2B] text-sm shrink-0">
                            V
                        </div>
                        <p class="font-['Fraunces',serif] text-white text-xl font-semibold">Visi</p>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#E4C46C] mt-2 shrink-0"></span>
                            <span class="text-white/80 text-sm leading-relaxed">
                                Meningkatkan kehidupan masyarakat yg sehat, sejahtera, dan gemah ripah loh jinawi dengan
                                semangat gotong royong dan kelestarian.
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#E4C46C] mt-2 shrink-0"></span>
                            <span class="text-white/80 text-sm leading-relaxed">
                                Mewujudkan kehidupan bermasyarakat yang damai, harmonis, aman, dan tentram.
                            </span>
                        </li>
                    </ul>
                </div>

                {{-- MISI --}}
                <div data-reveal
                    class="opacity-0 translate-y-6 transition-all duration-700 ease-out bg-[#1F3D2B] border border-white/10 rounded-2xl p-8 lg:p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-full bg-[#C99A2E] flex items-center justify-center font-['Fraunces',serif] font-semibold text-[#1F3D2B] text-sm shrink-0">
                            M
                        </div>
                        <p class="font-['Fraunces',serif] text-white text-xl font-semibold">Misi</p>
                    </div>

                    @php
                        $misi = [
                            'Meningkatkan pelayanan kepada masyarakat dengan cara meningkatkan tata pemerintahan yang baik dan administratif.',
                            'Meningkatkan pembangunan infrastruktur di bidang pendidikan, kesehatan, pertanian, dan keagamaan bermasyarakat desa.',
                            'Menjaga kelestarian lingkungan, menjadikan lingkungan yang aman dan bersih meningkatkan kualitas sumber daya masyarakat desa.',
                        ];
                    @endphp

                    <ul class="space-y-4">
                        @foreach ($misi as $i => $item)
                            <li class="flex gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-white/10 flex items-center justify-center text-[#E4C46C] text-xs font-semibold shrink-0">
                                    {{ $i + 1 }}
                                </span>
                                <span class="text-white/80 text-sm leading-relaxed">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- ============ POTENSI DESA ============ --}}
    <section class="bg-[#F3EDDD] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div data-reveal class="opacity-0 translate-y-6 transition-all duration-700 ease-out max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[#6B4226] text-xs font-semibold mb-3">Sumber Daya</p>
                <h2 class="font-['Fraunces',serif] text-3xl lg:text-4xl font-semibold text-[#1F3D2B]">Potensi Desa
                    Sukosongo</h2>
                <p class="text-[#23281F]/60 mt-4">
                    Pertanian dan peternakan menjadi tulang punggung ekonomi warga, didukung
                    lahan yang subur dan semangat gotong royong.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Card 1: Pertanian & Peternakan (highlight) --}}
                <div data-reveal
                    class="opacity-0 translate-y-6 transition-all duration-700 ease-out sm:col-span-2 lg:col-span-1 lg:row-span-2 rounded-2xl overflow-hidden relative min-h-[320px] flex flex-col justify-end p-7 bg-cover bg-center hover:!translate-y-[-6px] hover:shadow-[0_20px_40px_-18px_rgba(31,61,43,0.35)]"
                    style="background-image: url('{{ asset('images/profil-desa/pertanian.webp') }}'); transition-property: opacity, transform, box-shadow;">
                    {{-- Overlay gradient gelap, biar teks tetap kebaca di atas foto --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F3D2B] via-[#1F3D2B]/60 to-transparent">
                    </div>

                    <div class="relative">
                        <p class="text-[#E4C46C] text-xs uppercase tracking-wide font-semibold mb-2">Unggulan</p>
                        <h3 class="font-['Fraunces',serif] text-white text-2xl font-semibold leading-tight">
                            Pertanian &amp; Peternakan Desa Sukosongo
                        </h3>
                    </div>
                </div>

                {{-- Card 2: Sarana Pertanian --}}
                <div data-reveal data-slider
                    class="opacity-0 translate-y-6 potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6 transition-all duration-700 ease-out hover:!translate-y-[-6px] hover:shadow-[0_20px_40px_-18px_rgba(31,61,43,0.35)]">
                    <div class="bg-slide active"
                        style="background-image: url('{{ asset('images/profil-desa/irigasi.webp') }}');"></div>
                    <div class="bg-slide"
                        style="background-image: url('{{ asset('images/profil-desa/pertanian.webp') }}');"></div>

                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F3D2B] via-[#1F3D2B]/50 to-transparent">
                    </div>
                    <div class="relative">
                        <h3 class="font-['Fraunces',serif] font-semibold text-lg text-white mb-2">Sarana Pertanian Desa
                        </h3>
                        <p class="text-sm text-white/70 leading-relaxed">
                            Saluran irigasi dan akses jalan pertanian yang mendukung mobilitas hasil panen warga.
                        </p>
                    </div>
                </div>
                {{-- Card 3: Hasil Pertanian --}}
                <div data-reveal data-slider
                    class="opacity-0 translate-y-6 potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6 transition-all duration-700 ease-out hover:!translate-y-[-6px] hover:shadow-[0_20px_40px_-18px_rgba(31,61,43,0.35)]">
                    <div class="bg-slide active"
                        style="background-image: url('{{ asset('images/profil-desa/hasil1.webp') }}');"></div>
                    <div class="bg-slide"
                        style="background-image: url('{{ asset('images/profil-desa/hasil2.webp') }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F3D2B] via-[#1F3D2B]/50 to-transparent">
                    </div>
                    <div class="relative">
                        <h3 class="font-['Fraunces',serif] font-semibold text-lg text-white mb-2">Hasil Pertanian Desa
                            Sukosongo</h3>
                        <p class="text-sm text-white/70 leading-relaxed">
                            Padi menjadi komoditas utama, dipanen secara berkala dengan hasil yang mencukupi kebutuhan
                            warga.
                        </p>
                    </div>
                </div>

                {{-- Card 4: Pekarangan Warga --}}
                <div data-reveal data-slider
                    class="opacity-0 translate-y-6 potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6 transition-all duration-700 ease-out hover:!translate-y-[-6px] hover:shadow-[0_20px_40px_-18px_rgba(31,61,43,0.35)]">
                    <div class="bg-slide active"
                        style="background-image: url('{{ asset('images/profil-desa/pekarangan1.webp') }}');"></div>
                    <div class="bg-slide"
                        style="background-image: url('{{ asset('images/profil-desa/pekarangan2.webp') }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F3D2B] via-[#1F3D2B]/50 to-transparent">
                    </div>
                    <div class="relative">
                        <h3 class="font-['Fraunces',serif] font-semibold text-lg text-white mb-2">Pekarangan Warga Desa
                            Sukosongo</h3>
                        <p class="text-sm text-white/70 leading-relaxed">
                            Warga memanfaatkan pekarangan rumah untuk menanam sayur dan tanaman produktif secara
                            mandiri.
                        </p>
                    </div>
                </div>

                {{-- Card 5: Panen Padi --}}
                <div data-reveal data-slider
                    class="opacity-0 translate-y-6 potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6 transition-all duration-700 ease-out hover:!translate-y-[-6px] hover:shadow-[0_20px_40px_-18px_rgba(31,61,43,0.35)]">
                    <div class="bg-slide active"
                        style="background-image: url('{{ asset('images/profil-desa/padi2.webp') }}');"></div>
                    <div class="bg-slide"
                        style="background-image: url('{{ asset('images/profil-desa/padi1.webp') }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F3D2B] via-[#1F3D2B]/50 to-transparent">
                    </div>
                    <div class="relative">
                        <h3 class="font-['Fraunces',serif] font-semibold text-lg text-white mb-2">Panen Padi</h3>
                        <p class="text-sm text-white/70 leading-relaxed">
                            Musim panen padi berlangsung dengan hasil yang stabil, menopang ketahanan pangan desa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ FOOTER ============ --}}
    <x-footer />

    <script>
        const revealEls = document.querySelectorAll('[data-reveal]');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-6');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });
        revealEls.forEach(el => revealObserver.observe(el));

        document.querySelectorAll('[data-slider]').forEach(slider => {
            const slides = slider.querySelectorAll('.bg-slide');
            let current = 0;

            setInterval(() => {
                slides[current].classList.remove('active');
                current = (current + 1) % slides.length;
                slides[current].classList.add('active');
            }, 2000); // ganti tiap 2 detik
        });

        const topCard = document.getElementById("flipTop");
        const bottomCard = document.getElementById("flipBottom");

        setInterval(() => {
            topCard.classList.toggle("flip-active");
        }, 3500);

        setTimeout(() => {
            setInterval(() => {
                bottomCard.classList.toggle("flip-active");
            }, 3500);
        }, 800);
    </script>
</body>

</html>
