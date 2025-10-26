<?php

namespace App\Livewire\Admin\Fundraising;

use App\Models\Donation;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class DonationHistory extends Component
{
    #[Title('Riwayat Donasi')]
    public function render()
    {
        $breads =[
            ['url'=>url()->current(),'label'=>'Donasi'],
        ];
        return view('livewire.admin.fundraising.donation-history')->layoutData(['breads'=>$breads]);
    }
    #[Computed]
    public function histories(){
        return Donation::with('donor','program')->get();
    }
}
