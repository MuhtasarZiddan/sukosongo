<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Profil Saya
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-lg shadow">

                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    class="p-6 space-y-6">

                    @csrf
                    @method('PUT')

                    @if(session('success'))

                        <div class="rounded-lg bg-green-100 text-green-700 p-3">

                            {{ session('success') }}

                        </div>

                    @endif

                    {{-- Nama --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name',$user->name) }}"
                            class="w-full rounded-lg border-gray-300">

                        @error('name')

                            <p class="text-red-500 text-sm mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Username --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Username

                        </label>

                        <input
                            type="text"
                            name="username"
                            value="{{ old('username',$user->username) }}"
                            class="w-full rounded-lg border-gray-300">

                        @error('username')

                            <p class="text-red-500 text-sm mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Role --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Role

                        </label>

                        <input
                            type="text"
                            value="{{ $user->getRoleNames()->implode(', ') }}"
                            disabled
                            class="w-full rounded-lg bg-gray-100 border-gray-300 cursor-not-allowed">

                    </div>

                    <hr>

                    <div>

                        <p class="font-semibold">

                            Ubah Password

                        </p>

                        <p class="text-sm text-gray-500">

                            Kosongkan jika tidak ingin mengganti password.

                        </p>

                    </div>

                    {{-- Password --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-lg border-gray-300">

                        @error('password')

                            <p class="text-red-500 text-sm mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Konfirmasi Password --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Konfirmasi Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full rounded-lg border-gray-300">

                    </div>

                    <div class="flex justify-end">

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>