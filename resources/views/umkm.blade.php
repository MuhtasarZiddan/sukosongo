<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMKM — Desa Sukosongo</title>
    <meta name="description" content="Katalog UMKM Desa Sukosongo: temukan toko, produk, dan pelaku usaha lokal.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
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
    </style>
</head>

<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <x-navbar active="umkm" />

    {{-- ============ HERO / BREADCRUMB ============ --}}
    <section
        class="relative pt-24 pb-10 lg:pt-28 lg:pb-12 bg-gradient-to-b from-[#14261A] via-[color:var(--forest)] to-[color:var(--forest-light)] overflow-hidden">
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal">
                <p class="text-white/50 text-sm mb-3">
                    <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    <span class="mx-2">/</span>
                    <span class="text-white/80">UMKM</span>
                </p>
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-3">Ekonomi
                    Desa</p>
                <h1
                    class="font-display text-white text-2xl sm:text-3xl lg:text-4xl font-semibold leading-tight max-w-2xl">
                    Katalog UMKM Desa Sukosongo
                </h1>
                <p class="text-white/70 text-sm mt-3 max-w-xl">
                    Temukan toko, produk unggulan, dan pelaku usaha lokal yang tumbuh di Desa Sukosongo.
                </p>
            </div>
        </div>
    </section>

    {{-- ============ SEARCH ============ --}}
    <section class="bg-[color:var(--cream)] pt-10 pb-4">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal">
                <p id="umkmCount" class="text-sm text-[color:var(--ink)]/60 mb-4">
                    Menampilkan {{ $umkms->count() }} dari {{ $umkms->count() }} toko
                </p>

                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-[color:var(--forest)]/40"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" id="umkmSearch" autocomplete="off"
                            placeholder="Cari nama toko, pemilik, atau produk..."
                            class="w-full pl-11 pr-4 py-3 rounded-full border border-[color:var(--forest)]/15 bg-white text-sm text-[color:var(--ink)] placeholder:text-[color:var(--ink)]/40 outline-none focus:outline-none focus:border-[color:var(--gold)] focus:ring-2 focus:ring-[color:var(--gold)]/50">
                    </div>
                    <button id="umkmReset" type="button"
                        class="hidden sm:flex items-center gap-2 px-5 py-3 rounded-full border border-[color:var(--forest)]/15 bg-white text-sm font-semibold text-[color:var(--forest)] hover:bg-[color:var(--forest)]/5 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ GRID UMKM ============ --}}
    <section class="bg-[color:var(--cream)] pt-8 pb-14 lg:pb-20">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div id="umkmGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($umkms as $umkm)
                    <x-umkm-card nama_umkm="{{ $umkm->nama_umkm }}" alamat_usaha="{{ $umkm->alamat_usaha }}"
                        nama_pemilik="{{ $umkm->nama_pemilik }}" no_wa="{{ $umkm->no_wa }}"
                        nama_produk="{{ $umkm->nama_produk }}" foto="{{ $umkm->foto }}" />
                @empty
                    <p class="col-span-full text-center text-[color:var(--ink)]/50 py-16">Belum ada data UMKM.</p>
                @endforelse
            </div>

            <div id="umkmEmpty" class="hidden text-center py-16">
                <p class="text-[color:var(--ink)]/50 text-sm">Tidak ada toko yang cocok dengan pencarian kamu.</p>
            </div>

        </div>
    </section>

    {{-- ============ FOOTER ============ --}}
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

        // ============ PENCARIAN ============
        const umkmSearch = document.getElementById('umkmSearch');
        const umkmReset = document.getElementById('umkmReset');
        const umkmCards = document.querySelectorAll('.umkm-card');
        const umkmCount = document.getElementById('umkmCount');
        const umkmEmpty = document.getElementById('umkmEmpty');
        const totalUmkm = umkmCards.length;

        function filterUmkm() {
            const keyword = umkmSearch.value.trim().toLowerCase();
            let visibleCount = 0;

            umkmCards.forEach(card => {
                const matches = card.dataset.search.includes(keyword);
                card.style.display = matches ? '' : 'none';
                if (matches) visibleCount++;
            });

            umkmCount.textContent = `Menampilkan ${visibleCount} dari ${totalUmkm} toko`;
            umkmEmpty.classList.toggle('hidden', visibleCount !== 0);
            umkmReset.classList.toggle('hidden', keyword.length === 0);
        }

        umkmSearch.addEventListener('input', filterUmkm);

        umkmReset.addEventListener('click', () => {
            umkmSearch.value = '';
            filterUmkm();
            umkmSearch.focus();
        });
    </script>
</body>

</html>
