<div>

    <header
        class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 "
    >
        <div class="container mx-auto px-6 py-4 ">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                        <x-app-logo-icon class="w-10! h-10!"/>
{{--                    <div--}}
{{--                        class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center p-1">--}}
{{--                        <span class="text-white text-sm font-semibold">AR</span>--}}
{{--                    </div>--}}
                    <div>
                        <div class="text-xs text-gray-500">Pesantren Islam</div>
                        <div class="font-semibold text-lg text-gray-900 leading-3">Ar-Rabwah</div>
                    </div>
                </div>
                <nav class="hidden md:flex items-center gap-8">
                    @foreach($this->menus as $menu)

                    <a href="{{$menu['link']}}" wire:navigate class="text-gray-600 hover:text-emerald-600 transition-colors">
                        {{$menu['label']}}
                    </a>
                    @endforeach
                </nav>
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="right"/>
            </div>
        </div>
    </header>
    <flux:sidebar stashable sticky
                  class="lg:hidden   bg-primary   ">
        <div class="pt-18 ">

            <flux:sidebar.toggle class="lg:hidden mb-4" icon="x-mark"/>

            <ul class="text-sm text-neutral-500 space-x-2 flex gap-4 flex-col lg:flex-row">
                @foreach($this->menus as $menu)

                <li>
                    <a href="{{$menu['link']}}" wire:navigate class="text-gray-600 hover:text-emerald-600 transition-colors">
                        {{$menu['label']}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>


    </flux:sidebar>
</div>
