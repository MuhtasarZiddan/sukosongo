@props([
    'nama_umkm' => '',
    'nama_produk' => '',
    'foto' => null,
    'alamat_usaha' => '',
    'nama_pemilik' => '',
    'no_wa' => '',
])

@php
    // Bersihkan nomor WA: hapus semua karakter selain angka (strip, spasi, dll)
    $waClean = preg_replace('/\D/', '', $no_wa);

    // Ganti awalan 0 jadi 62 (format wajib buat wa.me)
    if (str_starts_with($waClean, '0')) {
        $waClean = '62' . substr($waClean, 1);
    }

    $waLink = 'https://wa.me/' . $waClean;
@endphp

<div class="umkm-card bg-white rounded-2xl overflow-hidden border-2 border-transparent shadow-sm hover:shadow-lg hover:border-[color:var(--forest)] transition-all flex flex-col"
    data-search="{{ strtolower($nama_umkm . ' ' . $nama_pemilik . ' ' . $nama_produk) }}">
    {{-- Foto --}}
    <div class="h-36 sm:h-44 bg-[color:var(--forest)]/10 flex items-center justify-center overflow-hidden">
        @if ($foto)
            <img src="{{ asset('storage/' . $foto) }}" alt="{{ $nama_umkm }}" class="w-full h-full object-cover">
        @else
            <span class="text-[color:var(--forest)]/40 font-display text-sm">Foto Toko</span>
        @endif
    </div>

    <div class="p-4 sm:p-6 flex flex-col flex-1">
        {{-- Nama UMKM --}}
        <h3 class="font-display font-semibold text-base sm:text-lg text-[color:var(--forest)] mb-2"> {{ $nama_umkm }}
        </h3>

        {{-- Alamat usaha --}}
        <div class="flex items-start gap-2 text-sm text-[color:var(--ink)]/70 mb-1.5">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-[color:var(--gold)]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>{{ $alamat_usaha }}</span>
        </div>

        {{-- Nama pemilik (tanpa nomor WA di sini lagi) --}}
        <div class="flex items-start gap-2 text-sm text-[color:var(--ink)]/70 mb-3">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-[color:var(--gold)]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>{{ $nama_pemilik }}</span>
        </div>

        {{-- Produk yang dijual — sekarang nempel persis di bawah pemilik --}}
        <div class="mt-3 mb-5">
            <div class="flex items-center gap-2 mb-1">
                <svg class="w-4 h-4 text-[color:var(--forest)]" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 11V5a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2h6m5-5l5 5m0-5l-5 5" />
                </svg>

                <span class="text-sm font-semibold text-[color:var(--forest)]">
                    Produk yang Dijual
                </span>
            </div>

            <p class="ml-6 text-sm text-[color:var(--ink)]/70 leading-relaxed">
                {{ $nama_produk }}
            </p>
        </div>

        {{-- Spacer biar tombol selalu nempel di bawah walau tinggi card beda-beda --}}
        <div class="flex-1"></div>

        {{-- Tombol Hubungi Sekarang --}}
        <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer"
            class="flex items-center justify-center gap-2 w-full bg-[color:var(--forest)] hover:bg-[color:var(--forest-light)] text-white font-semibold text-xs sm:text-sm py-2.5 sm:py-3 rounded-full transition-colors"
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
            <path
                d="M12.004 2.003c-5.514 0-9.997 4.483-9.997 9.997 0 1.762.463 3.483 1.343 4.997l-1.426 5.207 5.33-1.398c1.462.799 3.11 1.219 4.75 1.219h.004c5.514 0 9.997-4.483 9.997-9.997 0-2.669-1.038-5.176-2.925-7.062-1.887-1.887-4.395-2.963-7.076-2.963zm0 18.16h-.003c-1.464 0-2.902-.393-4.156-1.135l-.298-.177-3.108.815.83-3.03-.194-.31c-.808-1.287-1.234-2.774-1.234-4.312 0-4.446 3.618-8.064 8.067-8.064 2.154 0 4.178.84 5.702 2.364 1.524 1.524 2.404 3.548 2.402 5.702 0 4.446-3.618 8.147-8.008 8.147z" />
            </svg>
            Hubungi Sekarang
        </a>
    </div>
</div>
