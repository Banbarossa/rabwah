<?php

namespace App\Livewire\HomePage;

use Livewire\Attributes\Computed;
use Livewire\Component;

class ProgramSection extends Component
{
    public function render()
    {
        return view('livewire.home-page.program-section');
    }

    #[Computed]
    public function programs()
    {
        return [
            [
                'icon' => 'book-open-text',
                'title' => "Program Tahfidz Al-Qur'an",
                'description' =>
                    "Program unggulan yang fokus pada hafalan Al-Qur'an dengan metode pembelajaran yang telah terbukti efektif, bimbingan intensif dari ustadz berpengalaman, serta evaluasi rutin untuk memastikan kualitas hafalan.",
                'gradient' => "from-emerald-600 to-teal-600",
            ],
            [
                'icon' => 'globe-alt',
                'title' => "Penguasaan Bahasa Arab",
                'description' =>
                    "Santri diajarkan bahasa Arab dalam keseharian untuk memahami literatur Arab dalam kegiatan sehari-hari, mempelajari tata bahasa dengan mendalam, serta praktek konversasi langsung agar santri aktiva.",
                'gradient' => "from-teal-600 to-cyan-600",
            ],
            [
                'icon' => 'users',
                'title' => "Kepemimpinan & Organisasi",
                'description' =>
                    "Mengembangkan jiwa kepemimpinan melalui berbagai kegiatan organisasi santri, melatih public speaking dan manajemen, serta membangun karakter pemimpin yang bertanggung jawab.",
                'gradient' => "from-cyan-600 to-blue-600",
            ],
            [
                'icon' => 'star',
                'title' => "Keterampilan Digital",
                'description' =>
                    "Membekali santri dengan keterampilan teknologi modern seperti desain grafis, pemrograman dasar, dan media digital untuk menghadapi tantangan era digital dengan tetap memegang teguh nilai-nilai Islam.",
                'gradient' => "from-blue-600 to-indigo-600",
            ],
            [
                'icon' => 'academic-cap',
                'title' => "Pendidikan Akademik",
                'description' =>
                    "Kurikulum akademik yang setara dengan sekolah formal, mengintegrasikan mata pelajaran umum dengan nilai-nilai Islam, persiapan ujian nasional, dan bimbingan masuk perguruan tinggi.",
                'gradient' => "from-indigo-600 to-purple-600",
            ],
            [
                'icon' => 'heart',
                'title' => "Pembinaan Akhlak",
                'description' =>
                    "Program pembinaan karakter dan akhlak mulia melalui teladan, mentoring individu, serta pembiasaan nilai-nilai Islam dalam kehidupan sehari-hari untuk membentuk pribadi yang berintegritas.",
                'gradient' => "from-purple-600 to-pink-600",
            ],
        ];
    }
}
