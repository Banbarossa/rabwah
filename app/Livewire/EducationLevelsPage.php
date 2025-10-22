<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Jenjang Pendidikan - Pesantren Ar-Rabwah')]
class EducationLevelsPage extends Component
{
    public function render()
    {
        return view('livewire.education-levels-page');
    }
}