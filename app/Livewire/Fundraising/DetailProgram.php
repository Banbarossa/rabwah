<?php

namespace App\Livewire\Fundraising;

use App\Livewire\Admin\Fundraising\Program;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailProgram extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public $program;

    public function mount($slug)
    {
        $this->program =\App\Models\Program::where('slug',$slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.fundraising.detail-program');
    }
}
