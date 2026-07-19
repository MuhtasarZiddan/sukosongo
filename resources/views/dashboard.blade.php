<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Daftar UMKM Desa Sukosongo</h3>
                    <a href="{{ route('umkm.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah UMKM
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

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
                                <a href="{{ route('umkm.edit', $u->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('umkm.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
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