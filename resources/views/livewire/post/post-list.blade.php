<div class="min-h-screen ">

    <section class="bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600  pb-12 md:pb-16 pt-32 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center gap-3 mb-4">
                <flux:icon.document-text class="size-11 "/>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-semibold capitalize">Berita</h1>
            </div>
            <p class="text-lg  max-w-3xl">
                Informasi terkini seputar kegiatan, prestasi, dan perkembangan Pesantren Imam Syafi'i
            </p>
        </div>
    </section>


    <main class="max-w-7xl mx-auto px-6 py-8 md:py-12" x-data="{viewMode:'grid'}">
        @if($featuredPost)
            <a href="{{route('single-post',$featuredPost->slug)}}" wire:navigate>
                <x-card.container
                    class="border-2 border-teal/10 dark:border-secondary/30 rounded-lg mb-12 overflow-hidden hover:shadow-2xl transition-all group cursor-pointer">
                    <div class="p-0 ">
                        <div class="grid md:grid-cols-2 gap-0 items-center">
                            <div class="relative h-64 w-full md:h-full overflow-hidden ">
                                <img
                                    src="{{$featuredPost->thumbnail}}"
                                    alt="{{$featuredPost->title}}"
                                    class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-500"
                                />
                            </div>
                            <div class="p-8 md:p-12 flex flex-col justify-center">
                                <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 rounded-full bg-emerald-500/20 dark:bg-secondary/70 text-emerald-600 text-sm font-medium">
                                {{$featuredPost->category?->name}}
                            </span>
                                    <span class="text-sm text-emerald-600">{{$featuredPost->published_at}}</span>
                                </div>
                                <h2 class="text-2xl md:text-3xl font-semibold text-teal-600 dark:text-accent-content text-wrap mb-4 group-hover:text-teal-600 transition-colors">
                                    {{$featuredPost->title}}
                                </h2>
                                <p class="text-foreground/70 dark:text-accent-content/80  text-wrap mb-6 line-clamp-3">
                                    {{$featuredPost->excerpt}}
                                </p>
                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center gap-4 text-sm text-foreground/60 dark:text-accent-content/80">
                                    <span class="flex items-center gap-1">
                                        <flux:icon.user class="size-4"/>
                                        {{$featuredPost->penulis?->name}}
                                    </span>
                                        <span class="flex items-center gap-1">
                                        <flux:icon.eye class="size-4"/>
                                        {{$featuredPost->views}} views
                                    </span>
                                    </div>
                                    <x-button
                                        class="gap-2 bg-primary text-primary-foreground hover:bg-primary/90"
                                    >
                                        Baca Selengkapnya
                                        <flux:icon.arrow-right class="size-4"/>
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card.container>
            </a>
        @endif

        <div class="mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                @foreach($this->categories() as $category)

                    <button
                        wire:click="changeCategory({{$category->id}})"
                        class="px-4 py-2 rounded-full font-medium transition-all  {{$categorySelected === $category->id ?'bg-teal-600 text-white shadow-lg':'bg-white border-2 border-border text-foreground/70 hover:border-primary/30'}}"
                    >
                        {{$category->name}}
                        <span class="ml-2 text-sm opacity-80">({{$category->posts_count}})</span>
                    </button>
                @endforeach
                @if($categorySelected)
                    <button
                        wire:click="clearCategory()"
                        class="px-4 py-2 rounded-full font-medium transition-all bg-white border-2 border-border text-foreground/70 hover:border-primary/30 shadow-lg flex items-center gap-2"
                    >
                        <flux:icon.bolt-slash class="size-4"/>
                        Clear Filter
                    </button>
                @endif
            </div>

            <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
                <div class="relative flex-1 max-w-md w-full">
                      <flux:input wire:model.live.debounce.250ms="search" placeholder="Type To Search..."/>
                </div>
                <div class="hidden md:flex items-center gap-2 bg-white rounded-lg border-2 border-border p-1">
                    <button
                        x-on:click="viewMode = 'grid'"
                        class="p-2 rounded transition-colors"
                        x-bind:class="viewMode === 'grid'?' bg-teal-600 text-primary-foreground':'text-foreground/60 hover:text-teal-600'"
                    >
                        <flux:icon.layout-grid/>
                    </button>
                    <button
                        x-on:click="viewMode = 'list'"
                        class="p-2 rounded transition-colors"
                        x-bind:class="viewMode === 'list'?' bg-teal-600 text-primary-foreground':'text-foreground/60 hover:text-teal-600'"
                    >
                        <flux:icon.numbered-list/>
                    </button>
                </div>
            </div>
        </div>


        <div
            class="mb-12"
            x-bind:class="viewMode === 'grid'
                ? 'grid md:grid-cols-2 lg:grid-cols-3 gap-6'
                : 'space-y-6'"
        >
            @forelse($this->posts as $post)
                <a href="{{route('single-post',$post->slug)}}" wire:navigate class="block">
                    <x-card.container
                        class="border-2 rounded border-teal-600/10 hover:shadow-xl hover:border-teal-600/30 dark:hover:border-secondary/60 transition-all group cursor-pointer overflow-hidden"
                    >
                        <div class="p-0">
                            <div x-show="viewMode ==='grid'">
                                <div class="relative h-48 overflow-hidden">
                                    <img
                                        src="{{$post->thumbnail}}"
                                        alt="{{$post->title}}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    />
                                    <div class="absolute top-3 left-3">
                                    <span
                                        class="inline-block px-3 py-1 rounded-full bg-teal-600 text-white text-xs font-medium">
                                      {{$post->category?->name}}
                                    </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-3 text-sm text-foreground/60 mb-3">
                                <span class="flex items-center gap-1">
                                    <flux:icon.calendar class="size-4"/>
                                    {{format_tanggal($post->published_at,'d M Y')}}
                                </span>
                                        <span class="flex items-center gap-1">
                                    <flux:icon.eye class="size-4"/>
                                    {{$post->views}} views
                                </span>
                                    </div>
                                    <h3 class="font-semibold text-teal-600 dark:text-accent-content mb-3 line-clamp-2 group-hover:text-teal-700 transition-colors">
                                        {{$post->title}}
                                    </h3>
                                    <p class="text-sm text-foreground/70 dark:text-accent-content/80 line-clamp-2 mb-4">
                                        {{$post->excerpt}}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-foreground/60 dark:text-accent-content/80 flex items-center gap-1">
                                            <flux:icon.user class="size-4"/>
                                            {{$post->author?->name}}
                                        </span>
                                        <flux:icon.arrow-right class="text-primary dark:text-secondary group-hover:translate-x-1 transition-transform"/>
                                    </div>
                                </div>
                            </div>
                            {{--        // List View--}}
                            <div x-show="viewMode === 'list'" class="flex flex-col sm:flex-row gap-8 items-center" x-cloak>
                                <div
                                    class="relative w-full sm:w-48 h:48 sm:h-32 flex-shrink-0 overflow-hidden rounded-lg sm:rounded-r-lg shadow">
                                    <img
                                        src="{{$post->thumbnail}}"
                                        alt="{{$post->title}}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    />
                                    <div class="absolute top-2 left-2">
                                    <span class="inline-block px-2 py-1 rounded-full br-primary bg-teal-600 text-white text-xs
                                          font-medium">
                                      {{$post->category?->name}}
                                    </span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0 p-6 sm:p-0">
                                    <div class="flex items-center gap-4 text-sm text-foreground/60 dark:text-accent-content/70 mb-2">
                                        <span class="flex items-center gap-1">
                                            <flux:icon.calendar class="size-4"/>
                                            {{format_tanggal($post->published_at,'d M Y')}}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <flux:icon.eye class="size-4"/>
                                            {{$post->views}} views
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <flux:icon.user class="size-4"/>
                                            {{$post->author?->name}}
                                        </span>
                                    </div>
                                    <h3 class="font-semibold text-teal-600 dark:text-accent-content text-lg mb-2 line-clamp-2 group-hover:text-teal-700 transition-colors">
                                        {{$post->title}}
                                    </h3>
                                    <p class="text-sm text-foreground/70 dark:text-accent-content/80 line-clamp-2">
                                        {{$post->excerpt}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </x-card.container>
                </a>
                {{--                Sentinel Element--}}

            @empty
                <div class="col-span-3">
                    <x-card.container class="border-2 border-primary/10">
                        <x-card.content class="p-12 text-center">
                            <span
                                class="material-symbols-outlined text-foreground/30 text-6xl mb-4 block">search_off</span>
                            <h3 class="font-semibold text-primary text-xl mb-2">Tidak Ada Hasil</h3>
                            <p class="text-foreground/60">Coba gunakan kata kunci atau filter yang berbeda</p>
                        </x-card.content>
                    </x-card.container>
                </div>
            @endforelse


            {{--                <div--}}
            {{--                    x-intersect.once="loadMore()"--}}
            {{--                    class="h-10 text-center"--}}
            {{--                >--}}
            {{--                    <span x-show="loading" x-cloak>Loading...</span>--}}
            {{--                </div>--}}
        </div>


        <div class="mt-6">
            {{$this->posts->links()}}
        </div>
    </main>
</div>
