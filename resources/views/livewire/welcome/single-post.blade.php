<div>
    <section class="max-w-4xl mx-auto px-4 py-8">
        {{-- Judul dan Info --}}
        <article>
            <h1 class="text-3xl font-bold mb-2">Judul</h1>
            <p class="text-gray-500 text-sm mb-4">
                Dipublikasikan Tgl
                · Oleh Admin
            </p>

            {{-- Thumbnail --}}
{{--            @if($post->thumbnail)--}}
{{--                <img src=""--}}
{{--                     alt=""--}}
{{--                     class="w-full rounded-2xl aspect-[16/9] object-cover mb-6">--}}
{{--            @endif--}}

            {{-- Konten --}}
            <div class="prose max-w-none text-gray-800">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quod reprehenderit soluta? Autem deleniti mollitia praesentium. Accusantium amet doloremque laborum ratione tempore temporibus ullam. Delectus error impedit iste mollitia nostrum.
            </div>

            {{-- Tombol Share --}}
            <div class="border-t mt-8 pt-6">
                <h2 class="text-lg font-semibold mb-3">Bagikan Artikel Ini</h2>
                <div class="flex items-center gap-3">
                    @php
                        $url = urlencode(request()->fullUrl());
//                        $text = urlencode($post->title);
                    $text='yes';
                    @endphp

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                       target="_blank"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                        Facebook
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $text }}"
                       target="_blank"
                       class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg text-sm">
                        X / Twitter
                    </a>

                    <a href="https://t.me/share/url?url={{ $url }}&text={{ $text }}"
                       target="_blank"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                        Telegram
                    </a>

                    <a href="https://wa.me/?text={{ $text }}%20{{ $url }}"
                       target="_blank"
                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm">
                        WhatsApp
                    </a>

                    <button
                        x-data
                        @click="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); $dispatch('notify', { text: 'Tautan disalin!' })"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm">
                        Salin Tautan
                    </button>
                </div>
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
