<?php

namespace App\Livewire\HomePage;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MainPage extends Component
{
    #[Layout('layouts.welcome')]
    #[Title('Ar-Rabwah - Welcome')]
    public function render()
    {
        return view('livewire.home-page.main-page');
    }
}
