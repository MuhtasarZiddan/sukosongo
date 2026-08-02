<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $berita->judul }} - {{ config('app.name', 'Desa Sukosongo') }}</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi_berita), 150) }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

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

        #mobileMenu {
            transition: max-height .35s ease;
            overflow: hidden;
        }

        .prose img {
            border-radius: 1rem;
        }
    </style>
</head>

<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <x-navbar active="berita" />

    {{-- ============ HERO / BREADCRUMB ============ --}}
    <section class="relative pt-24 pb-10 lg:pt-28 lg:pb-12 bg-[color:var(--forest)] overflow-hidden">
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal">
                <p class="text-white/50 text-sm mb-3">
                    <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('berita.page') }}" class="hover:text-white transition-colors">Berita</a>
                    <span class="mx-2">/</span>
                    <span class="text-white/80">{{ $berita->judul }}</span>
                </p>
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Kabar
                    Desa</p>
                <h1
                    class="font-display text-white text-2xl sm:text-3xl lg:text-4xl font-semibold leading-tight max-w-2xl">
                    {{ $berita->judul }}
                </h1>
                <p class="text-white/70 text-sm mt-3 max-w-xl">
                    {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d F Y') }}
                    &middot; oleh {{ $berita->penulis }}
                </p>
            </div>
        </div>
    </section>

    {{-- ============ ISI BERITA ============ --}}
    <section class="bg-[color:var(--cream)] py-14 lg:py-20">
        <div class="max-w-4xl mx-auto px-5 lg:px-8">

            <div class="reveal rounded-3xl overflow-hidden mb-10 shadow-sm">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto">
            </div>

            <div class="reveal prose max-w-none text-[color:var(--ink)]/80 leading-relaxed">
                {!! $berita->isi_berita !!}
            </div>

            <div class="reveal mt-12">
                <a href="{{ route('berita.page') }}"
                    class="group inline-flex items-center gap-2.5 rounded-full bg-[color:var(--forest)] pl-6 pr-5 py-3 text-sm font-semibold text-white shadow-sm hover:shadow-lg hover:shadow-[color:var(--forest)]/20 hover:bg-[color:var(--forest-light)] transition-all duration-300">
                    <svg class="w-5 h-5 mr-2 rotate-180 group-hover:-translate-x-2 transition" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Kembali ke Semua Berita
                </a>
            </div>
        </div>
    </section>

    <x-footer />

    <script>
        // ============ REVEAL ON SCROLL ============
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
        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
    </script>
</body>

</html>
