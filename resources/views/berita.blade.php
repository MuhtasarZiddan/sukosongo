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

        .kategori-btn {
            transition: background-color .25s ease, color .25s ease, border-color .25s ease;
        }

        .kategori-btn.active {
            background: var(--forest);
            color: #fff;
            border-color: var(--forest);
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

    {{-- ============ FILTER & SEARCH ============ --}}
    <section class="bg-[color:var(--cream)] pt-10 pb-4">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="reveal flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
                <div id="kategoriWrapper" class="flex flex-wrap gap-2.5">
                    @php
                        $kategoriList = ['Semua', 'Pemerintahan', 'Kegiatan', 'UMKM', 'Sosial', 'Kesehatan'];
                    @endphp
                    @foreach ($kategoriList as $i => $kat)
                        <button type="button" data-kategori="{{ $kat }}"
                            class="kategori-btn {{ $i === 0 ? 'active' : '' }} px-4 py-2 rounded-full border border-[color:var(--forest)]/20 text-sm font-medium text-[color:var(--forest)]">
                            {{ $kat }}
                        </button>
                    @endforeach
                </div>

                {{-- Search --}}
                <form id="searchForm" onsubmit="return false;" class="relative w-full lg:w-72">
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
                $berita = [
                    [
                        'judul' => 'Musyawarah Desa Bahas Anggaran 2026',
                        'tanggal' => '10 Juli 2026',
                        'kategori' => 'Pemerintahan',
                        'gambar' => asset('images/berita1.jpg'),
                        'ringkasan' =>
                            'Pemerintah Desa bersama BPD melaksanakan musyawarah desa dalam penyusunan anggaran tahun 2026.',
                        'isi' =>
                            'Pemerintah Desa Sukosongo bersama Badan Permusyawaratan Desa (BPD) menggelar musyawarah desa membahas rancangan anggaran pendapatan dan belanja desa tahun 2026. Kegiatan ini dihadiri oleh perangkat desa, tokoh masyarakat, dan perwakilan warga dari empat dusun.<br><br>Dalam musyawarah tersebut dibahas prioritas pembangunan infrastruktur, program pemberdayaan UMKM, serta alokasi dana untuk kegiatan sosial dan kesehatan warga. Kepala Desa menyampaikan bahwa transparansi anggaran menjadi fokus utama agar seluruh warga dapat memantau penggunaan dana desa secara terbuka.',
                    ],
                    [
                        'judul' => 'Gotong Royong Bersih Sungai Dusun Krajan',
                        'tanggal' => '5 Juli 2026',
                        'kategori' => 'Kegiatan',
                        'gambar' => asset('images/berita2.jpg'),
                        'ringkasan' =>
                            'Warga Desa Sukosongo bergotong royong membersihkan aliran sungai untuk menjaga lingkungan tetap bersih.',
                        'isi' =>
                            'Warga Dusun Krajan bersama perangkat desa melaksanakan kegiatan gotong royong membersihkan aliran sungai yang melintasi permukiman. Kegiatan ini rutin dilakukan sebagai upaya menjaga kebersihan lingkungan dan mencegah penyumbatan saluran air saat musim hujan.<br><br>Selain membersihkan sampah dan sedimentasi, warga juga menanam beberapa pohon di sepanjang bantaran sungai untuk mencegah erosi. Kegiatan ini mendapat dukungan penuh dari pemerintah desa dan diharapkan dapat terus berlanjut setiap bulan.',
                    ],
                    [
                        'judul' => 'Pelatihan Digitalisasi UMKM bagi Warga',
                        'tanggal' => '28 Juni 2026',
                        'kategori' => 'UMKM',
                        'gambar' => asset('images/berita3.jpg'),
                        'ringkasan' =>
                            'Pelaku UMKM mendapatkan pelatihan pemasaran digital dan branding produk agar mampu bersaing secara online.',
                        'isi' =>
                            'Sebanyak 30 pelaku UMKM Desa Sukosongo mengikuti pelatihan digitalisasi usaha yang diselenggarakan di balai desa. Pelatihan ini mencakup materi pemasaran melalui media sosial, fotografi produk sederhana, hingga pengelolaan toko online.<br><br>Narasumber dari dinas terkait juga memberikan pendampingan langsung kepada peserta untuk membuat akun bisnis dan memahami dasar-dasar branding produk. Diharapkan pelatihan ini dapat meningkatkan daya saing produk UMKM desa di pasar digital.',
                    ],
                    [
                        'judul' => 'Posyandu Balita Rutin Digelar di Balai Desa',
                        'tanggal' => '20 Juni 2026',
                        'kategori' => 'Kesehatan',
                        'gambar' => asset('images/berita4.jpg'),
                        'ringkasan' =>
                            'Kegiatan posyandu balita berlangsung lancar dengan pemeriksaan rutin tumbuh kembang anak.',
                        'isi' =>
                            'Posyandu balita bulan ini digelar di balai Desa Sukosongo dengan diikuti puluhan ibu dan balita dari seluruh dusun. Kegiatan meliputi penimbangan berat badan, pengukuran tinggi badan, pemberian vitamin, serta konsultasi gizi bersama kader kesehatan.<br><br>Petugas kesehatan dari puskesmas setempat turut hadir memberikan edukasi mengenai pentingnya pemenuhan gizi seimbang pada masa pertumbuhan anak. Kegiatan posyandu akan terus dijadwalkan rutin setiap bulan.',
                    ],
                    [
                        'judul' => 'Santunan Anak Yatim dalam Peringatan Muharram',
                        'tanggal' => '12 Juni 2026',
                        'kategori' => 'Sosial',
                        'gambar' => asset('images/berita5.jpg'),
                        'ringkasan' =>
                            'Peringatan tahun baru Islam diisi dengan santunan anak yatim bersama warga Desa Sukosongo.',
                        'isi' =>
                            'Dalam rangka memperingati Tahun Baru Islam 1 Muharram, Desa Sukosongo mengadakan acara santunan kepada anak yatim piatu yang berada di wilayah desa. Acara berlangsung di masjid desa dan dihadiri oleh perangkat desa, tokoh agama, serta warga sekitar.<br><br>Selain santunan berupa uang tunai dan perlengkapan sekolah, acara ini juga diisi dengan tausiyah keagamaan dan doa bersama. Kegiatan ini menjadi agenda tahunan sebagai bentuk kepedulian sosial warga desa.',
                    ],
                    [
                        'judul' => 'Serah Terima Mahasiswa KKN di Desa Sukosongo',
                        'tanggal' => '1 Juni 2026',
                        'kategori' => 'Kegiatan',
                        'gambar' => asset('images/berita6.jpg'),
                        'ringkasan' =>
                            'Pemerintah desa menerima kedatangan mahasiswa KKN yang akan mengabdi selama satu bulan ke depan.',
                        'isi' =>
                            'Pemerintah Desa Sukosongo secara resmi menerima kedatangan mahasiswa Kuliah Kerja Nyata (KKN) yang akan melaksanakan program pengabdian masyarakat selama satu bulan ke depan. Acara serah terima berlangsung di balai desa dan dihadiri oleh dosen pembimbing lapangan, perangkat desa, serta tokoh masyarakat.<br><br>Mahasiswa KKN akan menjalankan sejumlah program kerja meliputi edukasi digital, pengembangan UMKM, hingga sosialisasi kesehatan masyarakat. Kepala desa berharap kehadiran mahasiswa dapat memberikan manfaat nyata bagi warga.',
                    ],
                    [
                        'judul' => 'Pembangunan Jalan Rabat Beton Dusun Sumbersari',
                        'tanggal' => '25 Mei 2026',
                        'kategori' => 'Pemerintahan',
                        'gambar' => asset('images/berita7.jpg'),
                        'ringkasan' =>
                            'Proyek pembangunan jalan rabat beton mulai dikerjakan untuk mempermudah akses warga.',
                        'isi' =>
                            'Pemerintah Desa Sukosongo memulai proyek pembangunan jalan rabat beton sepanjang 500 meter di Dusun Sumbersari. Proyek ini dibiayai dari Dana Desa tahun anggaran 2026 dan dikerjakan secara swakelola dengan melibatkan tenaga kerja lokal.<br><br>Kepala Desa berharap dengan selesainya jalan ini, mobilitas warga terutama saat musim hujan akan semakin lancar, serta mempermudah distribusi hasil pertanian ke pasar.',
                    ],
                    [
                        'judul' => 'Lomba Voli Antar Dusun Meriahkan HUT RI',
                        'tanggal' => '18 Mei 2026',
                        'kategori' => 'Kegiatan',
                        'gambar' => asset('images/berita8.jpg'),
                        'ringkasan' =>
                            'Turnamen voli antar dusun digelar untuk mempererat silaturahmi warga sekaligus menyambut HUT RI.',
                        'isi' =>
                            'Karang Taruna Desa Sukosongo menyelenggarakan turnamen voli antar dusun yang diikuti oleh empat tim perwakilan dusun. Pertandingan berlangsung selama dua minggu di lapangan desa dan disambut antusias oleh warga.<br><br>Selain sebagai ajang olahraga, kegiatan ini juga menjadi sarana mempererat kebersamaan antarwarga menjelang peringatan Hari Kemerdekaan Republik Indonesia.',
                    ],
                    [
                        'judul' => 'Bantuan Modal Usaha untuk Pelaku UMKM Baru',
                        'tanggal' => '10 Mei 2026',
                        'kategori' => 'UMKM',
                        'gambar' => asset('images/berita9.jpg'),
                        'ringkasan' =>
                            'Sejumlah pelaku UMKM baru menerima bantuan modal usaha dari program pemberdayaan desa.',
                        'isi' =>
                            'Sebanyak 15 pelaku UMKM baru di Desa Sukosongo menerima bantuan modal usaha sebagai bagian dari program pemberdayaan ekonomi desa. Bantuan diberikan dalam bentuk peralatan usaha dan dana stimulan.<br><br>Program ini bertujuan mendorong tumbuhnya usaha rumahan baru serta mengurangi angka pengangguran di wilayah desa.',
                    ],
                    [
                        'judul' => 'Vaksinasi Booster Gratis bagi Lansia',
                        'tanggal' => '2 Mei 2026',
                        'kategori' => 'Kesehatan',
                        'gambar' => asset('images/berita10.jpg'),
                        'ringkasan' => 'Program vaksinasi booster gratis menyasar warga lanjut usia di seluruh dusun.',
                        'isi' =>
                            'Puskesmas bekerja sama dengan Pemerintah Desa Sukosongo mengadakan vaksinasi booster gratis khusus bagi warga lanjut usia. Kegiatan dilaksanakan di balai desa dengan sistem jemput bola bagi lansia yang kesulitan mobilitas.<br><br>Sebanyak 80 lansia berhasil mendapatkan vaksinasi pada hari itu, dan program serupa direncanakan berlanjut untuk menjangkau warga yang belum sempat hadir.',
                    ],
                    [
                        'judul' => 'Penyaluran Zakat Fitrah kepada Warga Kurang Mampu',
                        'tanggal' => '20 April 2026',
                        'kategori' => 'Sosial',
                        'gambar' => asset('images/berita11.jpg'),
                        'ringkasan' =>
                            'Panitia zakat desa menyalurkan zakat fitrah kepada puluhan keluarga kurang mampu.',
                        'isi' =>
                            'Menjelang Hari Raya Idul Fitri, panitia zakat Desa Sukosongo menyalurkan zakat fitrah kepada 60 keluarga kurang mampu di seluruh dusun. Penyaluran dilakukan secara langsung ke rumah-rumah penerima untuk memastikan bantuan tepat sasaran.<br><br>Kegiatan ini merupakan hasil kerja sama antara pemerintah desa, masjid, dan donatur warga yang secara rutin menyalurkan zakatnya melalui panitia desa.',
                    ],
                    [
                        'judul' => 'Pelatihan Tanggap Bencana bagi Perangkat Desa',
                        'tanggal' => '12 April 2026',
                        'kategori' => 'Pemerintahan',
                        'gambar' => asset('images/berita12.jpg'),
                        'ringkasan' => 'Perangkat desa mengikuti pelatihan kesiapsiagaan bencana bersama BPBD.',
                        'isi' =>
                            'Perangkat Desa Sukosongo mengikuti pelatihan tanggap darurat bencana yang diselenggarakan oleh Badan Penanggulangan Bencana Daerah (BPBD). Pelatihan mencakup simulasi evakuasi, pertolongan pertama, dan pembentukan tim siaga bencana desa.<br><br>Kegiatan ini penting mengingat sebagian wilayah desa rawan banjir saat musim hujan, sehingga kesiapsiagaan aparat desa perlu terus ditingkatkan.',
                    ],
                ];
            @endphp

            {{-- Grid diisi & dikelola sepenuhnya lewat JS (renderBerita) agar filter,
                 pencarian, dan pagination bisa saling sinkron tanpa reload halaman --}}
            <div id="beritaGrid" class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5"></div>

            {{-- Ditampilkan kalau hasil filter/pencarian kosong --}}
            <div id="beritaEmpty" class="hidden text-center py-16">
                <p class="font-display text-xl text-[color:var(--forest)] mb-2">Berita tidak ditemukan</p>
                <p class="text-sm text-[color:var(--ink)]/60">Coba ubah kata kunci pencarian atau pilih kategori lain.
                </p>
            </div>

            {{-- ============ PAGINATION (komponen reusable) ============ --}}
            <x-pagination id="beritaPagination" on-page-change="goToPage" />
        </div>
    </section>

    {{-- ============ FOOTER / KONTAK ============ --}}
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
                    <span id="beritaModalKategori"
                        class="absolute top-4 left-4 bg-[color:var(--gold)] text-white text-xs font-semibold px-3 py-1 rounded-full"></span>
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
        // Setiap item disimpan bersama index aslinya (originalIndex) supaya modal
        // tetap membuka berita yang benar walau grid sedang difilter/dipaginasi.
        const beritaData = @json($berita).map((b, i) => ({
            ...b,
            originalIndex: i
        }));

        // ============ STATE ============
        const state = {
            kategori: 'Semua',
            keyword: '',
            page: 1,
            perPage: 8,
        };

        // ============ FILTER ============
        function getFilteredBerita() {
            return beritaData.filter(b => {
                const cocokKategori = state.kategori === 'Semua' || b.kategori === state.kategori;
                const kw = state.keyword.trim().toLowerCase();
                const cocokKeyword = kw === '' ||
                    b.judul.toLowerCase().includes(kw) ||
                    b.ringkasan.toLowerCase().includes(kw);
                return cocokKategori && cocokKeyword;
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
                        <span class="absolute top-3 left-3 bg-[color:var(--gold)] text-white text-[10px] font-semibold px-2.5 py-1 rounded-full">
                            ${b.kategori}
                        </span>
                    </div>

                    <div class="p-4">
                        <p class="text-[11px] uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-1.5">
                            ${b.tanggal}
                        </p>
                        <h3 class="font-display text-base font-semibold text-[color:var(--forest)] group-hover:text-[color:var(--gold)] transition leading-snug">
                            ${b.judul}
                        </h3>
                        <p class="mt-2 text-xs text-[color:var(--ink)]/70 leading-relaxed line-clamp-2">
                            ${b.ringkasan}
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

            // Jaga-jaga kalau halaman aktif jadi tidak valid setelah filter berubah
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

        // ============ PAGINATION (mengisi komponen x-pagination) ============
        function renderPagination(totalPages) {
            const nav = document.getElementById('beritaPagination');
            if (!nav) return;

            const numbersWrap = nav.querySelector('.pagination-numbers');
            const prevBtn = nav.querySelector('.pagination-prev');
            const nextBtn = nav.querySelector('.pagination-next');

            prevBtn.disabled = state.page <= 1;
            nextBtn.disabled = state.page >= totalPages;

            // Sembunyikan seluruh nav kalau cuma ada 1 halaman
            nav.style.display = totalPages <= 1 ? 'none' : 'flex';
            if (totalPages <= 1) return;

            // Susun daftar nomor halaman dengan elipsis kalau halamannya banyak
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

        // ============ FILTER KATEGORI ============
        const kategoriBtns = document.querySelectorAll('.kategori-btn');
        kategoriBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                kategoriBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                state.kategori = btn.dataset.kategori;
                state.page = 1;
                renderBerita();
            });
        });

        // ============ PENCARIAN ============
        const searchInput = document.getElementById('searchInput');
        let searchTimeout;
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                state.keyword = searchInput.value;
                state.page = 1;
                renderBerita();
            }, 300); // debounce biar tidak render tiap ketikan huruf
        });

        // ============ MODAL BERITA ============
        const beritaModal = document.getElementById('beritaModal');
        const beritaBackdrop = document.getElementById('beritaBackdrop');
        const beritaModalBox = document.getElementById('beritaModalBox');

        function openBeritaModal(originalIndex) {
            const b = beritaData.find(item => item.originalIndex === originalIndex);
            if (!b) return;

            document.getElementById('beritaModalImg').src = b.gambar;
            document.getElementById('beritaModalKategori').textContent = b.kategori;
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
