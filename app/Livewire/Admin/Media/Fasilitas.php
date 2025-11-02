<?php

namespace App\Livewire\Admin\Media;

use App\Models\MediaAsset;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class Fasilitas extends Component
{
    #[Title('Fasilitas')]
    public $search;
    public function mount()
    {
        if(session()->has('saved')){
            LivewireAlert::title(session('saved.title'))
                ->text(session('saved.text'))
                ->position(Position::Center)
                ->success()
                ->show();
        }
    }
    public function render()
    {
        $breads=[
            ['url'=>url()->current(),'label'=>'Fasilitas'],
        ];
        return view('livewire.admin.media.fasilitas')->layoutData(['breads'=>$breads]);
    }
    #[Computed]
    public function medias(){
        return MediaAsset::where('type','fasilitas')
            ->when($this->search,function($query){
                $query->where('title','like','%'.$this->search.'%');
            })
            ->orderBy('order')->where('is_active',true)
            ->get();
    }

    public function confirmDestroy($id)
    {
        MediaAsset::find($id)->delete();
        LivewireAlert::title('Success')
            ->text('Data berhasil dihapus')
            ->position(Position::Center)
            ->success()
            ->show();
    }
}
