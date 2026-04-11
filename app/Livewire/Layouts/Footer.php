<?php

namespace App\Livewire\Layouts;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.layouts.footer');
    }

    #[Computed]
    public function medsos(){
        return [
            [
                'label' => 'Facebook',
                'image'=>asset('asset/icon/facebook.png'),
                'link' => 'https://www.facebook.com/',
            ],[
                'label' => 'instagram',
                'image'=>asset('asset/icon/instagram.png'),
                'link' => 'https://www.instagram.com/',
            ],
            [
                'label' => 'twiter',
                'image'=>asset('asset/icon/twiter.png'),
                'link' => 'https://www.twitter.com/',
            ],
            [
                'label' => 'youtube',
                'image'=>asset('asset/icon/youtube.png'),
                'link' => 'https://www.youtube.com/',
            ],
        ];
    }

    #[Computed]
    public function contacts(){
        return [
            [
                'icon'=>'map-pin',
                'label'=>'Krueng Lamkareung, Indrapuri, Aceh Besar, 23363'
            ],
            [
                'icon'=>'phone',
                'label'=>'+62 123 456 789'
            ],
            [
                'icon'=>'envelope',
                'label'=>'pesantrenarrabwah@gmail.com'
            ],
        ];
    }
}
