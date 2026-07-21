@if ($paginator->hasPages())
    <div class="flex items-center justify-between mt-5">

        {{-- Informasi --}}
        <div class="text-sm text-gray-500">
            {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }}
            dari {{ $paginator->total() }}
        </div>

        {{-- Pagination --}}
        <div class="flex items-center space-x-1">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="flex items-center justify-center w-8 h-8 text-gray-300 border rounded-md cursor-not-allowed">
                    ‹
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="flex items-center justify-center w-8 h-8 text-gray-600 border rounded-md hover:bg-gray-100 transition">
                    ‹
                </a>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)

                {{-- Ellipsis --}}
                @if (is_string($element))
                    <span class="px-2 text-gray-400">{{ $element }}</span>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <span class="flex items-center justify-center w-8 h-8 rounded-md bg-blue-600 text-white text-sm font-medium">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="flex items-center justify-center w-8 h-8 rounded-md border text-gray-700 hover:bg-gray-100 transition text-sm">
                                {{ $page }}
                            </a>
                        @endif

                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="flex items-center justify-center w-8 h-8 text-gray-600 border rounded-md hover:bg-gray-100 transition">
                    ›
                </a>
            @else
                <span class="flex items-center justify-center w-8 h-8 text-gray-300 border rounded-md cursor-not-allowed">
                    ›
                </span>
            @endif

        </div>

    </div>
@endif