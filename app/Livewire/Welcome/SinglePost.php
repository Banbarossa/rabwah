<?php

namespace App\Livewire\Welcome;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SinglePost extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]

    public $post;
    public $category;

    public function mount($category,$slug){
        $this->category = $category;
        $this->post=Post::with('author')->where('slug',$slug)->firstOrFail();

    }
    public function render()
    {
        return view('livewire.welcome.single-post');
    }
}
