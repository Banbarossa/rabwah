<section class="py-20 md:py-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 to-white"></div>
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-32 h-32 border-2 border-emerald-400 rounded-full"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 border-2 border-teal-400 rounded-full"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 border-2 border-cyan-400 rounded-full"></div>
    </div>

    <div class="container mx-auto px-6 relative">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <div
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-100 to-teal-100 px-6 py-2 rounded-full mb-6"
                >
                    <flux:icon.heart class="text-emerald-600 size-8"/>
                    <span class="text-emerald-700 font-semibold">Berbagi Kebaikan</span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 bg-gradient-to-r from-emerald-700 via-teal-700 to-cyan-700 bg-clip-text text-transparent">
                    Bantu Santri Yatim Meraih Masa Depan Cerah
                </h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Pesantren Ar-Rabwah memberikan beasiswa penuh kepada santri yatim untuk menempuh pendidikan
                    berkualitas.
                    Dukungan Anda sangat berarti untuk keberlangsungan program ini.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                @foreach($this->stats as $stat)
                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
                        <div class="flex flex-col items-center text-center">
                            <div
                                class="w-16 h-16 rounded-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center mb-4">
{{--                                <stat.icon class="text-emerald-600" size="28"/>--}}
                                <flux:icon name="{{$stat['icon']}}" class="w-6 text-emerald-600"/>
                            </div>
                            <div class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{$stat['value']}}</div>
                            <div class="text-gray-600">{{$stat['label']}}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div
                class="bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 rounded-3xl p-8 md:p-12 relative
                overflow-hidden ">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

                <div class="relative text-center">
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">
                        Setiap Donasi Anda Berarti
                    </h3>
                    <p class="text-lg text-white/90 mb-8 max-w-2xl mx-auto">
                        Donasi Anda akan digunakan untuk biaya operasional pesantren,
                        kebutuhan santri yatim, dan pengembangan fasilitas pendidikan.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a class="bg-white text-emerald-600 px-8 py-4 rounded-full font-semibold shadow-2xl hover:shadow-white
                    /50 transition-all flex items-center gap-2">
                            Donasi Sekarang
                            <flux:icon.arrow-right/>
                        </a>
                        <a href="{{route('donasi')}}" wire:navigate class="bg-white/10 backdrop-blur-sm text-white border-2 border-white
                    /30 px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-colors">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center ">
                <p class="text-gray-500 text-sm">
                    💚 Donasi Anda adalah amal jariyah yang akan terus mengalir pahalanya
                </p>
            </div>
        </div>
    </div>
</section>
