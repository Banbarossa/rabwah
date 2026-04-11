<?php

namespace App\Livewire\Layouts;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.layouts.navbar');
    }

    #[Computed]
    public function menus(){
        return [
            ['label'=>'Tentang','link'=>route('home').'#tentang'],
            ['label'=>'Donasi','link'=>route('donasi')],
            ['label'=>'Berita','link'=>route('post.list')],
            ['label'=>'Galeri','link'=>route('home').'#galeri'],
            ['label'=>'contact','link'=>route('home').'#contact'],

        ];
    }
}
