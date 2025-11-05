<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class MainUser extends Component
{
    #[Title('User')]

    public $search;
    public function mount(){
        if(session()->has('saved')){
            LivewireAlert::title('Saved')
                ->text(session('saved'))
                ->position(Position::Center)
                ->success()
                ->show();
        }
    }
    public function render()
    {
        $breads=[
            ['url'=>url()->current(),'label'=>'User'],
        ];
        return view('livewire.admin.user.main-user')->layoutData(['breads'=>$breads]);
    }

    #[Computed]
    public function data()
    {
        return User::orderBy('name','ASC')
            ->when($this->search, function ($query) {
                return $query->where('name','like','%'.$this->search.'%');
            })
            ->get();
    }
}
