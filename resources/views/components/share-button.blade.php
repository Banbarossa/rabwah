@props(['url'=>'#','text'=>'#'])
<div class="flex gap-2 relative">

    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
       target="_blank"
       class="border border-neutral-300 p-2 rounded-lg text-sm">
        <img src="{{asset('asset/icon/facebook.png')}}" alt="facebook" class="w-4">
    </a>

    <a href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $text }}"
       target="_blank"
       class="border border-neutral-300 p-2 rounded-lg text-sm">
        <img src="{{asset('asset/icon/twiter.png')}}" alt="twiter" class="w-4">
    </a>

    <a href="https://t.me/share/url?url={{ $url }}&text={{ $text }}"
       target="_blank"
       class="border border-neutral-300 p-2 rounded-lg text-sm">
        <img src="{{asset('asset/icon/telegram.png')}}" alt="twiter" class="w-4">
    </a>

    <a href="https://wa.me/?text={{ $text }}%20{{ $url }}"
       target="_blank"
       class="border border-neutral-300 p-2 rounded-lg text-sm">
        <img src="{{asset('asset/icon/whatsapp.png')}}" alt="whatsapp" class="w-4">
    </a>


    <div x-data="{ show: false }" >
        <button
            x-on:click="
            navigator.clipboard.writeText('{{ request()->fullUrl() }}');
            show = true;
            setTimeout(() => show = false, 2000);
        "
            class="border border-neutral-300 p-2 rounded-lg text-sm"
        >
            <img src="{{ asset('asset/icon/copy.png') }}" alt="copy" class="w-4">
        </button>

        <div
            x-show="show"
            x-transition
            class="absolute -top-10 right-2 text-nowrap bg-neutral-700 text-white text-xs px-4 py-2 rounded-l-lg rounded-tr-lg shadow-lg z-10"
        >
            Tautan disalin!
        </div>
    </div>
</div>
