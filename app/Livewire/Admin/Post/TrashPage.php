<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TrashPage extends Component
{

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $breads = [
            ['url'=>url()->current(),'label'=>'Trash'],
        ];
        return view('livewire.admin.post.trash-page')->layoutData(['breads'=>$breads]);
    }

    #[Computed]
    public function posts(){
        return Post::with('author','tags')
            ->onlyTrashed()
            ->when($this->search,function($query){
                $query->where('title','like','%'.$this->search.'%');
            })
            ->latest()->paginate(100);
    }

    public function restore($id){
        $post = Post::onlyTrashed()->find($id);
        $post->restore();
        LivewireAlert::title('success')->text('Data berhasil di restore')->position(Position::Center)->success()->show();
    }
}
