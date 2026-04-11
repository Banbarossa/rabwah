<div>

    <div class="bg-white border-b border-border dark:bg-neutral-900">
        <div class="max-w-4xl mx-auto px-6 py-4">
            <div class="flex items-center gap-2 text-sm text-foreground/60 dark:text-accent-content/70">
                <a href="{{route('home')}}">Beranda</a>
                <flux:icon.chevron-right class="size-3"></flux:icon.chevron-right>
{{--                <a href="{{route('post',$type)}}" class="hover:text-primary transition-colors capitalize">{{$type}}</a>--}}
                <flux:icon.chevron-right class="size-3"></flux:icon.chevron-right>
                <span class="text-primary dark:text-accent-content">Content</span>
            </div>
        </div>
    </div>

    <main class="max-w-4xl mx-auto px-6 py-8 md:py-12">
        <article class="bg-white dark:bg-neutral-900 rounded-2xl shadow-lg overflow-hidden mb-8">
            @if($article->thumbnail)
                <div class="relative h-[300px] md:h-[500px] overflow-hidden">
                    <img
                        src="{{$article->thumbnail}}"
                        alt="{{$article->title}}"
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute top-6 left-6">
              <span class="inline-block px-4 py-2 rounded-full bg-teal-600 text-primary-foreground font-medium">
                {{$article->category?->name}}
              </span>
                    </div>
                </div>
            @endif
            <div class="p-6 md:p-12">
                <h1 class="text-3xl font-semibold text-teal-600 dark:text-accent-content mb-6 leading-tight">
                    {{$article->title}}
                </h1>

                <div
                    class="flex flex-wrap items-center gap-4 md:gap-6 pb-6 mb-8 border-b border-border text-foreground/70 dark:text-secondary/90">
                    <div class="flex items-center gap-2 ">
                        <flux:icon.user-circle class="size-4"/>
                        <span>{{$article->author?->name}}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <flux:icon.calendar class="size-4"/>
                        <span>{{format_tanggal($article->published_at,'d-m-Y')}}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <flux:icon.clock class="size-4"/>
                        <span>{{$article->readingTime}} Menit</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <flux:icon.eye class="size-4"/>
                        <span>{{$article->views}} views</span>
                    </div>
                </div>

                {{--                Share Button--}}
                <x-shared-button :url="url()->current()" :title="$article->title"/>

                {{--                share--}}
                <div
                    class="prose prose-lg max-w-none quill-reset"
                >
                    {!! $article->content !!}
                </div>

{{--                <div class="mt-12 pt-8 border-t border-border">--}}
{{--                    <div class="flex flex-wrap items-center gap-2">--}}
{{--                        <span class="material-symbols-outlined text-foreground/60">local_offer</span>--}}


{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </article>

        <x-card class="border-2 border-primary/10 dark:bg-neutral-900 mb-8">
            <x-card-content class="p-6 md:p-8">
                <div class="flex items-start gap-4">
                    <div
                        class="w-16 h-16 rounded-full bg-teal-600/10  flex items-center justify-center flex-shrink-0">
                        <flux:icon.user-circle class="text-teal-600 text-3xl"/>
                    </div>
                    <div class="flex-1">
                        <div
                            class="font-semibold text-primary dark:text-accent-content text-lg mb-1">{{$article->penulis?->name}}</div>
                        <div class="text-foreground/60 dark:text-accent-content/80 mb-3">Administrator Pesantren Imam
                            Syafi'i
                        </div>
                        <p class="text-foreground/70 dark:text-accent-content/80 leading-relaxed">
                            Tim Pesantren Imam Syafi'i berkomitmen untuk menyajikan informasi terkini seputar
                            kegiatan, prestasi, dan perkembangan pesantren kepada masyarakat.
                        </p>
                    </div>
                </div>
            </x-card-content>
        </x-card>

        <div class="mt-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-teal-600 dark:text-accent-content mb-6 flex items-center gap-3">
                <flux:icon.document-text></flux:icon.document-text>
                Artikel Terkait
            </h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($this->relatedArticles() as $related)
                    <a href="{{route('single-post',$related['slug'])}}">
                        <x-card
                            class="border-2 dark:bg-neutral-900 border-emerald-600/10 dark:border-secondary/30 hover:shadow-xl hover:border-primary/30 dark:hover:border-secondary/60 hover:bg-teal-600/10  transition-all group cursor-pointer">
                            <x-card-content class="p-0">
                                <div class="relative h-48 overflow-hidden">
                                    <img
                                        src="{{$related['image']}}"
                                        alt="{{$related['title']}}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    />
                                    <div class="absolute top-3 left-3">
                      <span
                          class="inline-block px-3 py-1 rounded-full bg-teal-600  text-primary-foreground text-xs font-medium">
                        {{$related['category']}}
                      </span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="text-sm text-foreground/60 mb-2 flex items-center gap-1">
                                        <flux:icon.calendar class="size-4"/>
                                        {{$related['date']}}
                                    </div>
                                    <h3 class="font-semibold text-teal-600 dark:text-accent-content line-clamp-2 group-hover:text-teal-600/80 transition-colors">
                                        {{$related['title']}}
                                    </h3>
                                </div>
                            </x-card-content>
                        </x-card>
                    </a>
                @endforeach
            </div>
        </div>

{{--        <x-card class="border-2 border-primary/10 dark:border-secondary/30 dark:bg-neutral-900 mt-8">--}}
{{--            <x-card-content class="p-6 md:p-8">--}}
{{--                <h3 class="text-2xl font-semibold text-primary dark:text-accent-content mb-6 flex items-center gap-3">--}}
{{--                    <flux:icon.chat-bubble-left-right/>--}}
{{--                    Komentar--}}
{{--                </h3>--}}
{{--                <div class="space-y-6">--}}
{{--                    @auth--}}
{{--                        <div>--}}
{{--                            <form wire:submit.prevent="saveComment">--}}
{{--                                <input type="text" name="hp_field" wire:model="hp_field" style="display:none">--}}
{{--                                <textarea wire:model="comment"--}}
{{--                                          class="w-full min-h-[120px] rounded-xl border-2 border-border px-4 py-3 resize-none focus:border-primary focus:outline-none transition-colors dark:border-secondary/40 dark:focus:border-secondary dark:text-accent-content"--}}
{{--                                          placeholder="Tulis komentar Anda..."--}}
{{--                                ></textarea>--}}
{{--                                <div class="flex justify-end mt-3">--}}
{{--                                    <x-button type="submit" class="gap-2 bg-primary text-primary-foreground hover:bg-primary/90">--}}
{{--                                        <span class="material-symbols-outlined">send</span>--}}
{{--                                        Kirim Komentar--}}
{{--                                    </x-button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    @else--}}

{{--                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 mb-8 text-center">--}}
{{--                            <div class="max-w-md mx-auto">--}}
{{--                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">--}}
{{--                                    <Lock class="w-6 h-6 text-gray-400" />--}}
{{--                                </div>--}}
{{--                                <h3 class="text-gray-900 mb-2">Login untuk Berkomentar</h3>--}}
{{--                                <p class="text-gray-600 mb-6">--}}
{{--                                    Anda harus login terlebih dahulu untuk dapat memberikan komentar pada artikel ini.--}}
{{--                                </p>--}}
{{--                                @if(Route::has('auth'))--}}
{{--                                    <flux:button href="{{route('auth')}}">--}}
{{--                                        <x-google-icon></x-google-icon>--}}
{{--                                        Login dengan Google--}}
{{--                                    </flux:button>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endauth--}}

{{--                    <div class="pt-6 border-t border-border dark:border-accent-content/40">--}}
{{--                        <div class="space-y-6">--}}
{{--                            @foreach($article->comments as $comment)--}}
{{--                                <div class="flex gap-4">--}}
{{--                                    <div--}}
{{--                                        class="w-10 h-10 rounded-full bg-primary/10  dark:bg-secondary/30 flex items-center justify-center flex-shrink-0">--}}
{{--                                        <flux:icon name="user"--}}
{{--                                                   class="size-4 text-primary dark:text-secondary"></flux:icon>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-1">--}}
{{--                                        <div class="flex items-center gap-3 mb-1">--}}
{{--                                            <span--}}
{{--                                                class="font-semibold text-primary dark:text-accent-content">{{$comment->user?->name}}</span>--}}
{{--                                            <span--}}
{{--                                                class="text-sm text-foreground/60 dark:text-accent-content/80">{{format_tanggal($comment->created_at,'d M Y')}}</span>--}}
{{--                                        </div>--}}
{{--                                        <p class="text-foreground/70 dark:text-accent-content/80">{{$comment->content}}</p>--}}
{{--                                        @if(Auth::check() && Auth::user()->level==='admin')--}}
{{--                                            <div class="flex">--}}
{{--                                                <flux:button variant="ghost" size="sm" wire:click="hideComment({{$comment->id}})">--}}
{{--                                                    <flux:icon name="eye-slash" class="size-4 text-secondary"/>--}}
{{--                                                </flux:button>--}}
{{--                                                <flux:button variant="ghost" size="sm" wire:click="deleteComment({{$comment->id}})">--}}
{{--                                                    <flux:icon name="trash" class="size-4 text-primary"/>--}}
{{--                                                </flux:button>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </x-card-content>--}}
{{--        </x-card>--}}
    </main>
</div>
