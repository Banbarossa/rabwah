<?php

namespace App\Livewire\Fundraising\NewVersion;

use App\Models\Donation;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DonationPage extends Component
{
    #[Layout('layouts.welcome')]
    #[Title('Pesantren Ar-Rabwah - Donasi')]
    public function render()
    {
        return view('livewire.fundraising.new-version.donation-page');
    }

    #[Computed]
    public function usages()
    {
        return [
            [
                'icon' => 'book-open',
                'title' => "Biaya Pendidikan",
                'description' => "Buku, alat tulis, dan kebutuhan belajar santri",
                'color' => "from-emerald-500 to-emerald-600",
            ],
            [
                'icon' => 'shopping-bag',
                'title' => "Konsumsi Santri",
                'description' => "Makanan bergizi 3x sehari untuk seluruh santri",
                'color' => "from-teal-500 to-teal-600",
            ],
            [
                'icon' => 'home',
                'title' => "Fasilitas Asrama",
                'description' => "Pemeliharaan dan pengembangan asrama",
                'color' => "from-cyan-500 to-cyan-600",
            ],
            [
                'icon' => 'users',
                'title' => "Kegiatan Santri",
                'description' => "Program ekstrakurikuler dan pengembangan diri",
                'color' => "from-emerald-600 to-teal-600",
            ],
        ];
    }
}
