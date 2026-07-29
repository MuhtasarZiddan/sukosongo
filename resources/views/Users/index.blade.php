<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg">

                <div class="flex justify-between items-center p-6 border-b">
                    <h3 class="text-lg font-semibold">
                        Daftar User
                    </h3>

                    <a href="{{ route('users.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        + Tambah User
                    </a>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-100">

                            <tr>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Username</th>
                                <th class="px-6 py-3 text-left">Role</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $user->username }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @foreach($user->roles as $role)

                                            @if($role->name == 'superadmin')
                                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs">
                                                    Super Admin
                                                </span>

                                            @elseif($role->name == 'admin')
                                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">
                                                    Admin
                                                </span>

                                            @else
                                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">
                                                    {{ ucfirst(str_replace('_',' ', $role->name)) }}
                                                </span>
                                            @endif

                                        @endforeach

                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('users.edit', $user) }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md transition duration-200">
                                                Edit
                                            </a>

                                            <form action="{{ route('users.destroy', $user) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md transition duration-200">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center py-6">
                                        Tidak ada data user.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-4">
                    {{ $users->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>