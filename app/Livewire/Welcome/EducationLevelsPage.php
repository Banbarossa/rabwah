<?php

namespace App\Livewire\Welcome;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Jenjang Pendidikan - Pesantren Ar-Rabwah')]
class EducationLevelsPage extends Component
{
    public function render()
    {
        return view('livewire.welcome.education-levels-page');
    }
}
