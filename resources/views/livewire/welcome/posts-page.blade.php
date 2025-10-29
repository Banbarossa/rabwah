<div>
    <section class="max-w-6xl mx-auto px-4 py-10 mb-20">

        {{-- Judul Halaman --}}
        <div class="mb-20">
            <x-section-title
                :label="ucWords($category) . ' Terbaru'"
                description="Kumpulan tulisan dan kabar terbaru dari kami."/>
        </div>

        {{-- Daftar Postingan --}}


        <div class="grid md:grid-cols-3 gap-8">
            @foreach($this->news as $post)
                <div class="bg-white shadow-sm hover:shadow-md rounded-2xl overflow-hidden transition duration-300">
                    <a href="{{ route('single-post',['category'=>$category,'slug'=>$post->slug]) }}">
                        <img src="{{ $post->thumbnail}}" alt="{{ $post->title }}"
                             class="aspect-[16/10] w-full object-cover">
                    </a>
                    <div class="p-5">
                        <a href="{{ route('single-post',['category'=>$category,'slug'=>$post->slug]) }}"
                           class="text-lg font-semibold hover:text-brand-green line-clamp-2">
                            {{ $post->title}}
                        </a>
                        <p class="text-gray-500 text-sm mt-1 mb-3">
                            {{ $post->author?->name }} · {{ $post->created_at }}
                        </p>
                        <p class="text-gray-600 text-sm line-clamp-3">
                            {{ $post->excerpt }}
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('single-post',['category'=>$category,'slug'=>$post->slug]) }}"
                               class="text-brand-green text-sm hover:underline">
                                Baca selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($this->news->hasPages())
            <div class="flex justify-center mt-10">
                {{ $this->news->links() }}
            </div>
        @endif

{{--        @if ($this->news->lastPage() > 1)--}}
{{--        <div class="flex justify-center mt-10">--}}
{{--            <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">--}}

{{--                @if ($this->news->onFirstPage())--}}
{{--                    <span class="px-3 py-2 border border-gray-300 text-gray-400 rounded-l-md cursor-not-allowed">← Sebelumnya</span>--}}
{{--                @else--}}
{{--                    <a href="{{ $this->news->previousPageUrl() }}"--}}
{{--                       class="px-3 py-2 border border-gray-300 text-gray-500 rounded-l-md hover:bg-gray-50">--}}
{{--                        ← Sebelumnya--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @foreach ($this->news->getUrlRange(1, $this->news->lastPage()) as $page => $url)--}}
{{--                    @if ($page == $this->news->currentPage())--}}
{{--                        <span class="px-3 py-2 border-t border-b border-gray-300 text-gray-700 bg-white">{{ $page }}</span>--}}
{{--                    @else--}}
{{--                        <a href="{{ $url }}"--}}
{{--                           class="px-3 py-2 border border-gray-300 text-gray-500 hover:bg-gray-50">--}}
{{--                            {{ $page }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--                @if ($this->news->hasMorePages())--}}
{{--                    <a href="{{ $this->news->nextPageUrl() }}"--}}
{{--                       class="px-3 py-2 border border-gray-300 text-gray-500 rounded-r-md hover:bg-gray-50">--}}
{{--                        Selanjutnya →--}}
{{--                    </a>--}}
{{--                @else--}}
{{--                    <span class="px-3 py-2 border border-gray-300 text-gray-400 rounded-r-md cursor-not-allowed">Selanjutnya →</span>--}}
{{--                @endif--}}

{{--            </nav>--}}
{{--        </div>--}}
{{--        @endif--}}

    </section>
</div>
