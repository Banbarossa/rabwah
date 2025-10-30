<?php

namespace App\Livewire\Fundraising;

use App\Livewire\Admin\Fundraising\Program;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailProgram extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public $program;
    public $donations;


    public function mount($slug)
    {
        $this->detail($slug);


    }
    public function render()
    {
        return view('livewire.fundraising.detail-program');
    }

    public function detail($slug){
        $program =\App\Models\Program::with('category')
            ->withCount(['donations as total_donors' => function ($query) {
            $query->whereHas('payment', function ($payQuery) {
                $payQuery->whereIn('status', ['settlement', 'success']);
            });
        }])->withSum(['donations as total_received'=>function ($query) {
            $query->whereHas('payment', function ($payQuery) {
                $payQuery->whereIn('status', ['settlement', 'success']);
            });
        }],'amount')->where('slug',$slug)->firstOrFail();

        if ($program->category?->slug == 'prioritas') {
            $program = \App\Models\Program::with('category')->withCount([
                'donations as total_donors' => function ($query) {
                    $query->whereHas('payment', function ($payQuery) {
                        $payQuery->whereIn('status', ['settlement', 'success']);
                    })
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->whereYear('created_at', Carbon::now()->year);
                }
            ])
                ->withSum([
                    'donations as total_received' => function ($query) {
                        $query->whereHas('payment', function ($payQuery) {
                            $payQuery->whereIn('status', ['settlement', 'success']);
                        })
                            ->whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year);
                    }
                ], 'amount')
                ->where('slug', $slug)
                ->firstOrFail();
        }
        $donations= $program->donations()
            ->with('donor')
            ->whereHas('payment', function ($payQuery) {
                $payQuery->whereIn('status', ['settlement', 'success']);
            })->latest()
            ->get();

        $this->donations = $donations;

        $received = $program->total_received ?? 0;
        $target = $program->target_amount == 0 ? 1 : $program->target_amount;


        $percentage = ($target > 0) ? min(($received / $target) * 100, 100) : 0;
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
