<section id="program" class="py-20 md:py-28 relative overflow-hidden ">
    <div class="container mx-auto px-6">
        <div

            class="text-center max-w-3xl mx-auto mb-16"
        >
            <div class="inline-flex items-center justify-center mb-4">
                <Star class="text-amber-500 fill-amber-500" size="32"/>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Program Unggulan Kami
            </h2>
            <p class="text-lg text-gray-600">
                Beragam program berkualitas untuk mengembangkan potensi santri secara holistik
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($this->programs() as $program)

                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br {{$program['gradient']}} rounded-3xl opacity-0
                         group-hover:opacity-10 transition-opacity">
                    </div>
                    <div
                        class="relative bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 group-hover:shadow-2xl group-hover:shadow-gray-300/50 transition-all h-full border border-gray-100">
                        <div class="w-16 h-16 bg-gradient-to-br {{$program['gradient']}} rounded-2xl flex items-center
                             justify-center mb-6 shadow-lg">
                            <flux:icon class="text-white size-6" name="{{$program['icon']}}"/>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">
                            {{$program['title']}}
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{$program['description']}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
