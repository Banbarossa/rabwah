<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <div class="bg-white border-b border-gray-100 sticky top-0 z-40 backdrop-blur-md bg-white/90">
        <div class="container mx-auto px-6 py-4">
            <a href="/" class="inline-flex items-center gap-2 text-gray-600 hover:text-emerald-600 transition-colors">
                <flux:icon.arrow-right/>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>


    <section class="py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-10 w-32 h-32 border-2 border-emerald-400 rounded-full"></div>
            <div class="absolute bottom-20 right-10 w-40 h-40 border-2 border-teal-400 rounded-full"></div>
        </div>

        <div class="container mx-auto px-6 relative">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-100 to-teal-100 px-6 py-2 rounded-full mb-6">
                    <flux:icon.heart class="text-emerald-600 size-8"></flux:icon>
                    <span class="text-emerald-700 font-semibold">Program Donasi</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 bg-gradient-to-r from-emerald-700 via-teal-700 to-cyan-700 bg-clip-text text-transparent">
                    Berbagi Kebaikan untuk Santri Yatim
                </h1>
                <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                    Pesantren Ar-Rabwah berkomitmen memberikan pendidikan berkualitas secara gratis kepada santri yatim.
                    Donasi Anda akan membantu mewujudkan masa depan cerah mereka.
                </p>
            </div>

            <div class="max-w-5xl mx-auto mb-20 ">
                <x-card.container
                    class="border-0 shadow-xl rounded-xl overflow-hidden p-3 md:p-10 bg-gradient-to-br from-white to-gray-50">
                    <x-card.header class="mb-6">
                        <x-card.title class="text-2xl md:text-3xl text-center">
                            Mengapa Donasi Anda Penting?
                        </x-card.title>
                    </x-card.header>
                    <x-card.content class="space-y-6 text-gray-700 leading-relaxed">
                        <p>
                            Pesantren Ar-Rabwah saat ini menampung <strong class="text-emerald-700">lebih dari 150
                                santri
                                yatim</strong> yang
                            mendapatkan pendidikan lengkap mulai dari tingkat dasar hingga menengah. Semua santri
                            mendapatkan
                            fasilitas lengkap tanpa dipungut biaya sepeserpun.
                        </p>
                        <p>
                            Untuk menjalankan operasional pesantren dan memberikan pelayanan terbaik kepada santri, kami
                            membutuhkan
                            dukungan dari para dermawan. Setiap rupiah yang Anda donasikan akan digunakan untuk:
                        </p>
                        <ul class="space-y-2 ml-6">
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-600 mt-1">•</span>
                                <span>Menyediakan makanan bergizi 3 kali sehari untuk seluruh santri</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-600 mt-1">•</span>
                                <span>Pengadaan buku, alat tulis, dan kebutuhan belajar</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-600 mt-1">•</span>
                                <span>Pemeliharaan fasilitas asrama dan ruang belajar</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-600 mt-1">•</span>
                                <span>Menggaji tenaga pengajar yang berkualitas</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-600 mt-1">•</span>
                                <span>Biaya kesehatan dan pengobatan santri</span>
                            </li>
                        </ul>
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg">
                            <p class="text-emerald-900 font-semibold">
                                "Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lain" - HR. Ahmad,
                                ath-Thabrani
                            </p>
                        </div>
                    </x-card.content>
                </x-card.container>
            </div>

            <div class="max-w-5xl mx-auto mb-20 ">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">
                    Kemana Donasi Anda Disalurkan?
                </h2>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                    Transparansi adalah prioritas kami. Berikut alokasi penggunaan dana donasi:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($this->usages() as $item)
                        <div>
                            <x-card.container
                                class="border-0 shadow-lg hover:shadow-xl transition-all duration-300 rounded-lg h-full hover:-translate-y-1">
                                <x-card.content class="p-6">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{$item['color']}} flex items-center
                                     justify-center mb-4">
                                        <flux:icon name="{{$item['icon']}}" class="size-10 text-white"/>
                                    </div>
                                    <h3 class="font-bold text-lg mb-2">{{$item['title']}}</h3>
                                    <p class="text-gray-600 text-sm">{{$item['description']}}</p>
                                </x-card.content>
                            </x-card.container>
                        </div>
                    @endforeach
                </div>
            </div>

            {{--                {/* QRIS Section */}--}}
            <div class="max-w-4xl mx-auto mb-20">
                <x-card.container
                    class="border-0 shadow-2xl bg-gradient-to-br from-emerald-50 to-teal-50 p-3 md:p-8 rounded-lg">
                    <x-card.header class="text-center pb-4">
                        <x-card.title class="text-3xl md:text-4xl mb-2">Donasi Sekarang</x-card.title>
                        <x-card.description class="text-base">
                            Scan QR Code di bawah ini untuk berdonasi melalui aplikasi pembayaran favorit Anda
                        </x-card.description>
                    </x-card.header>
                    <x-card.content class="flex flex-col items-center">
                        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl mb-6 border-4 border-emerald-100">
                            <div
                                class="w-64 h-64 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 opacity-20">
                                    <div class="grid grid-cols-8 grid-rows-8 h-full w-full gap-1 p-4">
                                        <div class="bg-transparent rounded-sm">
                                            <h1 class="text-7xl">QRIS</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative z-10 text-center">
                                    <flux:icon.hand-raised class="text-emerald-600 mx-auto mb-2 size-16"/>
                                    <p class="text-sm font-semibold text-emerald-700">QRIS CODE</p>
                                    <p class="text-xs text-gray-600 mt-1">Pesantren Ar-Rabwah</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center space-y-2 mb-6">
                            <p class="font-semibold text-gray-900">Nama Rekening: Yayasan Ar-Rabwah</p>
                            <p class="text-sm text-gray-600">Mendukung semua aplikasi pembayaran digital</p>
                        </div>

                        <div class="flex flex-wrap justify-center gap-3 text-xs text-gray-500">
                            <span class="bg-white px-3 py-1 rounded-full">GoPay</span>
                            <span class="bg-white px-3 py-1 rounded-full">OVO</span>
                            <span class="bg-white px-3 py-1 rounded-full">Dana</span>
                            <span class="bg-white px-3 py-1 rounded-full">ShopeePay</span>
                            <span class="bg-white px-3 py-1 rounded-full">LinkAja</span>
                            <span class="bg-white px-3 py-1 rounded-full">Bank Transfer</span>
                        </div>
                    </x-card.content>
                </x-card.container>
            </div>

            {{--                {/* Donor Registration Form */}--}}
            <div class="max-w-5xl mx-auto">
                <x-card.container class="border-0 shadow-xl rounded-lg p-4 md:p-8">
                    <x-card.header class="text-center mb-8">
                        <x-card.title class="text-2xl md:text-3xl">Daftar Sebagai Donatur</x-card.title>
                        <x-card.description class="text-base">
                            Opsional - Daftarkan diri Anda agar kami dapat memberikan update tentang perkembangan
                            santri
                        </x-card.description>
                    </x-card.header>
                    <x-card.content>
                        {{--                        <div class="text-center py-12">--}}
                        {{--                            <flux:icon.check-circle class="text-emerald-600 mx-auto mb-4"/>--}}
                        {{--                            <h3 class="text-2xl font-bold text-emerald-700 mb-2">Terima Kasih! 🙏</h3>--}}
                        {{--                            <p class="text-gray-600">--}}
                        {{--                                Data Anda telah berhasil tersimpan. Kami akan segera menghubungi Anda.--}}
                        {{--                            </p>--}}
                        {{--                        </div>--}}

                        <form class="space-y-6">
                            <div class="space-y-2">
                                <flux:input label="Nama" placeholder="Type Your Name" name="name"/>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <flux:input label="Email" placeholder="email@example.com" name="email"/>
                                </div>

                                <div class="space-y-2">
                                    <flux:input label="Phone" placeholder="No HP /Whatsapp" name="phone"/>
                                </div>
                            </div>
                            <div>
                                <flux:textarea label="Alamat" placeholder="Tuliskan alamat anda" name="address" rows="2"/>
                            </div>

                            <div class="flex items-start space-x-3 p-4 bg-gray-200 rounded-lg">
                                <flux:checkbox name="allow-contact"/>
                                <div class="space-y-1">
                                    <label
                                        for="allowContact"
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 cursor-pointer"
                                    >
                                        Saya bersedia dihubungi oleh admin
                                    </label>
                                    <p class="text-sm text-gray-500">
                                        Admin akan menghubungi Anda untuk memberikan update perkembangan program dan
                                        laporan
                                        penggunaan donasi
                                    </p>
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="w-full h-12 text-base bg-gradient-to-r rounded-lg text-white shadow from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700"
                            >
                                Daftar Sekarang
                            </button>

                            <p class="text-sm text-gray-500 text-center">
                                Dengan mendaftar, Anda setuju menerima informasi terkait program pesantren
                            </p>
                        </form>
                    </x-card.content>
                </x-card.container>
            </div>

            <div class="text-center mt-16 max-w-5xl mx-auto">
                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 p-8 rounded-2xl border border-emerald-100">
                    <flux:icon.heart class="text-emerald-600 mx-auto mb-4 size-16"></flux:icon>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Jazakumullahu khairan katsiran atas kepedulian dan dukungan Anda.
                        Semoga Allah SWT membalas kebaikan Anda dengan berlipat ganda.
                    </p>
                    <p class="text-emerald-700 font-semibold mt-4">
                        Barakallahu fiikum 🤲
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
