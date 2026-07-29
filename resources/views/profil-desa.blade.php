<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Desa — Desa Sukosongo</title>
    <meta name="description" content="Profil Desa Sukosongo: kondisi umum, visi misi, dan potensi desa.">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        .nav-link{ position:relative; }
        .nav-link::after{
            content:''; position:absolute; left:0; bottom:-4px; height:2px; width:0%;
            background: var(--gold); transition: width .25s ease;
        }
        .nav-link:hover::after{ width:100%; }

        .reveal{ opacity:0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.in{ opacity:1; transform: translateY(0); }

        .potensi-card{ transition: transform .35s ease, box-shadow .35s ease; }
        .potensi-card:hover{ transform: translateY(-6px); box-shadow: 0 20px 40px -18px rgba(31,61,43,.35); }

        .corner-fold{
            position: relative;
            overflow: hidden;
        }
        .corner-fold::before{
            content:'';
            position:absolute;
            top:0; right:0;
            width:0; height:0;
            border-style: solid;
            border-width: 0 32px 32px 0;
            border-color: transparent var(--gold) transparent transparent;
        }
    </style>
</head>
<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <x-navbar active="profil-desa" />

    {{-- ============ HERO / BREADCRUMB ============ --}}
    <section class="relative pt-24 pb-10 lg:pt-28 lg:pb-12 bg-[color:var(--forest)] overflow-hidden">
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal">
                <p class="text-white/50 text-sm mb-3">
                    <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    <span class="mx-2">/</span>
                    <span class="text-white/80">Profil Desa</span>
                </p>
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Mengenal lebih dekat Desa Sukosongo</p>
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
    <section class="bg-[color:var(--cream)] py-20 lg:py-28">
        <div class="max-w-6xl mx-auto px-5 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-start">

                {{-- Kolom kiri: judul + deskripsi --}}
                <div class="reveal">
                    <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Gambaran Umum</p>
                    <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)] mb-6">
                        Kondisi Umum Desa
                    </h2>
                    <p class="text-[color:var(--ink)]/70 leading-relaxed">
                        Desa Sukosongo merupakan salah satu desa agraris di Kabupaten Lamongan
                        yang mengandalkan sektor pertanian dan perdagangan sebagai penggerak
                        utama perekonomian warganya.
                    </p>
                </div>

                {{-- Kolom kanan: card poin-poin dengan aksen sudut gold --}}
                <div class="reveal corner-fold bg-[color:var(--paper)] rounded-2xl p-8 lg:p-10 border border-[color:var(--forest)]/10">
                    <ul class="space-y-5">
                        <li class="flex gap-3">
                            <span class="w-2 h-2 rounded-full bg-[color:var(--forest)] mt-2 shrink-0"></span>
                            <span class="text-[color:var(--ink)]/80 leading-relaxed">
                                Desa Sukosongo berada di wilayah bagian tengah Kabupaten Lamongan
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="w-2 h-2 rounded-full bg-[color:var(--forest)] mt-2 shrink-0"></span>
                            <span class="text-[color:var(--ink)]/80 leading-relaxed">
                                Sebagian besar wilayah Desa Sukosongo merupakan daerah persawahan
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="w-2 h-2 rounded-full bg-[color:var(--forest)] mt-2 shrink-0"></span>
                            <span class="text-[color:var(--ink)]/80 leading-relaxed">
                                Masyarakat Desa Sukosongo sebagian besar mata pencahariannya adalah petani dan berdagang
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="w-2 h-2 rounded-full bg-[color:var(--forest)] mt-2 shrink-0"></span>
                            <span class="text-[color:var(--ink)]/80 leading-relaxed">
                                Tingkat pendidikan masyarakat Desa Sukosongo sebagian besar tamatan SMA/Sederajat
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

   {{-- ============ VISI MISI ============ --}}
   <section class="relative py-20 lg:py-28 overflow-hidden">

    {{-- Layer foto blur — terpisah dari konten, biar cuma foto yang blur --}}
    <div
        class="absolute inset-0 bg-cover bg-center scale-110"
        style="background-image: url('{{ asset('images/profil-desa/kantordesa.jpg') }}'); filter: blur(6px);"
    ></div>

    {{-- Layer overlay hijau tipis --}}
    <div class="absolute inset-0 bg-[color:var(--forest)]/90"></div>

    {{-- Konten — di layer paling atas, gak ikut blur --}}
    <div class="relative max-w-6xl mx-auto px-5 lg:px-8">
        <div class="reveal text-center max-w-2xl mx-auto mb-14">
            <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Arah Pembangunan</p>
            <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Visi &amp; Misi Desa</h2>
        </div>
        <div class="grid lg:grid-cols-2 gap-6">

            {{-- VISI --}}
            <div class="reveal bg-[color:var(--forest)] border border-white/10 rounded-2xl p-8 lg:p-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-full bg-[color:var(--gold)] flex items-center justify-center font-display font-semibold text-[color:var(--forest)] text-sm shrink-0">
                        V
                    </div>
                    <p class="font-display text-white text-xl font-semibold">Visi</p>
                </div>
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-[color:var(--gold-light)] mt-2 shrink-0"></span>
                        <span class="text-white/80 text-sm leading-relaxed">
                            Meningkatkan kehidupan masyarakat yg sehat, sejahtera, dan gemah ripah loh jinawi dengan semangat gotong royong dan kelestarian.
                        </span>
                    </li>
                    <li class="flex gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-[color:var(--gold-light)] mt-2 shrink-0"></span>
                        <span class="text-white/80 text-sm leading-relaxed">
                            Mewujudkan kehidupan bermasyarakat yang damai, harmonis, aman, dan tentram.
                        </span>
                    </li>
                </ul>
            </div>

            {{-- MISI --}}
            <div class="reveal bg-[color:var(--forest)]  border-white/10bg-white/5 border-white/10 rounded-2xl p-8 lg:p-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-full bg-[color:var(--gold)] flex items-center justify-center font-display font-semibold text-[color:var(--forest)] text-sm shrink-0">
                        M
                    </div>
                    <p class="font-display text-white text-xl font-semibold">Misi</p>
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
                            <span class="w-6 h-6 rounded-full bg-white/10 flex items-center justify-center text-[color:var(--gold-light)] text-xs font-semibold shrink-0">
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
    <section class="bg-[color:var(--paper)] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal max-w-xl mb-14">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Sumber Daya</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Potensi Desa Sukosongo</h2>
                <p class="text-[color:var(--ink)]/60 mt-4">
                    Pertanian dan peternakan menjadi tulang punggung ekonomi warga, didukung
                    lahan yang subur dan semangat gotong royong.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Card 1: Pertanian & Peternakan (highlight) --}}
                <div
                    class="potensi-card reveal sm:col-span-2 lg:col-span-1 lg:row-span-2 rounded-2xl overflow-hidden relative min-h-[320px] flex flex-col justify-end p-7 bg-cover bg-center"
                    style="background-image: url('{{ asset('images/profil-desa/pertanian.jpg') }}');"
                >
                    {{-- Overlay gradient gelap, biar teks tetap kebaca di atas foto --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[color:var(--forest)] via-[color:var(--forest)]/60 to-transparent"></div>

                    <div class="relative">
                        <p class="text-[color:var(--gold-light)] text-xs uppercase tracking-wide font-semibold mb-2">Unggulan</p>
                        <h3 class="font-display text-white text-2xl font-semibold leading-tight">
                            Pertanian &amp; Peternakan Desa Sukosongo
                        </h3>
                    </div>
                </div>

            {{-- Card 2: Sarana Pertanian --}}
            <div class="potensi-card reveal potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6" data-slider>
            <div class="bg-slide active" style="background-image: url('{{ asset('images/profil-desa/irigasi.png') }}');"></div>
            <div class="bg-slide" style="background-image: url('{{ asset('images/profil-desa/pertanian.jpg') }}');"></div>

            <div class="absolute inset-0 bg-gradient-to-t from-[color:var(--forest)] via-[color:var(--forest)]/50 to-transparent"></div>
            <div class="relative">
                <h3 class="font-display font-semibold text-lg text-white mb-2">Sarana Pertanian Desa</h3>
                <p class="text-sm text-white/70 leading-relaxed">
                    Saluran irigasi dan akses jalan pertanian yang mendukung mobilitas hasil panen warga.
                </p>
            </div>
        </div>
            {{-- Card 3: Hasil Pertanian --}}
            <div class="potensi-card reveal potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6" data-slider>
            <div class="bg-slide active" style="background-image: url('{{ asset('images/profil-desa/hasil1.jpg') }}');"></div>
            <div class="bg-slide" style="background-image: url('{{ asset('images/profil-desa/hasil2.jpg') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[color:var(--forest)] via-[color:var(--forest)]/50 to-transparent"></div>
                <div class="relative">
                    <h3 class="font-display font-semibold text-lg text-white mb-2">Hasil Pertanian Desa Sukosongo</h3>
                    <p class="text-sm text-white/70 leading-relaxed">
                        Padi menjadi komoditas utama, dipanen secara berkala dengan hasil yang mencukupi kebutuhan warga.
                    </p>
                </div>
            </div>

            {{-- Card 4: Pekarangan Warga --}}
            <div class="potensi-card reveal potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6" data-slider>
            <div class="bg-slide active" style="background-image: url('{{ asset('images/profil-desa/pekarangan1.jpg') }}');"></div>
            <div class="bg-slide" style="background-image: url('{{ asset('images/profil-desa/pekarangan2.jpg') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[color:var(--forest)] via-[color:var(--forest)]/50 to-transparent"></div>
                <div class="relative">
                    <h3 class="font-display font-semibold text-lg text-white mb-2">Pekarangan Warga Desa Sukosongo</h3>
                    <p class="text-sm text-white/70 leading-relaxed">
                        Warga memanfaatkan pekarangan rumah untuk menanam sayur dan tanaman produktif secara mandiri.
                    </p>
                </div>
            </div>

            {{-- Card 5: Panen Padi --}}
            <div class="potensi-card reveal potensi-bg-slider rounded-2xl min-h-[240px] flex flex-col justify-end p-6" data-slider>
            <div class="bg-slide active" style="background-image: url('{{ asset('images/profil-desa/padi2.jpg') }}');"></div>
            <div class="bg-slide" style="background-image: url('{{ asset('images/profil-desa/padi1.jpg') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[color:var(--forest)] via-[color:var(--forest)]/50 to-transparent"></div>
                <div class="relative">
                    <h3 class="font-display font-semibold text-lg text-white mb-2">Panen Padi</h3>
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
    </script>
</body>
</html>