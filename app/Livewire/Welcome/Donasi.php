<?php

namespace App\Livewire\Welcome;

use App\Livewire\Admin\Fundraising\Program;
use App\Models\CategoryProgram;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Donasi extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public function render()
    {
        return view('livewire.welcome.donasi');
    }
    #[Computed]
    public function campaignPrioritas(){
        $campaign= \App\Models\Program::whereHas('category', function ($query) {
            $query->where('slug','like', '%prioritas%');
        })->where('status','published')->latest()->paginate(6);
        return $campaign;
    }
    #[Computed]
    public function campaignSosial(){
        $campaign= \App\Models\Program::whereHas('category', function ($query) {
            $query->where('slug','like', '%sosial%');
        })->where('status','published')->latest()->paginate(6);
        return $campaign;
    }
}
