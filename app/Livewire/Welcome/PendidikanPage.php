<?php

namespace App\Livewire\Welcome;

use App\Models\Pendidikan;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
class PendidikanPage extends Component
{
    public $post;
    public function mount($slug){
        $this->post=Pendidikan::where('slug',$slug)->firstOrFail();

    }
    public function render()
    {
        return view('livewire.welcome.pendidikan-page');
    }
}
