@if ($paginator->hasPages())
<nav class="flex items-center justify-center gap-2 mt-6" aria-label="Navigasi halaman">

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span class="w-10 h-10 flex items-center justify-center rounded-full border border-[#1F3D2B]/15 text-[#1F3D2B]/30 cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="w-10 h-10 flex items-center justify-center rounded-full border border-[#1F3D2B]/15 text-[#1F3D2B] hover:bg-[#1F3D2B] hover:text-white hover:border-white transition-colors outline-none focus:outline-none">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
    @endif

    {{-- Nomor halaman --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="w-10 h-10 flex items-center justify-center text-[#1F3D2B]/40 text-sm">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="w-10 h-10 flex items-center justify-center rounded-full bg-[#1F3D2B] text-white border border-white text-sm font-semibold">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                        class="w-10 h-10 flex items-center justify-center rounded-full border border-[#1F3D2B]/15 text-[#1F3D2B] text-sm hover:bg-[#1F3D2B] hover:text-white hover:border-white transition-colors outline-none focus:outline-none">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="w-10 h-10 flex items-center justify-center rounded-full border border-[#1F3D2B]/15 text-[#1F3D2B] hover:bg-[#1F3D2B] hover:text-white hover:border-white transition-colors outline-none focus:outline-none">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    @else
        <span class="w-10 h-10 flex items-center justify-center rounded-full border border-[#1F3D2B]/15 text-[#1F3D2B]/30 cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </span>
    @endif

</nav>
@endif