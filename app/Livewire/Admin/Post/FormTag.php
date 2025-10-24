<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormTag extends Component
{
    public $tag;
    public $name;

    #[Title('Formulir Tag')]
    public function mount($tag = null)
    {
        if ($tag) {
            $tag=Tag::find($tag);
            $this->tag = $tag;
            $this->name = $tag->name;
        }
    }
    public function render()
    {
        $breads=[
            ['url'=>route('post.tag'),'label'=>'Tag'],
            ['url'=>url()->current(),'label'=>'Formulir'],
        ];
        return view('livewire.admin.post.form-tag')->layoutData(['breads'=>$breads]);
    }

    public function save()
    {
        $this->validate([
            'name'=>'required'
        ]);
        if ($this->tag) {
            $this->tag->update(
                ['name' => $this->name]
            );
        } else {
            Tag::create([
                'name' => $this->name

            ]);
        }
        session()->flash('saved', 'Category updated successfully.');
        $this->redirect(route('post.tag'),true);
    }
}
