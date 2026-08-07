<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F3D2B] leading-tight">
            User Management
        </h2>
    </x-slot>

    <div 
        x-data="{
            openDelete: false,
            deleteForm: null,
            deleteTitle: ''
        }"
        class="py-10 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-white border-l-4 border-[#3B6B4A] text-[#1F3D2B] px-4 py-3 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg border border-[#1F3D2B]/10">

                <div class="flex justify-between items-center px-6 py-4 border-b border-[#1F3D2B]/10">
                    <h3 class="text-base font-semibold text-[#1F3D2B]">
                        Daftar User
                    </h3>

                    <a href="{{ route('users.create') }}"
                        class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white text-sm font-medium py-2 px-4 rounded-2xl transition-colors">
                        + Tambah User
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="bg-[#FAF6EC] border-b border-[#1F3D2B]/10">
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Role</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#1F3D2B]/10">
                            @forelse($users as $user)
                                <tr class="hover:bg-[#FAF6EC]/50 transition-colors">

                                    <td class="px-6 py-4 font-medium text-[#1F3D2B]">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4 text-[#23281F]">
                                        {{ $user->username }}
                                    </td>

                                    <td class="px-6 py-4">
                                        @foreach ($user->roles as $role)
                                            @if ($role->name == 'superadmin')
                                                <span class="inline-block px-2 py-0.5 border border-red-300 text-red-600 rounded text-xs font-semibold">
                                                    Super Admin
                                                </span>
                                            @elseif($role->name == 'admin')
                                                <span class="inline-block px-2 py-0.5 border border-[#3B6B4A]/30 text-[#3B6B4A] rounded text-xs font-semibold">
                                                    Admin
                                                </span>
                                            @else
                                                <span class="inline-block px-2 py-0.5 border border-[#C99A2E]/40 text-[#C99A2E] rounded text-xs font-semibold">
                                                    {{ ucfirst(str_replace('_', ' ', $role->name)) }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-2">

                                            <a href="{{ route('users.edit', $user) }}"
                                                class="border border-[#C99A2E] text-[#C99A2E] hover:bg-[#C99A2E] hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold transition-colors">
                                                Edit
                                            </a>

                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                x-ref="deleteFormUser{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="button"
                                                    @click="
                                                        deleteTitle='{{ addslashes($user->name) }}';
                                                        deleteForm=$refs.deleteFormUser{{ $user->id }};
                                                        openDelete=true;
                                                    "
                                                    class="border border-red-400 text-red-500 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-full text-xs font-semibold transition-colors">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-10 text-sm text-[#23281F]/50">
                                        Tidak ada data user.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-[#1F3D2B]/10">
                    {{ $users->links() }}
                </div>

            </div>

            {{-- ===================== MODAL HAPUS ===================== --}}
            <div
                x-show="openDelete"
                x-cloak
                x-transition.opacity
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">

                <div
                    @click.outside="openDelete=false"
                    x-transition.scale
                    class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-7">

                    <div class="flex justify-center">
                        <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-red-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                            </svg>
                        </div>
                    </div>

                    <h2 class="mt-5 text-center text-2xl font-bold text-[#1F3D2B]">
                        Hapus Data
                    </h2>

                    <p class="text-center text-[#23281F]/70 mt-4 leading-relaxed">
                        Apakah Anda yakin ingin menghapus
                        <br>
                        <span class="font-semibold text-[#1F3D2B]" x-text="deleteTitle"></span>
                        ?
                    </p>

                    <p class="text-center text-red-500 text-sm mt-3">
                        Data yang sudah dihapus tidak dapat dikembalikan.
                    </p>

                    <div class="mt-8 flex justify-center gap-3">
                        <button
                            @click="openDelete=false"
                            class="px-6 py-2.5 rounded-full border border-[#1F3D2B]/20 hover:bg-gray-100 transition">
                            Batal
                        </button>

                        <button
                            @click="deleteForm.submit()"
                            class="px-6 py-2.5 rounded-full bg-red-500 hover:bg-red-600 text-white font-semibold transition">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>