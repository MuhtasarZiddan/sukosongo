@php
    $dashboardActive = request()->routeIs('dashboard')
        || request()->routeIs('umkm.*')
        || request()->routeIs('perangkat.*')
        || request()->routeIs('berita.*');

    $usersActive = request()->routeIs('users.*');
    $activityLogActive = request()->routeIs('activity-logs.*');
@endphp

<style>
    .admin-nav-link {
        position: relative;
        transition: color .2s ease;
    }
    .admin-nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -21px;
        height: 2px;
        width: 0%;
        background: #C99A2E;
        transition: width .25s ease;
    }
    .admin-nav-link:hover::after {
        width: 100%;
    }
    .admin-nav-link.is-active {
        color: #C99A2E;
        font-weight: 600;
    }
    .admin-nav-link.is-active::after {
        width: 100%;
    }
    .admin-mobile-link.is-active {
        color: #E4C46C;
        background: rgba(255, 255, 255, 0.1);
    }
</style>

<nav x-data="{ open: false }" class="bg-[#1F3D2B] shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- Logo --}}
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                         <img src="{{ asset('images/lamongan.png') }}" alt="Logo Kabupaten Lamongan" class="w-7 h-8 object-contain" />
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Sukosongo" class="w-7 h-8 object-cover" />
                        <span class="hidden sm:block font-semibold text-white text-sm leading-tight">
                            Admin<br><span class="text-white/50 text-[11px] font-normal">Desa Sukosongo</span>
                        </span>
                    </a>
                </div>

                {{-- Navigation Links --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="admin-nav-link text-sm text-white/85 {{ $dashboardActive ? 'is-active' : '' }}">
                        Dashboard
                    </a>

                    @hasanyrole('admin|superadmin')
                        <a href="{{ route('users.index') }}"
                            class="admin-nav-link text-sm text-white/85 {{ $usersActive ? 'is-active' : '' }}">
                            User
                        </a>
                        <a href="{{ route('activity-logs.index') }}"
                            class="admin-nav-link text-sm text-white/85 {{ $activityLogActive ? 'is-active' : '' }}">
                            Activity Logs
                        </a>
                    @endhasanyrole
                </div>
            </div>

            {{-- Settings Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-1.5 px-3 py-2 border border-white/15 text-sm leading-4 font-medium rounded-full text-white/85 bg-white/5 hover:bg-white/10 hover:text-white focus:outline-none transition-colors duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil Saya
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white/70 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Responsive Navigation Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#1F3D2B] border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <a href="{{ route('dashboard') }}"
                class="admin-mobile-link block px-3 py-2.5 rounded-lg text-sm font-medium text-white/85 {{ $dashboardActive ? 'is-active' : 'hover:bg-white/10' }}">
                Dashboard
            </a>

            @hasanyrole('admin|superadmin')
                <a href="{{ route('users.index') }}"
                    class="admin-mobile-link block px-3 py-2.5 rounded-lg text-sm font-medium text-white/85 {{ $usersActive ? 'is-active' : 'hover:bg-white/10' }}">
                    User
                </a>
                <a href="{{ route('activity-logs.index') }}"
                    class="admin-mobile-link block px-3 py-2.5 rounded-lg text-sm font-medium text-white/85 {{ $activityLogActive ? 'is-active' : 'hover:bg-white/10' }}">
                    Activity Logs
                </a>
            @endhasanyrole
        </div>

        {{-- Responsive Settings --}}
        <div class="pt-4 pb-3 border-t border-white/10">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
            </div>

            <div class="mt-3 space-y-1 px-2">
                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2.5 rounded-lg text-sm font-medium text-white/85 hover:bg-white/10">
                    Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block px-3 py-2.5 rounded-lg text-sm font-medium text-white/85 hover:bg-white/10 cursor-pointer">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>