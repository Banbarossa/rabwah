<?php

namespace App\Livewire\Welcome;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PostsPage extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public function render()
    {
        return view('livewire.welcome.posts-page');
    }
}
