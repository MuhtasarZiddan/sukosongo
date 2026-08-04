<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F3D2B] leading-tight">
            {{ __('Tambah User') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Nama</label>

                        <x-text-input
                            name="name"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            :value="old('name')"/>

                    </div>

                    <div class="mb-4">

                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Username</label>

                        <x-text-input
                            name="username"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"
                            :value="old('username')"/>

                    </div>

                    <div class="mb-4">

                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Password</label>

                        <x-text-input
                            type="password"
                            name="password"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"/>

                    </div>

                    <div class="mb-4">

                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Konfirmasi Password</label>

                        <x-text-input
                            type="password"
                            name="password_confirmation"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors"/>

                    </div>

                    <div class="mb-6">

                        <label class="block text-[#1F3D2B] text-sm font-bold mb-2">Role</label>

                        <select
                            name="role"
                            class="shadow-sm appearance-none border border-[#1F3D2B]/15 rounded-lg w-full py-2 px-3 text-[#23281F] leading-tight outline-none focus:outline-none focus:border-[#3B6B4A] focus:ring-2 focus:ring-[#3B6B4A]/20 transition-colors">

                            @foreach($roles as $role)

                                <option value="{{ $role->name }}">
                                    {{ ucfirst(str_replace('_',' ',$role->name)) }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="flex items-center justify-between mt-6">

                        <button type="submit"
                            class="bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white font-bold py-2 px-5 rounded-full transition-colors outline-none focus:outline-none">
                            Simpan
                        </button>

                        <a href="{{ route('users.index') }}"
                            class="inline-flex items-center font-semibold text-sm text-red-500 hover:text-red-600 transition-colors">
                            Batal &amp; Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>