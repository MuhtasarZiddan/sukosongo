<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F3D2B] leading-tight">
            {{ __('Dashboard Admin Desa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Notifikasi Sukses Global -->
            @if (session('success'))
                <div
                    class="bg-[#3B6B4A]/10 border border-[#3B6B4A]/30 text-[#1F3D2B] px-4 py-3 rounded-xl mb-4 text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ================= BAGIAN 1: TABEL UMKM ================= -->
            <div class="bg-white overflow-x-auto pb-4 shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#1F3D2B]">Daftar UMKM Desa Sukosongo</h3>
                    <a href="{{ route('umkm.create') }}"
                        class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white text-sm font-semibold py-2 px-4 rounded-full transition-colors">
                        + Tambah
                    </a>
                </div>

                <div class="overflow-x-auto pb-4">
                    <table class="min-w-full bg-white whitespace-nowrap">
                        <thead>
                            <tr class="bg-[#FAF6EC] border-b border-[#1F3D2B]/10">
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Foto</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    UMKM & Produk</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Pemilik & WA</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($umkms as $u)
                                <tr class="border-b border-[#1F3D2B]/10 hover:bg-[#FAF6EC]/60 transition-colors">
                                    <td class="py-3 px-4">
                                        <img src="{{ asset('storage/' . $u->foto) }}" alt="Foto"
                                            class="w-16 h-16 object-cover rounded-xl border border-[#1F3D2B]/10">
                                    </td>
                                    <td class="py-3 px-4">
                                        <strong class="text-[#1F3D2B]">{{ $u->nama_umkm }}</strong><br>
                                        <span class="text-sm text-[#23281F]/50">{{ $u->nama_produk }}</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="text-[#23281F]">{{ $u->nama_pemilik }}</span><br>
                                        <a href="https://wa.me/{{ $u->no_wa }}" target="_blank"
                                            class="text-sm text-[#3B6B4A] hover:underline">{{ $u->no_wa }}</a>
                                    </td>
                                    <td class="py-3 px-4 flex gap-2">
                                        <a href="{{ route('umkm.edit', $u->id) }}"
                                            class="border border-[#C99A2E] text-[#C99A2E] hover:bg-[#C99A2E] hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold mt-2 transition-colors">Edit</a>
                                        <form action="{{ route('umkm.destroy', $u->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?');" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="border border-red-400 text-red-500 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold transition-colors">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $umkms->links('components.pagination') }}
                </div>
            </div>

            <!-- ================= BAGIAN 2: TABEL PERANGKAT DESA ================= -->
            <div class="bg-white overflow-x-auto pb-4 shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#1F3D2B]">Perangkat Desa</h3>
                    <a href="{{ route('perangkat.create') }}"
                        class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white text-sm font-semibold py-2 px-4 rounded-full transition-colors">
                        + Tambah
                    </a>
                </div>

                <div class="overflow-x-auto pb-4">
                    <table class="min-w-full bg-white whitespace-nowrap">
                        <thead>
                            <tr class="bg-[#FAF6EC] border-b border-[#1F3D2B]/10">
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Foto</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Nama</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Jabatan</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Masa Jabatan</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perangkat as $p)
                                <tr class="border-b border-[#1F3D2B]/10 hover:bg-[#FAF6EC]/60 transition-colors">
                                    <td class="py-3 px-4">
                                        <img src="{{ asset('storage/' . $p->foto) }}"
                                            class="w-16 h-16 object-cover rounded-full border border-[#1F3D2B]/10">
                                    </td>
                                    <td class="py-3 px-4 font-bold text-[#1F3D2B]">{{ $p->nama }}</td>
                                    <td class="py-3 px-4 text-[#23281F]">{{ $p->jabatan }}</td>
                                    <td class="py-3 px-4 text-sm text-[#23281F]/60">
                                        {{ $p->tanggal_menjabat ? \Carbon\Carbon::parse($p->tanggal_menjabat)->translatedFormat('d M Y') : '-' }}
                                        <br> s/d <br>
                                        {{ $p->tanggal_akhir_menjabat ? \Carbon\Carbon::parse($p->tanggal_akhir_menjabat)->translatedFormat('d M Y') : '-' }}
                                    </td>
                                    <td class="py-3 px-4 flex gap-2">
                                        <a href="{{ route('perangkat.edit', $p->id) }}"
                                            class="border border-[#C99A2E] text-[#C99A2E] hover:bg-[#C99A2E] hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold mt-2 transition-colors">Edit</a>
                                        <form action="{{ route('perangkat.destroy', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?');" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="border border-red-400 text-red-500 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold transition-colors">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $perangkat->links('components.pagination') }}
                </div>
            </div>

            <!-- ================= BAGIAN 3: TABEL BERITA ================= -->
            <div class="bg-white overflow-x-auto pb-4 shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#1F3D2B]">Manajemen Berita Desa</h3>
                    <a href="{{ route('berita.create') }}"
                        class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white text-sm font-semibold py-2 px-4 rounded-full transition-colors">
                        + Tulis Berita
                    </a>
                </div>

                <div class="overflow-x-auto pb-4">
                    <table class="min-w-full bg-white whitespace-nowrap">
                        <thead>
                            <tr class="bg-[#FAF6EC] border-b border-[#1F3D2B]/10">
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Gambar</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Judul & Penulis</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Status & Tanggal Publish</th>
                                <th
                                    class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $b)
                                <tr class="border-b border-[#1F3D2B]/10 hover:bg-[#FAF6EC]/60 transition-colors">
                                    <td class="py-3 px-4">
                                        <img src="{{ asset('storage/' . ($b->gambar[0] ?? 'default.jpg')) }}"
                                            class="w-20 h-16 object-cover rounded-xl border border-[#1F3D2B]/10">
                                    </td>
                                    <td class="py-3 px-4">
                                        <strong class="text-[#1F3D2B]">{{ $b->judul }}</strong><br>
                                        <span class="text-sm text-[#23281F]/50">Oleh: {{ $b->penulis }}</span>
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        <span
                                            class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold
                                        {{ $b->status == 'publish' ? 'bg-[#3B6B4A]/10 text-[#3B6B4A]' : 'bg-[#23281F]/10 text-[#23281F]/60' }}">
                                            {{ strtoupper($b->status) }}
                                        </span><br>
                                        <span class="text-[#23281F]/60 text-xs mt-1 inline-block">
                                            {{ \Carbon\Carbon::parse($b->tanggal_publish)->translatedFormat('d M Y H:i') }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 flex gap-2">
                                        <a href="{{ route('berita.edit', $b->id) }}"
                                            class="border border-[#C99A2E] text-[#C99A2E] hover:bg-[#C99A2E] hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold mt-2 transition-colors">Edit</a>
                                        <form action="{{ route('berita.destroy', $b->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?');"
                                            class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="border border-red-400 text-red-500 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold transition-colors">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
