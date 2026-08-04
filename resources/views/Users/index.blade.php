<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F3D2B] leading-tight">
            User Management
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FAF6EC] min-h-screen">
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
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Nama</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Username</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Role</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">
                                    Aksi</th>
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
                                                <span
                                                    class="inline-block px-2 py-0.5 border border-red-300 text-red-600 rounded text-xs font-semibold">
                                                    Super Admin
                                                </span>
                                            @elseif($role->name == 'admin')
                                                <span
                                                    class="inline-block px-2 py-0.5 border border-[#3B6B4A]/30 text-[#3B6B4A] rounded text-xs font-semibold">
                                                    Admin
                                                </span>
                                            @else
                                                <span
                                                    class="inline-block px-2 py-0.5 border border-[#C99A2E]/40 text-[#C99A2E] rounded text-xs font-semibold">
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
            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
            @csrf
            @method('DELETE')

            <button type="submit"
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

        </div>
    </div>

</x-app-layout>
