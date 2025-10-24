<div class="bg-gradient-to-b from-white to-brand-cream">
    <div class=" mx-auto w-full [:where(&)]:max-w-7xl p-4 ">
        <div class="mb-10 mt-4">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="/">Home</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{route('donasi')}}">Donasi</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Detail</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Program Image -->
                <div class="mb-6">
                    <img src="https://placehold.co/800x450/e2e8f0/333?text=Gambar+Program" alt="Nama Program"
                         class="w-full h-auto object-cover rounded-lg shadow-md">
                </div>

                <div class=" lg:hidden">
                    <div class="mb-6 ">
                        <h1 class="text-2xl md:text-2xl font-semibold text-neutral-800 ">
                            {{$program->title}}
                        </h1>
                        <flux:separator class="mb-4"/>
                        <div class="mb-10">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-semibold text-gray-700">Terkumpul</span>
                                <span class="text-lg font-bold text-brand-green">Rp 75.000.000</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="bg-brand-gold h-4 rounded-full" style="width: 75%;"></div>
                            </div>
                            <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                                <span>Target: {{$program->target_amount > 0 ? format_rupiah($program->target_amount) :'-'}}</span>
                            </div>
                        </div>
                        <flux:separator/>
                        <div class="grid grid-cols-2  gap-4 text-center py-2">
                            <div>
                                <div class="text-2xl font-bold text-gray-800">1,234</div>
                                <div class="text-sm text-gray-500">Donatur</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-gray-800">45</div>
                                <div class="text-sm text-gray-500">Hari Lagi</div>
                            </div>
                        </div>
                        <flux:separator/>
                        <button
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 mt-10">
                            Donasi Sekarang
                        </button>
                    </div>
                </div>


                <!-- Program Title -->


                <!-- Progress Bar and Stats -->
{{--                <div class="border rounded-lg p-6 mb-6">--}}
{{--                    <div class="mb-4">--}}
{{--                        <div class="flex justify-between items-center mb-2">--}}
{{--                            <span class="text-lg font-semibold text-gray-700">Terkumpul</span>--}}
{{--                            <span class="text-lg font-bold text-brand-green">Rp 75.000.000</span>--}}
{{--                        </div>--}}
{{--                        <div class="w-full bg-gray-200 rounded-full h-4">--}}
{{--                            <div class="bg-brand-gold h-4 rounded-full" style="width: 75%;"></div>--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-between items-center mt-2 text-sm text-gray-500">--}}
{{--                            <span>Target: Rp 100.000.000</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-center">--}}
{{--                        <div>--}}
{{--                            <div class="text-2xl font-bold text-gray-800">1,234</div>--}}
{{--                            <div class="text-sm text-gray-500">Donatur</div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="text-2xl font-bold text-gray-800">45</div>--}}
{{--                            <div class="text-sm text-gray-500">Hari Lagi</div>--}}
{{--                        </div>--}}
{{--                        <div class="col-span-2 md:col-span-1 mt-4 md:mt-0">--}}
{{--                            <button--}}
{{--                                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">--}}
{{--                                Donasi Sekarang--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Tabs for Details -->
                <div class="mt-8">
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center gap-4">
                            <li class="me-2">
                                <button class="inline-block py-2 border-b-2 rounded-t-lg" id="profile-tab" type="button"
                                        role="tab" aria-controls="detail" aria-selected="false">Detail
                                </button>
                            </li>
                            <li class="me-2">
                                <button
                                    class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    type="button" aria-controls="kabar-terbaru" aria-selected="false">Kabar Terbaru
                                </button>
                            </li>
                            <li class="me-2">
                                <button
                                    class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    type="button" aria-controls="donatur" aria-selected="false">Donatur
                                </button>
                            </li>
                        </ul>
                    </div>


                    <!-- Tab Content -->
                    <div class="py-6 prose max-w-none">
                        {!! $program->content !!}
                    </div>
                </div>
            </div>

            <!-- Donation Form Sidebar -->
            <div class="lg:col-span-1 hidden lg:block">
                <div class="border rounded-lg p-6 mb-6 sticky top-24 shadow bg-white">
                    <h1 class="text-2xl md:text-2xl font-semibold text-neutral-800 ">
                        {{$program->title}}
                    </h1>
                    <flux:separator class="mb-4"/>
                    <div class="mb-10">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold text-gray-700">Terkumpul</span>
                            <span class="text-lg font-bold text-brand-green">Rp 75.000.000</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-brand-gold h-4 rounded-full" style="width: 75%;"></div>
                        </div>
                        <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                            <span>Target: <span>Target: {{$program->target_amount > 0 ? format_rupiah($program->target_amount) :'-'}}</span></span>
                        </div>
                    </div>
                    <flux:separator/>
                    <div class="grid grid-cols-2  gap-4 text-center py-2">
                        <div>
                            <div class="text-2xl font-bold text-gray-800">1,234</div>
                            <div class="text-sm text-gray-500">Donatur</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-800">45</div>
                            <div class="text-sm text-gray-500">Hari Lagi</div>
                        </div>
                    </div>
                    <flux:separator/>
                    <button
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 mt-10">
                        Donasi Sekarang
                    </button>

                    <div class="border-t mt-8 pt-6">
                        <h2 class="text-lg font-semibold mb-3">Bagikan Artikel Ini</h2>
                        <div class="flex items-center gap-3">
                            @php
                                $url = urlencode(request()->fullUrl());
                                $text = urlencode($program->title);
                            @endphp
                            <x-share-button></x-share-button>

                        </div>
                    </div>
                </div>
                {{--                <div class="sticky top-24 bg-white p-6 rounded-lg shadow-lg border">--}}
                {{--                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pilih Nominal Donasi</h3>--}}

                {{--                    <div class="grid grid-cols-2 gap-3 mb-4">--}}
                {{--                        <button--}}
                {{--                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">--}}
                {{--                            Rp 50.000--}}
                {{--                        </button>--}}
                {{--                        <button--}}
                {{--                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">--}}
                {{--                            Rp 100.000--}}
                {{--                        </button>--}}
                {{--                        <button--}}
                {{--                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">--}}
                {{--                            Rp 250.000--}}
                {{--                        </button>--}}
                {{--                        <button--}}
                {{--                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">--}}
                {{--                            Rp 500.000--}}
                {{--                        </button>--}}
                {{--                    </div>--}}

                {{--                    <div class="mb-4">--}}
                {{--                        <label for="custom-amount" class="block text-sm font-medium text-gray-700 mb-1">Nominal--}}
                {{--                            Lainnya</label>--}}
                {{--                        <input type="number" id="custom-amount"--}}
                {{--                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"--}}
                {{--                               placeholder="Contoh: 1000000">--}}
                {{--                    </div>--}}

                {{--                    <hr class="my-6">--}}

                {{--                    <h3 class="text-xl font-bold text-gray-800 mb-4">Data Diri</h3>--}}
                {{--                    <div class="space-y-4">--}}
                {{--                        <div>--}}
                {{--                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>--}}
                {{--                            <input type="text" id="name"--}}
                {{--                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"--}}
                {{--                                   placeholder="Nama Anda">--}}
                {{--                        </div>--}}
                {{--                        <div>--}}
                {{--                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>--}}
                {{--                            <input type="email" id="email"--}}
                {{--                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"--}}
                {{--                                   placeholder="email@anda.com">--}}
                {{--                        </div>--}}
                {{--                        <div class="flex items-center">--}}
                {{--                            <input id="anonymous" type="checkbox"--}}
                {{--                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">--}}
                {{--                            <label for="anonymous" class="ml-2 block text-sm text-gray-900">--}}
                {{--                                Sembunyikan nama saya (donasi anonim)--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <div class="mt-6">--}}
                {{--                        <button--}}
                {{--                            class="w-full bg-brand-green/90 hover:bg-brand-green text-white font-bold py-3 px-4 rounded-lg transition duration-300 text-lg">--}}
                {{--                            Lanjutkan Pembayaran--}}
                {{--                        </button>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

        </div>
    </div>
</div>
