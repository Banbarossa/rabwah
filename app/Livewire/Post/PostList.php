<?php

namespace App\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PostList extends Component
{
    #[Layout('layouts.welcome')]
    #[Title('Ar-Rabwah - Berita')]

    public $featuredPost;
    public $categorySelected;

    public $type;
    public $search;

    public $limit=9;
    public function mount()
    {
        $this->heroPost();
    }
    public function render()
    {
        return view('livewire.post.post-list');
    }


    public function clearCategory(){
        $this->categorySelected = null;
    }

    public function changeCategory($id){
        $this->categorySelected = $id;
    }
    public function heroPost(){
        $this->featuredPost= Post::with('author','category')
            ->where('status','published')
            ->latest()
            ->first();

    }


    #[Computed]
    public function posts(){
        return Post::with('author','category')
            ->where('id','!=',$this->featuredPost?->id)
            ->where('status','published')
            ->when($this->search,function($query,$search){
                return $query->where('title','LIKE',"%{$search}%");
            })
            ->when($this->categorySelected,function($query){
                $query->where('category_id',$this->categorySelected);
            })
            ->orderBy('published_at','DESC')
            ->paginate($this->limit);
    }

    #[Computed]
    public function categories(){
        return Category::withCount('posts')->orderBy('name')->get();
    }
}
