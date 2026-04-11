<section ref={ref} class="py-20 md:py-28 bg-white relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div
          class="text-center max-w-3xl mx-auto mb-16"
        >
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
            Berita & Artikel
        </h2>
        <p class="text-lg text-gray-600">
            Informasi terkini seputar kegiatan dan perkembangan Pesantren Ar-Rabwah
        </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($this->news as $item)
                <article
                    class="group bg-white rounded-3xl shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:shadow-gray-300/50 transition-all overflow-hidden"
                >
                    <div class="relative h-56 bg-gradient-to-br from-emerald-500 to-teal-600 overflow-hidden">
                        <img
                            src="{{$item['image']}}"
                            alt="{{$item['title']}}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        />
                        <div class="absolute top-4 left-4">
                  <span
                      class="bg-white/90 backdrop-blur-sm text-emerald-600 px-4 py-1.5 rounded-full text-sm font-medium">
                    {{$item['category']}}
                  </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                            <div class="flex items-center gap-1.5">
                                <Calendar size="16"/>
                                <span>{{$item['date']}}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <User size="16"/>
                                <span>{{$item['author']}}</span>
                            </div>
                        </div>
                        <h3 class="font-bold text-xl text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                            {{$item['title']}}
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed line-clamp-2">
                            {{$item['excerpt']}}
                        </p>
                        <button
                            class="flex items-center gap-2 text-emerald-600 font-medium group-hover:gap-3 transition-all">
                            Baca Selengkapnya
                            <ArrowRight size="18"/>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
