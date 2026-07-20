<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Perangkat Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $perangkat->nama }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $perangkat->jabatan }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4 flex gap-4">
     <div class="w-1/2">
         <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai Menjabat</label>
         <input type="date" name="tanggal_menjabat" value="{{ $perangkat->tanggal_menjabat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
     </div>
     <div class="w-1/2">
         <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Berakhir Menjabat</label>
         <input type="date" name="tanggal_akhir_menjabat" value="{{ $perangkat->tanggal_akhir_menjabat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
     </div>
 </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto Profil (Biarkan kosong jika tidak diganti)</label>
                        <input type="file" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/png, image/jpeg, image/jpg">
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            Update Data
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-800 font-bold">Batal</a>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>