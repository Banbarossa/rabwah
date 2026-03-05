<?php

namespace App\Livewire\HomePage;

use Livewire\Attributes\Computed;
use Livewire\Component;

class DonationCtaSection extends Component
{
    public function render()
    {
        return view('livewire.home-page.donation-cta-section');
    }


    #[Computed]
    public function stats()
    {
        return [
            [
                'icon' => 'users',
                'value' => "150+",
                'label' => "Santri Yatim"
            ],
            [
                'icon' => 'book-open',
                'value' => "6",
                'label' => "Program Beasiswa"
            ],
            [
                'icon' => 'heart',
                'value' => "100%",
                'label' => "Gratis Penuh"
            ],
        ];
    }
}
