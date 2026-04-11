<div class="fixed bottom-14 md:bottom-4 right-8 w-6 z-50">
    <flux:button x-data
                 x-on:click="$flux.dark = ! $flux.dark"
                 square
                 size="sm"
    >

        <flux:icon.computer-desktop x-show="$flux.appearance === 'system'" x-cloak variant="mini"
                                    class="text-gray-800 "/>
        <flux:icon.moon x-show="$flux.appearance === 'light'" x-cloak variant="mini"
                        class="text-gray-800 "/>

        <flux:icon.sun x-show="$flux.appearance === 'dark'" x-cloak variant="mini"
                       class="dark:text-white"/>
    </flux:button>

    <div x-data="{ showButton: false }" x-init="
                window.addEventListener('scroll', () => {
                    showButton = window.scrollY > 300;
                });
            " class="relative mt-4">

        <!-- Back to Top Button -->
        <flux:button
            size="sm"
            icon="arrow-up"
            x-show="showButton"
            x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
        >

        </flux:button>

    </div>
</div>
