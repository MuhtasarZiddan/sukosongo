<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Activity Log
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto space-y-6">

            <div class="grid md:grid-cols-4 gap-5">

                <div class="bg-white rounded-lg shadow p-5">
                    <p class="text-gray-500">Total Activity</p>
                    <h2 class="text-3xl font-bold">
                        {{ $statistics['total'] }}
                    </h2>
                </div>

                <div class="bg-white rounded-lg shadow p-5">
                    <p class="text-gray-500">Hari Ini</p>
                    <h2 class="text-3xl font-bold text-blue-600">
                        {{ $statistics['today'] }}
                    </h2>
                </div>

                <div class="bg-white rounded-lg shadow p-5">
                    <p class="text-gray-500">Login</p>
                    <h2 class="text-3xl font-bold text-green-600">
                        {{ $statistics['login'] }}
                    </h2>
                </div>

                <div class="bg-white rounded-lg shadow p-5">
                    <p class="text-gray-500">CRUD</p>
                    <h2 class="text-3xl font-bold text-orange-600">
                        {{ $statistics['crud'] }}
                    </h2>
                </div>

            </div>

            <div class="bg-white shadow rounded-lg p-5">

                <form method="GET">

                    <div class="grid md:grid-cols-6 gap-3">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari user..."
                            class="rounded-lg border-gray-300">

                        <select
                            name="role"
                            class="rounded-lg border-gray-300">

                            <option value="">Semua Role</option>

                            @foreach($roles as $role)

                                <option
                                    value="{{ $role }}"
                                    @selected(request('role')==$role)>

                                    {{ $role }}

                                </option>

                            @endforeach

                        </select>

                        <select
                            name="module"
                            class="rounded-lg border-gray-300">

                            <option value="">Semua Module</option>

                            @foreach($modules as $module)

                                <option
                                    value="{{ $module }}"
                                    @selected(request('module')==$module)>

                                    {{ $module }}

                                </option>

                            @endforeach

                        </select>

                        <select
                            name="method"
                            class="rounded-lg border-gray-300">

                            <option value="">Semua Method</option>

                            @foreach(['GET','POST','PUT','PATCH','DELETE'] as $method)

                                <option
                                    value="{{ $method }}"
                                    @selected(request('method')==$method)>

                                    {{ $method }}

                                </option>

                            @endforeach

                        </select>

                        <select
                            name="activity"
                            class="rounded-lg border-gray-300">

                            <option value="">Semua Activity</option>

                            @foreach(['Login','Logout','Create','Update','Delete'] as $item)

                                <option
                                    value="{{ $item }}"
                                    @selected(request('activity')==$item)>

                                    {{ $item }}

                                </option>

                            @endforeach

                        </select>

                        <button
                            class="bg-blue-600 rounded-lg text-white">

                            Filter

                        </button>

                        <a href="{{ route('activity-logs.index') }}"
                        class="flex items-center justify-center rounded-lg bg-gray-500 hover:bg-gray-600 text-white px-4">

                            Reset

                        </a>

                    </div>

                </form>

            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="p-3">No.</th>

                            <th class="p-3 text-left">User</th>

                            <th class="p-3 text-left">Role</th>

                            <th class="p-3 text-left">Module</th>

                            <th class="p-3 text-left">Activity</th>

                            <th class="p-3 text-left">Method</th>

                            <th class="p-3 text-left">IP</th>

                            <th class="p-3 text-left">Waktu</th>

                            <th class="p-3 text-left">Description</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($logs as $log)

                            @php

                                $activityClass = match($log->activity){

                                    'Create'=>'bg-green-100 text-green-700',

                                    'Update'=>'bg-yellow-100 text-yellow-700',

                                    'Delete'=>'bg-red-100 text-red-700',

                                    'Login'=>'bg-blue-100 text-blue-700',

                                    'Logout'=>'bg-gray-100 text-gray-700',

                                    default=>'bg-gray-100 text-gray-700'

                                };

                                $methodClass = match($log->method){

                                    'GET'=>'bg-gray-100 text-gray-700',

                                    'POST'=>'bg-green-100 text-green-700',

                                    'PUT'=>'bg-yellow-100 text-yellow-700',

                                    'PATCH'=>'bg-yellow-100 text-yellow-700',

                                    'DELETE'=>'bg-red-100 text-red-700',

                                    default=>'bg-gray-100 text-gray-700'

                                };

                            @endphp

                            <tr class="border-b hover:bg-gray-50">

                                <td class="p-3">
                                    {{ $logs->firstItem() + $loop->index }}
                                </td>

                                <td class="p-3">
                                    {{ $log->name }}
                                </td>

                                <td class="p-3">
                                    {{ $log->role }}
                                </td>

                                <td class="p-3">
                                    {{ $log->module }}
                                </td>

                                <td class="p-3">

                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $activityClass }}">

                                        {{ $log->activity }}

                                    </span>

                                </td>

                                <td class="p-3">

                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $methodClass }}">

                                        {{ $log->method }}

                                    </span>

                                </td>

                                <td class="p-3">
                                    {{ $log->ip_address }}
                                </td>

                                <td class="p-3">
                                    {{ $log->created_at->translatedFormat('d M Y H:i') }}
                                </td>

                                <td class="p-3">
                                    {{ $log->description }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center p-10">

                                    Tidak ada data.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{ $logs->withQueryString()->links() }}

        </div>

    </div>

</x-app-layout>