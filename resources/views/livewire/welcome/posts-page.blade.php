<div>
    <section class="max-w-6xl mx-auto px-4 py-10">

        {{-- Judul Halaman --}}
        <div class="mb-20">
            <x-section-title
                label="Artikel Terbaru"
                description="Kumpulan tulisan dan kabar terbaru dari kami."/>
        </div>

        {{-- Daftar Postingan --}}
        @php
            $posts = [
                [
                    'title' => 'Menjadi Santri yang Produktif di Era Digital',
                    'excerpt' => 'Bagaimana memanfaatkan teknologi tanpa melupakan nilai-nilai Islam...',
                    'thumbnail' => asset('swiper/swipe1.jpg'),
                    'date' => '20 Oktober 2025',
                    'author' => 'Ustadz Ahmad',
                    'slug' => 'menjadi-santri-yang-produktif',
                ],
                [
                    'title' => 'Keutamaan Membaca Al-Qur’an Setiap Hari',
                    'excerpt' => 'Banyak keutamaan yang dijanjikan bagi siapa pun yang istiqamah membaca Al-Qur’an...',
                    'thumbnail' => asset('swiper/swipe2.jpg'),
                    'date' => '15 Oktober 2025',
                    'author' => 'Ustadzah Nurul',
                    'slug' => 'keutamaan-membaca-alquran',
                ],
                [
                    'title' => 'Belajar dengan Ikhlas dan Disiplin',
                    'excerpt' => 'Ikhlas adalah pondasi utama ilmu yang bermanfaat. Disiplin adalah kuncinya...',
                    'thumbnail' => asset('swiper/swipe1.jpg'),
                    'date' => '10 Oktober 2025',
                    'author' => 'Ustadz Hasan',
                    'slug' => 'belajar-dengan-ikhlas',
                ],
            ];
        @endphp

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <div class="bg-white shadow-sm hover:shadow-md rounded-2xl overflow-hidden transition duration-300">
                    <a href="{{ url('posts/'.$post['slug']) }}">
                        <img src="{{ $post['thumbnail'] }}" alt="{{ $post['title'] }}"
                             class="aspect-[16/10] w-full object-cover">
                    </a>
                    <div class="p-5">
                        <a href="{{ url('posts/'.$post['slug']) }}"
                           class="text-lg font-semibold hover:text-brand-green line-clamp-2">
                            {{ $post['title'] }}
                        </a>
                        <p class="text-gray-500 text-sm mt-1 mb-3">
                            {{ $post['author'] }} · {{ $post['date'] }}
                        </p>
                        <p class="text-gray-600 text-sm line-clamp-3">
                            {{ $post['excerpt'] }}
                        </p>
                        <div class="mt-4">
                            <a href="{{ url('posts/'.$post['slug']) }}"
                               class="text-blue-600 font-medium text-sm hover:underline">
                                Baca selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination Palsu --}}
        <div class="flex justify-center mt-10">
            <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 rounded-l-md hover:bg-gray-50">← Sebelumnya</a>
                <a href="#" class="px-3 py-2 border-t border-b border-gray-300 text-gray-700 bg-white">1</a>
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 hover:bg-gray-50">2</a>
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 rounded-r-md hover:bg-gray-50">Selanjutnya →</a>
            </nav>
        </div>

    </section>
</div>
