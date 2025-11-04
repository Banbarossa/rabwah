<?php

namespace App\Livewire\Welcome;

use App\Models\MediaAsset;
use App\Models\Post;
use App\Models\Program;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Pesantren Ar-Rabwah - Welcome')]
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

    #[Computed]
    public function posts()
    {
        return Post::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'berita');
            })
            ->where('status','published')->latest()->take(5)->get();
    }
    #[Computed]
    public function programs()
    {
        return Program::whereHas('category',function ($query){
            $query->where('slug','prioritas');
        })->where('status','published')->latest()->take(3)->get();
    }
    #[Computed]
    public function fasilitas()
    {
        return MediaAsset::where('type','fasilitas')->orderBy('order','asc')->get();
    }
}
