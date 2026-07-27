@props([
    'nama_umkm' => '',
    'nama_produk' => '',
    'foto' => null,
    'alamat_usaha' => '',
    'nama_pemilik' => '',
    'no_wa' => '',
])
<div
    class="umkm-card bg-white rounded-2xl overflow-hidden border border-[color:var(--forest)]/10 shadow-sm hover:shadow-lg transition-shadow"
    data-search="{{ strtolower($nama_umkm.' '.$nama_pemilik.' '.$nama_produk) }}"
>
    {{-- Foto --}}
    <div class="h-44 bg-[color:var(--forest)]/10 flex items-center justify-center overflow-hidden">
        @if($foto)
            <img src="{{ asset('storage/'.$foto) }}" alt="{{ $nama_umkm }}" class="w-full h-full object-cover">
        @else
            <span class="text-[color:var(--forest)]/40 font-display text-sm">Foto Toko</span>
        @endif
    </div>

    <div class="p-6">
        {{-- Nama --}}
        <h3 class="font-display font-semibold text-lg text-[color:var(--forest)] mb-2">
            {{ $nama_umkm }}
        </h3>

        {{-- Alamat usaha --}}
        <div class="flex items-start gap-2 text-sm text-[color:var(--ink)]/70 mb-1.5">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-[color:var(--gold)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>{{ $alamat_usaha }}</span>
        </div>

        {{-- Nama pemilik + No WA --}}
        <div class="flex items-start gap-2 text-sm text-[color:var(--ink)]/70 mb-3">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-[color:var(--gold)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>{{ $nama_pemilik }} ({{ $no_wa }})</span>
        </div>

        {{-- Produk yang dijual --}}
        <p class="text-sm text-[color:var(--ink)]/60 leading-relaxed border-t border-[color:var(--forest)]/10 pt-3">
            {{ $nama_produk }}
        </p>
    </div>
</div>