<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

#[Title('Posts')]
class MainPost extends Component
{
    use WithPagination;
    public $search;
    public $categorySelected;

    public function mount(){
        if (session()->has('saved')) {
            LivewireAlert::title('saved')
                ->text('Posting saved successfully.')
                ->success()
                ->position(Position::Center)
                ->show();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $breads = [
            ['url'=>url()->current(),'label'=>'Post'],
        ];
        return view('livewire.admin.post.main-post')->layoutData(['breads'=>$breads]);
    }

    #[Computed]
    public function posts(){
        return Post::with('author','tags')
            ->when($this->search,function($query){
                $query->where('title','like','%'.$this->search.'%');
            })
            ->when($this->categorySelected,function($query){
                $query->where('category_id',$this->categorySelected);
            })
            ->where('type','post')
            ->latest()->paginate(100);
    }

    #[Computed]
    public function categories(){
        return Category::orderBy('name')->get();
    }

    public function destroy($id){
        Post::find($id)->delete();
        LivewireAlert::title('Deleted')->text('Post Deleted Succesfully')->position(Position::Center)->success()->show();
    }

    public function updateStatus($id,$status){
        $post = Post::findOrFail($id);

        if ($status === 'published') {
            $data = ['status' => $status];

            if (is_null($post->published_at)) {
                $data['published_at'] = now();
            }

            $post->update($data);
        } else {
            $post->update(['status' => $status]);
        }


        LivewireAlert::title('Success')
            ->text('Post Status Updated Succesfully')
            ->position(Position::Center)
            ->success()->show();
    }

}
