<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

class CategoryPage extends Component
{
    #[Title('Category')]
    public $search;
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
        $categories = Category::orderBy('name')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();
        $breads = [
            ['url'=>url()->current(),'label'=>'Kategori'],
        ];
        return view('livewire.admin.post.category-page', compact('categories'))->layoutData(['breads'=>$breads]);
    }

    public function confirmDestroy($id){
        $jumlahPost = Post::where('category_id', $id)->count();
        if($jumlahPost > 0){
        LivewireAlert::title('Process File')
            ->text('Yakin Untuk Menghapus Kategori ?')
            ->question()
            ->onConfirm('deleteFile', ['id' => $id])
            ->withConfirmButton('Delete')
            ->withCancelButton('Cancel')
            ->show();

        }else{
            $data=[
                'id'=>$id,
            ];
            $this->deleteFile($data);
        }
    }

    public function deleteFile($data){
        Category::find($data['id'])->delete();
        LivewireAlert::title('Deleted')
            ->text('Kategori Berhasil Dihapus')
            ->success()
            ->position(Position::Center)
            ->show();
    }

}
