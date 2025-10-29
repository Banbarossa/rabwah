<?php

namespace App\Livewire\Welcome;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class PostsPage extends Component
{
    use WithPagination;
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public $category;

    public function mount($category = null)
    {
        $this->category = $category;

    }
    public function render()
    {
        return view('livewire.welcome.posts-page');
    }
    #[Computed]
    public function news(){
        $query = Post::query();
        if($this->category){
            $query->whereHas('category',function($q){
                $q->where('slug',$this->category);
            });
        }
        return $query->where('status','published')->latest()->paginate(1);
    }
}
