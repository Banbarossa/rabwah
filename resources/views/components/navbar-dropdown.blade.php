@props(['label' => '', 'items' => []])

<div x-data="{ open: false }" class="relative inline-block text-left">
    <button
        @click="open = !open"
        @click.away="open = false"
        type="button"
        class="flex items-center gap-1 hover:text-neutral-600 relative pb-1 font-medium group"
    >
        <span>{{ $label }}</span>

        <!-- Icon panah -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4 transition-transform duration-200"
             :class="{ 'rotate-180': open }"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
        </svg>

        <span class="absolute bottom-0 h-0.5 w-0 bg-brand-gold transition-all duration-300 group-hover:w-full left-0 ease-in-out"></span>
    </button>

    <div
        x-show="open"
        x-transition
        class="absolute left-0 mt-2 w-48 bg-white border border-neutral-200 rounded-lg shadow-lg z-50"
    >
        <flux:button>djafdla</flux:button>
        @foreach($items as $item)
            <a href="{{ $item['href'] ?? '#' }}"
               class="block px-4 py-2 text-sm hover:bg-neutral-100 hover:text-neutral-700 {{ $item['active'] ?? false ? 'font-bold text-neutral-800' : '' }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>

