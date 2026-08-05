<x-app-layout>
    <x-slot name="header">
    <x-admin-header
        title="Tambah UMKM"
        description="Tambahkan informasi UMKM baru untuk Desa Sukosongo"
    />
</x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">

                <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Nama UMKM</label>
                        <input type="text" name="nama_umkm"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            placeholder="Contoh: Keripik Singkong Bu Tejo" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Nama Produk</label>
                        <input type="text" name="nama_produk"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            placeholder="Contoh: Keripik Singkong Balado" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Foto Usaha / Produk</label>
                        <input type="file" name="foto"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            accept="image/png, image/jpeg, image/jpg" required>
                        <p class="text-xs text-[#23281F]/50 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Alamat Usaha</label>
                        <textarea name="alamat_usaha" rows="3"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            placeholder="Masukkan alamat lengkap..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Nomor WhatsApp (Contoh: 6281234567890)</label>
                        <input type="number" name="no_wa"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>
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