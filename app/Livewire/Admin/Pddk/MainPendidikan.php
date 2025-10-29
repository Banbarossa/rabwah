<?php

namespace App\Livewire\Admin\Pddk;

use App\Models\Pendidikan;
use App\Models\Post;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;

class MainPendidikan extends Component
{
    public $search;
    public function mount(){
        if (session()->has('saved')) {
            LivewireAlert::title('saved')
                ->text('Posting saved successfully.')
                ->success()
                ->position(Position::Center)
                ->show();
        }
    }
    public function render()
    {
        $breads = [
            ['url'=>url()->current(),'label'=>'Pendidikan'],
        ];
        return view('livewire.admin.pddk.main-pendidikan')->layoutData(['breads'=>$breads]);
    }
    #[Computed]
    public function pendidikans(){
        return Pendidikan::with('author')
            ->when($this->search,function($query){
                $query->where('title','like','%'.$this->search.'%');
            })

            ->orderBy('order')->get();
    }

    public function destroy($id){
        Pendidikan::find($id)->delete();
        LivewireAlert::title('Deleted')->text('Post Deleted Succesfully')->position(Position::Center)->success()->show();
    }

    public function updateStatus($id,$status){
        Pendidikan::find($id)->update(['status'=>$status]);
        LivewireAlert::title('Success')
            ->text('Post Status Updated Succesfully')
            ->position(Position::Center)
            ->success()->show();
    }
}
