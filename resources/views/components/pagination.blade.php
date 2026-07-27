@props([
    'id' => 'pagination',
    'onPageChange' => 'goToPage',
])

<nav id="{{ $id }}" data-on-page-change="{{ $onPageChange }}"
    class="pagination-nav flex items-center justify-center gap-2 mt-16" aria-label="Navigasi halaman">
    <button type="button"
        class="pagination-btn pagination-prev w-10 h-10 rounded-full border border-[color:var(--forest)]/20 flex items-center justify-center text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white disabled:opacity-30 disabled:pointer-events-none disabled:hover:bg-transparent disabled:hover:text-[color:var(--forest)]"
        aria-label="Halaman sebelumnya">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <div class="pagination-numbers flex items-center gap-2"></div>

    <button type="button"
        class="pagination-btn pagination-next w-10 h-10 rounded-full border border-[color:var(--forest)]/20 flex items-center justify-center text-[color:var(--forest)] hover:bg-[color:var(--forest)] hover:text-white disabled:opacity-30 disabled:pointer-events-none disabled:hover:bg-transparent disabled:hover:text-[color:var(--forest)]"
        aria-label="Halaman berikutnya">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</nav>
