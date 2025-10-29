<?php

namespace App\Livewire\Admin\Pddk;

use App\Models\Pendidikan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPendidikan extends Component
{
    public ?Pendidikan $pendidikan=null;
    use WithFileUploads;
    public $status;
    public $title;
    public $content;
    public $slug;
    public $meta_description;
    public $tags=[];
    public $category_id;
    public $thumbnail;
    public $order;

    #[Title('Formulir Pendidikan')]
    public function mount($pendidikan=null){
        if($pendidikan){
            $this->pendidikan = $pendidikan;
            $this->title = $pendidikan->title;
            $this->content = $pendidikan->content;
            $this->slug = $pendidikan->slug;
            $this->meta_description = $pendidikan->meta_description;
            $this->thumbnail = $pendidikan->thumbnail;
            $this->status = $pendidikan->status;
        }

    }
    public function render()
    {
        $breads = [
            ['url' => route('pendidikan.jenjang'), 'label' => 'Semua'],
            ['url' => url()->current(), 'label' => 'Formulir'],
        ];
        return view('livewire.admin.pddk.form-pendidikan')->layoutData(['breads' => $breads]);
    }
    public function updatedTitle(){
        $this->slug = SlugService::createSlug(Pendidikan::class, 'slug', $this->title);
    }

    private function processSave($status,$published_at = null)
    {


        $this->status = $status;

        $rules=[
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_description' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'thumbnail' => 'required',
            'order' => 'required|integer',
        ];
        if ($this->pendidikan && $this->pendidikan->exists) {
            $rules['slug'] = [
                'required',
                'string',
                Rule::unique('pendidikans')->ignore($this->pendidikan->id),
            ];
        } else {
            $rules['slug'] = [
                'required',
                'string',
                Rule::unique('pendidikans'),
            ];
        }
        $validated = $this->validate($rules);

        $validated['excerpt'] = excerpt_text($this->content);


        try {
            if ($this->pendidikan) {
                $this->pendidikan->update($validated);
                session()->flash('saved', 'Pendidikan Updated Successfully.');
            } else {
                $validated['user_id'] = Auth::id();
                $validated['published_at'] = $published_at;
                $this->pendidikan = Pendidikan::create($validated);
                session()->flash('saved', 'Pendidikan Created Successfully.');
            }


            $this->redirect(route('pendidikan.jenjang'), navigate: true);
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
