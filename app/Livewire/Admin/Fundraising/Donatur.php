<?php

namespace App\Livewire\Admin\Fundraising;

use App\Models\Category;
use App\Models\Donor;
use App\Models\Post;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Donatur extends Component
{
    #[Donatur]
    public $search;
    public function mount(){
        if(session()->has('saved')){
            LivewireAlert::title('saved')
                ->text(session('saved'))
                ->position(Position::Center)
                ->success()
                ->show();
        }
    }
    public function render()
    {
        $breads=[
            [
                'url'=>url()->current(),'label'=>'Donatur'
            ]
        ];
        return view('livewire.admin.fundraising.donatur')->layoutData(['breads'=>$breads]);
    }

    #[Computed]
    public function donaturs(){
        return Donor::orderBy('name')->paginate(100);
    }

    public function confirmDestroy($id){

            LivewireAlert::title('Process File')
                ->text('Yakin Untuk Menghapus Kategori ?')
                ->question()
                ->onConfirm('deleteFile', ['id' => $id])
                ->withConfirmButton('Delete')
                ->withCancelButton('Cancel')
                ->show();


    }

    public function deleteFile($data){
        Donor::find($data['id'])->delete();
        LivewireAlert::title('Deleted')
            ->text('Kategori Berhasil Dihapus')
            ->success()
            ->position(Position::Center)
            ->show();
    }
}
