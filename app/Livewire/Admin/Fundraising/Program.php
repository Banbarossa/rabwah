<?php

namespace App\Livewire\Admin\Fundraising;

use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class Program extends Component
{
    #[Title('Program')]
    public $search;
    public function mount()
    {
        if (session()->has('saved')) {
            LivewireAlert::title('saved')
                ->text(session('saved'))
                ->position(Position::Center)
                ->success()
                ->show();

        }

    }
    public function render()
    {
        $breads=[
            ['url'=>url()->current(),'label'=>'Home'],
        ];
        return view('livewire.admin.fundraising.program')->layoutData(['breads'=>$breads]);
    }

    #[Computed]
    public function programs(){
        $programs = \App\Models\Program::withSum('donations','amount')
            ->when($this->search,function($query){
                $query->where('name','like','%'.$this->search.'%');
            })
            ->latest()->get();
        return $programs;
    }
}
