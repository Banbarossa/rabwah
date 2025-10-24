<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
{{--    @filemanagerStyles--}}
    @stack('style')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

    <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo/>
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Platform')" class="grid">
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                               wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
        </flux:navlist.group>
        <flux:navlist.group heading="Post" expandable :expanded="Request::is('post*')">
            <flux:navlist.item href="{{route('post.index')}}">Semua Post</flux:navlist.item>
            <flux:navlist.item href="{{route('post.form')}}">Buat Postingan</flux:navlist.item>
            <flux:navlist.item href="{{route('post.category')}}">Category</flux:navlist.item>
            <flux:navlist.item href="{{route('post.tag')}}">Tag</flux:navlist.item>
        </flux:navlist.group>
        <flux:navlist.group heading="Fundraising" expandable :expanded="Request::is('fundraising*')">
            <flux:navlist.item href="{{route('fundraising.donatur')}}">Donatur</flux:navlist.item>
            <flux:navlist.item href="{{route('fundraising.program')}}">Program</flux:navlist.item>
            <flux:navlist.item href="{{route('post.category')}}">Category</flux:navlist.item>
            <flux:navlist.item href="{{route('post.tag')}}">Tag</flux:navlist.item>
        </flux:navlist.group>
        <flux:navlist.group class="grid">
            <flux:navlist.item icon="home" :href="route('file-manager')" :current="request()->routeIs('file-manager')"
                               wire:navigate>{{ __('File Manager') }}</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    <flux:spacer/>


    <!-- Desktop User Menu -->
    <flux:dropdown class="hidden lg:block" position="bottom" align="start">
        <flux:profile
            :name="auth()->user()->name"
            :initials="auth()->user()->initials()"
            icon:trailing="chevrons-up-down"
        />

        <flux:menu class="w-[220px]">
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>

            <flux:menu.separator/>

            <flux:menu.radio.group>
                <flux:menu.item :href="route('profile.edit')" icon="cog"
                                wire:navigate>{{ __('Settings') }}</flux:menu.item>
            </flux:menu.radio.group>

            <flux:menu.separator/>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>

<!-- Mobile User Menu -->
<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    <flux:spacer/>

    <flux:dropdown position="top" align="end">
        <flux:profile
            :initials="auth()->user()->initials()"
            icon-trailing="chevron-down"
        />

        <flux:menu>
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>

            <flux:menu.separator/>

            <flux:menu.radio.group>
                <flux:menu.item :href="route('profile.edit')" icon="cog"
                                wire:navigate>{{ __('Settings') }}</flux:menu.item>
            </flux:menu.radio.group>

            <flux:menu.separator/>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:header>


<flux:main>
    <div>

        <flux:heading size="xl" level="2">{{$title??config('app.name')}}</flux:heading>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('dashboard')}}">Home</flux:breadcrumbs.item>
            @if(isset($breads))
                @foreach($breads as $bread)
                    <flux:breadcrumbs.item href="{{$bread['url']}}">{{$bread['label']}}</flux:breadcrumbs.item>
                @endforeach
            @endif
        </flux:breadcrumbs>
        <flux:separator variant="subtle"/>
    </div>
    <div>

        {{ $slot }}
    </div>
</flux:main>


@filemanagerScripts
@stack('script')
@fluxScripts
</body>
</html>
