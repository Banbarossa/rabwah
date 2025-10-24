<x-layouts.app.sidebar :title="$title ?? null" :breads="$breads??null">
    <div class="mt-8">

    {{ $slot }}
    </div>
</x-layouts.app.sidebar>
