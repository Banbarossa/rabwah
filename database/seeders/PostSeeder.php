<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::updateOrCreate(
            ['slug' => 'profil-pesantren-ar-rabwah'],
            [
                'type' => 'page',
                'template' => 'default',
                'user_id' => 1,
                'category_id' => null,
                'title' => 'Profil Pesantren Islam Ar-Rabwah',
                'excerpt' => 'Profil singkat Pesantren Islam Ar-Rabwah yang berdiri sejak tahun 2005 di Aceh Besar di bawah Yayasan Ar-Rabwah An-Najiyah.',
                'content' => <<<HTML
<h2>Profil Singkat Lembaga Pesantren</h2>
<p><strong>Nama Pesantren:</strong> Pesantren Islam Ar-Rabwah</p>
<p><strong>Tahun Berdiri:</strong> 2005</p>
<p><strong>Alamat:</strong> Jln Krueng Jreu, Desa Krueng Lamkareung, Kec. Indrapuri, Kab. Aceh Besar</p>
<p><strong>Telepon:</strong> 085167932929</p>
<p><strong>Email:</strong> <a href="mailto:pesantrenarrabwah@gmail.com">pesantrenarrabwah@gmail.com</a></p>
<p><strong>Website:</strong> <a href="https://arrabwah.sch.id/" target="_blank">https://arrabwah.sch.id/</a></p>

<h3>Sejarah Singkat</h3>
<p>Pada tahun 2005 didirikan Ma’had Ar-Rabwah di Gampong Krueng Lamkareung, Kecamatan Indrapuri, Kabupaten Aceh Besar, dengan luas areal 9,8 hektar di bawah naungan Yayasan Raudhatul Hikmah yang berkedudukan di Malang, Jawa Timur, dipimpin oleh Drs. H. Faisal Hasan Sufi.</p>
<p>Untuk operasional keseharian, yayasan dipercayakan kepada Ustadz Makmur Hasan Sufi sebagai Ketua Yayasan Cabang Aceh dan Pimpinan Ma’had Ustaz Muhammad Thaib, Lc.</p>
<p>Saat ini Pesantren Islam (Ma’had) Ar-Rabwah dikelola oleh Yayasan Ar-Rabwah An-Najiyah dengan Akte Notaris Nomor 01.-, Tanggal 02 Agustus 2018, dari kantor notaris Liawati Supena, SH. M.Kn di Lambaro, Aceh Besar.</p>

<h3>Pendidikan dan Akreditasi</h3>
<ul>
    <li>SMPIT terdaftar di Dinas Pendidikan Kabupaten Aceh Besar dengan Nomor: 421/SMP-246/2008 (Terakreditasi)</li>
    <li>MAS terdaftar di Kementerian Agama Provinsi Aceh dengan Nomor: C/KW.01/MA/108/2007 (Terakreditasi)</li>
    <li>TK terdaftar di Dinas Pendidikan Kabupaten Aceh Besar dengan Nomor: 137 Tahun 2019</li>
    <li>SD terdaftar di Dinas Pendidikan Kabupaten Aceh Besar dengan Nomor: 015.a Tahun 2021</li>
    <li>Pendidikan pesantren (ma’had) terdaftar di Kemenag Kabupaten Aceh Besar dengan Nomor: Kd.01.07/4/PP/1236/2008 dan telah mendapat akreditasi dari Badan Pembinaan Pendidikan Dayah Kabupaten Aceh Besar dengan nomor: 451.44/47/DPDA/2019</li>
</ul>

<h3>Visi</h3>
<p><em>“Terwujudnya generasi Qurani berpemahaman Ahlussunnah wal Jamaah.”</em></p>

<h3>Misi</h3>
<ol>
    <li>Mewujudkan generasi yang beriman, berakhlak, berpengetahuan, mandiri, terampil, dan istiqamah beramal sesuai Al-Qur’an dan Sunnah.</li>
    <li>Mendidik generasi yang mampu menghafal Al-Qur’an dan Hadits serta menguasai Bahasa Arab dan Bahasa Inggris.</li>
</ol>

<h3>Tujuan</h3>
<ol>
    <li>Terbentuknya generasi Muslim yang beraqidah Islamiyah sesuai dengan pemahaman Ahlussunnah Wal Jamaah.</li>
    <li>Melahirkan kader yang berilmu pengetahuan dan berakhlakul karimah sesuai dengan Al-Qur’an.</li>
    <li>Terciptanya generasi yang mengamalkan ibadah sesuai dengan Al-Qur’an dan Sunnah.</li>
    <li>Terwujudnya generasi yang memiliki keterampilan hidup mandiri dan mampu menjalankan dakwah Islamiyah.</li>
    <li>Terjalinnya ukhuwah Islamiyah antara civitas pesantren, wali santri, pemerintah, dan masyarakat.</li>
</ol>

<h3>Motto</h3>
<p><strong>Pesantren Akhlak, Al-Qur’an dan Bahasa Arab</strong></p>
HTML,
                'thumbnail' => '/images/pages/profil-pesantren.jpg',
                'status' => 'published',
                'meta_title' => 'Profil Pesantren Islam Ar-Rabwah',
                'meta_description' => 'Profil lengkap Pesantren Islam Ar-Rabwah Aceh Besar — pesantren berbasis Al-Qur’an dan Bahasa Arab yang berkomitmen mencetak generasi Qurani.',
                'meta_keywords' => 'Pesantren Ar-Rabwah, Pesantren Aceh Besar, Dayah Indrapuri, Pendidikan Islam, Generasi Qurani',
                'published_at' => now(),
            ]
        );
    }

}
