<?php

namespace App\Livewire\Fundraising;

use App\Livewire\Admin\Fundraising\Program;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailProgram extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public $program;


    public function mount($slug)
    {
        $this->detail($slug);


    }
    public function render()
    {
        return view('livewire.fundraising.detail-program');
    }

    public function detail($slug){
        $program =\App\Models\Program::withCount(['donations as total_donors' => function ($query) {
            $query->whereIn('status', ['settlement', 'success']);
        }])->
        withSum(['donations as total_received'=>function ($query) {
            $query->whereIn('status', ['settlement', 'success']);
        }],'amount')->where('slug',$slug)->firstOrFail();
        $received = $program->total_received ?? 0;
        $target = $program->target_amount == 0 ? 1 : $program->target_amount;


        $percentage = ($received / $target) * 100;
        $data = [
            'slug' => $program->slug,
            'total_received' => $program->total_received,
            'total_donors' => $program->total_donors,
            'target' => $program->target_amount,
            'percentage' => $percentage,
            'title' => $program->title,
            'thumbnail' => $program->thumbnail,
            'content' => $program->content,
            'excerpt' => $program->excerpt,
        ];


        $this->program = $data;
    }
}
