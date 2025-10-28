<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 mb-8">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <x-tab-item :href="route('pengaturan.hero-slider')" :active="Request::routeIs('pengaturan.hero-slider')" wire:navigate>Hero Slider</x-tab-item>
        </li>
        <li class="me-2">
            <x-tab-item :href="route('pengaturan.galeri-slider')" :active="Request::routeIs('pengaturan.galeri-slider')" wire:navigate>Galeri</x-tab-item>
        </li>
    </ul>
</div>
