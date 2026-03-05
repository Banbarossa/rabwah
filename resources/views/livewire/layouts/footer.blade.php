<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-900 text-white">
    <div class="container mx-auto px-6 py-16">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                        <span class="text-white text-sm font-semibold">AR</span>
                    </div>
                    <div>
                        <h3 class="font-bold">Ar-Rabwah</h3>
                        <p class="text-xs text-gray-400">Pesantren Modern</p>
                    </div>
                </div>
                <p class="text-gray-400 leading-relaxed mb-4">
                    Membentuk generasi Qur'ani yang berilmu, berakhlak mulia, dan berprestasi untuk masa depan gemilang.
                </p>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
                        <Facebook size={18} />
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
                        <Instagram size={18} />
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
                        <Twitter size={18} />
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
                        <Youtube size={18} />
                    </a>
                </div>
            </div>

            <div>
                <h4 class="font-bold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#tentang" class="hover:text-emerald-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="#program" class="hover:text-emerald-400 transition-colors">Program Unggulan</a></li>
                    <li><a href="#fasilitas" class="hover:text-emerald-400 transition-colors">Fasilitas</a></li>
                    <li><a href="#galeri" class="hover:text-emerald-400 transition-colors">Galeri</a></li>
                    <li><a href="#kontak" class="hover:text-emerald-400 transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Kontak Kami</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start gap-3">
                        <MapPin size={18} class="mt-1 flex-shrink-0 text-emerald-400" />
                        <span class="min-w-0 break-words">Jl. Pendidikan No. 123, Kota Santri, Indonesia 12345</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <Phone size={18} class="flex-shrink-0 text-emerald-400" />
                        <span>+62 123 456 789</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <Mail size={18} class="flex-shrink-0 text-emerald-400" />
                        <span>info@arrabwah.com</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Jam Operasional</h4>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex justify-between">
                        <span>Senin - Jumat</span>
                        <span class="text-emerald-400">08:00 - 16:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sabtu</span>
                        <span class="text-emerald-400">08:00 - 14:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Minggu</span>
                        <span class="text-red-400">Tutup</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8 text-center text-gray-400">
            <p>© {{date('Y')}} Pesantren Ar-Rabwah. Semua Hak Dilindungi.</p>
        </div>
    </div>
</footer>
