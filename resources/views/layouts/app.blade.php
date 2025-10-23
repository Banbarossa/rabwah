<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>

    @include('partials.head')
        <meta name="description" content="{{ $metaDescription ?? 'Pesantren Ar-Rabwah, program unggulan Tahfidz Al-Qur\'an dan Bahasa Arab di lingkungan perbukitan yang asri dan alami.' }}">

    <style>
        .swiper-button-next svg, .swiper-button-prev svg {
            width: 6px;
            height: 14px;
        }
        .swiper-button-next, .swiper-button-prev {
            color: #166534; /* Green-800 */
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            width: 22px;
            height: 22px;
            transition: background-color 0.3s ease;
        }

        /*.swiper-button-next:hover, .swiper-button-prev:hover {*/
        /*    background-color: white;*/
        /*}*/

        .swiper-button-next::after, .swiper-button-prev::after {
            font-size: 16px;
            font-weight: bold;
        }
    </style>


</head>
<body class="bg-brand-cream text-gray-800 antialiased">

<flux:header container sticky class="dark:border-zinc-700 bg-white border-b border-b-neutral-300 dark:bg-zinc-900 py-2">

    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    <a href="" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0"
       wire:navigate>
        <x-app-logo/>
    </a>


    <flux:spacer/>


            <flux:navbar class="-mb-px max-lg:hidden py-0">
                <x-guest-navbar/>
            </flux:navbar>
{{--        </div>--}}
{{--    </div>--}}

</flux:header>


<flux:sidebar stashable sticky
              class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

    <a href="" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo/>
    </a>
    <x-guest-navbar/>


</flux:sidebar>

{{ $slot }}

<!-- Footer -->
<footer class="bg-brand-green text-gray-300">
    <div class="container mx-auto px-6 pt-16 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo & About -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <!-- Placeholder for Logo -->
                    <svg class="h-10 w-10 mr-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2L.5 6.5 10 11l9.5-4.5L10 2zM10 12.67L1.17 7.92 1 8v6l9 4.5 9-4.5V8l-.17-.08L10 12.67z"/>
                    </svg>
                    <h2 class="text-2xl font-bold text-white">Ar-Rabwah</h2>
                </div>
                <p class="max-w-md">
                    Mencetak generasi Qur'ani yang berakhlak mulia, cerdas, mandiri, dan siap berkontribusi untuk umat.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold tracking-wider mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-white">Beranda</a></li>
                    <li><a href="/#about" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="{{ route('pendidikan') }}" class="hover:text-white">Jenjang Pendidikan</a></li>
                    <li><a href="/#gallery" class="hover:text-white">Galeri</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-white font-semibold tracking-wider mb-4">Kontak Kami</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-1 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Jl. Krueng Jreu, Gampong Krueng Lamkareung Kecamatan Indrapuri Kabupaten Aceh Besar, Aceh - Indonesia 23363</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:info@arrabwah.sch.id" class="hover:text-white">info@arrabwah.sch.id</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+622123456789" class="hover:text-white">+62 21 2345 6789</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-green-800 mt-12 pt-8 text-center text-sm">
            <p>&copy; {{ date('Y') }} Pesantren Ar-Rabwah. Semua Hak Dilindungi.</p>
        </div>
    </div>
</footer>

@fluxScripts

</body>
</html>
