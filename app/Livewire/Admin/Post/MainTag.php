<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

class MainTag extends Component
{
    public $search;

    #[Title('Tag')]
    public function mount()
    {
        if(session()->has('saved')){
            LivewireAlert::title('saved')
                ->text(session('saved'))
                ->success()
                ->position(Position::Center)
                ->show();
        }
    }
    public function render()
    {
        $tags = Tag::orderBy('name')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();
        $breads = [
            ['url'=>url()->current(),'label'=>'Kategori'],
        ];
        return view('livewire.admin.post.main-tag', compact('tags'))->layoutData(['breads'=>$breads]);
    }
    public function confirmDestroy($id){
            LivewireAlert::title('Process File')
                ->text('Yakin Untuk Menghapus Kategori ?')
                ->question()
                ->onConfirm('deleteFile', ['id' => $id])
                ->withConfirmButton('Delete')
                ->withCancelButton('Cancel')
                ->show();


    }

    public function deleteFile($data){
        Tag::find($data['id'])->delete();
        LivewireAlert::title('Deleted')
            ->text('Kategori Berhasil Dihapus')
            ->success()
            ->position(Position::Center)
            ->show();
    }
}
