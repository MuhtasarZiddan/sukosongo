<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita - {{ config('app.name', 'Desa Sukosongo') }}</title>
    <meta name="description" content="Kumpulan berita dan kegiatan terbaru Desa Sukosongo.">

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

        .pagination-btn {
            transition: background-color .25s ease, color .25s ease, border-color .25s ease;
        }

        .pagination-btn.active {
            background: var(--forest);
            color: #fff;
            border-color: var(--forest);
        }
    </style>
</head>

<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <x-navbar active="berita" />

    {{-- ============ HERO / BREADCRUMB ============ --}}
    <section class="relative pt-32 pb-16 lg:pt-40 lg:pb-20 bg-[color:var(--forest)] overflow-hidden">
        <div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-[color:var(--gold)]/10 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 w-72 h-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal">
                <p class="text-white/50 text-sm mb-4">
                    <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    <span class="mx-2">/</span>
                    <span class="text-white/80">Berita</span>
                </p>
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-4">Kabar
                    Desa</p>
                <h1
                    class="font-display text-white text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight max-w-2xl">
                    Berita &amp; Kegiatan Desa Sukosongo
                </h1>
                <p class="text-white/70 text-base mt-4 max-w-xl">
                    Informasi terbaru seputar pemerintahan, kegiatan warga, dan perkembangan UMKM di Desa Sukosongo.
                </p>
            </div>
        </div>
    </section>

    {{-- ============ SEARCH ============ --}}
    <section class="bg-[color:var(--cream)] pt-10 pb-4">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal flex justify-end">
                <form id="searchForm" onsubmit="return false;" class="relative w-full lg:w-80">
                    <input type="text" name="q" id="searchInput" autocomplete="off"
                        placeholder="Cari berita..."
                        class="w-full pl-11 pr-4 py-2.5 rounded-full border border-[color:var(--forest)]/20 bg-white text-sm text-[color:var(--ink)] placeholder:text-[color:var(--ink)]/40 focus:outline-none focus:border-[color:var(--forest)]" />
                    <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-[color:var(--ink)]/40"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m1.35-5.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </form>
            </div>
        </div>
    </section>

    {{-- ============ DAFTAR BERITA ============ --}}
    <section class="bg-[color:var(--cream)] py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            @php
                $berita = \App\Models\Berita::where('status', 'publish')
                    ->where('tanggal_publish', '<=', now())
                    ->orderByDesc('tanggal_publish')
                    ->get()
                    ->map(
                        fn($b) => [
                            'judul' => $b->judul,
                            'tanggal' => $b->tanggal_publish->translatedFormat('d F Y'),
                            'status' => $b->status,
                            'gambar' => \Storage::url($b->gambar),
                            'isi' => $b->isi_berita,
                        ],
                    )
                    ->values();
            @endphp

            <div id="beritaGrid" class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5"></div>

            <div id="beritaEmpty" class="hidden text-center py-16">
                <p class="font-display text-xl text-[color:var(--forest)] mb-2">Berita tidak ditemukan</p>
                <p class="text-sm text-[color:var(--ink)]/60">Coba ubah kata kunci pencarian.</p>
            </div>

            {{-- ============ PAGINATION ============ --}}
            <x-pagination id="beritaPagination" on-page-change="goToPage" />
        </div>
    </section>

    {{-- ============ FOOTER ============ --}}
    <x-footer />

    {{-- ============ MODAL BERITA ============ --}}
    <div id="beritaModal" class="fixed inset-0 z-[60] hidden">
        <div id="beritaBackdrop"
            class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

        <div class="relative h-full w-full flex items-center justify-center p-4 lg:p-8">
            <div id="beritaModalBox"
                class="relative bg-white rounded-3xl w-full max-w-2xl max-h-[85vh] overflow-y-auto opacity-0 translate-y-6 scale-95 transition-all duration-300">

                <button onclick="closeBeritaModal()" aria-label="Tutup"
                    class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/90 hover:bg-white shadow-md flex items-center justify-center text-[color:var(--forest)]">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="relative h-64 lg:h-72 overflow-hidden rounded-t-3xl">
                    <img id="beritaModalImg" src="" class="w-full h-full object-cover">
                </div>

                <div class="p-6 lg:p-8">
                    <p id="beritaModalTanggal"
                        class="text-xs uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-3"></p>
                    <h3 id="beritaModalJudul"
                        class="font-display text-2xl lg:text-3xl font-semibold text-[color:var(--forest)] mb-5 leading-snug">
                    </h3>
                    <div id="beritaModalIsi" class="text-sm lg:text-base text-[color:var(--ink)]/75 leading-relaxed">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ============ NAVBAR MOBILE ============
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('iconOpen');
        const iconClose = document.getElementById('iconClose');
        let menuOpen = false;

        menuBtn?.addEventListener('click', () => {
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

        // ============ DATA BERITA ============
        const beritaData = @json($berita).map((b, i) => ({
            ...b,
            originalIndex: i
        }));

        // ============ STATE ============
        const state = {
            keyword: '',
            page: 1,
            perPage: 8,
        };

        // ============ HELPER ============
        function buatRingkasan(html, maxLength = 110) {
            const teks = html.replace(/<br\s*\/?>/gi, ' ').replace(/<[^>]+>/g, '');
            return teks.length > maxLength ? teks.slice(0, maxLength).trim() + '...' : teks;
        }

        // ============ FILTER ============
        function getFilteredBerita() {
            const kw = state.keyword.trim().toLowerCase();
            if (kw === '') return beritaData;

            return beritaData.filter(b => {
                const isiPolos = b.isi.replace(/<[^>]+>/g, '').toLowerCase();
                return b.judul.toLowerCase().includes(kw) || isiPolos.includes(kw);
            });
        }

        // ============ RENDER KARTU BERITA ============
        function cardTemplate(b) {
            return `
                <button
                    type="button"
                    onclick="openBeritaModal(${b.originalIndex})"
                    class="reveal in group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 text-left w-full">

                    <div class="relative overflow-hidden h-40">
                        <img src="${b.gambar}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>

                    <div class="p-4">
                        <p class="text-[11px] uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-1.5">
                            ${b.tanggal}
                        </p>
                        <h3 class="font-display text-base font-semibold text-[color:var(--forest)] group-hover:text-[color:var(--gold)] transition leading-snug">
                            ${b.judul}
                        </h3>
                        <p class="mt-2 text-xs text-[color:var(--ink)]/70 leading-relaxed line-clamp-2">
                            ${buatRingkasan(b.isi)}
                        </p>
                        <div class="mt-3 flex items-center text-xs text-[color:var(--forest)] font-semibold group-hover:text-[color:var(--gold)]">
                            Baca Selengkapnya →
                        </div>
                    </div>
                </button>
            `;
        }

        function renderBerita() {
            const grid = document.getElementById('beritaGrid');
            const empty = document.getElementById('beritaEmpty');

            const filtered = getFilteredBerita();
            const totalPages = Math.max(1, Math.ceil(filtered.length / state.perPage));

            if (state.page > totalPages) state.page = totalPages;
            if (state.page < 1) state.page = 1;

            const start = (state.page - 1) * state.perPage;
            const pageItems = filtered.slice(start, start + state.perPage);

            if (pageItems.length === 0) {
                grid.innerHTML = '';
                grid.classList.add('hidden');
                empty.classList.remove('hidden');
            } else {
                grid.classList.remove('hidden');
                empty.classList.add('hidden');
                grid.innerHTML = pageItems.map(cardTemplate).join('');
            }

            renderPagination(totalPages);
        }

        // ============ PAGINATION ============
        function renderPagination(totalPages) {
            const nav = document.getElementById('beritaPagination');
            if (!nav) return;

            const numbersWrap = nav.querySelector('.pagination-numbers');
            const prevBtn = nav.querySelector('.pagination-prev');
            const nextBtn = nav.querySelector('.pagination-next');

            prevBtn.disabled = state.page <= 1;
            nextBtn.disabled = state.page >= totalPages;

            nav.style.display = totalPages <= 1 ? 'none' : 'flex';
            if (totalPages <= 1) return;

            const pages = [];
            const addPage = (p) => pages.push(p);
            const addEllipsis = () => pages.push('...');

            if (totalPages <= 5) {
                for (let p = 1; p <= totalPages; p++) addPage(p);
            } else {
                addPage(1);
                if (state.page > 3) addEllipsis();

                const startP = Math.max(2, state.page - 1);
                const endP = Math.min(totalPages - 1, state.page + 1);
                for (let p = startP; p <= endP; p++) addPage(p);

                if (state.page < totalPages - 2) addEllipsis();
                addPage(totalPages);
            }

            numbersWrap.innerHTML = pages.map(p => {
                if (p === '...') {
                    return `<span class="w-10 h-10 flex items-center justify-center text-[color:var(--ink)]/40 text-sm">…</span>`;
                }
                const isActive = p === state.page;
                return `
                    <button
                        type="button"
                        onclick="goToPage(${p})"
                        class="pagination-btn ${isActive ? 'active' : ''} w-10 h-10 rounded-full border border-[color:var(--forest)]/20 font-semibold text-sm text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white">
                        ${p}
                    </button>
                `;
            }).join('');
        }

        function goToPage(page) {
            state.page = page;
            renderBerita();
            document.getElementById('beritaGrid').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // ============ PENCARIAN ============
        const searchInput = document.getElementById('searchInput');
        let searchTimeout;
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                state.keyword = searchInput.value;
                state.page = 1;
                renderBerita();
            }, 300);
        });

        // ============ MODAL BERITA ============
        const beritaModal = document.getElementById('beritaModal');
        const beritaBackdrop = document.getElementById('beritaBackdrop');
        const beritaModalBox = document.getElementById('beritaModalBox');

        function openBeritaModal(originalIndex) {
            const b = beritaData.find(item => item.originalIndex === originalIndex);
            if (!b) return;

            document.getElementById('beritaModalImg').src = b.gambar;
            document.getElementById('beritaModalTanggal').textContent = b.tanggal;
            document.getElementById('beritaModalJudul').textContent = b.judul;
            document.getElementById('beritaModalIsi').innerHTML = b.isi;

            beritaModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            requestAnimationFrame(() => {
                beritaBackdrop.classList.remove('opacity-0');
                beritaModalBox.classList.remove('opacity-0', 'translate-y-6', 'scale-95');
            });
        }

        function closeBeritaModal() {
            beritaBackdrop.classList.add('opacity-0');
            beritaModalBox.classList.add('opacity-0', 'translate-y-6', 'scale-95');
            document.body.style.overflow = '';

            setTimeout(() => {
                beritaModal.classList.add('hidden');
            }, 300);
        }

        beritaBackdrop.addEventListener('click', closeBeritaModal);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !beritaModal.classList.contains('hidden')) {
                closeBeritaModal();
            }
        });

        // ============ INIT ============
        renderBerita();
    </script>
</body>

</html>
