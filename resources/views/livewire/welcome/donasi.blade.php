<div>
    <section class="bg-gradient-to-b from-brand-cream to-white py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-brand-green mb-4">
                Mari Jadi Bagian dari Perjuangan Santri Yatim dan Dhuafa
            </h1>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Pesantren kami mendidik santri yatim dan dhuafa dengan cinta dan ikhlas.
                Bantuan Anda bukan sekadar donasi — tetapi investasi akhirat yang nyata.
            </p>

            <div class="mt-8">
                <a href="#programs" class="bg-brand-green text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-700 transition">
                    Lihat Program Donasi
                </a>
            </div>
        </div>
    </section>

    {{-- PROGRAM UTAMA --}}
    <section id="utama" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-brand-green mb-2">Program Utama Fundraising</h2>
                <p class="text-gray-600">Tiga program utama yang menopang pendidikan santri yatim dan dhuafa.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $utama = [
                        [
                            'title' => 'Orang Tua Asuh Santri',
                            'desc' => 'Bantu satu santri yatim atau dhuafa agar tetap bisa belajar di pesantren dengan fasilitas dan kebutuhan hidup yang layak.',
                            'image' => asset('images/fundraising/orangtua-asuh.jpg'),
                            'link' => '#',
                        ],
                        [
                            'title' => 'Biaya Operasional Pesantren',
                            'desc' => 'Dukung kegiatan harian pesantren — dari listrik, air, hingga kebutuhan bahan makanan santri.',
                            'image' => asset('images/fundraising/operasional.jpg'),
                            'link' => '#',
                        ],
                        [
                            'title' => 'Pembangunan & Perbaikan Asrama',
                            'desc' => 'Berikan kontribusi untuk pembangunan ruang belajar, kamar santri, atau fasilitas umum pondok.',
                            'image' => asset('images/fundraising/pembangunan.jpg'),
                            'link' => '#',
                        ],
                    ];
                @endphp

                @foreach ($utama as $item)
                    <div class="bg-white shadow-sm hover:shadow-lg rounded-2xl overflow-hidden transition">
                        <img src="{{ $item['image'] }}" class="aspect-[16/10] w-full object-cover" alt="{{ $item['title'] }}">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-brand-green mb-2">{{ $item['title'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $item['desc'] }}</p>
                            <a href="{{ $item['link'] }}" class="inline-block bg-emerald-600 text-white text-sm px-4 py-2 rounded-md hover:bg-emerald-700">
                                Donasi Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROGRAM LAINNYA --}}
    <section id="programs" class="py-16 bg-brand-cream">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-brand-greenmb-2">Program Donasi Lainnya</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Selain tiga program utama, pesantren juga membuka donasi untuk kebutuhan insidental seperti pembangunan sumur bor, dapur umum, dan bantuan kesehatan santri.
                </p>
            </div>

            @php
                $lain = [
                    [
                        'title' => 'Pembangunan Sumur Bor',
                        'desc' => 'Air bersih untuk santri dan warga sekitar. Setiap tetes air jadi amal jariyah tanpa batas.',
                        'image' => asset('images/fundraising/sumur-bor.jpg'),
                        'target' => 'Rp 25.000.000',
                        'collected' => 'Rp 12.500.000',
                    ],
                    [
                        'title' => 'Renovasi Dapur Santri',
                        'desc' => 'Dukung renovasi dapur agar lebih sehat dan layak bagi santri yang makan bersama setiap hari.',
                        'image' => asset('images/fundraising/dapur.jpg'),
                        'target' => 'Rp 15.000.000',
                        'collected' => 'Rp 8.000.000',
                    ],
                ];
            @endphp

            <div class="grid md:grid-cols-2 gap-8">
                @foreach($lain as $item)
                    <div class="bg-white shadow-sm rounded-2xl overflow-hidden hover:shadow-lg transition">
                        <img src="{{ $item['image'] }}" class="aspect-[16/9] w-full object-cover" alt="{{ $item['title'] }}">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-brand-green mb-2">{{ $item['title'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $item['desc'] }}</p>

                            <div class="mb-3">
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Terkumpul: {{ $item['collected'] }}</span>
                                    <span>Target: {{ $item['target'] }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                    <div class="bg-brand-cream h-2 rounded-full" style="width: {{ (intval(str_replace(['Rp', '.', ','], '', $item['collected'])) / intval(str_replace(['Rp', '.', ','], '', $item['target']))) * 100 }}%;"></div>
                                </div>
                            </div>

                            <a href="#" class="bg-brand-green text-white text-sm px-4 py-2 rounded-md hover:bg-emerald-700">
                                Donasi Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-brand-cream text-brand-green py-16 text-center">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Setiap Rupiah Anda, Jadi Cahaya untuk Santri</h2>
            <p class="mb-6">
                Tak semua anak punya kesempatan belajar di pesantren.
                Tapi dengan bantuan Anda, mereka bisa jadi generasi Qur’ani yang kuat dan mandiri.
            </p>
            <a href="#programs" class="bg-brand-green text-brand-cream hover:text-white font-semibold px-6 py-3 rounded-lg hover:bg-brand-green/80 transition">
                Berdonasi Sekarang
            </a>
        </div>
    </section>
</div>
