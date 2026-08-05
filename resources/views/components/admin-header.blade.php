<div>
    <h1 class="text-3xl lg:text-4xl font-bold text-white">
        {{ $title }}
    </h1>

    @isset($description)
        <p class="text-white/70 mt-2">
            {{ $description }}
        </p>
    @endisset
</div>