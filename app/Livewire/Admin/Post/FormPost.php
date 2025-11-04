<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Program;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPost extends Component
{
    public ?Post $post=null;
    use WithFileUploads;
    public $type;
    public $status;
    public $title;
    public $content;
    public $slug;
    public $meta_description;
    public $meta_keywords;
    public $tags=[];
    public $category_id;
    public $thumbnail;

//    #[Title('Formulir')]
    public function mount($type,$post=null){
        $this->type = $type;
        if($post){
            $post->load('tags');
            $this->post = $post;
            $this->title = $post->title;
            $this->content = $post->content;
            $this->slug = $post->slug;
            $this->meta_description = $post->meta_description;
            $this->meta_keywords = $post->meta_keywords;
            $this->tags = $post->tags->pluck('id')->toArray();
            $this->category_id = $post->category_id;
            $this->thumbnail = $post->thumbnail;
            $this->status = $post->status;
        }

    }

    public function render()
    {
        $breads = [
            ['url' => route('post.index',['type'=>$this->type]), 'label' => ucfirst($this->type)],
            ['url' => url()->current(), 'label' => 'Formulir'],
        ];
        return view('livewire.admin.post.form-post')->layoutData(['breads' => $breads,'title'=>'Formulir '.$this->type]);
    }

    public function updatedTitle(){
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }

    #[Computed]
    public function categories(){
        return Category::orderBy('name')->get();
    }

    #[Computed]
    public function tagOptions(){
        return Tag::orderBy('name')->get();
    }

    private function processSave($status,$published_at = null)
    {


        $this->status = $status;

        $rules=[
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|required_if:type,post',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'thumbnail' => 'nullable:required_if:type,post',
        ];
        if ($this->post && $this->post->exists) {
            $rules['slug'] = [
                'required',
                'string',
                Rule::unique('posts')->ignore($this->post->id),
            ];
        } else {
            $rules['slug'] = [
                'required',
                'string',
                Rule::unique('posts'),
            ];
        }
        $validated = $this->validate($rules);

        $validated['excerpt'] = excerpt_text($this->content);


        try {
            if ($this->post) {
                $this->post->update($validated);
                session()->flash('saved', 'Program Updated Successfully.');
            } else {
                $validated['user_id'] = Auth::id();
                $validated['published_at'] = $published_at;
                $validated['type'] = $this->type;
                $this->post = Post::create($validated);
                session()->flash('saved', 'Program Created Successfully.');
            }
            if(!empty($this->tags)){
                $this->post->tags()->sync($this->tags);
            }

            $this->redirect(route('post.index',['type'=>$this->type]), navigate: true);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

        }


    }
    public function saveDraft()
    {
        $this->processSave('draft');
    }

    public function publish()
    {
        $this->processSave(
            status: 'published',
            published_at: now(),
        );
    }

}
