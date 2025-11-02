<?php

namespace App\Livewire\Admin\Fundraising;

use App\Models\Category;
use App\Models\CategoryProgram;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class Program extends Component
{
    #[Title('Program')]
    public $search;
    public $categorySelected;

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
        $breads = [
            ['url' => url()->current(), 'label' => 'Program'],
        ];
        return view('livewire.admin.fundraising.program')->layoutData(['breads' => $breads]);
    }

    #[Computed]
    public function categories()
    {
        return CategoryProgram::orderBy('name')->get();
    }

    #[Computed]
    public function programs()
    {
        $programs = \App\Models\Program::with('category')
            ->withSum(['donations as total_received' => function ($query) {
                $query->whereHas('payment', function ($squery) {
                    $squery->whereIn('status', ['settlement', 'success']);
                });
            }], 'amount')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->categorySelected, function ($query) {
                $query->where('category_program_id', $this->categorySelected);
            })
            ->latest()->get();
        return $programs;
    }
}
