<ul class="text-sm text-neutral-500 space-x-2 flex gap-4 flex-col lg:flex-row">

    <li>
        <x-navbar-item href="/" :active="Request::is('/')" wire:navigate>Beranda</x-navbar-item>
    </li>
    <li>
        <x-navbar-item :href="route('tentang')" :active="Request::routeIs('tentang')" wire:navigate>Tentang Kami</x-navbar-item>
    </li>
    <li>
        <x-navbar-item :href="route('donasi')" :active="Request::is('donasi') || Request::is('donasi/*')" wire:navigate>Donasi</x-navbar-item>
    </li>
    <li>
        <x-navbar-item :href="route('pendidikan')" :active="Request::routeIs('pendidikan')" wire:navigate>Pendidikan</x-navbar-item>
    </li>
    <li>
        <x-navbar-item :href="route('posts',['category'=>'berita'])" :active="Request::is('post/berita') ||Request::is('post/berita/*')" wire:navigate>Berita</x-navbar-item>
    </li>
    <li>
        <x-navbar-item :href="route('posts',['category'=>'artikel'])" :active="Request::is('post/artikel') ||Request::is('post/artikel/*')" wire:navigate>Artikel</x-navbar-item>
    </li>

</ul>
