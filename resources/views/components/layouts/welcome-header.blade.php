<div>

    <header
        class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 "
    >
        <div class="container mx-auto px-6 py-4 ">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center">
                        <span class="text-white text-sm font-semibold">AR</span>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">Pesantren Islam</div>
                        <div class="font-semibold text-lg text-gray-900 leading-3">Ar-Rabwah</div>
                    </div>
                </div>
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#tentang" class="text-gray-600 hover:text-emerald-600 transition-colors">
                        Tentang
                    </a>
                    <a href="#program" class="text-gray-600 hover:text-emerald-600 transition-colors">
                        Program
                    </a>
                    <a href="#fasilitas" class="text-gray-600 hover:text-emerald-600 transition-colors">
                        Fasilitas
                    </a>
                    <a href="#galeri" class="text-gray-600 hover:text-emerald-600 transition-colors">
                        Galeri
                    </a>
                    <a href="#kontak" class="text-gray-600 hover:text-emerald-600 transition-colors">
                        Kontak
                    </a>
                </nav>
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
            </div>
        </div>
    </header>
    <flux:sidebar stashable sticky
                  class="lg:hidden border-e mt-24 border-zinc-200 bg-background  dark:border-zinc-700 dark:bg-zinc-900">
        <div class="pt-24 ">

            <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

            <a href="" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse " wire:navigate>
                <x-app-logo/>
            </a>
            <x-guest-navbar/>
        </div>


    </flux:sidebar>
</div>
