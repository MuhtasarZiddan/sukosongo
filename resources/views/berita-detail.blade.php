<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $berita->judul }} - {{ config('app.name', 'Desa Sukosongo') }}</title>

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
    </style>
</head>

<body class="antialiased">
    {{-- Hero singkat --}}
    <section class="relative pt-32 pb-14 lg:pt-40 lg:pb-16 bg-[color:var(--forest)] overflow-hidden">
        <div class="relative max-w-4xl mx-auto px-5 lg:px-8">
            <p class="text-white/50 text-sm mb-4">
                <a href="/" class="hover:text-white transition-colors">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ route('berita.page') }}" class="hover:text-white transition-colors">Berita</a>
                <span class="mx-2">/</span>
                <span class="text-white/80">{{ $berita->judul }}</span>
            </p>
            <h1 class="font-display text-white text-2xl sm:text-3xl lg:text-4xl font-semibold leading-tight">
                {{ $berita->judul }}
            </h1>
            <p class="text-white/60 text-sm mt-4">
                {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d F Y') }}
                &middot; oleh {{ $berita->penulis }}
            </p>
        </div>
    </section>

    {{-- Isi berita --}}
    <section class="bg-[color:var(--cream)] py-14 lg:py-20">
        <div class="max-w-4xl mx-auto px-5 lg:px-8">

            <div class="rounded-3xl overflow-hidden mb-10 h-72 lg:h-96">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                    class="w-full h-full object-cover">
            </div>

            <div class="prose max-w-none text-[color:var(--ink)]/80 leading-relaxed">
                {!! $berita->isi_berita !!}
            </div>

            <div class="mt-12">
                <a href="{{ route('berita.page') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-[color:var(--forest)] px-5 py-2.5 text-sm font-semibold text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white transition">
                    ← Kembali ke Semua Berita
                </a>
            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>
