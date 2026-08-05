<x-app-layout>
    <x-slot name="header">
    <x-admin-header
        title="Edit Berita"
        description="Perbarui informasi berita yang akan ditampilkan."
    />
</x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">

                <form action="{{ route('berita.update', $beritum->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-5">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">
                            Judul Berita
                        </label>

                        <input
                            type="text"
                            name="judul"
                            value="{{ $beritum->judul }}"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>
                    </div>

                    {{-- Penulis & Status --}}
                    <div class="mb-5 flex gap-4">

                        {{-- Penulis --}}
                        <div class="w-1/2">
                            <label class="block text-[#1F3D2B] text-sm font-bold mb-2">
                                Penulis
                            </label>

                            <input
                                type="text"
                                name="penulis"
                                value="{{ $beritum->penulis }}"
                                class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                                required>
                        </div>

                        {{-- Status --}}
                        <div
                            x-data="{
                                open:false,
                                selected:'{{ $beritum->status }}',
                                label:'{{ $beritum->status == 'publish' ? 'Publish (Terbitkan)' : 'Draft (Simpan sebagai konsep)' }}'
                            }"
                            class="relative w-1/2">

                            <label class="block text-[#1F3D2B] text-sm font-bold mb-2">
                                Status
                            </label>

                            <button
                                type="button"
                                @click="open=!open"
                                class="w-full flex justify-between items-center border border-[#1F3D2B]/15 rounded-lg px-3 py-2 bg-white text-[#23281F] transition-colors hover:border-[#3B6B4A] focus:outline-none">

                                <span x-text="label"></span>

                                <svg
                                    class="w-4 h-4 text-[#3B6B4A] transition-transform duration-300"
                                    :class="{ 'rotate-180': open }"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"/>
                                </svg>

                            </button>

                            <div
                                x-cloak
                                x-show="open"
                                @click.outside="open=false"
                                x-transition
                                class="absolute z-20 mt-1 w-full bg-white border border-[#1F3D2B]/15 rounded-lg shadow-lg overflow-hidden">

                                <div
                                    @click="selected='draft';label='Draft (Simpan sebagai konsep)';open=false"
                                    class="px-3 py-2 cursor-pointer hover:bg-[#3B6B4A]/10 transition-colors"
                                    :class="selected==='draft' && 'bg-[#3B6B4A]/10 font-semibold'">

                                    Draft (Simpan sebagai konsep)

                                </div>

                                <div
                                    @click="selected='publish';label='Publish (Terbitkan)';open=false"
                                    class="px-3 py-2 cursor-pointer hover:bg-[#3B6B4A]/10 transition-colors"
                                    :class="selected==='publish' && 'bg-[#3B6B4A]/10 font-semibold'">

                                    Publish (Terbitkan)

                                </div>

                            </div>

                            <input
                                type="hidden"
                                name="status"
                                :value="selected">

                        </div>

                    </div>

                    {{-- Tanggal Publish --}}
                    <div class="mb-5">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">
                            Tanggal & Waktu Publish
                        </label>

                        <input
                            type="datetime-local"
                            name="tanggal_publish"
                            value="{{ \Carbon\Carbon::parse($beritum->tanggal_publish)->format('Y-m-d\TH:i') }}"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>
                    </div>

                    {{-- Isi Berita --}}
                    <div class="mb-5">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">
                            Isi Lengkap Berita
                        </label>

                        <textarea
                            name="isi_berita"
                            rows="8"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] resize-y focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            required>{{ $beritum->isi_berita }}</textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-5">
                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">
                            Ganti Gambar (Opsional)
                        </label>

                         <input type="file" name="foto" 
                        class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    {{-- Tombol --}}
                    <div class="flex items-center justify-between mt-8">

                        <button
                            type="submit"
                            class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white font-semibold py-2.5 px-6 rounded-full transition-colors focus:outline-none">

                            Update Berita

                        </button>

                        <a
                            href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-sm font-semibold text-red-500 hover:text-red-600 transition-colors">

                            Batal & Kembali

                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>