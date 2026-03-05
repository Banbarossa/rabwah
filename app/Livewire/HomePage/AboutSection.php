<?php

namespace App\Livewire\HomePage;

use Livewire\Attributes\Computed;
use Livewire\Component;

class AboutSection extends Component
{
    public function render()
    {
        return view('livewire.home-page.about-section');
    }

    #[Computed]
    public function features()
    {
        return [
            [
                'icon' => 'book-open-text',
                'title' => "Kurikulum Terpadu",
                'description' => "Menggabungkan pendidikan agama dan umum",
            ],
            [
                'icon' => 'users',
                'title' => "Tenaga Pengajar Berkualitas",
                'description' => "Ustadz dan guru berpengalaman",
            ],
            [
                'icon' => 'trophy',
                'title' => "Prestasi Gemilang",
                'description' => "Berprestasi di berbagai kompetisi",
            ],
            [
                'icon' => 'heart',
                'title' => "Pembinaan Karakter",
                'description' => "Membentuk akhlak yang mulia",
            ],
        ];
    }
}
