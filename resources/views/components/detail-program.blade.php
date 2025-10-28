@props(['program'])
<div>
    <h1 class="text-2xl md:text-2xl font-semibold text-neutral-800 ">
        {{$program['title']}}
    </h1>
    <flux:separator class="mb-4"/>
    <div class="mb-10">
        <div class="flex justify-between items-center mb-2">
            <span class="text-lg font-bold text-brand-green">{{format_rupiah($program['total_received'])}}</span>
            <span class="text-xs font-thin text-neutral-500 flex item-center">
                                <flux:icon.users class="size-4 me-1"/>
                                {{$program['total_donors']}} Donatur
                            </span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-brand-gold h-4 rounded-full" style="width: {{$program['percentage']}}%;"></div>
        </div>
        @if($program['target'] > 0)
            <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                <span>Target: <span>Target: {{$program['target'] > 0 ? format_rupiah($program['target']) :'-'}}</span></span>
            </div>
        @endif
    </div>

    <flux:separator/>
    <div class="fixed  bottom-0 left-0 right-0 z-50 p-4 lg:static lg:p-0">
        <a href="{{route('donasi.bayar',['slug'=>$program['slug']])}}"
           class="w-full block text-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 mt-10">
            Donasi Sekarang
        </a>

    </div>

    <div class="border-t mt-8 pt-6">
        <h2 class="text-lg font-semibold mb-3">Bagikan Artikel Ini</h2>
        <div class="flex items-center gap-3">
            @php
                $url = urlencode(request()->fullUrl());
                $text = urlencode($program['title']);
            @endphp
            <x-share-button :url="$url" :text="$text"></x-share-button>

        </div>
    </div>
</div>
