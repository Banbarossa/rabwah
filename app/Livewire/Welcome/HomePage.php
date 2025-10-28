<?php

namespace App\Livewire\Welcome;

use App\Models\MediaAsset;
use Livewire\Attributes\Computed;
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

    #[Computed]
    public function heros()
    {
        return MediaAsset::where('type', 'hero-slider')->where('is_active', true)->orderBy('order')->get();
    }
    #[Computed]
    public function galeris()
    {
        return MediaAsset::where('type', 'galeri-slider')->where('is_active', true)->orderBy('order')->get();
    }
}
