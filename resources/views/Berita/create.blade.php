<x-app-layout>
    <x-slot name="header">
    <x-admin-header
        title="Tambah Berita"
        description="Tambahkan informasi berita baru untuk Desa Sukosongo"
    />
</x-slot>

    <style>
        .select-custom {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%231F3D2B'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.9rem center;
            background-size: 1rem;
            padding-right: 2.5rem;
        }
    </style>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">

                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Judul Berita</label>
                        <input type="text" name="judul"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>
                    </div>

                    <div class="mb-4 flex gap-4">
                        <div class="w-1/2">
                            <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Penulis</label>
                            <input type="text" name="penulis"
                                class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                                required>
                        </div>
                        <div class="w-1/2" x-data="{ open: false, selected: 'draft', label: 'Draft (Simpan sebagai konsep)' }">
    <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Status</label>

    <div class="relative">
            <button type="button" @click="open = !open" @click.outside="open = false"
                class="w-full flex justify-between items-center shadow-sm border border-[#1F3D2B]/15 rounded-lg py-2 px-3 text-[#23281F] text-left outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors">
                <span x-text="label"></span>
                <svg class="w-4 h-4 text-[#1F3D2B] transition-transform" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div x-show="open" x-transition class="absolute z-10 mt-1 w-full bg-white border border-[#1F3D2B]/15 rounded-lg shadow-sm overflow-hidden">
                <div @click="selected='draft'; label='Draft (Simpan sebagai konsep)'; open=false"
                    class="px-3 py-2 cursor-pointer hover:bg-[#3B6B4A]/10 text-[#23281F]"
                    :class="selected==='draft' && 'bg-[#3B6B4A]/10 font-semibold'">
                    Draft (Simpan sebagai konsep)
                </div>
                <div @click="selected='publish'; label='Publish (Terbitkan)'; open=false"
                    class="px-3 py-2 cursor-pointer hover:bg-[#3B6B4A]/10 text-[#23281F]"
                    :class="selected==='publish' && 'bg-[#3B6B4A]/10 font-semibold'">
                    Publish (Terbitkan)
                </div>
            </div>

            <!-- hidden input biar tetep ke-submit ke backend, name & value sama kayak select asli -->
            <input type="hidden" name="status" :value="selected" required>
        </div>
    </div>
</div>
                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Tanggal & Waktu Publish</label>
                        <input type="datetime-local" name="tanggal_publish"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Isi Lengkap Berita</label>
                        <textarea name="isi_berita" rows="8"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Gambar Sampul Berita</label>
                        <input type="file" name="gambar"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            accept="image/png, image/jpeg, image/jpg" required>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit"
                            class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white font-bold py-2 px-5 rounded-full transition-colors outline-none focus:outline-none">
                            Simpan Berita
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