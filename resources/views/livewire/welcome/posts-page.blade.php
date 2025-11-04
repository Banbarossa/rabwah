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


    </section>
</div>
