<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPost extends Component
{
    use WithFileUploads;
    public $status;
    public $title;
    public $content;
    public $slug;
    public $meta_description;
    public $tags=[];
    public $category_id;
    public $thumbnailFile;



    public function render()
    {
        return view('livewire.admin.post.form-post');
    }

    public function updatedTitle(){
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }

    #[Computed]
    public function categories(){
        return Category::orderBy('name')->get();
    }

    public function save(){}

}
