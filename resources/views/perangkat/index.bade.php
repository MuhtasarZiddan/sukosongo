<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Struktur Organisasi Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Daftar Perangkat Desa Sukosongo</h3>
                    <div class="flex gap-2">
                        <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali ke Dashboard</a>
                        <a href="{{ route('perangkat.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Tambah Orang</a>
                    </div>
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
                            <th class="py-2 px-4 text-left">Nama</th>
                            <th class="py-2 px-4 text-left">Jabatan</th>
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

            </div>
        </div>
    </div>
</x-app-layout>