<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMKM — Desa Sukosongo</title>
    <meta name="description" content="Katalog UMKM Desa Sukosongo: temukan toko, produk, dan pelaku usaha lokal.">

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
    </style>
</head>
<body class="antialiased">

    {{-- ============ NAVBAR ============ --}}
    <header class="bg-[color:var(--forest)] sticky top-0 z-50 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="flex items-center gap-3 shrink-0">
                    <div class="w-10 h-10 rounded-full bg-[color:var(--gold)] flex items-center justify-center font-display font-semibold text-[color:var(--forest)] text-sm">
                        DS
                    </div>
                    <div class="leading-tight">
                        <p class="font-display text-white text-base font-semibold">Desa Sukosongo</p>
                        <p class="text-[11px] text-white/60 tracking-wide uppercase">Kabupaten &middot; Provinsi</p>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-white/85">
                    <a href="/#beranda" class="nav-link">Beranda</a>
                    <a href="/profil-desa" class="nav-link">Profil Desa</a>
                    <a href="/berita" class="nav-link">Berita</a>
                    <a href="/umkm" class="nav-link text-[color:var(--gold-light)]">UMKM</a>
                    <a href="/wisata" class="nav-link">Wisata</a>
                    <a href="/#kontak" class="nav-link">Kontak</a>
                </nav>
            </div>
        </div>
    </header>

    {{-- ============ KATALOG UMKM ============ --}}
    <section id="umkm-katalog" class="bg-[color:var(--cream)] py-20 lg:py-28 min-h-screen">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            {{-- Judul --}}
            <div class="mb-10">
                <p class="uppercase tracking-[0.2em] text-[color:var(--brown)] text-xs font-semibold mb-3">Ekonomi Desa</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-[color:var(--forest)]">Katalog UMKM Desa Sukosongo</h2>
                <p id="umkmCount" class="text-sm text-[color:var(--ink)]/60 mt-2">Menampilkan 6 dari 6 toko</p>
            </div>

            {{-- Search bar --}}
            <div class="flex flex-col sm:flex-row gap-3 mb-10">
                <div class="relative flex-1">
                    <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-[color:var(--forest)]/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input
                        type="text"
                        id="umkmSearch"
                        placeholder="Cari nama toko, pemilik, atau produk..."
                        class="w-full pl-11 pr-4 py-3 rounded-full border border-[color:var(--forest)]/15 bg-white text-sm text-[color:var(--ink)] placeholder:text-[color:var(--ink)]/40 focus:outline-none focus:ring-2 focus:ring-[color:var(--gold)]/50"
                    >
                </div>
                <button
                    id="umkmReset"
                    class="hidden sm:flex items-center gap-2 px-5 py-3 rounded-full border border-[color:var(--forest)]/15 bg-white text-sm font-semibold text-[color:var(--forest)] hover:bg-[color:var(--forest)]/5 transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Reset
                </button>
            </div>

            {{-- Grid card UMKM --}}
            <div id="umkmGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $umkmList = [
                        [
                            'nama_toko' => 'Warung Bu Sri',
                            'alamat'    => 'Dusun Krajan RT 02/RW 01',
                            'pemilik'   => 'Sri Wahyuni',
                            'telp'      => '0812-3456-7890',
                            'produk'    => 'Sayur mayur, bumbu dapur, sembako',
                            'gambar'    => null,
                        ],
                        [
                            'nama_toko' => 'Kripik Singkong Barokah',
                            'alamat'    => 'Dusun Sukosari RT 04/RW 02',
                            'pemilik'   => 'Suparjo',
                            'telp'      => '0813-2211-4455',
                            'produk'    => 'Keripik singkong, keripik pisang',
                            'gambar'    => null,
                        ],
                        [
                            'nama_toko' => 'Konveksi Melati',
                            'alamat'    => 'Dusun Tegalrejo RT 01/RW 03',
                            'pemilik'   => 'Melati Kusuma',
                            'telp'      => '0857-9988-1122',
                            'produk'    => 'Baju seragam, jasa jahit',
                            'gambar'    => null,
                        ],
                        [
                            'nama_toko' => 'Ternak Lele Makmur',
                            'alamat'    => 'Dusun Sumberasri RT 03/RW 01',
                            'pemilik'   => 'Bambang Sutrisno',
                            'telp'      => '0821-3344-5566',
                            'produk'    => 'Bibit lele, lele konsumsi',
                            'gambar'    => null,
                        ],
                        [
                            'nama_toko' => 'Toko Kelontong Jaya',
                            'alamat'    => 'Dusun Krajan RT 05/RW 01',
                            'pemilik'   => 'Joko Santoso',
                            'telp'      => '0878-1234-9900',
                            'produk'    => 'Sembako, alat tulis, pulsa',
                            'gambar'    => null,
                        ],
                        [
                            'nama_toko' => 'Batik Sukosongo',
                            'alamat'    => 'Dusun Sukosari RT 02/RW 02',
                            'pemilik'   => 'Ratna Dewi',
                            'telp'      => '0812-6677-8899',
                            'produk'    => 'Kain batik tulis, batik cap',
                            'gambar'    => null,
                        ],
                    ];
                @endphp

                @foreach ($umkmList as $umkm)
                    <x-umkm-card
                        nama_toko="{{ $umkm['nama_toko'] }}"
                        alamat="{{ $umkm['alamat'] }}"
                        pemilik="{{ $umkm['pemilik'] }}"
                        telp="{{ $umkm['telp'] }}"
                        produk="{{ $umkm['produk'] }}"
                        gambar="{{ $umkm['gambar'] }}"
                    />
                @endforeach
            </div>

            {{-- Pesan kalau hasil pencarian kosong --}}
            <div id="umkmEmpty" class="hidden text-center py-16">
                <p class="text-[color:var(--ink)]/50 text-sm">Tidak ada toko yang cocok dengan pencarian kamu.</p>
            </div>

        </div>
    </section>

    {{-- ============ FOOTER ============ --}}
    <footer class="bg-[color:var(--forest)] text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <p class="text-center text-white/40 text-xs">© {{ date('Y') }} Desa Sukosongo. Seluruh hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        const umkmSearch = document.getElementById('umkmSearch');
        const umkmReset  = document.getElementById('umkmReset');
        const umkmCards  = document.querySelectorAll('.umkm-card');
        const umkmCount  = document.getElementById('umkmCount');
        const umkmEmpty  = document.getElementById('umkmEmpty');
        const totalUmkm  = umkmCards.length;

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