<?php

namespace App\Livewire\Admin\Media;

use App\Models\MediaAsset;
use Livewire\Attributes\Title;
use Livewire\Component;

class FasilitasForm extends Component
{
    #[Title('Fasilitas')]
    public ?MediaAsset $mediaAsset = null;
    public $title;
    public $order;
    public $thumbnail;
    public $url_target;

    public function mount($media_asset=null)
    {
        if ($media_asset) {
            $media_asset=MediaAsset::find($media_asset);
            $this->mediaAsset = $media_asset;
            $this->thumbnail = $media_asset->thumbnail;
            $this->title = $media_asset->title;
            $this->order = $media_asset->order;
            $this->url_target = $media_asset->url_target;

        }
    }

    public function render()
    {
        $breads=[
            ['url'=>route('pengaturan.galeri-slider'),'label'=>'Galeri'],
            ['url'=>url()->current(),'label'=>'Formulir'],
        ];
        return view('livewire.admin.media.fasilitas-form')->layoutData(['breads'=>$breads]);
    }
    public function submit(){
        $validated = $this->validate([
            'title' => 'required',
            'order' => 'required:numeric',
            'thumbnail' => 'required',
            'url_target' => 'nullable',
        ]);
        if ($this->mediaAsset) {
            $this->mediaAsset->update($validated);
        }else{
            $validated['type']='fasilitas';
            MediaAsset::create($validated);
        }
        session()->flash('saved', [
            'title' => 'success',
            'text' => 'Fasilitas updated successfully',
        ]);
        $this->redirect(route('pengaturan.fasilitas'),true);
    }
}
