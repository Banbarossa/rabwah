<?php

namespace App\Livewire\Welcome;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.welcome.home-page');
    }
}
