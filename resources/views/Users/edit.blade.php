<x-app-layout>

    <x-slot name="header">
    <x-admin-header
        title="Edit User"
        description="Perbarui informasi user yang akan ditampilkan."
    />
</x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">

                <form action="{{ route('users.update', $user) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <x-input-label value="Nama"/>

                        <x-text-input
                            name="name"
                            class="w-full mt-1"
                            :value="old('name', $user->name)"/>

                    </div>

                    <div class="mb-4">

                        <x-input-label value="Username"/>

                        <x-text-input
                            name="username"
                            class="w-full mt-1"
                            :value="old('username', $user->username)"/>

                    </div>

                    <div class="mb-4">

                        <x-input-label value="Password"/>

                        <x-text-input
                            type="password"
                            name="password"
                            class="w-full mt-1"/>

                    </div>

                    <div class="mb-4">

                        <x-input-label value="Konfirmasi Password"/>

                        <x-text-input
                            type="password"
                            name="password_confirmation"
                            class="w-full mt-1"/>
                    <p class="text-xs text-red-600">Kosongkan password jika tidak ingin mengubahnya</p>
                    </div>

                    <div class="mb-6">

                        <x-input-label value="Role"/>

                        <select
                            name="role"
                            class="border-gray-300 rounded-md shadow-sm w-full mt-1">

                            @foreach($roles as $role)

                                <option value="{{ $role->name }}" @selected($user->hasRole($role->name))>
                                    {{ ucfirst(str_replace('_',' ',$role->name)) }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="flex justify-end gap-2">

                    <a href="{{ route('users.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-full transition duration-200">
                        Batal
                    </a>

                    <button type="submit"
                        class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white font-bold py-2 px-5 rounded-full transition-colors outline-none focus:outline-none">
                        Simpan
                    </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>