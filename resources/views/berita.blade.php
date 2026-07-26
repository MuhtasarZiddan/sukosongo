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
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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

        .nav-link{ position:relative; }
        .nav-link::after{
            content:''; position:absolute; left:0; bottom:-4px; height:2px; width:0%;
            background: var(--gold); transition: width .25s ease;
        }
        .nav-link:hover::after{ width:100%; }

        .reveal{ opacity:0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.in{ opacity:1; transform: translateY(0); }

        #mobileMenu{ transition: max-height .35s ease; overflow:hidden; }

        .kategori-btn{ transition: background-color .25s ease, color .25s ease, border-color .25s ease; }
        .kategori-btn.active{
            background: var(--forest);
            color: #fff;
            border-color: var(--forest);
        }

        .pagination-btn{ transition: background-color .25s ease, color .25s ease, border-color .25s ease; }
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
                <p class="uppercase tracking-[0.2em] text-[color:var(--gold-light)] text-xs font-semibold mb-4">Kabar Desa</p>
                <h1 class="font-display text-white text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight max-w-2xl">
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
                <div class="flex flex-wrap gap-2.5">
                    @php
                        $kategoriList = ['Semua', 'Pemerintahan', 'Kegiatan', 'UMKM', 'Sosial', 'Kesehatan'];
                    @endphp
                    @foreach ($kategoriList as $i => $kat)
                        <button class="kategori-btn {{ $i === 0 ? 'active' : '' }} px-4 py-2 rounded-full border border-[color:var(--forest)]/20 text-sm font-medium text-[color:var(--forest)]">
                            {{ $kat }}
                        </button>
                    @endforeach
                </div>

                {{-- Search --}}
                <form action="/berita" method="GET" class="relative w-full lg:w-72">
                    <input
                        type="text"
                        name="q"
                        placeholder="Cari berita..."
                        class="w-full pl-11 pr-4 py-2.5 rounded-full border border-[color:var(--forest)]/20 bg-white text-sm text-[color:var(--ink)] placeholder:text-[color:var(--ink)]/40 focus:outline-none focus:border-[color:var(--forest)]"
                    />
                    <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-[color:var(--ink)]/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.35-5.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
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
                        'ringkasan' => 'Pemerintah Desa bersama BPD melaksanakan musyawarah desa dalam penyusunan anggaran tahun 2026.',
                        'isi' => 'Pemerintah Desa Sukosongo bersama Badan Permusyawaratan Desa (BPD) menggelar musyawarah desa membahas rancangan anggaran pendapatan dan belanja desa tahun 2026. Kegiatan ini dihadiri oleh perangkat desa, tokoh masyarakat, dan perwakilan warga dari empat dusun.<br><br>Dalam musyawarah tersebut dibahas prioritas pembangunan infrastruktur, program pemberdayaan UMKM, serta alokasi dana untuk kegiatan sosial dan kesehatan warga. Kepala Desa menyampaikan bahwa transparansi anggaran menjadi fokus utama agar seluruh warga dapat memantau penggunaan dana desa secara terbuka.',
                    ],
                    [
                        'judul' => 'Gotong Royong Bersih Sungai Dusun Krajan',
                        'tanggal' => '5 Juli 2026',
                        'kategori' => 'Kegiatan',
                        'gambar' => asset('images/berita2.jpg'),
                        'ringkasan' => 'Warga Desa Sukosongo bergotong royong membersihkan aliran sungai untuk menjaga lingkungan tetap bersih.',
                        'isi' => 'Warga Dusun Krajan bersama perangkat desa melaksanakan kegiatan gotong royong membersihkan aliran sungai yang melintasi permukiman. Kegiatan ini rutin dilakukan sebagai upaya menjaga kebersihan lingkungan dan mencegah penyumbatan saluran air saat musim hujan.<br><br>Selain membersihkan sampah dan sedimentasi, warga juga menanam beberapa pohon di sepanjang bantaran sungai untuk mencegah erosi. Kegiatan ini mendapat dukungan penuh dari pemerintah desa dan diharapkan dapat terus berlanjut setiap bulan.',
                    ],
                    [
                        'judul' => 'Pelatihan Digitalisasi UMKM bagi Warga',
                        'tanggal' => '28 Juni 2026',
                        'kategori' => 'UMKM',
                        'gambar' => asset('images/berita3.jpg'),
                        'ringkasan' => 'Pelaku UMKM mendapatkan pelatihan pemasaran digital dan branding produk agar mampu bersaing secara online.',
                        'isi' => 'Sebanyak 30 pelaku UMKM Desa Sukosongo mengikuti pelatihan digitalisasi usaha yang diselenggarakan di balai desa. Pelatihan ini mencakup materi pemasaran melalui media sosial, fotografi produk sederhana, hingga pengelolaan toko online.<br><br>Narasumber dari dinas terkait juga memberikan pendampingan langsung kepada peserta untuk membuat akun bisnis dan memahami dasar-dasar branding produk. Diharapkan pelatihan ini dapat meningkatkan daya saing produk UMKM desa di pasar digital.',
                    ],
                    [
                        'judul' => 'Posyandu Balita Rutin Digelar di Balai Desa',
                        'tanggal' => '20 Juni 2026',
                        'kategori' => 'Kesehatan',
                        'gambar' => asset('images/berita4.jpg'),
                        'ringkasan' => 'Kegiatan posyandu balita berlangsung lancar dengan pemeriksaan rutin tumbuh kembang anak.',
                        'isi' => 'Posyandu balita bulan ini digelar di balai Desa Sukosongo dengan diikuti puluhan ibu dan balita dari seluruh dusun. Kegiatan meliputi penimbangan berat badan, pengukuran tinggi badan, pemberian vitamin, serta konsultasi gizi bersama kader kesehatan.<br><br>Petugas kesehatan dari puskesmas setempat turut hadir memberikan edukasi mengenai pentingnya pemenuhan gizi seimbang pada masa pertumbuhan anak. Kegiatan posyandu akan terus dijadwalkan rutin setiap bulan.',
                    ],
                    [
                        'judul' => 'Santunan Anak Yatim dalam Peringatan Muharram',
                        'tanggal' => '12 Juni 2026',
                        'kategori' => 'Sosial',
                        'gambar' => asset('images/berita5.jpg'),
                        'ringkasan' => 'Peringatan tahun baru Islam diisi dengan santunan anak yatim bersama warga Desa Sukosongo.',
                        'isi' => 'Dalam rangka memperingati Tahun Baru Islam 1 Muharram, Desa Sukosongo mengadakan acara santunan kepada anak yatim piatu yang berada di wilayah desa. Acara berlangsung di masjid desa dan dihadiri oleh perangkat desa, tokoh agama, serta warga sekitar.<br><br>Selain santunan berupa uang tunai dan perlengkapan sekolah, acara ini juga diisi dengan tausiyah keagamaan dan doa bersama. Kegiatan ini menjadi agenda tahunan sebagai bentuk kepedulian sosial warga desa.',
                    ],
                    [
                        'judul' => 'Serah Terima Mahasiswa KKN di Desa Sukosongo',
                        'tanggal' => '1 Juni 2026',
                        'kategori' => 'Kegiatan',
                        'gambar' => asset('images/berita6.jpg'),
                        'ringkasan' => 'Pemerintah desa menerima kedatangan mahasiswa KKN yang akan mengabdi selama satu bulan ke depan.',
                        'isi' => 'Pemerintah Desa Sukosongo secara resmi menerima kedatangan mahasiswa Kuliah Kerja Nyata (KKN) yang akan melaksanakan program pengabdian masyarakat selama satu bulan ke depan. Acara serah terima berlangsung di balai desa dan dihadiri oleh dosen pembimbing lapangan, perangkat desa, serta tokoh masyarakat.<br><br>Mahasiswa KKN akan menjalankan sejumlah program kerja meliputi edukasi digital, pengembangan UMKM, hingga sosialisasi kesehatan masyarakat. Kepala desa berharap kehadiran mahasiswa dapat memberikan manfaat nyata bagi warga.',
                    ],
                ];
            @endphp

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($berita as $i => $b)
                    <button
                        type="button"
                        onclick="openBeritaModal({{ $i }})"
                        class="reveal group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300 text-left w-full">

                        <div class="relative overflow-hidden h-56">
                            <img src="{{ $b['gambar'] }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span class="absolute top-4 left-4 bg-[color:var(--gold)] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $b['kategori'] }}
                            </span>
                        </div>

                        <div class="p-6">
                            <p class="text-xs uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-2">
                                {{ $b['tanggal'] }}
                            </p>
                            <h3 class="font-display text-xl font-semibold text-[color:var(--forest)] group-hover:text-[color:var(--gold)] transition">
                                {{ $b['judul'] }}
                            </h3>
                            <p class="mt-3 text-sm text-[color:var(--ink)]/70 leading-relaxed line-clamp-2">
                                {{ $b['ringkasan'] }}
                            </p>
                            <div class="mt-5 flex items-center text-[color:var(--forest)] font-semibold group-hover:text-[color:var(--gold)]">
                                Baca Selengkapnya →
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>

            {{-- ============ PAGINATION ============ --}}
            <div class="reveal flex items-center justify-center gap-2 mt-16">
                <button class="pagination-btn w-10 h-10 rounded-full border border-[color:var(--forest)]/20 flex items-center justify-center text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </button>

                <button class="pagination-btn w-10 h-10 rounded-full bg-[color:var(--forest)] text-white font-semibold text-sm">1</button>
                <button class="pagination-btn w-10 h-10 rounded-full border border-[color:var(--forest)]/20 text-[color:var(--forest)] font-semibold text-sm hover:bg-[color:var(--forest)] hover:text-white">2</button>
                <button class="pagination-btn w-10 h-10 rounded-full border border-[color:var(--forest)]/20 text-[color:var(--forest)] font-semibold text-sm hover:bg-[color:var(--forest)] hover:text-white">3</button>

                <button class="pagination-btn w-10 h-10 rounded-full border border-[color:var(--forest)]/20 flex items-center justify-center text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- ============ FOOTER / KONTAK ============ --}}
    <x-footer />

    {{-- ============ MODAL BERITA ============ --}}
    <div id="beritaModal" class="fixed inset-0 z-[60] hidden">
        <div id="beritaBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

        <div class="relative h-full w-full flex items-center justify-center p-4 lg:p-8">
            <div id="beritaModalBox"
                 class="relative bg-white rounded-3xl w-full max-w-2xl max-h-[85vh] overflow-y-auto opacity-0 translate-y-6 scale-95 transition-all duration-300">

                <button
                    onclick="closeBeritaModal()"
                    aria-label="Tutup"
                    class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/90 hover:bg-white shadow-md flex items-center justify-center text-[color:var(--forest)]">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="relative h-64 lg:h-72 overflow-hidden rounded-t-3xl">
                    <img id="beritaModalImg" src="" class="w-full h-full object-cover">
                    <span id="beritaModalKategori" class="absolute top-4 left-4 bg-[color:var(--gold)] text-white text-xs font-semibold px-3 py-1 rounded-full"></span>
                </div>

                <div class="p-6 lg:p-8">
                    <p id="beritaModalTanggal" class="text-xs uppercase tracking-wider text-[color:var(--brown)] font-semibold mb-3"></p>
                    <h3 id="beritaModalJudul" class="font-display text-2xl lg:text-3xl font-semibold text-[color:var(--forest)] mb-5 leading-snug"></h3>
                    <div id="beritaModalIsi" class="text-sm lg:text-base text-[color:var(--ink)]/75 leading-relaxed"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        const kategoriBtns = document.querySelectorAll('.kategori-btn');
        kategoriBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                kategoriBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // ============ MODAL BERITA ============
        const beritaData = @json($berita);

        const beritaModal = document.getElementById('beritaModal');
        const beritaBackdrop = document.getElementById('beritaBackdrop');
        const beritaModalBox = document.getElementById('beritaModalBox');

        function openBeritaModal(index) {
            const b = beritaData[index];
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
    </script>
</body>
</html>