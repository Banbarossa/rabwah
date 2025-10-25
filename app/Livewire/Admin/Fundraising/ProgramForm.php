<?php

namespace App\Livewire\Admin\Fundraising;

use App\Helpers\ExcerpHelper;
use App\Models\CategoryProgram;
use App\Models\Program;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProgramForm extends Component
{
    use WithFileUploads;

    #[Title('Program Form')]

    // Form fields
    public $category_program_id;
    public $slug;
    public $title;
    public $content;
    public $excerpt;
    public $thumbnail;
    public $target_amount;
    public $status = 'draft';

    public ?\App\Models\Program $program = null;
    public function mount($program = null)
    {

        if ($program) {
            $this->program = $program;
            $this->category_program_id = $program->category_program_id;
            $this->slug = $program->slug;
            $this->title = $program->title;
            $this->content = $program->content;
            $this->excerpt = $program->excerpt;
            $this->thumbnail = $program->thumbnail;
            $this->target_amount = $program->target_amount;
            $this->status = $program->status;
        }
    }

    public function render()
    {
        $breads = [
            ['url' => route('fundraising.program'), 'label' => 'Program'],
            ['url' => url()->current(), 'label' => 'Program Form'],
        ];
        return view('livewire.admin.fundraising.program-form')->layoutData(['breads' => $breads]);
    }

    public function updatedTitle($value)
    {
        $this->slug = SlugService::createSlug(Program::class, 'slug', $value);
    }

    #[Computed]
    public function categories()
    {
        return CategoryProgram::orderBy('name')->get();
    }

    private function processSave($status)
    {
        $this->status = $status;

        $rules=[
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_program_id' => 'required|exists:category_programs,id',
            'target_amount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,published,archived',
            'thumbnail' => 'required',
        ];
        if ($this->program && $this->program->exists) {
            $rules['slug'] = [
                'required',
                'string',
                Rule::unique('programs')->ignore($this->program->id),
            ];
        } else {
            $rules['slug'] = [
                'required',
                'string',
                Rule::unique('programs'),
            ];
        }
        $validated = $this->validate($rules);

        $validated['excerpt'] = excerpt_text($this->content);

//        if ($this->thumbnailFile) {
//            $validated['thumbnailFile'] = $this->thumbnail->store('programs', 'public');
//        }
        try {
            if ($this->program) {
                $this->program->update($validated);
                session()->flash('saved', 'Program Updated Successfully.');
            } else {
                $validated['created_by'] = Auth::id();
                $this->program = Program::create($validated);
                session()->flash('saved', 'Program Created Successfully.');
            }

            $this->redirect(route('fundraising.program'), navigate: true);
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
        $this->processSave('published');
    }
}
