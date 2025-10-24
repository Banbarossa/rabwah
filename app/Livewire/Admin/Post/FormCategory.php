<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormCategory extends Component
{

    public $category;
    public $name;


    public function mount($category = null)
    {
        if ($category) {
            $category=Category::find($category);
            $this->category = $category;
            $this->name = $category->name;
        }
    }

    public function render()
    {
        $breads=[
            ['url'=>route('post.category'),'label'=>'Kategori'],
            ['url'=>url()->current(),'label'=>'Formulir'],
        ];
        return view('livewire.admin.post.form-category')->layoutData(['breads'=>$breads]);
    }

    public function save()
    {
        $this->validate([
            'name'=>'required',
        ]);
        if ($this->category) {
            $this->category->update(
                ['name' => $this->name]
            );
        } else {
            Category::create([
                'name' => $this->name

            ]);
        }
        session()->flash('saved', 'Category updated successfully.');
        $this->redirect(route('post.category'),true);
    }
}
