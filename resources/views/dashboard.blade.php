<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Notifikasi Sukses Global -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ================= BAGIAN 1: TABEL UMKM ================= -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Daftar UMKM Desa Sukosongo</h3>
                    <a href="{{ route('umkm.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah
                    </a>
                </div>

                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 text-left">Foto</th>
                            <th class="py-2 px-4 text-left">UMKM & Produk</th>
                            <th class="py-2 px-4 text-left">Pemilik & WA</th>
                            <th class="py-2 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($umkms as $u)
                        <tr class="border-b">
                            <td class="py-2 px-4">
                                <img src="{{ asset('storage/' . $u->foto) }}" alt="Foto" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="py-2 px-4">
                                <strong>{{ $u->nama_umkm }}</strong><br>
                                <span class="text-sm text-gray-500">{{ $u->nama_produk }}</span>
                            </td>
                            <td class="py-2 px-4">
                                {{ $u->nama_pemilik }}<br>
                                <a href="https://wa.me/{{ $u->no_wa }}" target="_blank" class="text-sm text-green-600 hover:underline">{{ $u->no_wa }}</a>
                            </td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="{{ route('umkm.edit', $u->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm mt-2">Edit</a>
                                <form action="{{ route('umkm.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="mt-6">
                        {{ $umkms->links('components.pagination') }}
                    </div>
            </div>

            <!-- ================= BAGIAN 2: TABEL PERANGKAT DESA ================= -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Perangkat Desa</h3>
                    <a href="{{ route('perangkat.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah
                    </a>
                </div>

                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 text-left">Foto</th>
                            <th class="py-2 px-4 text-left">Nama</th>
                            <th class="py-2 px-4 text-left">Jabatan</th>
                            <th class="py-2 px-4 text-left">Masa Jabatan</th>
                            <th class="py-2 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perangkat as $p)
                        <tr class="border-b">
                            <td class="py-2 px-4">
                                <img src="{{ asset('storage/' . $p->foto) }}" class="w-16 h-16 object-cover rounded-full border">
                            </td>
                            <td class="py-2 px-4 font-bold">{{ $p->nama }}</td>
                            <td class="py-2 px-4">{{ $p->jabatan }}</td>
                            <td class="py-2 px-4 text-sm text-gray-600">
    {{ \Carbon\Carbon::parse($p->tanggal_menjabat)->translatedFormat('d M Y') }} - <br>
    {{ \Carbon\Carbon::parse($p->tanggal_akhir_menjabat)->translatedFormat('d M Y') }}
</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="{{ route('perangkat.edit', $p->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm mt-2">Edit</a>
                                <form action="{{ route('perangkat.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="mt-6">
                        {{ $perangkat->links('components.pagination') }}
                    </div>
            </div>
           <!-- ================= BAGIAN 3: TABEL BERITA ================= -->
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Manajemen Berita Desa</h3>
                    <a href="{{ route('berita.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tulis Berita
                    </a>
                </div>

                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 text-left">Gambar</th>
                            <th class="py-2 px-4 text-left">Judul & Penulis</th>
                            <th class="py-2 px-4 text-left">Status & Tanggal Publish</th>
                            <th class="py-2 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berita as $b)
                        <tr class="border-b">
                            <td class="py-2 px-4">
                                <img src="{{ asset('storage/' . $b->gambar) }}" class="w-20 h-16 object-cover rounded border">
                            </td>
                            <td class="py-2 px-4">
                                <strong>{{ $b->judul }}</strong><br>
                                <span class="text-sm text-gray-500">Oleh: {{ $b->penulis }}</span>
                            </td>
                            <td class="py-2 px-4 text-sm">
                                <span class="{{ $b->status == 'publish' ? 'text-green-600 font-bold' : 'text-gray-500 font-bold' }}">
                                    {{ strtoupper($b->status) }}
                                </span><br>
                                {{ \Carbon\Carbon::parse($b->tanggal_publish)->translatedFormat('d M Y H:i') }}
                            </td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="{{ route('berita.edit', $b->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm mt-2">Edit</a>
                                <form action="{{ route('berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>