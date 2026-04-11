<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SinglePost extends Component
{
    #[Layout('layouts.welcome')]
    #[Title('Ar-Rabwah - Berita')]

    public $slug;
    public ?Post $article=null;

    public function mount($slug)
    {
        $this->slug = $slug;
        $post=Post::with([
            'author',
        ])
            ->where('status','!=','archived')
            ->where('slug',$slug)
            ->firstOrFail();

        $this->article=$post;

    }
    public function render()
    {
        return view('livewire.post.single-post');
    }
    #[Computed]
    public function relatedArticles(){
        return Post::where('category_id',$this->article->category_id)
            ->where('id','!=',$this->article->id)
            ->latest()
            ->take(3)
            ->get()->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'image' => $post->thumbnail??null,
                    'category' => $post->category?->name,
                    'date'=>Carbon::parse($post->published_at)->locale('id')->format('d M Y'),
                ];
            });
    }

}
