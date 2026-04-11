@props(['url', 'title'])

@php
    $shareUrl = urlencode($url);
    $shareText = urlencode($title);

    $facebook  = "https://www.facebook.com/sharer/sharer.php?u={$shareUrl}";
    $whatsapp  = "https://wa.me/?text={$shareText}%20{$shareUrl}";
    $twitter   = "https://twitter.com/intent/tweet?text={$shareText}&url={$shareUrl}";
    $telegram  = "https://t.me/share/url?url={$shareUrl}&text={$shareText}";
@endphp

<div>
    <div class="hidden md:flex md:flex-wrap items-center gap-3 mb-8 p-4 rounded-xl bg-muted/50 dark:bg-accent-content/70">
        <span class="font-medium text-foreground/70">Bagikan:</span>

        <x-button
            onclick="window.open('{{ $facebook }}','_blank','width=600,height=400')"
            class="gap-2 bg-[#1877F2] text-white hover:bg-[#1877F2]/90 h-10"
        >
            <span class="text-white w-4">{!! file_get_contents(public_path('svg/facebook.svg')) !!}</span>
            Facebook
        </x-button>

        <x-button
            onclick="window.open('{{ $whatsapp }}','_blank')"
            class="gap-2 bg-[#25D366] text-white hover:bg-[#25D366]/90 h-10"
        >
            <flux:icon.chat-bubble-oval-left/>
            WhatsApp
        </x-button>

        <x-button
            onclick="window.open('{{ $twitter }}','_blank','width=600,height=400')"
            class="gap-2 bg-[#1DA1F2] text-white hover:bg-[#1DA1F2]/90 h-10"
        >
            <span class="text-white w-4">{!! file_get_contents(public_path('svg/x.svg')) !!}</span>
            Twitter
        </x-button>

        <x-button
            onclick="window.open('{{ $telegram }}','_blank')"
            class="gap-2 bg-[#0088cc] text-white hover:bg-[#0088cc]/90 h-10"
        >
            <span class="text-white w-4">{!! file_get_contents(public_path('svg/telegram.svg')) !!}</span>
            Telegram
        </x-button>

        <x-button
            onclick="navigator.clipboard.writeText('{{ $url }}'); alert('Link berhasil disalin!')"
            class="gap-2 bg-muted text-foreground hover:bg-muted/80 h-10"
        >
            <flux:icon.clipboard-document-check class="size-5"/>
            Salin Link
        </x-button>
    </div>

    <div
        x-data="{ open: false }"
        class="md:hidden fixed bottom-6 left-6 z-50"
    >

        <div class="relative">

            {{-- Popup Share --}}
            <div
                x-show="open"
                x-cloak
                x-transition
                @click.outside="open = false"
                class="absolute bottom-16 left-0 bg-white rounded-2xl shadow-2xl p-4 space-y-2 min-w-[200px] border-2 border-primary/10"
            >

                {{-- Facebook --}}
                <button
                    onclick="window.open('{{ $facebook }}', '_blank', 'width=600,height=400')"
                    class="w-full flex items-center gap-3 p-3 rounded-xl hover:bg-[#1877F2]/10 transition-colors text-left"
                >
                    <div class="w-10 h-10 rounded-full bg-[#1877F2] flex items-center justify-center">
                        <span class="text-white w-6">{!! file_get_contents(public_path('svg/facebook.svg')) !!}</span>
                    </div>
                    <span class="font-medium dark:text-primary">Facebook</span>
                </button>

                {{-- WhatsApp --}}
                <button
                    onclick="window.open('{{ $whatsapp }}', '_blank')"
                    class="w-full flex items-center gap-3 p-3 rounded-xl hover:bg-[#25D366]/10 transition-colors text-left"
                >
                    <div class="w-10 h-10 rounded-full bg-[#25D366] flex items-center justify-center">
                        <flux:icon.chat-bubble-oval-left class="text-white"/>
                    </div>
                    <span class="font-medium dark:text-primary">WhatsApp</span>
                </button>

                {{-- Twitter --}}
                <button
                    onclick="window.open('{{ $twitter }}', '_blank', 'width=600,height=400')"
                    class="w-full flex items-center gap-3 p-3 rounded-xl hover:bg-[#1DA1F2]/10 transition-colors text-left"
                >
                    <div class="w-10 h-10 rounded-full bg-[#1DA1F2] flex items-center justify-center">
                        <span class="text-white w-5">{!! file_get_contents(public_path('svg/x.svg')) !!}</span>
                    </div>
                    <span class="font-medium dark:text-primary">Twitter</span>
                </button>

                {{-- Telegram --}}
                <button
                    onclick="window.open('{{ $telegram }}', '_blank')"
                    class="w-full flex items-center gap-3 p-3 rounded-xl hover:bg-[#0088cc]/10 transition-colors text-left"
                >
                    <div class="w-10 h-10 rounded-full bg-[#0088cc] flex items-center justify-center">
                        <span class="text-white w-6">{!! file_get_contents(public_path('svg/telegram.svg')) !!}</span>
                    </div>
                    <span class="font-medium dark:text-primary">Telegram</span>
                </button>

                {{-- Copy Link --}}
                <button
                    onclick="navigator.clipboard.writeText('{{ $url }}'); alert('Link berhasil disalin!')"
                    class="w-full flex items-center gap-3 p-3 rounded-xl hover:bg-muted transition-colors text-left"
                >
                    <div class="w-10 h-10 rounded-full bg-neutral-400 flex items-center justify-center">
                        <flux:icon.clipboard-document-check class="size-5"/>
                    </div>
                    <span class="font-medium dark:text-primary">Salin Link</span>
                </button>

            </div>

            {{-- Floating Share Button --}}
            <button
                @click="open = !open"
                class="w-14 h-14 rounded-full bg-primary text-primary-foreground shadow-2xl flex items-center
                    justify-center hover:scale-110 transition-transform"
            >
                <flux:icon.share/>
                {{--                <span class="material-symbols-outlined text-2xl">share</span>--}}
            </button>

        </div>
    </div>
</div>
