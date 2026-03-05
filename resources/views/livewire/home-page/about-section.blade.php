<section id="tentang" ref={ref} class="py-20 md:py-28 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div
          class="text-center max-w-3xl mx-auto mb-16"
        >
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
            Tentang Pesantren <span class="text-emerald-600">Ar-Rabwah</span>
        </h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Pesantren Ar-Rabwah lahir dari pemikiran akan penting mendirikan suasana ideal bagi himpunan generasi muda, khususnya remaja putra-putri. Kami mengajarkan Al-Qur'an dan mendalam ilmu agama.
        </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($this->features() as $feature)
            <div  class="bg-white p-8 rounded-2xl shadow-lg shadow-gray-200/50 hover:shadow-xl hover:shadow-emerald-100/50 transition-all hover:-translate-y-1">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-emerald-500/30">
                <flux:icon class="text-white size-6" name="{{$feature['icon']}}"/>
            </div>
            <h3 class="font-bold text-gray-900 mb-2">{{$feature['title']}}</h3>
            <p class="text-gray-600">{{$feature['description']}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
