<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F3D2B] leading-tight">
            {{ __('Activity Log') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FAF6EC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ================= STATISTIK ================= --}}
            {{-- ================= STATISTIK ================= --}}
<div class="grid md:grid-cols-4 gap-5">

    <div class="group bg-white rounded-2xl shadow-sm border border-[#1F3D2B]/10 p-5 transition-all duration-300 hover:bg-[#1F3D2B] hover:shadow-md hover:-translate-y-1 cursor-default">
        <p class="text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/50 mb-1 group-hover:text-white/60 transition-colors">Total Activity</p>
        <h2 class="text-3xl font-bold text-[#1F3D2B] group-hover:text-white transition-colors">
            {{ $statistics['total'] }}
        </h2>
    </div>

    <div class="group bg-white rounded-2xl shadow-sm border border-[#1F3D2B]/10 p-5 transition-all duration-300 hover:bg-[#3B6B4A] hover:shadow-md hover:-translate-y-1 cursor-default">
        <p class="text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/50 mb-1 group-hover:text-white/60 transition-colors">Hari Ini</p>
        <h2 class="text-3xl font-bold text-[#3B6B4A] group-hover:text-white transition-colors">
            {{ $statistics['today'] }}
        </h2>
    </div>

    <div class="group bg-white rounded-2xl shadow-sm border border-[#1F3D2B]/10 p-5 transition-all duration-300 hover:bg-[#1F3D2B] hover:shadow-md hover:-translate-y-1 cursor-default">
        <p class="text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/50 mb-1 group-hover:text-white/60 transition-colors">Login</p>
        <h2 class="text-3xl font-bold text-[#C99A2E] group-hover:text-[#E4C46C] transition-colors">
            {{ $statistics['login'] }}
        </h2>
    </div>

    <div class="group bg-white rounded-2xl shadow-sm border border-[#1F3D2B]/10 p-5 transition-all duration-300 hover:bg-[#1F3D2B] hover:shadow-md hover:-translate-y-1 cursor-default">
        <p class="text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/50 mb-1 group-hover:text-white/60 transition-colors">CRUD</p>
        <h2 class="text-3xl font-bold text-[#6B4226] group-hover:text-[#E4C46C] transition-colors">
            {{ $statistics['crud'] }}
        </h2>
    </div>

</div>

            {{-- ================= FILTER ================= --}}
            <div class="bg-white rounded-2xl shadow-sm border border-[#1F3D2B]/10 p-6">
                <form method="GET">
                    <div class="grid md:grid-cols-5 gap-3">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari user..."
                            class="rounded-full border border-[#1F3D2B]/15 text-sm text-[#23281F] placeholder:text-[#23281F]/40 px-4 py-2 outline-none focus:outline-none focus:border-[#C99A2E] focus:ring-2 focus:ring-[#C99A2E]/30">

                        {{-- Custom Dropdown: Role --}}
                        <div x-data="customSelect('{{ request('role') }}')" class="relative">
                            <input type="hidden" name="role" :value="selected">
                            <button type="button" @click="open = !open" @click.outside="open = false"
                                class="w-full flex items-center justify-between rounded-full border text-sm text-[#23281F] px-4 py-2 bg-white transition-colors outline-none focus:outline-none"
                                :class="open ? 'border-[#C99A2E] ring-2 ring-[#C99A2E]/30' : 'border-[#1F3D2B]/15 hover:border-[#C99A2E]/50'">
                                <span x-text="label || 'Semua Role'"></span>
                                <svg class="w-4 h-4 text-[#1F3D2B] transition-transform duration-200 shrink-0" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="absolute z-20 mt-2 w-full bg-white border border-[#1F3D2B]/10 rounded-2xl shadow-lg overflow-hidden py-1"
                                style="display: none;">

                                <button type="button" @click="choose('', 'Semua Role')"
                                    class="w-full text-left px-4 py-2.5 text-sm transition-colors outline-none border-0"
                                    :class="selected === '' ? 'bg-[#1F3D2B]/10 text-[#1F3D2B] font-semibold' : 'text-[#23281F] hover:bg-[#3B6B4A]/10'">
                                    Semua Role
                                </button>

                                @foreach($roles as $role)
                                    <button type="button" @click="choose('{{ $role }}', '{{ $role }}')"
                                        class="w-full text-left px-4 py-2.5 text-sm transition-colors outline-none border-0"
                                        :class="selected === '{{ $role }}' ? 'bg-[#1F3D2B]/10 text-[#1F3D2B] font-semibold' : 'text-[#23281F] hover:bg-[#3B6B4A]/10'">
                                        {{ $role }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Custom Dropdown: Module --}}
                        <div x-data="customSelect('{{ request('module') }}')" class="relative">
                            <input type="hidden" name="module" :value="selected">
                            <button type="button" @click="open = !open" @click.outside="open = false"
                                class="w-full flex items-center justify-between rounded-full border text-sm text-[#23281F] px-4 py-2 bg-white transition-colors outline-none focus:outline-none"
                                :class="open ? 'border-[#C99A2E] ring-2 ring-[#C99A2E]/30' : 'border-[#1F3D2B]/15 hover:border-[#C99A2E]/50'">
                                <span x-text="label || 'Semua Module'"></span>
                                <svg class="w-4 h-4 text-[#1F3D2B] transition-transform duration-200 shrink-0" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="absolute z-20 mt-2 w-full bg-white border border-[#1F3D2B]/10 rounded-2xl shadow-lg overflow-hidden py-1"
                                style="display: none;">

                                <button type="button" @click="choose('', 'Semua Module')"
                                    class="w-full text-left px-4 py-2.5 text-sm transition-colors outline-none border-0"
                                    :class="selected === '' ? 'bg-[#1F3D2B]/10 text-[#1F3D2B] font-semibold' : 'text-[#23281F] hover:bg-[#3B6B4A]/10'">
                                    Semua Module
                                </button>

                                @foreach($modules as $module)
                                    <button type="button" @click="choose('{{ $module }}', '{{ $module }}')"
                                        class="w-full text-left px-4 py-2.5 text-sm transition-colors outline-none border-0"
                                        :class="selected === '{{ $module }}' ? 'bg-[#1F3D2B]/10 text-[#1F3D2B] font-semibold' : 'text-[#23281F] hover:bg-[#3B6B4A]/10'">
                                        {{ $module }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Custom Dropdown: Activity --}}
                        <div x-data="customSelect('{{ request('activity') }}')" class="relative">
                            <input type="hidden" name="activity" :value="selected">
                            <button type="button" @click="open = !open" @click.outside="open = false"
                                class="w-full flex items-center justify-between rounded-full border text-sm text-[#23281F] px-4 py-2 bg-white transition-colors outline-none focus:outline-none"
                                :class="open ? 'border-[#C99A2E] ring-2 ring-[#C99A2E]/30' : 'border-[#1F3D2B]/15 hover:border-[#C99A2E]/50'">
                                <span x-text="label || 'Semua Activity'"></span>
                                <svg class="w-4 h-4 text-[#1F3D2B] transition-transform duration-200 shrink-0" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="absolute z-20 mt-2 w-full bg-white border border-[#1F3D2B]/10 rounded-2xl shadow-lg overflow-hidden py-1"
                                style="display: none;">

                                <button type="button" @click="choose('', 'Semua Activity')"
                                    class="w-full text-left px-4 py-2.5 text-sm transition-colors outline-none border-0"
                                    :class="selected === '' ? 'bg-[#1F3D2B]/10 text-[#1F3D2B] font-semibold' : 'text-[#23281F] hover:bg-[#3B6B4A]/10'">
                                    Semua Activity
                                </button>

                                @foreach(['Login','Logout','Create','Update','Delete'] as $item)
                                    <button type="button" @click="choose('{{ $item }}', '{{ $item }}')"
                                        class="w-full text-left px-4 py-2.5 text-sm transition-colors outline-none border-0"
                                        :class="selected === '{{ $item }}' ? 'bg-[#1F3D2B]/10 text-[#1F3D2B] font-semibold' : 'text-[#23281F] hover:bg-[#3B6B4A]/10'">
                                        {{ $item }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button
                                class="flex-1 bg-[#1F3D2B] hover:bg-[#3B6B4A] text-white text-sm font-semibold py-2 px-4 rounded-full transition-colors outline-none focus:outline-none">
                                Filter
                            </button>

                            <a href="{{ route('activity-logs.index') }}"
                                class="flex items-center justify-center rounded-full border border-[#1F3D2B]/15 text-[#1F3D2B] hover:bg-[#1F3D2B]/5 text-sm font-semibold px-4 transition-colors">
                                Reset
                            </a>
                        </div>

                    </div>
                </form>
            </div>

            {{-- ================= TABEL LOG ================= --}}
            <div class="bg-white overflow-x-auto pb-4 shadow-sm rounded-2xl border border-[#1F3D2B]/10 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#1F3D2B]">Riwayat Aktivitas</h3>
                </div>

                <div class="overflow-x-auto pb-4">
                    <table class="min-w-full bg-white whitespace-nowrap">
                        <thead>
                            <tr class="bg-[#FAF6EC] border-b border-[#1F3D2B]/10">
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">No.</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">User</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Role</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Module</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Activity</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Method</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">IP</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Waktu</th>
                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wide text-[#1F3D2B]/60">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                                @php
                                    $activityClass = match($log->activity){
                                        'Create'  => 'bg-[#3B6B4A]/10 text-[#3B6B4A]',
                                        'Update'  => 'bg-[#C99A2E]/15 text-[#C99A2E]',
                                        'Delete'  => 'bg-red-500/10 text-red-600',
                                        'Login'   => 'bg-[#1F3D2B]/10 text-[#1F3D2B]',
                                        'Logout'  => 'bg-[#6B4226]/10 text-[#6B4226]',
                                        default   => 'bg-[#23281F]/10 text-[#23281F]/60'
                                    };

                                    $methodClass = match($log->method){
                                        'GET'    => 'bg-blue-500/10 text-blue-600',
                                        'POST'   => 'bg-[#3B6B4A]/10 text-[#3B6B4A]',
                                        'PUT'    => 'bg-[#C99A2E]/15 text-[#C99A2E]',
                                        'PATCH'  => 'bg-orange-500/10 text-orange-600',
                                        'DELETE' => 'bg-red-500/10 text-red-600',
                                        default  => 'bg-[#23281F]/10 text-[#23281F]/60'
                                    };
                                @endphp

                                <tr class="border-b border-[#1F3D2B]/10 hover:bg-[#FAF6EC]/60 transition-colors">
                                    <td class="py-3 px-4 text-[#23281F]">
                                        {{ $logs->firstItem() + $loop->index }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <strong class="text-[#1F3D2B]">{{ $log->name }}</strong>
                                    </td>
                                    <td class="py-3 px-4 text-[#23281F]/70">
                                        {{ $log->role }}
                                    </td>
                                    <td class="py-3 px-4 text-[#23281F]/70">
                                        {{ $log->module }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $activityClass }}">
                                            {{ $log->activity }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $methodClass }}">
                                            {{ $log->method }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-sm text-[#23281F]/60">
                                        {{ $log->ip_address }}
                                    </td>
                                    <td class="py-3 px-4 text-sm text-[#23281F]/60">
                                        {{ $log->created_at->translatedFormat('d M Y H:i') }}
                                    </td>
                                    <td class="py-3 px-4 text-sm text-[#23281F]/70">
                                        {{ $log->description }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-10 text-[#23281F]/50">
                                        Tidak ada data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $logs->withQueryString()->links('components.pagination') }}
                </div>
            </div>

        </div>
    </div>

    <script>
        function customSelect(initialValue) {
            return {
                open: false,
                selected: initialValue || '',
                label: initialValue || '',
                choose(value, label) {
                    this.selected = value;
                    this.label = value ? label : '';
                    this.open = false;
                }
            }
        }
    </script>
</x-app-layout>