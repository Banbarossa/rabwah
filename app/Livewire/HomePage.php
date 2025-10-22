<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page');
    }
}