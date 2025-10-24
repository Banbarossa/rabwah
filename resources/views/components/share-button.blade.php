@props(['url'=>'#','text'=>'#'])
<div class="flex gap-2">

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

    <button
        x-data
        @click="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); $dispatch('notify', { text: 'Tautan disalin!' })"
        class="border border-neutral-300 p-2 rounded-lg text-sm">
        <img src="{{asset('asset/icon/copy.png')}}" alt="twiter" class="w-4">
    </button>
</div>
