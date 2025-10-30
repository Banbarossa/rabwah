<?php

namespace App\Livewire\Fundraising;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Donasi extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public function render()
    {
        return view('livewire.fundraising.donasi');
    }
    #[Computed]
    public function campaignPrioritas(){
        $campaign= \App\Models\Program::whereHas('category', function ($query) {
            $query->where('slug','like', '%prioritas%');
        })->where('status','published')
            ->latest()
            ->paginate(6);

        return $campaign;
    }
    #[Computed]
    public function campaignSosial(){
        $campaign= \App\Models\Program::withSum([
            'donations as capaian' => function ($query) {
                $query->whereHas('payment', function ($paymentQuery) {
                    $paymentQuery->whereIn('status', ['settlement', 'success']);
                });
            }
        ], 'amount')->whereHas('category', function ($query) {
            $query->where('slug','sosial');
        })->where('status','published')
            ->latest()
            ->paginate(6);
        $campaign->getCollection()->transform(function ($item) {
            $target = $item->target_amount ?: 0;
            $capaian = $item->capaian ?: 0;

            $persentase = $target > 0 ? round(($capaian / $target) * 100, 0) : 0;
            $item->persentase = min($persentase, 100);

            return $item;
        });
        return $campaign;
    }
}
