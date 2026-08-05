<x-app-layout>
    <x-slot name="header">
    <x-admin-header
        title="Tambah Perangkat Desa"
        description="Tambahkan informasi perangkat desa yang akan ditampilkan"
    />
    </x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">
                
                <form action="{{ route('perangkat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" 
                        class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jabatan (Contoh: Kepala Desa)</label>
                        <input type="text" name="jabatan" class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors" required>
                    </div>
                    <div class="mb-4 flex gap-4">
     <div class="w-1/2">
         <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai Menjabat</label>
         <input type="date" name="tanggal_menjabat" 
          class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors" >
     </div>
     <div class="w-1/2">
         <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Berakhir Menjabat</label>
         <input type="date" name="tanggal_akhir_menjabat" class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors" >
     </div>
 </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                        <input type="file" name="foto" class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors" accept="image/png, image/jpeg, image/jpg" required>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" 
                        class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white font-bold py-2 px-5 rounded-full transition-colors outline-none focus:outline-none">
                            Simpan Data
                        </button>
                       <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center font-semibold text-sm text-red-500 hover:text-red-600 transition-colors">
                            Batal &amp; Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>