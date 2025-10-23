<div>
    <!-- Main Content -->
    <main>
        <section class="bg-white">
            <div class="container mx-auto flex flex-col items-center py-10 ">
                <div class="font-thin  text-2xl text-neutral-400 mb-1.5">Selamat Datang di</div>
                <div class="font-semibold text-2xl text-neutral-400">PESANTREN AR RABWAH</div>
            </div>
        </section>
        <section class="relative">
            <div class="swiper banner-slider aspect-[16/5] w-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('swiper/swipe1.jpg') }}" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('swiper/swipe2.jpg') }}" class="w-full h-full object-cover object-center">
                    </div>
                </div>

                <div class="banner-next absolute top-1/2 -translate-y-1/2 right-2 w-8 h-8 z-50 rounded-full bg-neutral-600 flex items-center justify-center hover:bg-neutral-500">
                    <flux:icon.chevron-right class="text-neutral-200"></flux:icon.chevron-right>
                </div>
                <div class="banner-prev absolute top-1/2 -translate-y-1/2 left-2 w-8 h-8 z-50 rounded-full bg-neutral-600 flex items-center justify-center hover:bg-neutral-500">
                    <flux:icon.chevron-left class="text-neutral-200"></flux:icon.chevron-left>
                </div>
                <div class="swiper-pagination banner-pagination"></div>
            </div>
        </section>

        <!-- About Us Section -->
        <section id="about" class="py-20 bg-brand-cream">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-brand-green mb-4">Tentang Pesantren Ar-Rabwah</h2>
                <div class="w-24 h-1 bg-brand-gold mx-auto mb-8"></div>
                <p class="text-lg text-gray-700 max-w-4xl mx-auto">
                    Berlokasi di kawasan perbukitan yang asri dan alami, Pesantren Ar-Rabwah menawarkan lingkungan
                    belajar yang tenang dan kondusif. Kami percaya bahwa kedekatan dengan alam dapat menjernihkan
                    pikiran dan jiwa, menciptakan suasana ideal untuk para santri menghafal Al-Qur'an dan mendalami ilmu
                    agama.
                </p>
            </div>
        </section>

        <!-- Programs Section -->
        <section id="programs" class="mx-auto w-full [:where(&)]:max-w-7xl p-4 py-20">
            <div class="container mx-auto px-6 bg-white shadow p-20 rounded-lg border rounded-xl">
                <div class="text-center mb-12 flex flex-col justify-center items-center mb-6">
                    <div class="bg-white  rounded-full shadow-md mb-3 w-28 h-28 p-2 flex justify-center items-center">
                        <img src="{{asset('asset/icon/star.png')}}">
                    </div>
                    <h2 class="text-3xl font-bold text-brand-green mb-4">Program Unggulan Kami</h2>
                    <div class="w-24 h-1 bg-brand-gold mx-auto"></div>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-start">
                    <div
                        class="bg-gradient-to-b from-green-500  border-white to-brand-green px-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 py-14">
                        <div class="flex flex-col items-center mb-4 justify-center">
                            <div
                                class="w-24 h-24 rounded-full bg-green-700 shadow mb-6 p-4 flex justify-center items-center">
                                <img src="{{asset('asset/icon/quran.png')}}" alt="quran" class="">
                            </div>

                            <h3 class="text-2xl font-semibold text-white">Program Tahfidz Al-Qur'an</h3>
                        </div>
                        <p class="text-white text-center">
                            Program intensif menghafal Al-Qur'an dengan bimbingan para hafidz/hafidzah berpengalaman.
                            Metode yang kami gunakan memudahkan santri untuk menghafal sekaligus menjaga hafalannya
                            (muraja'ah).
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-b from-green-500  border-white to-brand-green px-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 py-14">
                        <div class="flex flex-col items-center mb-4 justify-center">
                            <div
                                class="w-24 h-24 rounded-full bg-green-700 shadow mb-6 p-4 flex justify-center items-center">
                                <img src="{{asset('asset/icon/lang.png')}}" alt="quran" class="">
                            </div>

                            <h3 class="text-2xl font-semibold text-white">Penguasaan Bahasa Arab</h3>
                        </div>
                        <p class="text-white text-center">
                            Santri akan dibiasakan berkomunikasi dengan Bahasa Arab dalam kegiatan sehari-hari. Program
                            ini dirancang agar santri mampu memahami Al-Qur'an, Hadits, dan literatur Islam langsung
                            dari sumber aslinya.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Facilities Section -->
        <section id="facilities" class="mx-auto w-full [:where(&)]:max-w-7xl px-4 py-20">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-brand-green mb-4">Fasilitas Pesantren</h2>
                    <div class="w-24 h-1 bg-brand-gold mx-auto"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                    <div class="flex flex-col items-center">
                        <div
                            class="bg-white p-4 rounded-full shadow-md mb-3 flex justify-center items-center w-20 h-20">
                            <img src="{{asset('asset/icon/mesjid.png')}}" alt="mesjid">
                        </div>
                        <h3 class="font-semibold">Masjid Jami'</h3></div>
                    <div class="flex flex-col items-center">
                        <div
                            class="bg-white p-4 rounded-full shadow-md mb-3 flex justify-center items-center w-20 h-20">
                            <img src="{{asset('asset/icon/asrama.png')}}" alt="mesjid">
                        </div>
                        <h3 class="font-semibold">Asrama Nyaman</h3></div>
                    <div class="flex flex-col items-center">
                        <div
                            class="bg-white p-4 rounded-full shadow-md mb-3 flex justify-center items-center w-20 h-20">
                            <img src="{{asset('asset/icon/kelas.png')}}" alt="mesjid">
                        </div>
                        <h3 class="font-semibold">Ruang Kelas</h3></div>
                    <div class="flex flex-col items-center">
                        <div
                            class="bg-white p-4 rounded-full shadow-md mb-3 flex justify-center items-center w-20 h-20">
                            <img src="{{asset('asset/icon/pustaka.png')}}" alt="mesjid">
                        </div>
                        <h3 class="font-semibold">Perpustakaan</h3></div>
                    <div class="flex flex-col items-center">
                        <div
                            class="bg-white p-4 rounded-full shadow-md mb-3 flex justify-center items-center w-20 h-20">
                            <img src="{{asset('asset/icon/olahraga.png')}}" alt="mesjid">
                        </div>
                        <h3 class="font-semibold">Area Olahraga</h3></div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="py-36 bg-neutral-800">
            <div class="container mx-auto px-6">
                <div class="text-center mb-24">
                    <h2 class="text-3xl font-bold text-brand-cream mb-4">Galeri Lingkungan Pesantren</h2>
                    <div class="w-24 h-1 bg-brand-gold mx-auto"></div>
                </div>
                <!-- Swiper -->
                <div class="swiper gallery-slider relative pb-12">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide rounded-lg overflow-hidden bg-brand-cream shadow-lg p-2">
                            <img src="https://placehold.co/600x400/2E8B57/FFFFFF?text=Asri"
                                 alt="Lingkungan Asri"
                                 class="rounded-lg shadow-md w-full h-full object-cover aspect-video">
                            <div class="py-4">
                                <h4 class="text-lg font-bold">Judul disni</h4>
                            </div>
                        </div>
                        <div class="swiper-slide rounded-lg overflow-hidden bg-brand-cream shadow-lg p-2">
                            <img src="https://placehold.co/600x400/2E8B57/FFFFFF?text=Asri"
                                 alt="Lingkungan Asri"
                                 class="rounded-lg shadow-md w-full h-full object-cover aspect-video">
                            <div class="py-4">
                                <h4 class="text-lg font-bold">Judul disni</h4>
                            </div>
                        </div>
                        <div class="swiper-slide rounded-lg overflow-hidden bg-brand-cream shadow-lg p-2">
                            <img src="https://placehold.co/600x400/2E8B57/FFFFFF?text=Asri"
                                 alt="Lingkungan Asri"
                                 class="rounded-lg shadow-md w-full h-full object-cover aspect-video">
                            <div class="py-4">
                                <h4 class="text-lg font-bold">Judul disni</h4>
                            </div>
                        </div>
                        <div class="swiper-slide rounded-lg overflow-hidden bg-brand-cream shadow-lg p-2">
                            <img src="https://placehold.co/600x400/2E8B57/FFFFFF?text=Asri"
                                 alt="Lingkungan Asri"
                                 class="rounded-lg shadow-md w-full h-full object-cover aspect-video">
                            <div class="py-4">
                                <h4 class="text-lg font-bold">Judul disni</h4>
                            </div>
                        </div>

                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                    <div class="galeri-next absolute top-1/2 -translate-y-1/2 right-4 w-8 h-8 z-50 rounded-full bg-neutral-600 flex items-center justify-center hover:bg-neutral-500">
                        <flux:icon.chevron-right class="text-neutral-200"></flux:icon.chevron-right>
                    </div>
                    <div class="galeri-prev absolute top-1/2 -translate-y-1/2 left-4 w-8 h-8 z-50 rounded-full bg-neutral-600 flex items-center justify-center hover:bg-neutral-500">
                        <flux:icon.chevron-left class="text-neutral-200"></flux:icon.chevron-left>
                    </div>
                    <div class="swiper-pagination banner-pagination"></div>

                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section id="cta" class=" bg-brand-cream">
            <div class="container mx-auto px-6 py-20 text-center">
                <h2 class="text-3xl font-bold mb-4">Mari Bergabung Bersama Kami</h2>
                <p class="text-lg max-w-2xl mx-auto mb-10">
                    Wujudkan cita-cita menjadi penghafal Al-Qur'an yang fasih berbahasa Arab. Daftarkan diri Anda
                    sekarang dan jadilah bagian dari keluarga besar Pesantren Ar-Rabwah.
                </p>
                <a href="#"
                   class="bg-brand-gold text-brand-green font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                    Daftar Sekarang
                </a>
            </div>
        </section>

    </main>
</div>
