<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data UMKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Action mengarah ke route update, membawa ID umkm -->
                <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Wajib ada method PUT untuk proses update di Laravel -->
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama UMKM</label>
                        <input type="text" name="nama_umkm" value="{{ $umkm->nama_umkm }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
                        <input type="text" name="nama_produk" value="{{ $umkm->nama_produk }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Menampilkan foto lama dan opsi upload foto baru -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Saat Ini</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto Lama" class="w-32 h-32 object-cover rounded border">
                        </div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto (Opsional)</label>
                        <!-- Hapus kata 'required' karena ganti foto tidak wajib -->
                        <input type="file" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/png, image/jpeg, image/jpg">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Usaha</label>
                        <textarea name="alamat_usaha" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $umkm->alamat_usaha }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" value="{{ $umkm->nama_pemilik }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nomor WhatsApp</label>
                        <input type="number" name="no_wa" value="{{ $umkm->no_wa }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Data
                        </button>
                        <a href="{{ route('dashboard') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">
                            Batal & Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>