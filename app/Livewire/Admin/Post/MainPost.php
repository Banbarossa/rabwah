<?php

namespace App\Livewire\Admin\Post;

use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Livewire;

#[Title('Posts')]
class MainPost extends Component
{

    public function mount(){
        if (session()->has('saved')) {
            LivewireAlert::title('saved')
                ->text('Posting saved successfully.')
                ->success()
                ->position(Position::Center)
                ->show();
        }
    }
    public function render()
    {
        $breads = [
            ['url'=>url()->current(),'label'=>'Post'],
        ];
        return view('livewire.admin.post.main-post')->layoutData(['breads'=>$breads]);
    }
}
