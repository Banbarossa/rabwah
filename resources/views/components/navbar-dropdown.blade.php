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
                  d="M19 9l-7 7-7-7"/>
        </svg>

        <span
            class="absolute bottom-0 h-0.5 w-0 bg-brand-gold transition-all duration-300 group-hover:w-full left-0 ease-in-out"></span>
    </button>

    <div
        x-show="open"
        x-transition
        class="lg:absolute lg:right-0 mt-2 lg:mt-5 w-56 lg:bg-white lg:border border-neutral-200 lg:rounded lg:shadow z-50 ps-6 p-0 lg:p-3"
    >
        <ul class="space-y-2">



        @foreach($items as $slug=>$item)
            <li><x-navbar-item href="{{route('program',['slug'=>$slug])}}">{{$item}}</x-navbar-item></li>
        @endforeach
        </ul>
    </div>
</div>

