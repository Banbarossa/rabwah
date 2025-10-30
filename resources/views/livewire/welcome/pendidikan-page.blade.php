<div class="bg-white">
    <section class="max-w-4xl mx-auto px-4 py-8 ">
        <div class="mb-10 mt-4">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="/">Home</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{$post->title}}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <article>


            @if($post->thumbnail)
                <img src="{{$post->thumbnail}}"
                     alt="post-image"
                     class="w-full rounded-2xl aspect-[16/9] object-cover mb-12">
            @endif
            <h1 class="text-3xl font-bold mb-8">{{$post->title}}</h1>

            <div class="prose max-w-none text-gray-800 quill-reset">
                {!! $post->content !!}
            </div>

            {{-- Tombol Share --}}
            <div class="border-t mt-8 pt-6">
                <h2 class="text-lg font-semibold mb-3">Bagikan Artikel Ini</h2>
                @php
                    $url = url()->current();
                    $text = "Bagikan postingan ini  agar lebih banyak orang mendapatkan manfaatnya.";
                @endphp
                <x-share-button :url="$url" :text="$text"></x-share-button>

            </div>
        </article>
    </section>

    <div x-data="{show:false,text:''}"
         x-on:notify.window="text=$event.detail.text;show=true;setTimeout(()=>show=false,2000)"
         x-show="show"
         x-transition
         class="fixed bottom-5 right-5 bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg">
        <span x-text="text"></span>
    </div>
</div>
