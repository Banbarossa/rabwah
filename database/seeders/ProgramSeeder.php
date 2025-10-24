<?php

namespace Database\Seeders;

use App\Models\CategoryProgram;
use App\Models\Program;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prioritas = CategoryProgram::create([
            'name' => 'Prioritas',
        ]);

        $programPrioritas = [
            [
                'title' => 'Orang Tua Asuh Santri',
                'desc' => '
            <p>Program <strong>Orang Tua Asuh Santri</strong> adalah wujud nyata kepedulian terhadap anak-anak yatim dan dhuafa agar mereka tetap dapat menimba ilmu di pesantren tanpa terkendala biaya.</p>
            <p>Melalui donasi rutin, Anda membantu memenuhi kebutuhan pendidikan, makan sehari-hari, hingga perlengkapan belajar mereka. Setiap rupiah yang Anda salurkan menjadi amal jariyah yang terus mengalir selama mereka belajar dan mengamalkan ilmunya.</p>
            <p>Bergabunglah menjadi bagian dari keluarga besar pesantren dengan menjadi orang tua asuh. Karena setiap santri berhak mendapatkan kesempatan untuk belajar, tumbuh, dan menjadi generasi Qur’ani yang tangguh.</p>
        ',
            ],
            [
                'title' => 'Biaya Operasional Pesantren',
                'desc' => '
            <p>Pesantren berjalan setiap hari dengan berbagai kebutuhan operasional seperti listrik, air, bahan makanan, serta pemeliharaan fasilitas santri.</p>
            <p>Donasi Anda membantu pesantren terus beroperasi tanpa kendala, memastikan kegiatan belajar, ibadah, dan pembinaan karakter santri berjalan dengan lancar. Setiap dukungan Anda akan menjaga semangat ratusan santri yang tengah menuntut ilmu.</p>
            <p>Berikan kontribusi terbaik Anda untuk menjaga keberlangsungan pesantren sebagai pusat pembinaan generasi Qur’ani yang mandiri dan berakhlak mulia.</p>
        ',
            ],
            [
                'title' => 'Pembangunan & Perbaikan Asrama',
                'desc' => '
            <p>Asrama merupakan rumah kedua bagi para santri. Fasilitas yang layak dan nyaman sangat penting untuk menunjang kegiatan belajar dan ibadah mereka sehari-hari.</p>
            <p>Melalui program ini, donasi Anda akan digunakan untuk pembangunan ruang belajar, kamar santri, tempat wudhu, serta fasilitas umum lainnya yang mendukung kehidupan santri di pondok.</p>
            <p>Setiap bata dan semen yang Anda bantu wujudkan akan menjadi amal jariyah yang terus mengalir selama bangunan tersebut digunakan untuk kebaikan dan pendidikan Islam.</p>
        ',
            ],
        ];


        foreach ($programPrioritas as $item) {
            Program::create([
                'category_program_id' => $prioritas->id,
                'title' => $item['title'],
                'content' => $item['desc'],
                'excerpt' => excerpt_text($item['desc']),
                'thumbnail' => 'https://placehold.co/600x400?text=Program+Prioritas',
                'status' => 'published',
                'target_amount' => 0,
            ]);
        }

        // === KATEGORI 2: PROGRAM SOSIAL ===
        $sosial = CategoryProgram::create([
            'name' => 'Sosial',
        ]);

        $programSosial = [
            [
                'title' => 'Pembangunan Sumur Bor',
                'desc' => '
            <p>Air bersih adalah kebutuhan mendasar bagi seluruh aktivitas santri dan masyarakat di sekitar pesantren. Sayangnya, masih banyak wilayah pesantren yang kesulitan mendapatkan akses air bersih, terutama saat musim kemarau tiba.</p>
            <p>Melalui <strong>Program Pembangunan Sumur Bor</strong>, kami berupaya menyediakan sumber air yang layak, sehat, dan berkelanjutan. Sumur bor ini tidak hanya digunakan untuk kebutuhan santri seperti mandi, mencuci, dan berwudhu, tetapi juga dapat dimanfaatkan oleh warga sekitar.</p>
            <p>Setiap tetes air yang mengalir dari sumur ini menjadi saksi kebaikan Anda. Donasi yang Anda berikan akan menjadi amal jariyah yang terus mengalir selama sumur ini dimanfaatkan oleh banyak orang.</p>
            <p>Yuk, ikut berkontribusi dalam menghadirkan sumber air kehidupan bagi para santri dan masyarakat sekitar pesantren.</p>
        ',
            ],
            [
                'title' => 'Renovasi Dapur Santri',
                'desc' => '
            <p>Dapur pesantren adalah jantung yang memastikan para santri mendapatkan asupan makanan bergizi setiap harinya. Namun, seiring waktu, banyak dapur pesantren yang mulai rusak dan tidak lagi memenuhi standar kebersihan serta keamanan.</p>
            <p>Melalui <strong>Program Renovasi Dapur Santri</strong>, kami ingin memperbaiki dan membangun dapur yang lebih sehat, efisien, serta layak pakai. Renovasi ini mencakup perbaikan ruang masak, sistem ventilasi, tempat penyimpanan bahan makanan, dan peralatan masak yang aman bagi para petugas dapur.</p>
            <p>Dengan dukungan Anda, kami ingin menciptakan lingkungan dapur yang bersih, nyaman, dan higienis — tempat di mana ratusan piring nasi disiapkan setiap hari untuk para santri yang menuntut ilmu.</p>
            <p>Kontribusi Anda tidak hanya membantu menyediakan makanan, tetapi juga menjaga semangat dan kesehatan mereka yang sedang belajar di pesantren.</p>
        ',
            ],
            [
                'title' => 'Santunan Kesehatan Santri',
                'desc' => '
            <p>Kesehatan adalah modal utama bagi santri agar dapat belajar dan beribadah dengan maksimal. Namun, tidak semua santri memiliki kemampuan untuk menanggung biaya pengobatan saat mereka jatuh sakit.</p>
            <p><strong>Program Santunan Kesehatan Santri</strong> hadir untuk membantu biaya pengobatan, perawatan, serta kebutuhan medis santri yang sedang sakit. Melalui donasi Anda, pesantren dapat memberikan pelayanan kesehatan yang lebih baik dan cepat bagi mereka yang membutuhkan.</p>
            <p>Setiap bantuan yang Anda berikan berarti membantu satu santri untuk sembuh, tersenyum kembali, dan kembali mengaji bersama teman-temannya. Dukungan kecil Anda bisa menjadi cahaya besar bagi kesehatan dan semangat belajar mereka.</p>
            <p>Bersama kita jaga kesehatan para penjaga masa depan umat — para santri yang menghafal Al-Qur’an dan menuntut ilmu dengan ikhlas.</p>
        ',
            ],
        ];


        foreach ($programSosial as $item) {
            Program::create([
                'category_program_id' => $sosial->id,
                'title' => $item['title'],
                'content' => $item['desc'],
                'excerpt' => excerpt_text($item['desc'],),
                'thumbnail' => 'https://placehold.co/600x400?text=Program+Sosial',
                'status' => 'published',
                'target_amount' => 0,
            ]);
        }


    }
}
